<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo base_url('asset/'); ?>dist/img/avatar.jpeg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo 
              $this->session->userdata('username');
               ?></p>
    </div>
  </div>
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <?php if($this->session->userdata('level') == 'admin'){ ?>
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li>
      <a href="<?php echo site_url('dashboard'); ?>">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
    <li class="<?php if($this->uri->segment(2) == 'profil_sekolah' || $this->uri->segment(2) == 'akademik' || $this->uri->segment(2) == 'rombel') echo 'active'; ?> treeview">
      <a href="#">
        <i class="fa fa-navicon"></i> <span>Master Data</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
      <li class="<?php if($this->uri->segment(2) == 'profil_sekolah') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/profil_sekolah') ?>"><i class="fa fa-hand-o-right"></i> Profil Sekolah</a></li>
        <li class="<?php if($this->uri->segment(2) == 'akademik') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/akademik') ?>"><i class="fa fa-hand-o-right"></i> Tahun Akademik</a></li>
        <li class="<?php if($this->uri->segment(2) == 'rombel') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/rombel') ?>"><i class="fa fa-hand-o-right"></i> Buat Rombel Siswa Baru</a></li>
        <li class="<?php if($this->uri->segment(2) == 'daftar_ulang') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/daftar_ulang') ?>"><i class="fa fa-hand-o-right"></i> Pendaftaran Ulang</a></li>
        <li class="<?php if($this->uri->segment(2) == 'wali_kelas') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/wali_kelas') ?>"><i class="fa fa-hand-o-right"></i> Tambahkan Walikelas</a></li>
      </ul>
    </li>
    <li class="<?php if($this->uri->segment(2) == 'siswa' || $this->uri->segment(2) == 'siswa_add' || $this->uri->segment(2) == 'kelas_siswa') echo 'active'; ?> treeview">
      <a href="#">
        <i class="fa fa-users"></i> <span>Data siswa</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($this->uri->segment(2) == 'siswa') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/siswa') ?>"><i class="fa fa-hand-o-right"></i> Data Siswa</a></li>
        <li class="<?php if($this->uri->segment(2) == 'siswa_add') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/siswa_add') ?>"><i class="fa fa-hand-o-right"></i> Tambah Data Siswa</a></li>
      </ul>
    </li>
    <li class="<?php if($this->uri->segment(2) == 'guru' || $this->uri->segment(2) == 'guru_add') echo 'active'; ?> treeview">
      <a href="#">
        <i class="fa fa-newspaper-o"></i> <span>Data Guru</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($this->uri->segment(2) == 'guru') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/guru') ?>"><i class="fa fa-hand-o-right"></i> Data Guru</a></li>
        <li class="<?php if($this->uri->segment(2) == 'guru_add') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/guru_add') ?>"><i class="fa fa-hand-o-right"></i> Tambah Data Guru</a></li>
      </ul>
    </li>
    <li class="<?php if($this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'kelas_add') echo 'active'; ?> treeview">
      <a href="#">
        <i class="fa fa-book"></i> <span>Data Kelas</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($this->uri->segment(2) == 'kelas') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/kelas') ?>"><i class="fa fa-hand-o-right"></i> Data Kelas</a></li>
        <li class="<?php if($this->uri->segment(2) == 'kelas_add') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/kelas_add') ?>"><i class="fa fa-hand-o-right"></i> Tambah Data Kelas</a></li>
        
      </ul>
    </li>
    <li class="<?php if($this->uri->segment(2) == 'mapel' || $this->uri->segment(2) == 'mapel_add') echo 'active'; ?> treeview">
      <a href="#">
        <i class="fa fa-file-text-o"></i> <span>Mata Pelajaran</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($this->uri->segment(2) == 'mapel') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/mapel') ?>"><i class="fa fa-hand-o-right"></i> Data Mata Pelajaran</a></li>
        <li class="<?php if($this->uri->segment(2) == 'mapel_add') echo 'active'; ?>"><a href="<?php echo site_url('dashboard/mapel_add') ?>"><i class="fa fa-hand-o-right"></i> Input Mata Pelajaran</a></li>
      </ul>
    </li>
    <li>
      <a href="<?php echo site_url('dashboard/jadwal_add') ?>">
        <i class="fa fa-thumb-tack"></i> <span>Jadwal Pelajaran</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
    </li>
    <li class="header">OPTION</li>
    <li>
      <a href="<?php echo site_url('logout'); ?>">
        <i class="fa fa-sign-out"></i> <span>Keluar</span>
      </a>
    </li>
  </ul>
  <?php }else{ ?>
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU UNTUK GURU</li>
    <li>
      <a href="<?php echo site_url('guru'); ?>">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('guru/jadwal'); ?>">
        <i class="fa fa-dashboard"></i> <span>Jadwal Mengajar</span>
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('guru/nilai'); ?>">
        <i class="fa fa-dashboard"></i> <span>Input Nilai Siswa</span>
      </a>
    </li>
    <li class="header">MENU WALI KELAS</li>
    <li>
      <a href="<?php echo site_url('walikelas/lihat_nilai'); ?>">
        <i class="fa fa-folder-open"></i> <span>Lihat Nilai Siswa</span>
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('walikelas/cetak_raport'); ?>">
        <i class="fa fa-print"></i> <span>Cetak Raport Siswa</span>
      </a>
    </li>
    <li class="header">OPTION</li>
    <li>
      <a href="<?php echo site_url('guru/ganti_password'); ?>">
        <i class="fa fa-gears"></i> <span>Ubah Password</span>
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('logout'); ?>">
        <i class="fa fa-sign-out"></i> <span>Keluar</span>
      </a>
    </li>
  </ul>
  <?php } ?>
</section>
<!-- /.sidebar -->
</aside>
