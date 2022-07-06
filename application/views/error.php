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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition">
<div class="login-box">
  
  <!-- /.login-logo -->
    <div>
        <img src="data:image/png;base64,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" alt="403">
    </div>
  <br>
  <div class="login-logo" style="font-size:14px;">
      <a><b>Mohon Maaf,</b> anda tidak memiliki akses untuk menginput nilai di kelas <?php if(isset($kelas)) echo $kelas; ?> </a>
      <br><br>
      <a href="<?php echo site_url('guru'); ?>"><button class="btn btn-primary"> kembali ke dashboard</button></a>
  </div>
  
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('asset/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('asset/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url('asset/'); ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
