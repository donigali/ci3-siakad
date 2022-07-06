<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard Guru</a></li>
        <li class="active"> input nilai</li>
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
              <h3 class="box-title">Input Nilai siswa kelas - <?php if(isset($kelas)) echo $kelas; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <?php echo form_open(site_url('guru/input_nilai_proses/'.$this->uri->segment(3)
            )); ?>
                <div class="row">
                    <input type="hidden" name="id_akademik" value="<?php if(isset($akademik->id_akademik)) echo $akademik->id_akademik; ?>" class="form-control" >
                    <div class="col-md-6">
                        <label for="akademik">Pilih Semester</label>
                        <select name="id_semester" class="form-control" id="">
                            <option value="">Pilih Semester</option>
                           <?php foreach ($semester as $a) { ?>
                                <option value="<?php echo $a->id_semester ?>" <?php echo  set_select('id_semester', $a->id_semester); ?>><?php echo $a->kode_semester ?></option>
                           <?php } ?>
                        </select>
                        <span class="text-danger"><?php echo form_error('id_semester', '<div class="error">', '</div>'); ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="akademik">Pilih Mapel</label>
                        <select name="id_mapel" class="form-control" id="">
                            <option value="">Pilih Mapel</option>
                            <?php foreach ($mapel as $a) { ?>
                                <option value="<?php echo $a->id_mapel ?>" <?php echo  set_select('id_mapel', $a->id_mapel); ?>><?php echo $a->nama_mapel ?></option>
                            <?php } ?>
                        </select>
                        <span class="text-danger"><?php echo form_error('id_mapel', '<div class="error">', '</div>'); ?></span>
                    </div>
                </div>
                <br>
               
	             	<table class="table table-bordered text-center" id="tabel_siswa" dataTables_filter="10">
    					<thead>
                            <tr>
                                <th width="2%" rowspan="2" style="vertical-align:middle;">#</th>
                                <th width="10%" rowspan="2" style="vertical-align:middle;">Nama Siswa</th>
                                <th colspan="2">Nilai Rata-Rata</th>
                                <th width="4%" rowspan="2" style="vertical-align:middle;">Nilai UTS</th>
                                <th width="4%" rowspan="2" style="vertical-align:middle;">Nilai UAS</th>
                                <th width="4%" rowspan="2" style="vertical-align:middle;">Nilai Akhir</th>
                                <th width="4%" rowspan="2" style="vertical-align:middle;">Predikat</th>
                                <th width="4%" rowspan="2" style="vertical-align:middle;">Keterangan</th>
                            </tr>
                            <tr>
                                <td width="2%">UH<br></td>
                                <td width="2%">TUGAS</td>
                            </tr>
    					</thead>
    					<tbody>
                        <?php $no=1; foreach($siswa as $data): ?>
                       
                        <tr>
                            <th width="2%">#</th>
                            <th width="10%" class="text-left"><input type="hidden" class="form-control" name="id_siswa[]" value="<?php echo $data->id_siswa; ?>" id="siswa"><?php echo $data->nama_lengkap_siswa; ?></th>
                            <th width="4%"><input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="nilai_uh[]" value ="<?php echo set_value('nilai_uh[]'); ?>" data-id="<?php echo $data->id_siswa; ?>" id="uh<?php echo $data->id_siswa; ?>"></th>
                            <th width="4%"><input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="nilai_tugas[]" value ="<?php echo set_value('nilai_tugas[]'); ?>" data-id="<?php echo $data->id_siswa; ?>" id="tugas<?php echo $data->id_siswa; ?>"></th>
                            <th width="4%"><input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="nilai_uts[]" value ="<?php echo set_value('nilai_uts[]'); ?>" data-id="<?php echo $data->id_siswa; ?>" id="uts<?php echo $data->id_siswa; ?>"></th>
                            <th width="4%"><input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="nilai_uas[]" value ="<?php echo set_value('nilai_uas[]'); ?>" data-id="<?php echo $data->id_siswa; ?>" id="uas<?php echo $data->id_siswa; ?>"></th>
                            <th width="4%"><input type="text" class="form-control" name="nilai_akhir[]" data-id="<?php echo $data->id_siswa; ?>" value ="<?php echo set_value('nilai_akhir[]'); ?>" id="total<?php echo $data->id_siswa; ?>" readonly></th>
                            <th width="4%"><input type="text" class="form-control" name="predikat[]" data-id="<?php echo $data->id_siswa; ?>" value ="<?php echo set_value('predikat[]'); ?>" id="predikat<?php echo $data->id_siswa; ?>" readonly></th>
                            <th width="5%"><input type="text" class="form-control" name="keterangan[]" data-id="<?php echo $data->id_siswa; ?>" value ="<?php echo set_value('keterangan[]'); ?>" id="keterangan<?php echo $data->id_siswa; ?>" readonly></th>
                        </tr>
                        <?php endforeach ?>
                        <?php echo form_error('nilai_uh[]', '<div class="error">', '</div>'); ?>
                        <?php echo form_error('nilai_tugas[]', '<div class="error">', '</div>'); ?>
                        <?php echo form_error('nilai_uts[]', '<div class="error">', '</div>'); ?>
                        <?php echo form_error('nilai_uas[]', '<div class="error">', '</div>'); ?>
                        <?php echo form_error('nilai_nilai_akhir[]', '<div class="error">', '</div>'); ?>
                        <?php echo form_error('predikat[]', '<div class="error">', '</div>'); ?>
                        <?php echo form_error('keterangan[]', '<div class="error">', '</div>'); ?>
    					</tbody>
    				</table>
                    <button class="btn btn-success">Input Nilai Siswa</button>
                <?php echo form_close(); ?>
            <!-- /.box-body -->
         </div>
		</div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
