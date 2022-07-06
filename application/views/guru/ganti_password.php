<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Ganti Password Guru</li>
      </ol>
    </section>
	<br>
    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata('pesan')): ?>
	    	<div class="alert alert-success"><?php echo $this->session->flashdata('pesan') ?></div>
	    <?php endif ?>
        <?php if ($this->session->flashdata('pesan_error')): ?>
	    	<div class="alert alert-danger"><?php echo $this->session->flashdata('pesan_error') ?></div>
	    <?php endif ?>
    	<div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Ganti Password Guru</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<?php echo form_open(site_url('guru/ganti_password_proses'),array('class' => 'form-horizontal')); ?>
	              		
	              <div class="box-body text-left">
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">Password Lama</label>

	                  <div class="col-sm-9">
	                    <input type="password" class="form-control" name="password_lama" value="" id="inputEmail3" placeholder="Password Lama">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">Password Baru</label>

	                  <div class="col-sm-9">
	                    <input type="password" class="form-control" name="password_baru" value="" id="inputEmail3" placeholder="Password Baru">
	                  </div>
	                </div>
	              <!-- /.box-body -->
	              <div class="box-footer pull-right">
	              	<a href="<?php echo site_url('guru') ?>" class="btn btn-danger ">Batal</a>
	                <button type="submit" class="btn btn-info ">Simpan Perubahan</button>
	              </div>
	              <!-- /.box-footer -->
              	<?php echo form_close(); ?>
            </div>
           <!--  <div class="alert alert-info">
				untuk demo fitur ini di nonaktifkan
			</div> -->
            <!-- /.box-body -->
         </div>
		
    </section>
</div>
