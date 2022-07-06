<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Ubah data Mapel</li>
      </ol>
    </section>
	<br>
    <!-- Main content -->
    <section class="content">
    	<div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Mapel</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<?php echo form_open(site_url('dashboard/mapel_update_proses/'.$this->uri->segment(3)),array('class' => 'form-horizontal')); ?>
	              		
	              <div class="box-body text-left">
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">Nama Mata Pelajaran</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" name="nama_mapel" value="<?php if(isset($data->nama_mapel)) echo $data->nama_mapel; ?>" id="inputEmail3" placeholder="Nama Mata Pelajaran">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Jurusan</label>

	                  <div class="col-sm-9">
	                    <select name="id_jurusan" id="" class="form-control">
	                    	<option value="">PILIH JURUSAN MAPEL</option>
	                    	<?php foreach ($jurusan as $key => $tampil): ?>
	                    		<option value="<?php echo $tampil->id_jurusan ?>" <?php if($data->id_jurusan == $tampil->id_jurusan) echo 'selected'; ?>><?php echo $tampil->nama_jurusan ?></option>
	                    	<?php endforeach ?>
	                    </select>
	                  </div>
	                </div>
	             	<div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Tingkat Kelas</label>

	                  <div class="col-sm-9">
	                    <select name="tingkat" id="" class="form-control">
	                    	<option value="">PILIH TINGKATAN KELAS</option>
	                    	<option value="10" <?php if($data->tingkat == '10') echo 'selected'; ?>>kelas 10</option>
	                    	<option value="11" <?php if($data->tingkat == '11') echo 'selected'; ?>>kelas 11</option>
	                    	<option value="12" <?php if($data->tingkat == '12') echo 'selected'; ?>>kelas 12</option>
	                    </select>
	                  </div>
	                </div>
	              <!-- /.box-body -->
	              <div class="box-footer pull-right">
	              	<a href="<?php echo site_url('dashboard/mapel') ?>" class="btn btn-danger ">Batal</a>
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