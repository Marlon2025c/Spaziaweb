<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\CommandAdminWiki;
use App\Models\Report;
use App\Models\Formation;
use App\Models\FormationCompletion;
use App\Models\FormationQuestion;
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

    public function dashboardv2(Request $request)
    {
        if (!$this->isStaffUser()) {
            abort(403, 'Accès réservé au staff.');
        }

        $initialSection = $request->query('section');
        $content = $initialSection
            ? $this->buildSectionView($initialSection)->render()
            : $this->buildSectionView('accueil')->render();

        return view('Dashboard/dashboardv2', compact('content'));
    }

    public function loadSection(string $section)
    {
        if (!$this->isStaffUser()) {
            abort(403, 'Accès réservé au staff.');
        }

        return $this->buildSectionView($section)->render();
    }

    private function buildSectionView(string $section)
    {
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
            return view($allowed[$section], compact('canManageServer'));
        }

        if ($section === 'report_list') {
            $reports = Schema::hasTable('reports') ? Report::latest()->get() : collect();
            return view($allowed[$section], compact('reports'));
        }

        if ($section === 'formation') {
            $formations = Schema::hasTable('formations')
                ? Formation::with(['completions', 'questions'])->orderBy('ordre')->orderBy('id')->get()
                : collect();
            $members = \App\Models\User::with('roles')
                ->whereHas('roles', fn ($q) => $q->whereNotIn('roles.id_role', [1, 7, 8]))
                ->orderBy('name')
                ->get()
                ->map(fn ($u) => ['name' => $u->name, 'role' => $u->roleName() ?? 'Staff']);
            return view($allowed[$section], compact('formations', 'members'));
        }

        if ($section === 'charte') {
            $chartes = Schema::hasTable('chartes')
                ? Charte::orderBy('id')->get()->keyBy('nom_role')
                : collect();
            return view($allowed[$section], compact('chartes'));
        }

        if ($section === 'roles') {
            if (!$this->canManageFormations()) {
                abort(403, 'Accès réservé aux Fondateurs et Responsables.');
            }
            $users    = \App\Models\User::with('roles')->orderBy('name')->get();
            $allRoles = \App\Models\Role::orderBy('ordre')->get();
            return view($allowed[$section], compact('users', 'allRoles'));
        }

        return view($allowed[$section]);
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
            'titre'        => 'required|string|max:255',
            'description'  => 'nullable|string|max:2000',
            'categorie'    => 'required|string|max:100',
            'emoji'        => 'nullable|string|max:10',
            'couleur'      => 'nullable|string|max:20',
            'pdf_url'      => 'nullable|url|max:500',
            'pdf_file'     => 'nullable|file|mimes:pdf|max:20480',
            'points_cles'  => 'nullable|string',
            'fin_pdf_url'  => 'nullable|url|max:500',
            'fin_pdf_file' => 'nullable|file|mimes:pdf|max:20480',
            'questions'    => 'nullable|string',
        ]);

        $pdfPath = null;
        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('formations', 'public');
        }

        $finPdfPath = null;
        if ($request->hasFile('fin_pdf_file')) {
            $finPdfPath = $request->file('fin_pdf_file')->store('formations', 'public');
        }

        $pointsCles = null;
        if ($request->filled('points_cles')) {
            $decoded = json_decode($request->points_cles, true);
            if (is_array($decoded)) {
                $points = array_values(array_filter(array_map('trim', $decoded)));
                if (!empty($points)) {
                    $pointsCles = json_encode($points);
                }
            }
        }

        $formation = Formation::create([
            'titre'        => $request->titre,
            'description'  => $request->description,
            'categorie'    => $request->categorie,
            'emoji'        => $request->emoji ?: '📚',
            'couleur'      => $request->couleur ?: '#f97316',
            'pdf_path'     => $pdfPath,
            'pdf_url'      => $request->pdf_url,
            'ordre'        => Formation::max('ordre') + 1,
            'points_cles'  => $pointsCles,
            'fin_pdf_path' => $finPdfPath,
            'fin_pdf_url'  => $request->fin_pdf_url,
        ]);

        if ($request->categorie === 'autodidacte' && $request->filled('questions')) {
            $questions = json_decode($request->questions, true);
            if (is_array($questions)) {
                foreach (array_values($questions) as $i => $q) {
                    $options = array_values(array_filter(array_map('trim', (array) ($q['options'] ?? []))));
                    if (empty($q['question']) || count($options) < 2) continue;
                    FormationQuestion::create([
                        'formation_id'  => $formation->id,
                        'question'      => $q['question'],
                        'options'       => $options,
                        'correct_index' => min((int) ($q['correct_index'] ?? 0), count($options) - 1),
                        'explanation'   => trim((string) ($q['explanation'] ?? '')) ?: null,
                        'ordre'         => $i,
                    ]);
                }
            }
        }

        return response()->json(['success' => true]);
    }

    public function editFormationData(int $id)
    {
        if (!$this->canManageFormations()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        $formation = Formation::with('questions')->findOrFail($id);

        return response()->json([
            'formation' => [
                'id'           => $formation->id,
                'titre'        => $formation->titre,
                'description'  => $formation->description,
                'categorie'    => $formation->categorie,
                'emoji'        => $formation->emoji,
                'couleur'      => $formation->couleur,
                'pdf_path'     => $formation->pdf_path ? asset('storage/' . $formation->pdf_path) : null,
                'pdf_url'      => $formation->pdf_url,
                'fin_pdf_path' => $formation->fin_pdf_path ? asset('storage/' . $formation->fin_pdf_path) : null,
                'fin_pdf_url'  => $formation->fin_pdf_url,
                'points_cles'  => $formation->points_cles ? (json_decode($formation->points_cles, true) ?: []) : [],
                'questions'    => $formation->questions->map(fn ($q) => [
                    'question'      => $q->question,
                    'options'       => $q->options,
                    'correct_index' => $q->correct_index,
                    'explanation'   => $q->explanation,
                ])->values(),
            ],
        ]);
    }

    public function updateFormation(Request $request, int $id)
    {
        if (!$this->canManageFormations()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        $formation = Formation::findOrFail($id);

        $request->validate([
            'titre'        => 'required|string|max:255',
            'description'  => 'nullable|string|max:2000',
            'categorie'    => 'required|string|max:100',
            'emoji'        => 'nullable|string|max:10',
            'couleur'      => 'nullable|string|max:20',
            'pdf_url'      => 'nullable|url|max:500',
            'pdf_file'     => 'nullable|file|mimes:pdf|max:20480',
            'points_cles'  => 'nullable|string',
            'fin_pdf_url'  => 'nullable|url|max:500',
            'fin_pdf_file' => 'nullable|file|mimes:pdf|max:20480',
            'questions'    => 'nullable|string',
        ]);

        $pdfPath = $formation->pdf_path;
        $pdfUrl = $request->pdf_url;
        if ($request->hasFile('pdf_file')) {
            if ($pdfPath) Storage::disk('public')->delete($pdfPath);
            $pdfPath = $request->file('pdf_file')->store('formations', 'public');
            $pdfUrl = null;
        } elseif ($request->filled('pdf_url')) {
            if ($pdfPath) Storage::disk('public')->delete($pdfPath);
            $pdfPath = null;
        }

        $finPdfPath = $formation->fin_pdf_path;
        $finPdfUrl = $request->fin_pdf_url;
        if ($request->hasFile('fin_pdf_file')) {
            if ($finPdfPath) Storage::disk('public')->delete($finPdfPath);
            $finPdfPath = $request->file('fin_pdf_file')->store('formations', 'public');
            $finPdfUrl = null;
        } elseif ($request->filled('fin_pdf_url')) {
            if ($finPdfPath) Storage::disk('public')->delete($finPdfPath);
            $finPdfPath = null;
        }

        $pointsCles = $formation->points_cles;
        if ($request->has('points_cles')) {
            $pointsCles = null;
            if ($request->filled('points_cles')) {
                $decoded = json_decode($request->points_cles, true);
                if (is_array($decoded)) {
                    $points = array_values(array_filter(array_map('trim', $decoded)));
                    if (!empty($points)) {
                        $pointsCles = json_encode($points);
                    }
                }
            }
        }

        $formation->update([
            'titre'        => $request->titre,
            'description'  => $request->description,
            'categorie'    => $request->categorie,
            'emoji'        => $request->emoji ?: '📚',
            'couleur'      => $request->couleur ?: '#f97316',
            'pdf_path'     => $pdfPath,
            'pdf_url'      => $pdfUrl,
            'points_cles'  => $pointsCles,
            'fin_pdf_path' => $finPdfPath,
            'fin_pdf_url'  => $finPdfUrl,
        ]);

        if ($request->categorie === 'autodidacte' && $request->has('questions')) {
            $formation->questions()->delete();
            $questions = json_decode($request->questions, true);
            if (is_array($questions)) {
                foreach (array_values($questions) as $i => $q) {
                    $options = array_values(array_filter(array_map('trim', (array) ($q['options'] ?? []))));
                    if (empty($q['question']) || count($options) < 2) continue;
                    FormationQuestion::create([
                        'formation_id'  => $formation->id,
                        'question'      => $q['question'],
                        'options'       => $options,
                        'correct_index' => min((int) ($q['correct_index'] ?? 0), count($options) - 1),
                        'explanation'   => trim((string) ($q['explanation'] ?? '')) ?: null,
                        'ordre'         => $i,
                    ]);
                }
            }
        }

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

    public function submitQuiz(Request $request, int $id)
    {
        if (!$this->isStaffUser()) {
            return response()->json(['error' => 'Non authentifié.'], 403);
        }

        if (!Schema::hasTable('formation_questions')) {
            return response()->json(['error' => 'Migration non effectuée'], 503);
        }

        $formation = Formation::with('questions')->findOrFail($id);

        if ($formation->categorie !== 'autodidacte' || $formation->questions->isEmpty()) {
            return response()->json(['error' => 'Aucun quiz pour cette formation.'], 422);
        }

        $request->validate([
            'staff_name' => 'required|string|max:255',
            'answers'    => 'required|array',
        ]);

        $total = $formation->questions->count();
        $score = 0;
        $details = [];
        foreach ($formation->questions as $question) {
            $given = $request->answers[$question->id] ?? null;
            $isCorrect = $given !== null && (int) $given === (int) $question->correct_index;
            if ($isCorrect) {
                $score++;
            }
            $details[] = [
                'question_id'   => $question->id,
                'given_index'   => $given !== null ? (int) $given : null,
                'correct_index' => (int) $question->correct_index,
                'is_correct'    => $isCorrect,
                'explanation'   => $question->explanation,
            ];
        }

        $percentage = $total > 0 ? (int) round(($score / $total) * 100) : 0;
        $passed = $percentage >= 50;

        if ($passed) {
            FormationCompletion::firstOrCreate(
                ['formation_id' => $id, 'staff_name' => $request->staff_name],
                ['validated_by' => 'Quiz automatique', 'notes' => "Score quiz : {$score}/{$total} ({$percentage}%)"]
            );
        }

        return response()->json([
            'success'    => true,
            'score'      => $score,
            'total'      => $total,
            'percentage' => $percentage,
            'passed'     => $passed,
            'details'    => $details,
        ]);
    }

    public function formationTrainer(int $id)
    {
        if (!$this->isStaffUser()) {
            abort(403, 'Accès réservé au staff.');
        }

        $formation = Formation::with(['completions', 'questions'])->findOrFail($id);

        if ($formation->categorie !== 'autodidacte') {
            return redirect()->route('dashboardv2', ['section' => 'formation']);
        }

        $canManage = $this->canManageFormations();
        $isValidated = $canManage || $formation->completions->contains('staff_name', auth()->user()?->name);

        return view('Dashboard/formation_trainer', compact('formation', 'isValidated'));
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
