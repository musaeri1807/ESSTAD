<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/dashboard/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/dashboard/assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
        <!-- Sidenav Toggle Button-->
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
        <!-- Navbar Brand-->
        <!-- * * Tip * * You can use text or an image for your navbar brand.-->
        <!-- * * * * * * When using an image, we recommend the SVG format.-->
        <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
        <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="#">SB Admin Pro</a>
        <!-- Navbar Search Input-->
        <!-- * * Note: * * Visible only on and above the lg breakpoint-->

        <!-- Navbar Items-->
        <ul class="navbar-nav align-items-center ms-auto">
            <!-- Documentation Dropdown-->
            <li class="nav-item dropdown no-caret d-none d-md-block me-3">
                <!-- <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="fw-500">Documentation</div>
                    <i class="fas fa-chevron-right dropdown-arrow"></i>
                </a> -->
                <!-- <div class="dropdown-menu dropdown-menu-end py-0 me-sm-n15 me-lg-0 o-hidden animated--fade-in-up" aria-labelledby="navbarDropdownDocs">
                    <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro" target="_blank">
                        <div class="icon-stack bg-primary-soft text-primary me-4"><i data-feather="book"></i></div>
                        <div>
                            <div class="small text-gray-500">Documentation</div>
                            Usage instructions and reference
                        </div>
                    </a>
                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro/components" target="_blank">
                        <div class="icon-stack bg-primary-soft text-primary me-4"><i data-feather="code"></i></div>
                        <div>
                            <div class="small text-gray-500">Components</div>
                            Code snippets and reference
                        </div>
                    </a>
                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro/changelog" target="_blank">
                        <div class="icon-stack bg-primary-soft text-primary me-4"><i data-feather="file-text"></i></div>
                        <div>
                            <div class="small text-gray-500">Changelog</div>
                            Updates and changes
                        </div>
                    </a>
                </div> -->
            </li>
            <!-- Navbar Search Dropdown-->
            <!-- * * Note: * * Visible only below the lg breakpoint-->
            <li class="nav-item dropdown no-caret me-3 d-lg-none">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search"></i></a>
                <!-- Dropdown - Search-->
                <div class="dropdown-menu dropdown-menu-end p-3 shadow animated--fade-in-up" aria-labelledby="searchDropdown">
                    <form class="form-inline me-auto w-100">
                        <div class="input-group input-group-joined input-group-solid">
                            <input class="form-control pe-0" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                            <div class="input-group-text"><i data-feather="search"></i></div>
                        </div>
                    </form>
                </div>
            </li>
            <!-- Alerts Dropdown-->

            <!-- Messages Dropdown-->

            <!-- User Dropdown-->
            <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="assets/img/illustrations/profiles/profile-1.png" /></a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="<?= base_url() ?>assets/dashboard/assets/img/illustrations/profiles/profile-1.png" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">Valerie Luna</div>
                            <div class="dropdown-user-details-email">vluna@aol.com</div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#!">
                        <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                        Account
                    </a>
                    <a class="dropdown-item" href="#!">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <!-- Sidenav Menu Heading (Account)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <div class="sidenav-menu-heading d-sm-none">Account</div>
                        <!-- Sidenav Link (Alerts)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <a class="nav-link d-sm-none" href="#!">
                            <div class="nav-link-icon"><i data-feather="bell"></i></div>
                            Alerts
                            <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                        </a>
                        <!-- Sidenav Link (Messages)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <a class="nav-link d-sm-none" href="#!">
                            <div class="nav-link-icon"><i data-feather="mail"></i></div>
                            Messages
                            <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                        </a>
                        <!-- Sidenav Menu Heading (Core)-->
                        <div class="sidenav-menu-heading">Core</div>
                        <!-- Sidenav Accordion (Dashboard)-->
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Dashboards
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                <a class="nav-link" href="dashboard-1.html">
                                    Default
                                    <span class="badge bg-primary-soft text-primary ms-auto">Updated</span>
                                </a>
                                <a class="nav-link" href="dashboard-2.html">Multipurpose</a>
                                <a class="nav-link" href="dashboard-3.html">Affiliate</a>
                            </nav>
                        </div>
                        <!-- Sidenav Heading (Custom)-->
                        <div class="sidenav-menu-heading">Custom</div>
                        <!-- Sidenav Accordion (Pages)-->
                        <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="nav-link-icon"><i data-feather="grid"></i></div>
                            Pages
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> -->
                       
                        <!-- Sidenav Accordion (Applications)-->
                        <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseApps" aria-expanded="false" aria-controls="collapseApps">
                            <div class="nav-link-icon"><i data-feather="globe"></i></div>
                            Applications
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> -->
                        
                        <!-- Sidenav Accordion (Flows)-->
                        <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseFlows" aria-expanded="false" aria-controls="collapseFlows">
                            <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                            Flows
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> -->
                        <!-- <div class="collapse" id="collapseFlows" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="multi-tenant-select.html">Multi-Tenant Registration</a>
                                <a class="nav-link" href="wizard.html">Wizard</a>
                            </nav>
                        </div> -->
                        <!-- Sidenav Heading (UI Toolkit)-->
                        <!-- <div class="sidenav-menu-heading">UI Toolkit</div> -->
                        <!-- Sidenav Accordion (Layout)-->
                        <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="nav-link-icon"><i data-feather="layout"></i></div>
                            Layout
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> -->
                        <!-- <div class="collapse" id="collapseLayouts" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout"> -->
                                <!-- Nested Sidenav Accordion (Layout -> Navigation)-->
                                <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayoutSidenavVariations" aria-expanded="false" aria-controls="collapseLayoutSidenavVariations">
                                    Navigation
                                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayoutSidenavVariations" data-bs-parent="#accordionSidenavLayout">
                                    <nav class="sidenav-menu-nested nav">
                                        <a class="nav-link" href="layout-static.html">Static Sidenav</a>
                                        <a class="nav-link" href="layout-dark.html">Dark Sidenav</a>
                                        <a class="nav-link" href="layout-rtl.html">RTL Layout</a>
                                    </nav>
                                </div> -->
                                <!-- Nested Sidenav Accordion (Layout -> Container Options)-->
                                <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayoutContainers" aria-expanded="false" aria-controls="collapseLayoutContainers">
                                    Container Options
                                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayoutContainers" data-bs-parent="#accordionSidenavLayout">
                                    <nav class="sidenav-menu-nested nav">
                                        <a class="nav-link" href="layout-boxed.html">Boxed Layout</a>
                                        <a class="nav-link" href="layout-fluid.html">Fluid Layout</a>
                                    </nav>
                                </div> -->
                                <!-- Nested Sidenav Accordion (Layout -> Page Headers)-->
                                <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsPageHeaders" aria-expanded="false" aria-controls="collapseLayoutsPageHeaders">
                                    Page Headers
                                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayoutsPageHeaders" data-bs-parent="#accordionSidenavLayout">
                                    <nav class="sidenav-menu-nested nav">
                                        <a class="nav-link" href="header-simplified.html">Simplified</a>
                                        <a class="nav-link" href="header-compact.html">Compact</a>
                                        <a class="nav-link" href="header-overlap.html">Content Overlap</a>
                                        <a class="nav-link" href="header-breadcrumbs.html">Breadcrumbs</a>
                                        <a class="nav-link" href="header-light.html">Light</a>
                                    </nav>
                                </div> -->
                                <!-- Nested Sidenav Accordion (Layout -> Starter Layouts)-->
                                <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsStarterTemplates" aria-expanded="false" aria-controls="collapseLayoutsStarterTemplates">
                                    Starter Layouts
                                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayoutsStarterTemplates" data-bs-parent="#accordionSidenavLayout">
                                    <nav class="sidenav-menu-nested nav">
                                        <a class="nav-link" href="starter-default.html">Default</a>
                                        <a class="nav-link" href="starter-minimal.html">Minimal</a>
                                    </nav>
                                </div>
                            </nav>
                        </div> -->
                        <!-- Sidenav Accordion (Components)-->
                        <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseComponents" aria-expanded="false" aria-controls="collapseComponents">
                            <div class="nav-link-icon"><i data-feather="package"></i></div>
                            Components
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseComponents" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="alerts.html">Alerts</a>
                                <a class="nav-link" href="avatars.html">Avatars</a>
                                <a class="nav-link" href="badges.html">Badges</a>
                                <a class="nav-link" href="buttons.html">Buttons</a>
                                <a class="nav-link" href="cards.html">
                                    Cards
                                    <span class="badge bg-primary-soft text-primary ms-auto">Updated</span>
                                </a>
                                <a class="nav-link" href="dropdowns.html">Dropdowns</a>
                                <a class="nav-link" href="forms.html">
                                    Forms
                                    <span class="badge bg-primary-soft text-primary ms-auto">Updated</span>
                                </a>
                                <a class="nav-link" href="modals.html">Modals</a>
                                <a class="nav-link" href="navigation.html">Navigation</a>
                                <a class="nav-link" href="progress.html">Progress</a>
                                <a class="nav-link" href="step.html">Step</a>
                                <a class="nav-link" href="timeline.html">Timeline</a>
                                <a class="nav-link" href="toasts.html">Toasts</a>
                                <a class="nav-link" href="tooltips.html">Tooltips</a>
                            </nav>
                        </div> -->
                        <!-- Sidenav Accordion (Utilities)-->
                        <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                            <div class="nav-link-icon"><i data-feather="tool"></i></div>
                            Utilities
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseUtilities" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="animations.html">Animations</a>
                                <a class="nav-link" href="background.html">Background</a>
                                <a class="nav-link" href="borders.html">Borders</a>
                                <a class="nav-link" href="lift.html">Lift</a>
                                <a class="nav-link" href="shadows.html">Shadows</a>
                                <a class="nav-link" href="typography.html">Typography</a>
                            </nav>
                        </div> -->
                        <!-- Sidenav Heading (Addons)-->
                        <!-- <div class="sidenav-menu-heading">Plugins</div> -->

                        <!-- <a class="nav-link" href="charts.html">
                            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                            Charts
                        </a>

                        <a class="nav-link" href="tables.html">
                            <div class="nav-link-icon"><i data-feather="filter"></i></div>
                            Tables
                        </a> -->
                    </div>
                </div>
                <!-- Sidenav Footer-->
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Logged in as:</div>
                        <div class="sidenav-footer-title">Valerie Luna</div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                    <div class="container-xl px-4">
                        <div class="page-header-content pt-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mt-4">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="activity"></i></div>
                                        Dashboard
                                    </h1>
                                    <div class="page-header-subtitle">Dashboard overview and content summary</div>
                                </div>
                                <div class="col-12 col-xl-auto mt-4">
                                    <form method="get" action="<?= base_url('dashboard') ?>">
                                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                                            <select class="form-control" name="id_branch" id="id_branch" onchange="this.form.submit()">
                                                <option value="semua">-- Semua Cabang --</option>
                                                <?php foreach ($bsp as $cabang): ?>
                                                    <option value="<?= $cabang->ID ?>"
                                                        <?= isset($_GET['id_branch']) && $_GET['id_branch'] == $cabang->ID ? 'selected' : '' ?>>
                                                        <?= $cabang->CABANG ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>

                                            <!-- <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                                        <input class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range..." /> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container-xl px-4 mt-n10">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-12 mb-4">
                            <div class="card h-100">
                                <div class="card-body h-100 p-5">
                                    <div class="row align-items-center">
                                        <div class="col-xl-8 col-xxl-12">
                                            <div class="text-center text-xl-start text-xxl-center mb-4 mb-xl-0 mb-xxl-4">
                                                <h1 class="text-primary">Selamat Datang di IBANK WS</h1>
                                            </div>
                                        </div>
                                        <div class="card bg-primary border-0">
                                            <div class="card-body">
                                                <h5 class="text-white-50">Saldo Emas</h5>
                                                <div class="mb-4">
                                                    <span class="display-4 text-white"><?= number_format($total_emas->total_emas, 2) ?></span>
                                                    <span class="text-white-50">gram</span>
                                                </div>
                                                <!-- <div class="progress bg-white-25 rounded-pill" style="height: 0.5rem">
                                                    <div class="progress-bar bg-white w-75 rounded-pill" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-6 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-header">
                                    Operasional fee <?= date('Y'); ?>
                                    <div class="dropdown no-caret">
                                        <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownMenuButton">
                                            <h6 class="dropdown-header">Filter Activity:</h6>
                                            <a class="dropdown-item" href="#!"><span class="badge bg-green-soft text-green my-1">Commerce</span></a>
                                            <a class="dropdown-item" href="#!"><span class="badge bg-blue-soft text-blue my-1">Reporting</span></a>
                                            <a class="dropdown-item" href="#!"><span class="badge bg-yellow-soft text-yellow my-1">Server</span></a>
                                            <a class="dropdown-item" href="#!"><span class="badge bg-purple-soft text-purple my-1">Users</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="timeline timeline-xs">

                                        <?php foreach ($grafik as $row): ?>
                                            <!-- Timeline Item -->
                                            <div class="timeline-item">
                                                <div class="timeline-item-marker">
                                                    <!-- Tampilkan nama bulan -->
                                                    <div class="timeline-item-marker-text"><?= $row->bulan; ?></div>
                                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                                </div>
                                                <div class="timeline-item-content">
                                                    Rp <?= number_format($row->total, 0, ',', '.'); ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <!-- Timeline Item 7-->
                                        <!-- <div class="timeline-item">
                                            <div class="timeline-item-marker">
                                                <div class="timeline-item-marker-text">2 daysdd</div>
                                                <div class="timeline-item-marker-indicator bg-green"></div>
                                            </div>
                                            <div class="timeline-item-content">
                                                New order placed!
                                                <a class="fw-bold text-dark" href="#!">Order #2910</a>
                                                has been successfully placed.
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-6 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-header">
                                    Sampah Terkelolah
                                    <div class="dropdown no-caret">
                                        <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#!">
                                                <div class="dropdown-item-icon"><i class="text-gray-500" data-feather="list"></i></div>
                                                Manage Tasks
                                            </a>
                                            <a class="dropdown-item" href="#!">
                                                <div class="dropdown-item-icon"><i class="text-gray-500" data-feather="plus-circle"></i></div>
                                                Add New Task
                                            </a>
                                            <a class="dropdown-item" href="#!">
                                                <div class="dropdown-item-icon"><i class="text-gray-500" data-feather="minus-circle"></i></div>
                                                Delete Tasks
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="small">
                                        Server Migration
                                        <span class="float-end fw-bold">20%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small">
                                        Sales Tracking
                                        <span class="float-end fw-bold">40%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small">
                                        Customer Database
                                        <span class="float-end fw-bold">60%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small">
                                        Payout Details
                                        <span class="float-end fw-bold">80%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small">
                                        Account Setup
                                        <span class="float-end fw-bold">Complete!</span>
                                    </h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="card-footer position-relative">
                                    <div class="d-flex align-items-center justify-content-between small text-body">
                                        <a class="stretched-link text-body" href="#!">Visit Task Center</a>
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Example Colored Cards for Dashboard Demo-->
                    <div class="row">
                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Earnings (Monthly)</div>
                                            <div class="text-lg fw-bold">$40,000</div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="calendar"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="#!">View Report</a>
                                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-warning text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Earnings (Annual)</div>
                                            <div class="text-lg fw-bold">$215,000</div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="#!">View Report</a>
                                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Task Completion</div>
                                            <div class="text-lg fw-bold">24</div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="check-square"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="#!">View Tasks</a>
                                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-danger text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Pending Requests</div>
                                            <div class="text-lg fw-bold">17</div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="message-circle"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="#!">View Requests</a>
                                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Example Charts for Dashboard Demo-->

                    <div class="row">
                        <div class="col-xl-6 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-header">
                                    Monthly Revenue
                                    <div class="dropdown no-caret">
                                        <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="areaChartDropdownExample" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="areaChartDropdownExample">
                                            <a class="dropdown-item" href="#!">Last 12 Months</a>
                                            <a class="dropdown-item" href="#!">Last 30 Days</a>
                                            <a class="dropdown-item" href="#!">Last 7 Days</a>
                                            <a class="dropdown-item" href="#!">This Month</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#!">Custom Range</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-header">
                                    Earnings Breakdown
                                    <div class="dropdown no-caret">
                                        <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="areaChartDropdownExample" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="areaChartDropdownExample">
                                            <a class="dropdown-item" href="#!">Last 12 Months</a>
                                            <a class="dropdown-item" href="#!">Last 30 Days</a>
                                            <a class="dropdown-item" href="#!">Last 7 Days</a>
                                            <a class="dropdown-item" href="#!">This Month</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#!">Custom Range</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Example DataTable for Dashboard Demo-->
                    <div class="card mb-4">
                        <div class="card-header">Saldo Nasabah</div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Rekening</th>
                                        <th>Nama</th>
                                        <th>Id Akun</th>
                                        <th>Cabang BSP</th>
                                        <th>Saldo</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($saldo as $row): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->field_rekening ?></td>
                                            <td><?= $row->field_nama ?></td>
                                            <td><?= $row->field_member_id ?></td>
                                            <td><?= $row->field_branch_name ?></td>
                                            <td><?= number_format($row->TotalSaldo, 6) ?> gram</td>
                                            <td>
                                                <div class="badge bg-primary text-white rounded-pill">Full-time</div>
                                            </td>
                                            <td>
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa-regular fa-trash-can"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/dashboard/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/dashboard/assets/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/dashboard/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/dashboard/js/datatables/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/dashboard/js/litepicker.js"></script>



    <!-- Load Chart.js CDN -->

    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode(array_column($grafik, 'bulan')) ?>,
                datasets: [{
                    label: 'Total Emas Bulanan',
                    data: <?= json_encode(array_map('floatval', array_column($grafik, 'total'))) ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.8)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    </script>



</body>

</html>