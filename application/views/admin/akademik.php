<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Data Akademik</li>
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
              <h3 class="box-title">Data Akademik</h3>

              <div class="box-tools pull-right">
                 <a href="<?php echo site_url('dashboard/akademik_add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tahun Ajaran baru </a>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              	<table class="table table-bordered" id="tabel_akademik">
        					<thead>
        						<tr>
        							<th>Tahun Akademik</th>
        							<th>Status Akademik</th>
        							<th>Kurikulum</th>
        							<th>aksi</th>
        						</tr>
        					</thead>
        					<tbody>
        						
        					</tbody>
        				</table>
            </div>
            <!-- /.box-body -->
         </div>
		
    </section>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script type="text/javascript">
   $(document).ready(function () {
       var oTable = $("#tabel_akademik").dataTable({
           "bProcessing": false,
           "bServerSide": true,
           "sAjaxSource": "<?php echo site_url('dashboard/data_akademik'); ?>",
          //  "rowCallback": function( row, data ) {
		        // $(row).find('td:eq(1)').html("<button type='button' id='btn_nonaktif' data-id="+data.id_akademik+" class='btn btn-danger btn-xs'>"+data.status_akademik+"</button>");
		        // },
           "columns": [
               { "data": "tahun_akademik", "name": "tb_akademik.tahun_akademik" },
               { "data": "status_akademik", "name": "tb_akademik.status_akademik" },
               { "data": "kurikulum", "name": "tb_akademik.kurikulum" },
               { "data": "actions",orderable:false,searchable:false}
               
               
           ],
           "bJQueryUI": true,
           "sPaginationType": "full_numbers",
           "iDisplayStart ": 20,
           "fnServerData": function (sSource, aoData, fnCallback)
           {
           		aoData.push( { "name": "<?php echo $this->security->get_csrf_token_name(); ?>;", "value": "<?php echo $this->security->get_csrf_hash() ?>;" } );
               $.ajax
                       ({
                           "dataType": "json",
                           "type": "POST",
                           "url": sSource,
                           "data": aoData,
                           "success": fnCallback
                       });
           },
           "order": [
               [0, "desc"]
           ]
       });
        $('#tabel_akademik').on('click','.edit_record',function(){
            var id=$(this).data('id');
            document.location='<?php echo site_url('dashboard/akademik_update/') ?>'+id;
      	});
      	$('#tabel_akademik').on('click','.hapus_record',function(){
            var id=$(this).data('id');
            $('#modal_hapus').modal('show');
            $('.hapus').attr('href','<?php echo site_url('dashboard/akademik_delete/') ?>'+id);
      	});
      	// $('#tabel_akademik').on('click','#btn_aktif',function(){
       //      var id=$(this).data('id');
       //      alert(id);
      	// });
   });
</script>
		<div class="modal fade" id="modal_hapus">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Konfirmasi hapus data</h4>
					</div>
					<div class="modal-body">
						<p>Apakah anda yakin ingin menghapus data ini..?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
						<a type="button" class="btn btn-danger hapus">Ya, Hapus</a>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->