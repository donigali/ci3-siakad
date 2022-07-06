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
	             	<table class="table table-bordered text-center" id="tabel_siswa" dataTables_filter="10">
    					<thead>
    						<tr>
                                <th width="2%">#</th>
                                <th width="5%">Ruang/Kelas</th>
                                <th width="6%">Tingkat</th>
                                <th width="6%">Mata Pelajaran</th>
                                <th width="6%">Aksi</th>
    						</tr>
    					</thead>
    					<tbody>
                            <?php $no=1; foreach($jadwal as $tampil): ?>
                                <tr>
                                    <th width="2%"><?php echo $no++; ?></th>
                                    <th width="2%"><?php echo $tampil->nama_kelas; ?></th>
                                    <th width="5%"><?php echo $tampil->kelas; ?></th>
                                    <th width="5%"><?php echo $tampil->nama_mapel.' - Kelas '.$tampil->tingkat; ?></th>
                                    <th width="6%"><a href="<?php echo site_url('guru/input_nilai/'.$tampil->id_kelas); ?>"><button class="btn btn-success btn-xs">Input Nilai</button></a>
                                    <a href="<?php echo site_url('guru/lihat_nilai/'.$tampil->id_kelas); ?>"><button class="btn btn-info btn-xs">Lihat Nilai</button></a></th>
                                </tr>
                            <?php endforeach ?>
    					</tbody>
    				</table>
            <!-- /.box-body -->
         </div>
		</div>
    </section>
</div>
