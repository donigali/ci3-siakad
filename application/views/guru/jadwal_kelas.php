<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard Guru</a></li>
        <li class="active"> Jadwal Kelas</li>
      </ol>
    </section>
	<br>
    <!-- Main content -->
    <section class="content">
    	<?php if ($this->session->flashdata('pesan')): ?>
	    	<div class="alert alert-success"><?php echo $this->session->flashdata('pesan') ?></div>
	    <?php endif ?>
    	<div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Jadwal Masuk kelas <?php if(isset($kelas)) echo $kelas; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	             	<table class="table table-bordered" id="tabel_siswa" dataTables_filter="10">
    					<thead>
    						<tr>
                  <th width="2%">Jam Ke-</th>
                  <th width="5%">Hari</th>
                  <th width="6%">Kelas/Ruang</th>
                  <th width="6%">Mata Pelajaran</th>
    						</tr>
    					</thead>
    					<tbody>
                  <?php foreach($jadwal as $tampil): ?>
                      <tr>
                          <th width="2%"><?php echo $tampil->jam_mulai; ?></th>
                          <th width="5%"><?php echo $tampil->nama_hari; ?></th>
                          <th width="6%"><?php echo $tampil->nama_kelas; ?></th>
                          <th width="6%"><?php echo $tampil->nama_mapel; ?></th>
                      </tr>
                  <?php endforeach ?>
    					</tbody>
    				</table>
            <!-- /.box-body -->
         </div>
		</div>
    </section>
</div>
