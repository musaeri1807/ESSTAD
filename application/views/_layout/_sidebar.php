    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-info elevation-4">
      <!-- Brand Logo -->
      <!-- <a href="<?= base_url('homepage'); ?>" class="brand-link">
        <img src="<?= base_url(); ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PT CSI Indonesia</span>
      </a> -->

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url(); ?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $this->session->userdata('email'); ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <!-- <li class="nav-item ">
              <a href="<?= base_url('homepage') ?>" class="nav-link <?= ($this->uri->segment('1') == 'homepage') ? 'active' : '' ?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Home Page
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li> -->

            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Forms
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../forms/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>General Elements</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Advanced Elements</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../forms/editors.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Editors</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../forms/validation.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Validation</p>
                  </a>
                </li>
              </ul>
            </li> -->

            <li class="nav-header"><?= $this->uri->segment('1'); ?>/<?= $this->uri->segment('1'); ?></li>
            <li class="nav-item <?= ($this->uri->segment('1') == 'Organization') ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= ($this->uri->segment('1') == 'Organization') ? 'active' : '' ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Organization
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('Organization/Department')  ?>" class="nav-link <?= ($this->uri->segment('2') == 'Department') ? 'active' : '' ?>">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Department</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('Organization/Designation')  ?>" class="nav-link <?= ($this->uri->segment('2') == 'Designation') ? 'active' : '' ?> ">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Designation</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- <li class="nav-item <?= ($this->uri->segment('1') == 'employees') ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= ($this->uri->segment('1') == 'employees') ? 'active' : '' ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Employees
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('employees/employee')  ?>" class="nav-link <?= ($this->uri->segment('2') == 'employee') ? 'active' : '' ?>">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">My Employees</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('employees/disciplinary')  ?>" class="nav-link <?= ($this->uri->segment('2') == 'disciplinary') ? 'active' : '' ?> ">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Disciplinary</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('employees/inactiveemployees')  ?>" class="nav-link <?= ($this->uri->segment('2') == 'inactiveemployees') ? 'active' : '' ?>">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Inactive Employees</p>
                  </a>
                </li>
              </ul>
            </li> -->
            <!-- <li class="nav-item <?= ($this->uri->segment('1') == 'attendance') ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= ($this->uri->segment('1') == 'attendance') ? 'active' : '' ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Attendance
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('attendance/attendanceList')  ?>" class="nav-link <?= ($this->uri->segment('2') == 'attendanceList') ? 'active' : '' ?>">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Attendance List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('attendance/overtime')  ?>" class="nav-link <?= ($this->uri->segment('2') == 'overtime') ? 'active' : '' ?> ">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Overtime</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('attendance/report')  ?>" class="nav-link <?= ($this->uri->segment('2') == 'report') ? 'active' : '' ?>">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Attendance Report</p>
                  </a>
                </li>
              </ul>
            </li> -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>