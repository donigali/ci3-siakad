<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Lihat Nilai Siswa</li>
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
              <h3 class="box-title">Lihat Nilai Siswa</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered text-center" id="tabel_siswa" dataTables_filter="10">
                    <thead>
                        <tr>
                            <th width="2%" rowspan="2" style="vertical-align:middle;">#</th>
                            <th width="10%" rowspan="2" style="vertical-align:middle;">Mata Pelajaran</th>
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
                    <?php $no=1; foreach($nilai->result() as $a): ?>
                    <?php $data = $this->db->get_where('tb_nilai_raport',array('id_mapel' => $a->id_mapel,'id_siswa' => $this->uri->segment(3)
                    ))->row(); ?>
                        <tr>
                            <th width="2%">#</th>
                            <th width="10%" class="text-left"><?php echo $a->nama_mapel; ?></th>
                            <th width="4%"><?php if(isset($data->rata_rata_nilai_ulangan_harian)) echo $data->rata_rata_nilai_ulangan_harian; ?></th>
                            <th width="4%"><?php if(isset($data->rata_rata_nilai_tugas)) echo $data->rata_rata_nilai_tugas; ?></th>
                            <th width="4%"><?php if(isset($data->nilai_uts)) echo $data->nilai_uts; ?></th>
                            <th width="4%"><?php if(isset($data->nilai_uas)) echo $data->nilai_uas; ?></th>
                            <th width="4%"><?php if(isset($data->nilai_akhir)) echo $data->nilai_akhir; ?></th>
                            <th width="4%"><?php if(isset($data->predikat)) echo $data->predikat; ?></th>
                            <th width="5%"><?php if(isset($data->keterangan)) echo $data->keterangan; ?></th>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
         </div>
		
    </section>
</div>
