<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"> Jadwal Pelajaran</li>
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
              <h3 class="box-title">Jadwal Pelajaran kelas <?php if(isset($kelas)) echo $kelas; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	             	<table class="table table-bordered" id="tabel_siswa" dataTables_filter="10">
    					<thead>
    						<tr>
                                <th width="2%">Jam Ke-</th>
                                <th width="5%">Hari</th>
                                <th width="4%">Mata Pelajaran</th>
                                <th width="5%">Guru</th>
                                <th width="6%">Kelas/Ruang</th>
                                <th width="6%">Aksi</th>
    						</tr>
    					</thead>
    					<tbody>
    						
    					</tbody>
    				</table>
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
           "sAjaxSource": "<?php echo site_url('dashboard/show_jadwal/'.$this->uri->segment(3)); ?>",
           "columns": [
               { "data": "jam_mulai" },
               { "data": "nama_hari" },
               { "data": "nama_mapel" },
               { "data": "nama_guru" },
               { "data": "nama_kelas" },
               { "data": "actions",orderable:false,searchable:false}
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
               [1, "asc"]
           ]
       });
        $('#tabel_siswa').on('click','.edit_record',function(){
            var id=$(this).data('id');
            document.location='<?php echo site_url("dashboard/jadwal_pelajaran_update/") ?>'+id;
      	});
        $('#tabel_siswa').on('click','.hapus_record',function(){
            var id=$(this).data('id');
            $('#modal_hapus').modal('show');
            $('.hapus').attr('href','<?php echo site_url("dashboard/jadwal_pelajaran_hapus/") ?>'+id);
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