<?php 
  require_once("../config.php");
  // if(isset($_POST['btn_register']))
  // {
  //   // if(isset($_POST['taikhoan']) && isset($_POST['matkhau']) && isset($_POST['cmatkhau']) && isset($_POST['hovaten']) && isset($_POST['email']) && isset($_POST['ngaysinh']) && isset($_POST['sex']))
  //   // {
  //   //   // $username = $_POST['taikhoan'];
  //   //   // $password = $_POST['matkhau'];
  //   //   // $repassword = $_POST['cmatkhau'];
  //   //   // $hovaten = $_POST['hovaten'];
  //   //   // $email = $_POST['email'];
  //   //   // $ngaysinh = $_POST['ngaysinh'];
  //   //   // $gioitinh = $_POST['sex'];
  //   //   // echo $username.$password.$repassword.$hovaten.$email.$ngaysinh.$gioitinh;
  //   // }
  // }
  // if(isset($_POST['btn_register']))
  // {
  //   echo "lala";
  // }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quản lý nhóm| Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../index.php"><b>QUẢN LÝ NHÓM</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">ĐĂNG KÝ TÀI KHOẢN</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input id="taikhoan" name ="taikhoan" type="text" class="form-control" placeholder="Tài khoản">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id = "matkhau" name ="matkhau" type="password" class="form-control" placeholder="Mật khẩu">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="cmatkhau" name ="cmatkhau" type="password" class="form-control" placeholder="Nhập lại mật khẩu">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="hovaten" name="hovaten" type="text" class="form-control" placeholder="Họ và tên">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="email" name ="email" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id ="ngaysinh" name ="ngaysinh" type="date" class="form-control" placeholder="dd/mm/yyyy">
        <span class="glyphicon  glyphicon-calendar form-control-feedback"></span>
      </div>
      <div class="radio">
        <label>Giới tính:</label>
        <label><input type="radio" class="form-control" name="sex" value = "nam">Nam</label>
        <label><input type="radio" class="form-control" name="sex" value = "nu">Nữ</label>
      </div>
      <div class="form-group has-feedback">
        <label>Nhóm đăng ký:</label>
        <select class="form-control">
          <?php
            // thực hiện select bảng _groups lấy ra các mã nhóm ,
            // thực hiện select bảng _users đếm số lượng _users đã thuộc _groups
            // nếu < số lượng giới hạn của _groups thì hiển thị ra cho lựa chọn 
            $sql = "SELECT _groups._MANHOM,_groups._TENNHOM,_groups._SOLUONG FROM _groups ";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) == FALSE)
            {
              echo "<script> alert(\"Không có nhóm!\");</script>";
            }
            else
            {
              while($row = mysqli_fetch_row($result))
              {
                $sql2 = "SELECT COUNT(_users._ID) FROM _users WHERE _users._MANHOM = '$row[0]'";
                $result2 = mysqli_query($conn,$sql2);
                if(mysqli_num_rows($result2) == FALSE)
                {}
                else
                {
                  $rowtemp = mysqli_fetch_row($result2);
                  $soluong = $rowtemp[0];
                  if($soluong < $row[2])
                  {
                    echo "<option>";
                    echo $row[1];
                    echo "</option>";
                  }
                }
              } 
            }
            mysqli_free_result($result2);
            mysqli_free_result($result);
            mysqli_close($conn);
          ?>
        </select>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button id="btn_register" type="submit" name ="btn_register" class="btn btn-primary btn-block btn-flat">Đăng kí</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="./login.php" class="text-center">Tôi đã là thành viên</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
  //document.getElementById('btn_register').disabled = true;
  function check(){
    var data = new Array();
    data[0] = document.getElementById('taikhoan').value;
    data[1] = document.getElementById('matkhau').value;
    data[2] = document.getElementById('cmatkhau').value;
    data[3] = document.getElementById('hovaten').value;
    data[4] = document.getElementById('email').value;
    data[5] = document.getElementById('ngaysinh').value;
    var nearby = new Array("taikhoan","matkhau","cmatkhau","hovaten","email","ngaysinh");
    for (i in data)
    {
      var div = nearby[i];
      if(data[i]==""){
        document.getElementById(div).style.borderColor = 'red';
      }
    }
  }
</script>
</body>
</html>