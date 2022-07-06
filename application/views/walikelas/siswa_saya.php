<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Nama-nama siswa di kelas saya</li>
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
              <h3 class="box-title">Nama-nama siswa di kelas saya</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered text-center" id="tabel_siswa">
                    <thead>
                        <tr>
                            <th width="2%" style="vertical-align:middle;">#</th>
                            <th width="10%" style="vertical-align:middle;">Nama Siswa</th>
                            <th width="4%" style="vertical-align:middle;">NIS/NISN</th>
                            <th width="4%" style="vertical-align:middle;">Ruang/Kelas</th>
                            <th width="4%" style="vertical-align:middle;">Tingkat</th>
                            <th width="4%" style="vertical-align:middle;">Aksi</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php 
                            if ($siswa) { ?>
                                <?php $no=1; foreach ($siswa->result() as $a) { ?>
                                    <tr>
                                        <td width="2%" style="vertical-align:middle;"><?php echo $no++; ?></td>
                                        <td width="10%" ><?php echo $a->nama_lengkap_siswa; ?></td>
                                        <td width="4%" ><?php echo $a->nis.'/'.$a->nisn; ?></td>
                                        <td width="4%" style="vertical-align:middle;"><?php echo $a->nama_kelas; ?></td>
                                        <td width="4%" style="vertical-align:middle;"><?php echo $a->jenjang; ?></td>
                                        <td width="4%" style="vertical-align:middle;"><a href="<?php echo site_url('walikelas/lihat_detail_nilai/'.$a->id_siswa) ?>"><button class="btn btn-primary btn-xs">Lihat Nilai Raport</button></a></td>
                                    </tr>
                                <?php } ?>
                            <?php }else{ ?>
                                <tr>
                                    <td colspan="6">TIDAK ADA DATA</td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
         </div>
		
    </section>
</div>
