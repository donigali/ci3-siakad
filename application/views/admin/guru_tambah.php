<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tambah data Guru</li>
      </ol>
    </section>
	<br>
    <!-- Main content -->
    <section class="content">
    	<div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Guru</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<?php echo form_open(site_url('dashboard/guru_add_proses'),array('class' => 'form-horizontal')); ?>
	              		
	              <div class="box-body text-left">
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">NIP</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="nip" value="" id="inputEmail3" placeholder="NIP">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Nama Lengkap Guru</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="nama_guru" value=""  id="inputPassword3" placeholder="Nama Lengkap Guru">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Nomor HP</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="nomor_hp_guru" value=""  id="inputPassword3" placeholder="Nomor HP guru">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Jenis Kelamin</label>

	                  <div class="col-sm-9">
	                    <select name="jenis_kelamin" id="" class="form-control">
	                    	<option value="">PILIH JENIS KELAMIN</option>
	                    	<option value="Laki-Laki">Laki-Laki</option>
	                    	<option value="Perempuan">Perempuan</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Alamat guru</label>

	                  <div class="col-sm-9">
	                    <textarea name="alamat_guru" id="" cols="30" rows="3" class="form-control" placeholder="alamat guru"></textarea>
	                  </div>
	                </div>
	              <!-- /.box-body -->
	             <div class="box-footer pull-right">
	              	<a href="<?php echo site_url('dashboard/guru') ?>" class="btn btn-danger ">Batal</a>
	                <button type="submit" class="btn btn-info ">Simpan</button>
	              </div>
	              <!-- /.box-footer -->
              	<?php echo form_close(); ?>
            </div>
            <div class="alert alert-info">
				Secara Default Login Guru adalah dengan
				<b>username = nip guru</b> dan
				<b>password = '123456'</b>
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