<div id="dashboard-content">

<style>
    /* ─── Header ─────────────────────────────────────── */
    .roles-toolbar {
        display: flex; align-items: center; justify-content: space-between;
        gap: 1rem; margin-bottom: 1.5rem; flex-wrap: wrap;
    }
    .roles-search {
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 9px; color: #fff;
        padding: .55rem .9rem; font-size: .86rem;
        outline: none; min-width: 240px;
        transition: border-color .2s;
    }
    .roles-search:focus { border-color: rgba(249,115,22,.4); }
    .roles-search::placeholder { color: rgba(255,255,255,.3); }

    /* ─── Table ──────────────────────────────────────── */
    .roles-table-wrap {
        background: rgba(255,255,255,.025);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 16px;
        overflow: hidden;
    }
    .roles-row {
        display: flex; align-items: center; gap: 1.25rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,.06);
        flex-wrap: wrap;
    }
    .roles-row:last-child { border-bottom: none; }
    .roles-user {
        display: flex; align-items: center; gap: .6rem;
        min-width: 160px; flex-shrink: 0;
    }
    .roles-avatar {
        width: 32px; height: 32px; border-radius: 50%;
        object-fit: cover; flex-shrink: 0;
        background: rgba(255,255,255,.08);
    }
    .roles-name { font-size: .9rem; font-weight: 700; color: #fff; }

    .roles-chips {
        display: flex; flex-wrap: wrap; gap: .4rem;
        flex: 1; min-width: 220px;
    }
    .role-chip {
        display: inline-flex; align-items: center;
        padding: .3rem .8rem;
        border-radius: 999px;
        border: 1px solid rgba(255,255,255,.12);
        background: rgba(255,255,255,.03);
        color: rgba(255,255,255,.5);
        font-size: .78rem; font-weight: 600;
        cursor: pointer; user-select: none;
        transition: all .18s;
    }
    .role-chip:hover { border-color: rgba(255,255,255,.25); color: rgba(255,255,255,.8); }
    .role-chip.active {
        border-color: #fb923c;
        background: rgba(249,115,22,.15);
        color: #fb923c;
    }

    .btn-role-save {
        display: inline-flex; align-items: center; gap: .4rem;
        padding: .5rem 1rem; border-radius: 9px; border: none;
        background: rgba(255,255,255,.06);
        color: rgba(255,255,255,.7);
        font-size: .8rem; font-weight: 700;
        cursor: pointer; transition: all .2s;
        flex-shrink: 0;
    }
    .btn-role-save:hover { background: rgba(34,197,94,.15); color: #4ade80; }
    .btn-role-save:disabled { opacity: .5; cursor: default; }

    .roles-msg {
        font-size: .78rem; font-weight: 600; margin-left: .5rem;
        flex-basis: 100%;
    }
    .roles-msg.ok  { color: #4ade80; }
    .roles-msg.err { color: #f87171; }
</style>

{{-- ── Header ───────────────────────────────────────── --}}
<div class="mb-4">
    <p style="font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.35);margin:0 0 .1rem;">Staff</p>
    <h2 style="font-size:1.6rem;font-weight:800;color:#fff;margin:0;">Gestion des rôles</h2>
    <p style="font-size:.87rem;color:rgba(255,255,255,.35);margin:.3rem 0 0;">Un membre peut désormais cumuler plusieurs rôles (ex: Modo-Test + Builder)</p>
</div>

<div class="roles-toolbar">
    <input class="roles-search" type="text" id="rolesSearch" placeholder="Rechercher un membre…" oninput="filterRolesTable()">
</div>

<div class="roles-table-wrap" id="rolesTable">
    @forelse($users as $u)
        @php $userRoleIds = $u->roles->pluck('id_role')->all(); @endphp
        <div class="roles-row" data-name="{{ strtolower($u->name) }}">
            <div class="roles-user">
                @if($u->avatar)
                    <img class="roles-avatar" src="{{ $u->avatar }}" alt="">
                @else
                    <div class="roles-avatar"></div>
                @endif
                <span class="roles-name">{{ $u->name }}</span>
            </div>

            <div class="roles-chips" id="chips{{ $u->id }}">
                @foreach($allRoles as $role)
                    <span class="role-chip {{ in_array($role->id_role, $userRoleIds) ? 'active' : '' }}"
                          data-role-id="{{ $role->id_role }}"
                          onclick="this.classList.toggle('active')">
                        {{ $role->name_role }}
                    </span>
                @endforeach
            </div>

            <button class="btn-role-save" onclick="saveUserRoles({{ $u->id }}, this)">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                Enregistrer
            </button>

            <div class="roles-msg" id="rolesMsg{{ $u->id }}"></div>
        </div>
    @empty
        <div class="roles-row"><p style="color:rgba(255,255,255,.35);margin:0;">Aucun membre trouvé.</p></div>
    @endforelse
</div>

<script>
function filterRolesTable() {
    const q = document.getElementById('rolesSearch').value.trim().toLowerCase();
    document.querySelectorAll('#rolesTable .roles-row[data-name]').forEach(row => {
        row.style.display = row.dataset.name.includes(q) ? '' : 'none';
    });
}

function saveUserRoles(userId, btn) {
    const chips = document.querySelectorAll(`#chips${userId} .role-chip.active`);
    const roles = Array.from(chips).map(c => parseInt(c.dataset.roleId, 10));
    const msg   = document.getElementById('rolesMsg' + userId);

    btn.disabled = true;
    const orig = btn.innerHTML;
    btn.innerHTML = '⏳';

    fetch(`{{ url('/dashboardv2/roles') }}/${userId}/update`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || ''
        },
        body: JSON.stringify({ roles })
    })
    .then(async r => {
        let data = {};
        try { data = await r.json(); } catch (e) { data = {}; }
        msg.className = 'roles-msg ' + (r.ok ? 'ok' : 'err');
        if (r.ok) {
            msg.textContent = '✓ Enregistré';
        } else if (data.errors) {
            msg.textContent = Object.values(data.errors).flat().join(' — ');
        } else {
            msg.textContent = data.error || `Erreur (${r.status})`;
        }
        setTimeout(() => { msg.textContent = ''; }, 4000);
    })
    .catch(() => {
        msg.className = 'roles-msg err';
        msg.textContent = 'Impossible de contacter le serveur.';
    })
    .finally(() => { btn.disabled = false; btn.innerHTML = orig; });
}
</script>

</div>
