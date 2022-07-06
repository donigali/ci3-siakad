<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"> Kenaikan Kelas</li>
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
              <h3 class="box-title">Kenaikan Kelas</h3>

              <div class="box-tools pull-right">
                <div class="form-group">
	                  <div class="col-sm-12">
	                    <select name="tingkat" id="tingkat" class="form-control">
	                    	<option value="">FILTER SISWA BERDASARKAN JENJANG</option>
	                    	<option value="10">kelas 10</option>
	                    	<option value="11">kelas 11</option>
	                    	<option value="12">kelas 12</option>
	                    </select>
	                  </div>
	                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<?php echo form_open(site_url('dashboard/rombel_add'),array('class' => 'form-horizontal')); ?>
            	<input type="hidden" name="uri" value="<?php echo $this->uri->segment(2); ?>">
	              	<div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">Tahun Ajaran</label>

	                  <div class="col-sm-9">
	                  	<input type="hidden" class="form-control" name="id_akademik" value="<?php if(isset($status->id_akademik)) echo $status->id_akademik; ?>" id="inputEmail3" placeholder="NIS">
	                    <input type="text" class="form-control" value="<?php if(isset($status->tahun_akademik)) echo $status->tahun_akademik; ?>" id="inputEmail3" placeholder="tahun_akademik" readonly>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Pilih Kelas</label>

	                  <div class="col-sm-9">
	                    <select name="id_kelas" id="" class="form-control">
	                    	<option value="">PILIH KELAS</option>
	                    	<?php foreach ($kelas as $a): ?>
	                    		<option value="<?php echo $a->id_kelas; ?>"><?php echo $a->nama_kelas; ?></option>
	                    	<?php endforeach ?>
	                    	
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Jenjang/Tingkat Kelas Baru</label>

	                  <div class="col-sm-9">
	                    <select name="tingkat" id="" class="form-control">
	                    	<option value="">PILIH TINGKATAN KELAS</option>
	                    	<option value="10">kelas 10</option>
	                    	<option value="11">kelas 11</option>
	                    	<option value="12">kelas 12</option>
	                    </select>
	                  </div>
	                </div>
	             	
					<h3 class="text-center">Pilih Siswa</h3>
					
	             	<table class="table table-bordered" id="tabel_siswa" dataTables_filter="10">
    					<thead>
    						<tr>
                  				<th>#</th>
    							<th>NIS</th>
    							<th>Nama siswa</th>
    							<th>Jenis Kelamin</th>
    							<th>Nomor Hp</th>
    							<th>Jenjang/Tingkat</th>
    						</tr>
    					</thead>
    					<tbody>
    						
    					</tbody>
    				</table>
	              <!-- /.box-body -->
	              <div class="box-footer pull-right">
	              	<a href="<?php echo site_url('dashboard/siswa') ?>" class="btn btn-danger ">Batal</a>
	                <button type="submit" class="btn btn-info ">Simpan</button>
	              </div>
	              <!-- /.box-footer -->
              	<?php echo form_close(); ?>

            <!-- /.box-body -->
         </div>
		</div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://raw.githubusercontent.com/ErikKalkoken/filterDropDown/master/js/filterDropDown.min.js"></script>
<script type="text/javascript">
   $(document).ready(function () {

       var oTable = $("#tabel_siswa").dataTable({
           "bProcessing": false,
           "bServerSide": false,
           "fnFilter"   : 10,
           "sAjaxSource": "<?php echo site_url('dashboard/kenaikan_kelas_form/'); ?>",
           "rowCallback": function( row, data ) {
		       $(row).find('td:eq(0)').html('<input type="checkbox" class="rombel_add" name="id_siswa_kelas[]" value="'+data.id_siswa_kelas+'">');
		    },
           "columns": [
               { "data": "pilih",orderable:false,searchable:false},
               { "data": "nis" },
               { "data": "nama_lengkap_siswa" },
               { "data": "jenis_kelamin_siswa" },
               { "data": "nomor_hp_siswa" },
               { "data": "tingkat" }
           ],
           "bJQueryUI": true,
           "sPaginationType": "full_numbers",
           "iDisplayStart ": 20,
           'fnServerData': function(sSource, aoData, fnCallback){
            aoData.push( { "name": "<?php echo $this->security->get_csrf_token_name() ?>", "value": "<?php echo $this->security->get_csrf_hash() ?>" } );
            $.ajax({
                'dataType': 'json',
                'type': 'POST',
                'url': sSource,
                'data': aoData,
                'success': fnCallback
            });
        },

           "order": [
               [2, "asc"]
           ]
       });
      $('#tingkat').on('change',function(){
            oTable.fnFilter( $(this).val() );
    });
   });

   
</script>
<script>
 var indexOfMyCol = 5;//you want it on the third column
$("#tingkat").each( function ( i ) {
    if(i === indexOfMyCol){ 
      this.innerHTML = fnCreateSelect( oTable.fnGetColumnData(i) );
      $('select', this).change( function () {
        oTable.fnFilter( $(this).val(), i );
      } );
    }
} ); 
</script>