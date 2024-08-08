<?php
    //Setting Awal
    $_sidebar_nama_apilkasi = 'Bengkel';
    $_sidebar_nama_pengguna = 'Dejoses';
 ?>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      
      <span class="brand-text font-weight-light"><?php echo $_sidebar_nama_apilkasi;?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $_sidebar_nama_pengguna;?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="kendaraan.php" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                Kendaraan
              </p>
              <li class="nav-item">
            <a href="konsumen.php" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                Konsumen
              </p>
              <li class="nav-item">
            <a href="servis.php" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                Servis
              </p>
              <li class="nav-item">
            <a href="spare_part.php" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                Spare Part
              </p>
              <li class="nav-item">
            <a href="transaksi.php" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                Transaksi
              </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>