<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\CommandAdminWiki;
use App\Models\Report;
use App\Models\Formation;
use App\Models\FormationCompletion;
use App\Models\Charte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\Models\Ville;
use App\Models\Batiment;
class AdminController extends Controller
{

    public function index()
    {
        $adminCommands = CommandAdminWiki::select('command', 'quick_command', 'description', 'group')->get(); // Récupère toutes les lignes de la table
        $adminCommandsAdmin = CommandAdminWiki::getAllCommandsFromBothTables();
        $villes = Ville::select('nom_villes','id_villes')->get();
        return view("admin/admin_dashboard", compact('adminCommands', 'villes', 'adminCommandsAdmin'));
    }
    
    public function joinvilles(Request $request){
        $request->validate([
            'nom_ville' => 'required|string|max:255',
            'nombre_joueur' => 'required|string|max:255',
        ]);

        Ville::create([
            'nom_villes' => $request->nom_ville,
            'nombre_membre' => $request->nombre_joueur,
        ]);
    }

    public function joinmetier(Request $request)
    {
        $request->validate([
            'ville_id'     => 'required|exists:villes,id_villes',
            'date_valide'  => 'required|max:255',
            'pseudo'       => 'required|string|max:255',
            'steam_id'     => 'required|string|max:255',
            'batiment'     => 'required|string|max:255',
            'coordonnes' => 'required|string|max:255',
            'coop'         => 'nullable|string|max:255',
        ]);

        Batiment::create([
            'ville'        => $request->ville_id,
            'date_valide'  => $request->date_valide,
            'pseudo'       => $request->pseudo,
            'steam_id'     => $request->steam_id,
            'batiment'     => $request->batiment,
            'coordonnes'   => $request->coordonnes,
            'coop'         => $request->coop,
        ]);

        return redirect()->back()->with('success', 'Bâtiment ajouté !');
    }


    public function batiment()
    {
        $villes = Ville::with('batimentMetiers')->get();
        return view('batiments', compact('villes'));
    }

    private function isStaffUser(): bool
    {
        return \Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->isStaff();
    }

    public function dashboardv2()
    {
        if (!$this->isStaffUser()) {
            abort(403, 'Accès réservé au staff.');
        }
        $canManageServer = $this->canManageFormations();
        $content = view('Dashboard/sections/accueil', compact('canManageServer'))->render();
        return view('Dashboard/dashboardv2', compact('content'));
    }

    public function loadSection(string $section)
    {
        if (!$this->isStaffUser()) {
            abort(403, 'Accès réservé au staff.');
        }

        $allowed = [
            'accueil'     => 'Dashboard/sections/accueil',
            'report_form' => 'Dashboard/sections/report_form',
            'report_list' => 'Dashboard/sections/report_list',
            'formation'   => 'Dashboard/sections/formation',
            'charte'      => 'Dashboard/sections/charte',
            'home'        => 'Dashboard/sections/accueil',
            'users'       => 'Dashboard/prefab',
            'servers'     => 'Dashboard/prefab',
            'stats'       => 'Dashboard/prefab',
            'roles'       => 'Dashboard/sections/roles',
        ];

        if (!array_key_exists($section, $allowed)) {
            abort(404);
        }

        if ($section === 'accueil' || $section === 'home') {
            $canManageServer = $this->canManageFormations();
            return view($allowed[$section], compact('canManageServer'))->render();
        }

        if ($section === 'report_list') {
            $reports = Schema::hasTable('reports') ? Report::latest()->get() : collect();
            return view($allowed[$section], compact('reports'))->render();
        }

        if ($section === 'formation') {
            $formations = Schema::hasTable('formations')
                ? Formation::with('completions')->orderBy('ordre')->orderBy('id')->get()
                : collect();
            $members = \App\Models\User::with('roles')
                ->whereHas('roles', fn ($q) => $q->whereNotIn('roles.id_role', [1, 7, 8]))
                ->orderBy('name')
                ->get()
                ->map(fn ($u) => ['name' => $u->name, 'role' => $u->roleName() ?? 'Staff']);
            return view($allowed[$section], compact('formations', 'members'))->render();
        }

        if ($section === 'charte') {
            $chartes = Schema::hasTable('chartes')
                ? Charte::orderBy('id')->get()->keyBy('nom_role')
                : collect();
            return view($allowed[$section], compact('chartes'))->render();
        }

        if ($section === 'roles') {
            if (!$this->canManageFormations()) {
                abort(403, 'Accès réservé aux Fondateurs et Responsables.');
            }
            $users    = \App\Models\User::with('roles')->orderBy('name')->get();
            $allRoles = \App\Models\Role::orderBy('ordre')->get();
            return view($allowed[$section], compact('users', 'allRoles'))->render();
        }

        return view($allowed[$section])->render();
    }
    public function storeReport(Request $request)
    {
        if (!Schema::hasTable('reports')) {
            return response()->json(['error' => 'Migration non effectuée — lance php artisan migrate'], 503);
        }

        $mode = $request->input('mode');

        if ($mode === 'quotidien') {
            $request->validate([
                'date'        => 'required|date',
                'resume'      => 'required|string|max:5000',
                'auteur'      => 'required|string|max:255',
            ]);
            Report::create([
                'mode'   => 'quotidien',
                'date'   => $request->date,
                'resume' => $request->resume,
                'auteur' => $request->auteur,
            ]);
        } else {
            $request->validate([
                'pseudo'      => 'required|string|max:255',
                'steam_id'    => 'nullable|string|max:50',
                'types'       => 'required|string|max:255',
                'moderateur'  => 'required|string|max:255',
                'description' => 'required|string|max:5000',
            ]);
            Report::create([
                'mode'        => 'joueur',
                'pseudo'      => $request->pseudo,
                'steam_id'    => $request->steam_id,
                'types'       => $request->types,
                'moderateur'  => $request->moderateur,
                'description' => $request->description,
            ]);
        }

        return response()->json(['success' => true]);
    }

