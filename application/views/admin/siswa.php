<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Data siswa</li>
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
              <h3 class="box-title">Data siswa</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              	<table class="table table-bordered" id="tabel_siswa">
        					<thead>
        						<tr>
                      <th>#</th>
        							<th>NIS</th>
        							<th>Nama siswa</th>
        							<th>Jenis Kelamin</th>
                      <th>Tingkat</th>
        							<th>Nomor Hp</th>
        							<th>Aksi</th>
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
       var oTable = $("#tabel_siswa").dataTable({
           "bProcessing": false,
           "bServerSide": true,
           "sAjaxSource": "<?php echo site_url('dashboard/data_siswa'); ?>",
           "fnRowCallback": function( nRow, aoData, iDisplayIndex ) {
               var index = iDisplayIndex +1;
               $('td:eq(0)',nRow).html(index);
               return nRow;
            },
           "columns": [
               { "data": "nomor", orderable:false,searchable:false },
               { "data": "nis", "name": "tb_siswa.nis" },
               { "data": "nama_lengkap_siswa", "name": "tb_siswa.nama_lengkap_siswa" },
               { "data": "jenis_kelamin_siswa", "name": "tb_siswa.jenis_kelamin_siswa" },
               { "data": "tingkat", "name": "tb_siswa.tingkat" },
               { "data": "nomor_hp_siswa", "name": "tb_siswa.nomor_hp_siswa" },
               { "data": "actions",orderable:false,searchable:false}
               
               
           ],
           "bJQueryUI": true,
           "sPaginationType": "full_numbers",
           "iDisplayStart ": 20,
           "fnServerData": function (sSource, aoData, fnCallback)
           {
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
        $('#tabel_siswa').on('click','.edit_record',function(){
            var id=$(this).data('id');
            document.location='<?php echo site_url('dashboard/siswa_edit/') ?>'+id;
      	});
      	$('#tabel_siswa').on('click','.hapus_record',function(){
            var id=$(this).data('id');
            $('#modal_hapus').modal('show');
            $('.hapus').attr('href','<?php echo site_url('dashboard/hapus_siswa/') ?>'+id);
      	});
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