<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit data Guru</li>
      </ol>
    </section>
	<br>
    <!-- Main content -->
    <section class="content">
    	<div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Guru</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<?php echo form_open(site_url('dashboard/guru_update_proses/'.$this->uri->segment(3)),array('class' => 'form-horizontal')); ?>
	              		
	              <div class="box-body text-left">
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">NIP</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="nip" value="<?php if(isset($data->nip)) echo $data->nip; ?>" id="inputEmail3" placeholder="NIP">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Nama Lengkap Guru</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="nama_guru" value="<?php if(isset($data->nama_guru)) echo $data->nama_guru; ?>" id="inputPassword3" placeholder="Nama Lengkap Guru">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Nomor HP</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="nomor_hp_guru" value="<?php if(isset($data->nomor_hp_guru)) echo $data->nomor_hp_guru; ?>" id="inputPassword3" placeholder="Nomor HP guru">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Jenis Kelamin</label>

	                  <div class="col-sm-4">
	                  	<input type="checkbox" value="laki-laki" class="jk flat-red" name="jenis_kelamin" <?php if($data->jenis_kelamin == 'laki-laki') echo 'checked'; ?>>
	                  	<label for="">Laki laki</label>
	                    
	                  </div>
	                  <div class="col-sm-4">
	                  	<input type="checkbox" value="perempuan" class="jk flat-red" name="jenis_kelamin" <?php if($data->jenis_kelamin == 'perempuan') echo 'checked'; ?>>
	                  	<label for="">Perempuan</label>
	                    
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Alamat guru</label>

	                  <div class="col-sm-9">
	                    <textarea name="alamat_guru" id="" cols="30" rows="3" class="form-control" placeholder="alamat guru"><?php if(isset($data->alamat_guru) == 'perempuan') echo $data->alamat_guru; ?></textarea>
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