    private function canManageFormations(): bool
    {
        return \Illuminate\Support\Facades\Auth::check()
            && \Illuminate\Support\Facades\Auth::user()->hasRole([7, 8]);
    }

    public function storeFormation(Request $request)
    {
        if (!$this->canManageFormations()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        if (!Schema::hasTable('formations')) {
            return response()->json(['error' => 'Migration non effectuée — lance php artisan migrate'], 503);
        }

        $request->validate([
            'titre'       => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'categorie'   => 'required|string|max:100',
            'emoji'       => 'nullable|string|max:10',
            'couleur'     => 'nullable|string|max:20',
            'pdf_url'     => 'nullable|url|max:500',
            'pdf_file'    => 'nullable|file|mimes:pdf|max:20480',
        ]);

        $pdfPath = null;
        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('formations', 'public');
        }

        Formation::create([
            'titre'       => $request->titre,
            'description' => $request->description,
            'categorie'   => $request->categorie,
            'emoji'       => $request->emoji ?: '📚',
            'couleur'     => $request->couleur ?: '#f97316',
            'pdf_path'    => $pdfPath,
            'pdf_url'     => $request->pdf_url,
            'ordre'       => Formation::max('ordre') + 1,
        ]);

        return response()->json(['success' => true]);
    }

    public function validateCompletion(Request $request, int $id)
    {
        if (!$this->canManageFormations()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        if (!Schema::hasTable('formation_completions')) {
            return response()->json(['error' => 'Migration non effectuée'], 503);
        }

        Formation::findOrFail($id);

        $request->validate([
            'staff_name'   => 'required|string|max:255',
            'validated_by' => 'required|string|max:255',
            'notes'        => 'nullable|string|max:1000',
        ]);

        // Evite les doublons
        $exists = FormationCompletion::where('formation_id', $id)
            ->where('staff_name', $request->staff_name)
            ->exists();

        if ($exists) {
            return response()->json(['error' => 'Ce membre a déjà validé cette formation.'], 422);
        }

        FormationCompletion::create([
            'formation_id' => $id,
            'staff_name'   => $request->staff_name,
            'validated_by' => $request->validated_by,
            'notes'        => $request->notes,
        ]);

        return response()->json(['success' => true]);
    }

    public function deleteCompletion(int $id)
    {
        if (!$this->canManageFormations()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }
        FormationCompletion::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function deleteFormation(int $id)
    {
        if (!$this->canManageFormations()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }
        $formation = Formation::findOrFail($id);
        if ($formation->pdf_path) {
            Storage::disk('public')->delete($formation->pdf_path);
        }
        $formation->delete();
        return response()->json(['success' => true]);
    }

    public function storeCharte(Request $request)
    {
        if (!$this->canManageFormations()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        $request->validate([
            'nom_role'               => 'required|string|max:100',
            'emoji'                  => 'nullable|string|max:10',
            'couleur'                => 'nullable|string|max:20',
            'section_role'           => 'nullable|string|max:5000',
            'section_responsabilites'=> 'nullable|string|max:5000',
            'section_attentes'       => 'nullable|string|max:5000',
            'section_interdictions'  => 'nullable|string|max:5000',
        ]);

        Charte::updateOrCreate(
            ['nom_role' => $request->nom_role],
            [
                'emoji'                   => $request->emoji ?: '📋',
                'couleur'                 => $request->couleur ?: '#f97316',
                'section_role'            => $request->section_role,
                'section_responsabilites' => $request->section_responsabilites,
                'section_attentes'        => $request->section_attentes,
                'section_interdictions'   => $request->section_interdictions,
            ]
        );

        return response()->json(['success' => true]);
    }

    public function deleteCharte(int $id)
    {
        if (!$this->canManageFormations()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }
        Charte::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function updateUserRoles(Request $request, int $id)
    {
        if (!$this->canManageFormations()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        $request->validate([
            'roles'   => 'array',
            'roles.*' => 'integer|exists:roles,id_role',
        ]);

        $user = \App\Models\User::findOrFail($id);
        $user->roles()->sync($request->input('roles', []));

        return response()->json(['success' => true]);
    }

    public function notationform()
    {
        return view('Dashboard/notationform');
    }
}
