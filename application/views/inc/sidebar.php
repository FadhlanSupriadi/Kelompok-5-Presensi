<section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/dist/img/indocement.gif" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $nama; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li>
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-home"></i> <span>Dashboard</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>divisi">
                <i class="fa fa-tag"></i> <span>Divisi</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>karyawan">
                <i class="fa fa-photo"></i> <span>Karyawan</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>presensi">
                <i class="fa fa-print"></i> <span>Presensi</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>login/logout">
                <i class="fa fa-sign-out"></i> <span>Keluar</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            
            <li class="header">Ini merupakan halaman admin pengelola kryawan dan absen</li>
            <!-- <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li> -->
          </ul>
        </section>