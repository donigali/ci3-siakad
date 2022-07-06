<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tambah Data siswa</li>
      </ol>
    </section>
	<br>
    <!-- Main content -->
    <section class="content">
    	<div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data siswa</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<?php echo form_open(site_url('dashboard/siswa_add_proses/'),array('class' => 'form-horizontal')); ?>
	              <div class="box-body text-left">
	              	<div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">Tahun Ajaran</label>

	                  <div class="col-sm-9">
	                  	<input type="hidden" class="form-control" name="id_akademik" value="<?php if(isset($status->id_akademik)) echo $status->id_akademik; ?>" id="inputEmail3" placeholder="NIS">
	                    <input type="text" class="form-control" value="<?php if(isset($status->tahun_akademik)) echo $status->tahun_akademik; ?>" id="inputEmail3" placeholder="tahun_akademik" readonly>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">NIS</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="nis" id="inputEmail3" placeholder="NIS">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">NISN</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="nisn" id="inputPassword3" placeholder="NISN">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Nama Siswa</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="nama_lengkap_siswa" id="inputPassword3" placeholder="Nama Lengkap Siswa">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Tingkat Kelas</label>

	                  <div class="col-sm-9">
	                    <select name="tingkat" id="" class="form-control">
	                    	<option value="">PILIH TINGKATAN KELAS</option>
	                    	<option value="10">kelas 10</option>
	                    	<option value="11">kelas 11</option>
	                    	<option value="12">kelas 12</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Nomor HP</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="nomor_hp_siswa" id="inputPassword3" placeholder="Nomor HP siswa">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Jenis Kelamin</label>

	                  <div class="col-sm-9">
	                    <select name="jenis_kelamin_siswa" id="" class="form-control">
	                    	<option value="">PILIH Jenis Kelamin</option>
	                    	<option value="Laki-Laki">Laki-Laki</option>
	                    	<option value="Perempuan">Perempuan</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Alamat Siswa</label>

	                  <div class="col-sm-9">
	                    <textarea name="alamat_siswa" id="" cols="30" rows="3" class="form-control" placeholder="alamat siswa"></textarea>
	                  </div>
	                </div>
	             
	              <!-- /.box-body -->
	              <div class="box-footer pull-right">
	              	<a href="<?php echo site_url('dashboard/siswa') ?>" class="btn btn-danger ">Batal</a>
	                <button type="submit" class="btn btn-info ">Simpan</button>
	              </div>
	              <!-- /.box-footer -->
              	<?php echo form_close(); ?>
            </div>
            <!-- /.box-body -->
         </div>
		
    </section>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
       <script type="text/javascript">
         //Near checkboxes
            $('.jk').on('click', function() {
		        $('.jk').not(this).prop('checked', false);  
		    });
      </script>