$(function() {
    <?php $no=1; foreach($siswa as $data): ?>
    $('#tabel_siswa').on('keyup','#uh<?php echo $data->id_siswa; ?>',function(){
        var no=$(this).data('id');
        updateTotal(no);
    });
    $('#tabel_siswa').on('keyup','#tugas<?php echo $data->id_siswa; ?>',function(){
        var no=$(this).data('id');
        updateTotal(no);
    });
    $('#tabel_siswa').on('keyup','#uts<?php echo $data->id_siswa; ?>',function(){
        var no=$(this).data('id');
        updateTotal(no);
    });
    $('#tabel_siswa').on('keyup','#uas<?php echo $data->id_siswa; ?>',function(){
        var no=$(this).data('id');
        updateTotal(no);
    });
    <?php endforeach ?>
        
        var updateTotal = function (no) {
            var input1 = parseInt($('#uh'+no).val());
            var input2 = parseInt($('#tugas'+no).val());
            var input3 = parseInt($('#uts'+no).val());
            var input4 = parseInt($('#uas'+no).val());

            var output_total = '';
            var subtotal = '';
            var total = '';

            if (isNaN(input1) || isNaN(input2) || isNaN(input3) || isNaN(input4)) {
                if(!input1){
                    $('#total'+no).val($('#uh'+no).val());
                }else if(!input2){
                        $('#total'+no).val($('#tugas'+no).val());
                }else if(!input3){
                        $('#total'+no).val($('#uts'+no).val());
                }else if(!input4){
                        $('#total'+no).val($('#uas'+no).val());
                }
                
            } else {    
                    subtotal = input1 + input2 + input3 + input4;
                    total = subtotal/4;
                    if (total <= 50) {
                        $('#keterangan'+no).val('Tidak Tuntas');
                        $('#predikat'+no).val('E');
                    } else if (total >= 50 && total <= 60) {
                        $('#keterangan'+no).val('Tidak Tuntas');
                        $('#predikat'+no).val('D');
                    } else if (total >= 60 && total <= 75) {
                        $('#keterangan'+no).val('Tidak Tuntas');
                        $('#predikat'+no).val('C');
                    } else if (total >= 75 && total <= 80) {
                        $('#keterangan'+no).val('Tuntas');
                        $('#predikat'+no).val('B');
                    }else if (total >= 80 && total <= 100) {
                        $('#keterangan'+no).val('Tuntas');
                        $('#predikat'+no).val('A');
                    } else if (total < 50) {
                        $('#keterangan'+no).val('Tidak Tuntas');
                        $('#predikat'+no).val('E');
                    }else{
                        $('#keterangan'+no).val('');
                        $('#predikat'+no).val('');
                    }
                    $('#total'+no).val(total);
            }
        };
});
</script>