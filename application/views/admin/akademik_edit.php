<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tambah data Akademik</li>
      </ol>
    </section>
	<br>
    <!-- Main content -->
    <section class="content">
    	<div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Akademik</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<?php echo form_open('#',array('class' => 'form-horizontal')); ?>
	              		
	              <div class="box-body text-left">
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">Tahun Akademik</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="tahun_akademik" value="<?php if(isset($data->tahun_akademik)) echo $data->tahun_akademik; ?>" id="inputEmail3" placeholder="Tahun Akademik ex:2018-2019">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Status Akademik</label>
	                  <div class="col-sm-9">
	                    <select name="status_akademik" id="" class="form-control">
	                    	<option value="">PILIH STATUS AKADEMIK SEKOLAH</option>
	                    	<option value="AKTIF" <?php if($data->status_akademik == 'AKTIF') echo 'selected'; ?>>AKTIF</option>
	                    	<option value="NONAKTIF" <?php if($data->status_akademik == 'NONAKTIF') echo 'selected'; ?>>NONAKTIF</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">Kurikulum</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="kurikulum" value="<?php if(isset($data->kurikulum)) echo $data->kurikulum; ?>" id="inputEmail3" placeholder="Tahun Akademik ex:2018-2019">
	                  </div>
	                </div>
	             	
	              <!-- /.box-body -->
	             <div class="box-footer pull-right">
	              	<a href="<?php echo site_url('dashboard/akademik') ?>" class="btn btn-danger ">Batal</a>
	                <button type="submit" class="btn btn-info " disabled>Simpan</button>
	              </div>
	              <!-- /.box-footer -->
              	<?php echo form_close(); ?>
            </div>
             <div class="alert alert-info">
    		    UNTUK DEMO FITUR INI KAMI NONAKTIFKAN
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