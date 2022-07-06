<style>
.file-upload {
  background-color: #ffffff;
  width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Profil Sekolah</li>
      </ol>
    </section>
	<br>
    <!-- Main content -->
    <section class="content">
    	<div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Profil Sekolah</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<?php echo form_open_multipart(site_url('dashboard/profil_sekolah_input'),array('class' => 'form-horizontal')); ?>
	              <input type="hidden" name="id_sekolah" value="<?php if(isset($profil->id_sekolah)) echo $profil->id_sekolah; ?>">

               
                <div class="file-upload">
                <?php if(isset($profil->logo)){ ?>
                    <div class="image-upload-wrap" style="display:none;">
                        <input class="file-upload-input" type="file" name="logo" onchange="readURL(this);" accept="image/*" />
                        <div class="drag-text">
                        <h3>Masukkan logo sekolah</h3>
                        </div>
                    </div>
                    <input type="hidden" name="logo_update" class="file" value="<?php if(isset($profil->logo)) echo $profil->logo; ?>">
                    <div class="file-upload-content" style="display:block;">
                        <img class="file-upload-image" src="<?php echo base_url('image/'.$profil->logo); ?>" alt="your image" />
                        <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload()" class="remove-image">Hapus <span class="image-title">Ubah Gambar</span></button>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type="file" name="logo" onchange="readURL(this);" accept="image/*" />
                        <div class="drag-text">
                        <h3>Masukkan logo sekolah</h3>
                        </div>
                    </div>
                    
                    <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image" />
                        <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                        </div>
                    </div>
                <?php } ?>
                
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label  text-left">Nama Sekolah</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_sekolah" value="<?php if(isset($profil->nama_sekolah)) echo $profil->nama_sekolah; ?>" id="inputEmail3" placeholder="Nama Sekolah">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label  text-left">Nama Kepala Sekolah</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="kepala_sekolah" value="<?php if(isset($profil->kepala_sekolah)) echo $profil->kepala_sekolah; ?>" id="inputEmail3" placeholder="Nama Kepala Sekolah">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label  text-left">Alamat Kepala Sekolah</label>

                    <div class="col-sm-9">
                        <textarea name="alamat_sekolah" class="form-control" placeholder="Alamat Sekolah"><?php if(isset($profil->alamat_sekolah)) echo $profil->alamat_sekolah; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label  text-left"></label>

                    <div class="col-sm-9">
                    <?php if(empty($profil->id_sekolah)){ ?>
                       <button class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
                    <?php }else{ ?>
                        <button class="btn btn-primary" type="submit">Update</button>
                    <?php } ?>
                    </div>
                </div>

              	<?php echo form_close(); ?>
            </div>
            <!-- <div class="alert alert-info">
    		    UNTUK DEMO FITUR INI KAMI NONAKTIFKAN
			</div> -->
            <!-- /.box-body -->
         </div>
		
    </section>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
       <script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
      $('.file').val(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
});
      </script>