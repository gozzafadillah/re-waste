<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title }}</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        {{-- Trix --}}
        <link rel="stylesheet" type="text/css" href="/css/trix.css">
        <script type="text/javascript" src="/js/trix.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html"><i class="fas fa-recycle"></i> Re-Waste</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </div>
            <small class="text-white d-none d-sm-none d-lg-block">{{ auth()->user()->name }}</small>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</button></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav shadow accordion sb-sidenav-light text-white bg-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">App</div>
                            
                            <a class="nav-link {{ Request::is('dashboard/waste*') ? 'active' : '' }}" href="/dashboard/waste">
                                <div class="sb-nav-link-icon"><i class="fas fa-recycle"></i></div>
                                Recycle
                            </a>
                            
                            @can('admin')
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link {{ Request::is('dashboard/category/botol-cup') ? 'active' : '' }}" href="/dashboard/category/botol-cup" style="margin-bottom: -10px">
                                        <div class="sb-nav-link-icon"><i class="fas fa-leaf"></i></div>
                                        Botol / Cup
                                    </a>
                                    <a class="nav-link {{ Request::is('dashboard/category/kardus') ? 'active' : '' }}" href="/dashboard/category/kardus">
                                        <div class="sb-nav-link-icon"><i class="fas fa-wine-bottle"></i></div>
                                        Kardus
                                    </a>
                                    <a class="nav-link {{ Request::is('dashboard/category/karton-susu') ? 'active' : '' }}" href="/dashboard/category/karton-susu">
                                        <div class="sb-nav-link-icon"><i class="fas fa-wine-bottle"></i></div>
                                        Karton Susu
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link {{ Request::is('dashboard/penawaran*') ? 'active' : '' }}" href="/dashboard/penawaran">
                                <div class="sb-nav-link-icon"><i class="fas fa-recycle"></i></div>
                                Penawaran
                            </a>
                            @endcan
                        </div>
                    </div>
                    <div class="sb-sidenav-footer bg-primary">
                        <div class="small">Logged in as:</div>
                        <small>{{ Str::limit(auth()->user()->name, 20) }}</small>
                    </div>
                </nav>
            </div>
            {{-- Content --}}
            @yield('container')
            {{-- End Container --}}

            <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                        Are Sure Logout ?
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="/logout" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
    </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/js/scripts.js"></script>
    </body>
</html>
