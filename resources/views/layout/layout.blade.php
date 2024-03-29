<!doctype html>
<html lang="en" data-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta name="color-scheme" content="dark light">
  <title>Create a new project | Clever Admin Dashboard Template</title>
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="/css/main.css">
  <!-- Utilities -->
  <link rel="stylesheet" type="text/css" href="/css/utilities.css">
</head>

<body>
  <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Sidebar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="sidebar">
      <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="/">
          <img src="/img/logos/clever-primary.svg" alt="...">
        </a>
        <!-- User menu (mobile) -->
        <div class="navbar-user d-lg-none">
          <!-- Dropdown -->
          <div class="dropdown">
            <!-- Toggle -->
            <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="avatar-parent-child">
                <img alt="..." src="/img/people/img-profile.jpg" class="avatar avatar- rounded-circle">
                <span class="avatar-child avatar-badge bg-success"></span>
              </div>
            </a>
            <!-- Menu -->
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
              <a href="#" class="dropdown-item">Profile</a>
              <a href="#" class="dropdown-item">Settings</a>
              <a href="#" class="dropdown-item">Billing</a>
              <hr class="dropdown-divider">
              <a href="#" class="dropdown-item">Logout</a>
            </div>
          </div>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="#sidebar-projects" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebar-projects">
                <i class="bi bi-briefcase"></i> Projects
              </a>
              <div class="collapse show" id="sidebar-projects">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/pages/projects/overview.html" class="nav-link">
                      Overview
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/projects/grid-view.html" class="nav-link">
                      Grid View
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/projects/table-view.html" class="nav-link">
                      Table View
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/projects/details.html" class="nav-link">
                      Details
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/projects/create-project.html" class="nav-link font-bold">
                      Create Project
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sidebar-tasks" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-tasks">
                <i class="bi bi-kanban"></i> Tasks
              </a>
              <div class="collapse" id="sidebar-tasks">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/pages/tasks/overview.html" class="nav-link">
                      Overview
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/tasks/list-view.html" class="nav-link">
                      List View
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/tasks/list-view-aside.html" class="nav-link">
                      List View w/ Details
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/tasks/board-view.html" class="nav-link">
                      Board View
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/tasks/create-task.html" class="nav-link">
                      Create Task
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sidebar-files" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-files">
                <i class="bi bi-file-earmark-text"></i> Files
              </a>
              <div class="collapse" id="sidebar-files">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/pages/files/overview.html" class="nav-link">
                      Overview
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/files/table-view.html" class="nav-link">
                      Table View
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/files/media-gallery.html" class="nav-link">
                      Media Gallery
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sidebar-integrations" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-integrations">
                <i class="bi bi-terminal"></i> Integrations
              </a>
              <div class="collapse" id="sidebar-integrations">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/pages/integrations/applications.html" class="nav-link">
                      Applications
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/integrations/manage-apps.html" class="nav-link">
                      Manage Apps
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sidebar-user" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-user">
                <i class="bi bi-people"></i> User
              </a>
              <div class="collapse" id="sidebar-user">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/pages/user/profile.html" class="nav-link">
                      Profile
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/user/table-view.html" class="nav-link">
                      Table View
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/user/permissions.html" class="nav-link">
                      Permissions
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sidebar-settings" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-settings">
                <i class="bi bi-gear"></i> Settings
              </a>
              <div class="collapse" id="sidebar-settings">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/pages/settings/general.html" class="nav-link">
                      General
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/settings/security.html" class="nav-link">
                      Security
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/settings/team.html" class="nav-link">
                      Team
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/settings/billing.html" class="nav-link">
                      Billing
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/settings/notifications.html" class="nav-link">
                      Notifications
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sidebar-authentication" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-authentication">
                <i class="bi bi-person-bounding-box"></i> Authentication
              </a>
              <div class="collapse" id="sidebar-authentication">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/pages/authentication/basic-login.html" class="nav-link">
                      Basic Login
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/authentication/basic-register.html" class="nav-link">
                      Basic Register
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/authentication/basic-recover.html" class="nav-link">
                      Basic Recover
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/authentication/side-login.html" class="nav-link">
                      Side Login
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/authentication/side-register.html" class="nav-link">
                      Side Register
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pages/authentication/side-recover.html" class="nav-link">
                      Side Recover
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="navbar-divider my-4 opacity-70">
          <!-- Documentation -->
          <ul class="navbar-nav">
            <li>
              <span class="nav-link text-xs font-semibold text-uppercase text-muted ls-wide">
                Resources
              </span>
            </li>
            <li class="nav-item">
              <a class="nav-link py-2" href="/docs">
                <i class="bi bi-code-square"></i> Documentation
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link py-2 d-flex align-items-center" href="https://webpixels.io/themes/clever-admin-dashboard-template/releases" target="_blank">
                <i class="bi bi-journals"></i>
                <span>Changelog</span>
                <span class="badge badge-sm bg-soft-success text-success rounded-pill ms-auto">v1.0.0</span>
              </a>
            </li>
          </ul>
          <!-- Push content down -->
          <div class="mt-auto"></div>
          <!-- User menu -->
          <div class="my-4 px-lg-6 position-relative">
            <div class="dropup w-full">
              <button class="btn-primary d-flex w-full py-3 ps-3 pe-4 align-items-center shadow shadow-3-hover rounded-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-3">
                  <img alt="..." src="/img/people/img-profile.jpg" class="avatar avatar-sm rounded-circle">
                </span>
                <span class="flex-fill text-start text-sm font-semibold">
                  Tahlia Mooney
                </span>
                <span>
                  <i class="bi bi-chevron-expand text-white text-opacity-70"></i>
                </span>
              </button>
              <div class="dropdown-menu dropdown-menu-end w-full">
                <div class="dropdown-header">
                  <span class="d-block text-sm text-muted mb-1">Signed in as</span>
                  <span class="d-block text-heading font-semibold">Tahlia Mooney</span>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="bi bi-house me-3"></i>Home
                </a>
                <a class="dropdown-item" href="#">
                  <i class="bi bi-pencil me-3"></i>Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="bi bi-gear me-3"></i>Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="bi bi-box-arrow-left me-3"></i>Logout
                </a>
              </div>
            </div>
            <div class="d-flex gap-3 justify-content-center align-items-center mt-6 d-none">
              <div>
                <i class="bi bi-moon-stars me-2 text-warning me-2"></i>
                <span class="text-heading text-sm font-bold">Dark mode</span>
              </div>
              <div class="ms-auto">
                <div class="form-check form-switch me-n2">
                  <input class="form-check-input" type="checkbox" id="switch-dark-mode">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Content -->
    <div class="flex-lg-1 h-screen overflow-y-lg-auto">
      <!-- Navbar -->
      <header class="position-sticky top-0 overlap-10 bg-surface-primary border-bottom">
        <div class="container-fluid py-4">
          <div class="row align-items-center">
            <div class="col">
              <div class="d-flex align-items-center gap-4">
                <div>
                  <button type="button" class="btn-close text-xs" aria-label="Close"></button>
                </div>
                <div class="vr opacity-20 my-1"></div>
                <h1 class="h4 ls-tight">Create a new project</h1>
              </div>
            </div>
            <div class="col-auto">
              <div class="hstack gap-2 justify-content-end">
                <a href="#!" class="text-sm text-muted text-primary-hover font-semibold me-2 d-none d-md-block">
                  <i class="bi bi-question-circle-fill"></i>
                  <span class="d-none d-sm-inline ms-2">Need help?</span>
                </a>
                <button type="button" class="btn btn-sm btn-neutral border-base d-none d-md-block">
                  <span>Save and create another</span>
                </button>
                <button type="button" class="btn btn-sm btn-primary">
                  <span>Save</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- Main -->

    @yield('main-section')
 <!-- Scripts -->
 </div>
  </div>
  <script src="/js/main.js"></script>
</body>

</html>