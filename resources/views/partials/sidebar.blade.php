<div class="bg-primary shadow-sm d-none d-md-flex flex-column shrink-0" style="width: 280px;">
    <div class="p-3 border-bottom">
        <h5 class="text-primary mb-0 text-center">Saratech</h5>
        <small class="text-muted">Gestion d'Assiduité pour une entreprise</small>
    </div>

    {{-- Les liens de la Sidebar --}}
    <nav class="">
  <div class="list-group list-group-flush">
    <a
      href="{{ route('dashboard') }}"
      class="bg-primary list-group-item list-group-item-action d-flex align-items-center gap-3"
      
      aria-current="page"
    >
      <span style="font-size: 1.15rem">📊</span>
      <div>
        <div class="fw-semibold">Tableau de bord</div>
        <small class="text-muted">Vue générale</small>
      </div>
    </a>

    <a
      href="#"
      class="bg-primary list-group-item list-group-item-action d-flex align-items-center gap-3"
      
    >
      <span style="font-size: 1.15rem">👥</span>
      <div>
        <div class="fw-semibold">Employés</div>
        <small class="text-muted">Gestion</small>
      </div>
    </a>

    <a
      href="#"
      class="bg-primary list-group-item list-group-item-action d-flex align-items-center gap-3"
      
    >
      <span style="font-size: 1.15rem">🕐</span>
      <div>
        <div class="fw-semibold">Pointage</div>
        <small class="text-muted">Entrées / Sorties</small>
      </div>
    </a>

    <a
      href="#"
      class="bg-primary list-group-item list-group-item-action d-flex align-items-center gap-3"
      data-bs-toggle="pill"
      
    >
      <span style="font-size: 1.15rem">📈</span>
      <div>
        <div class="fw-semibold">Rapports</div>
        <small class="text-muted">Export & filtres</small>
      </div>
    </a>

    <a
      href="{{ route('settings.politique') }}"
      class="bg-primary list-group-item list-group-item-action d-flex align-items-center gap-3"
      
    >
      <span style="font-size: 1.15rem">📘</span>
      <div>
        <div class="fw-semibold">Conditions</div>
        <small class="text-muted">Règles internes</small>
      </div>
    </a>

    <a
      href="{{ route('settings.index') }}"
      class="bg-primary list-group-item list-group-item-action d-flex align-items-center gap-3"
      
    >
      <span style="font-size: 1.15rem">🛠️</span>
      <div>
        <div class="fw-semibold">Paramètres</div>
        <small class="text-muted">Horaires & services</small>
      </div>
    </a>

    <!-- Collapsible sub-menu -->
    <div class="mt-2 mb-2">
      <button
        class="btn btn-sm btn-outline-dark w-100 d-flex justify-content-between align-items-center"
        data-bs-toggle="collapse"
        data-bs-target="#sidebarSubmenu"
        aria-expanded="false"
      >
        ⚙️ Configurations
        <span class="small">▾</span>
      </button>

      <div class="collapse mt-2 ps-2" id="sidebarSubmenu">
        <div class="list-group list-group-flush small">
          <a
            href="#"
            class="bg-primary list-group-item list-group-item-action"
            data-bs-toggle="pill"
            data-bs-target="#services"
            role="tab"
            >✔ Services</a
          >
          <a
            href="#"
            class="bg-primary list-group-item list-group-item-action"
            data-bs-toggle="pill"
            data-bs-target="#departments"
            role="tab"
            >✔ Départements</a
          >
          <a
            href="#"
            class="bg-primary list-group-item list-group-item-action"
            data-bs-toggle="pill"
            data-bs-target="#roles"
            role="tab"
            >✔ Fonctions</a
          >
          <a
            href="#"
            class="bg-primary list-group-item list-group-item-action"
            data-bs-toggle="pill"
            data-bs-target="#leaves"
            role="tab"
            >✔ Congés / Permissions</a
          >
        </div>
      </div>
    </div>
  </div>
</nav>


    <div class="border-top p-3">
          <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width:42px;height:42px;background:#f1f3f5;border-radius:8px;display:flex;align-items:center;justify-content:center;">
              👤
            </div>
            <div class="flex-grow-1">
              <div class="fw-semibold">Admin</div>
              <small class="text-muted">admin@techniger.com</small>
            </div>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-dark text-dark btn-sm flex-grow-1" type="button">Profil</button>
            <button class="btn btn-danger btn-sm" type="button">Déconnexion</button>
          </div>
        </div>
</div>
