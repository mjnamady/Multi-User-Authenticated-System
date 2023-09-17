<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Real<span>Estate</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        @if(Auth::user()->can('property.menu'))
          <li class="nav-item nav-category">Properties & Amenities</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property Types</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                @if(Auth::user()->can('property.all'))
                <li class="nav-item">
                  <a href=" {{route('all.type')}} " class="nav-link">All Types</a>
                </li>
                @endif
                @if(Auth::user()->can('property.add'))
                <li class="nav-item">
                  <a href=" {{route('add.type')}} " class="nav-link">Add Type</a>
                </li>
                @endif
              </ul>
            </div>
          </li>
        @endif
        @if(Auth::user()->can('aminities.menu'))
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#amenities" role="button" aria-expanded="false" aria-controls="amenities">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Amenity Types</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="amenities">
            <ul class="nav sub-menu">
              @if(Auth::user()->can('amenities.all'))
              <li class="nav-item">
                <a href=" {{route('all.amenities')}} " class="nav-link">All Amenities</a>
              </li>
              @endif
              @if(Auth::user()->can('amenities.add'))
              <li class="nav-item">
                <a href=" {{route('add.amenity')}} " class="nav-link">Add Amenity</a>
              </li>
              @endif
            </ul>
          </div>
        </li>
        @endif

        @if(Auth::user()->can('role.menu'))
        <li class="nav-item nav-category">Roles $ Permissions</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#rolesPermissions" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Roles $ Permissions</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="rolesPermissions">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('all.permissions') }}" class="nav-link">All Permissions</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('all.roles') }}" class="nav-link">All Roles</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('add.roles.permission') }}" class="nav-link">Role In Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('all.roles.permission') }}" class="nav-link">All Role's Permissions</a>
              </li>
            </ul>
          </div>
        </li>
        @endif
        @if(Auth::user()->can('agent.menu'))
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#adminUser" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Manage Admin User</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="adminUser">
            <ul class="nav sub-menu">
              @if(Auth::user()->can('agent.all'))
              <li class="nav-item">
                <a href="{{ route('all.admin') }}" class="nav-link">All Admin</a>
              </li>
              @endif
              @if(Auth::user()->can('agent.add'))
              <li class="nav-item">
                <a href="{{ route('add.admin') }}" class="nav-link">Add Admin</a>
              </li>
              @endif
            </ul>
          </div>
        </li>
        @endif

        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
          <a href="#" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>