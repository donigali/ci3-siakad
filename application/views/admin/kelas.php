<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Data Kelas</li>
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
              <h3 class="box-title">Data Kelas</h3>

              <div class="box-tools pull-right">
                <a href="<?php echo site_url('dashboard/kelas_add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> tambah kelas </a>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              	<table class="table table-bordered" id="tabel_kelas">
                    <thead>
                        <tr>
                            <th width="1%">#</th>
                            <th width="4%">RuanganKelas</th>
                            <th width="5%">Jenjang Kelas</th>
                            <th width="6%">jurusan</th>
                            <th width="10%">aksi</th>
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
   	$('input[type="checkbox"] .flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });

       var oTable = $("#tabel_kelas").dataTable({
           "bProcessing": false,
           "bServerSide": true,
           "sAjaxSource": "<?php echo site_url('dashboard/data_kelas'); ?>",
           "columns": [
           	   { "data": "pilih",orderable:false,searchable:false},
               { "data": "nama_kelas", "name": "tb_kelas.nama_kelas" },
               { "data": "kelas", "name": "tb_kelas.kelas" },
               { "data": "nama_jurusan", "name": "tb_jurusan.nama_jurusan" },
               { "data": "actions",orderable:false,searchable:false}
               
           ],
           "bJQueryUI": true,
           "sPaginationType": "full_numbers",
           "iDisplayStart ": 20,
           "fnRowCallback": function( nRow, aoData, iDisplayIndex ) {
		       var index = iDisplayIndex +1;
		       $('td:eq(0)',nRow).html(index);
		       return nRow;
		    },
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
               [2, "asc"]
           ]
       });
        $('#tabel_kelas').on('click','.edit_record',function(){
            var id=$(this).data('id');
            document.location='<?php echo site_url('dashboard/kelas_update/') ?>'+id;
      	});
      	$('#tabel_kelas').on('click','.kelas_siswa',function(){
            var id=$(this).data('id');
            document.location='<?php echo site_url('dashboard/kelas_siswa/') ?>'+id;
      	});
          $('#tabel_kelas').on('click','.jadwal',function(){
            var id=$(this).data('id');
            document.location='<?php echo site_url('dashboard/jadwal_pelajaran/') ?>'+id;
      	});
      	$('#tabel_kelas').on('click','.hapus_record',function(){
            var id=$(this).data('id');
            $('#modal_hapus').modal('show');
            $('.hapus').attr('href','<?php echo site_url('dashboard/kelas_delete/') ?>'+id);
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