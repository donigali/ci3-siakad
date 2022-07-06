<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Wali kelas</li>
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
              <h3 class="box-title">Wali kelas</h3>

              <div class="box-tools pull-right">
                <a href="<?php echo site_url('dashboard/kelas_add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> tambah kelas </a>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php echo form_open(site_url('dashboard/add_wali_kelas')); ?>
              	<table class="table table-bordered" id="tabel_kelas">
        					<thead>
        						<tr>
        							<th width="1%">#</th>
        							<th width="4%">Ruang Kelas</th>
        							<th width="5%">Tingkat Kelas</th>
                                    <th width="5%">Tahun Akademik</th>
                      				<th width="6%">Wali Kelas</th>
        						</tr>
        					</thead>
        					<tbody>
                            <?php $no=1; foreach($data as $a){ ?>
                            <input type="hidden" name="id_kelas[]" value="<?php echo $a->id_kelas; ?>">
                                <tr>
                                <td><?php echo $no++; ?></td>
                                    <td><?php echo $a->nama_kelas; ?></td>
                                    <td><?php echo $a->kelas; ?></td>
                                    <td><?php echo $a->tahun_akademik; ?></td>
                                    <td>
                                        <select name="id_guru[]" id="" class="form-control">
                                        <option value="">PILIH GURU WALIKELAS</option>
                                        <?php $guru = $this->db->get_where('tb_guru')->result();
                                         foreach($guru as $b){ ?>
                                            <option value="<?php echo $b->id_guru; ?>" <?php if($b->id_guru == $a->id_guru){ echo 'selected'; } ?>><?php echo $b->nama_guru; ?></option>
                                        <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                            <?php } ?>
        					</tbody>
        				</table>
                <button class="btn btn-info">Simpan</button>
            <?php echo form_close(); ?>
            </div>
            <!-- /.box-body -->
         </div>
		
    </section>
</div>
