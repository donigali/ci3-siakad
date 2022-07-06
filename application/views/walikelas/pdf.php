<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('asset/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('asset/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('asset/'); ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('asset/'); ?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('asset/'); ?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
</head>
<body class="hold-transition">
<?php
 $CI =& get_instance();
 $CI->load->model('Walikelas_model','wali');

$siswa = $CI->wali->get_siswa_by_id($id_siswa); 
$semester = $CI->wali->get_semester_by_id($id_semester); 
?>
<div class="content">
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td style="font-size:10px;width: 10%;">Nama Peserta Didik</td>
                <td style="font-size:10px;width: 2%;" class="text-center">:</td>
                <td style="font-size:10px;width: 22%;"><?php if(isset($siswa->nama_lengkap_siswa)) echo $siswa->nama_lengkap_siswa ?></td>
                <td style="font-size:10px;width: 7%;">Kelas/Semester</td>
                <td style="font-size:10px;width: 2%;" class="text-center">:</td>
                <td style="font-size:10px;width: 16%;"><?php if(isset($semester->kode_semester)) echo $semester->kode_semester ?></td>
                </tr>
                <tr>
                <td style="font-size:10px;width: 10%;">Nomor Induk/NISN</td>
                <td style="font-size:10px;width: 2%;" class="text-center">:</td>
                <td style="font-size:10px;width: 22%;"><?php if(isset($siswa->nis)) echo $siswa->nis ?>/<?php if(isset($siswa->nisn)) echo $siswa->nisn ?></td>
                <td style="font-size:10px;width: 7%;">Tahun Pelajaran</td>
                <td style="font-size:10px;width: 2%;" class="text-center">:</td>
                <td style="font-size:10px;width: 16%;"><?php if(isset($siswa->tahun_akademik)) echo $siswa->tahun_akademik ?></td>
                </tr>
                <tr>
                <td style="font-size:10px;width: 10%;">Nama Sekolah</td>
                <td style="font-size:10px;width: 2%;" class="text-center">:</td>
                <td style="font-size:10px;width: 22%;">&nbsp;</td>
                <td style="font-size:10px;width: 7%;">&nbsp;</td>
                <td style="font-size:10px;width: 2%;">&nbsp;</td>
                <td style="font-size:10px;width: 16%;">&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="text-center" width="100%" border="1">
        <thead>
            
            <tr>
                <th style="font-size:10px;width: 5;" rowspan="3">No.</th>
                <th style="font-size:10px;width: 40;" rowspan="3">Komponen</th>
                <th style="width: 10;font-size:10px;" rowspan="3">Kriteria <br> Ketuntasan <br> Minimal <br>(KKM)</th>
                <th style="font-size:10px;width: 75" colspan="5">Nilai Hasil Belajar</th>
            </tr>
            <tr>
                <th style="font-size:10px;width: 50;" colspan="2">Pengetahuan</th>
                <th style="font-size:10px;width: 50;" colspan="2">Praktik</th>
                <th style="font-size:10px;width: 30;">Sikap/Afektif</th>
            </tr>
            <tr>
                <th style="font-size:10px;width: 10;">Angka</th>
                <th style="font-size:10px;width: 40">Huruf</th>
                <th style="font-size:10px;width: 10;">Angka</th>
                <th style="font-size:10px;width: 40">Huruf</th>
                <th style="font-size:10px;width: 30">Predikat</th>
            </tr>
            <tr>
                <th style="font-size:10px;width: 5;">A.</th>
                <th style="font-size:10px;width: 40">Mata Pelajaran</th>
                <th style="font-size:10px;width: 10">&nbsp;</th>
                <th style="font-size:10px;width: 10">&nbsp;</th>
                <th style="font-size:10px;width: 40">&nbsp;</th>
                <th style="font-size:10px;width: 10">&nbsp;</th>
                <th style="font-size:10px;width: 40;">&nbsp;</th>
                <th style="font-size:10px;width: 30;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        <?php
       
        
        $no=1; foreach($nilai->result() as $a): ?>
        <?php $data= $CI->wali->raport_siswa($id_semester,$id_siswa,$a->id_mapel)->row(); ?>
            <tr>
                <td style="font-size:10px;"><?php echo $no++; ?></td>
                <td style="font-size:10px;text-align:left;text-transform:capitalize;" class="text-left"><?php echo $a->nama_mapel; ?></td>
                <td style="font-size:10px;" ><?php if(isset($data->kkm)) echo $data->kkm; ?></td>
                <td style="font-size:10px;" ><?php if(isset($data->nilai_akhir)) echo $data->nilai_akhir; ?></td>
                <td style="font-size:10px;" ><?php if(isset($data->nilai_akhir)) echo ucwords(number_to_words($data->nilai_akhir)); ?></td>
                <td style="font-size:10px;" ><?php if(isset($data->nilai_uas)) echo $data->nilai_uas; ?></td>
                <td style="font-size:10px;" ><?php if(isset($data->nilai_akhir)) echo $data->nilai_akhir; ?></td>
                <td style="font-size:10px;" ><?php if(isset($data->predikat)) echo $data->predikat; ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url('asset/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('asset/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url('asset/'); ?>plugins/iCheck/icheck.min.js"></script>
</body>
</html>
