<?php
    include('ket_noi.php');
    $nameErr = $emailErr = $sexErr = $passwordErr = $birthdayErr = $nhapsaipass ="";
    $name = $email = $sex = $password = $birthday = $nhaplaimatkhau = "";
    $eeee = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["txtFullname"])) {
        $nameErr = "Tên không được trống";
        $eeee =$eeee + 1;
      } else {
        $name = test_input($_POST["txtFullname"]);
      }
      
      if (empty($_POST["email"])) {
        $emailErr = "Email không được trống";
        $eeee =$eeee + 1;
      } else {
        $email = test_input($_POST["email"]);
      }

      if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
        {
            $emailErr = "Email này không hợp lệ.";
            $eeee =$eeee + 1;
        }else{
            $email = test_input($_POST["email"]);
        }
        
      if (empty($_POST["txtPassword"])) {
        $passwordErr = "Mật khẩu không được trống";
        $eeee =$eeee + 1;
      } else {
        $password = test_input($_POST["txtPassword"]);
      }

      if (!empty($_POST["txtSex"])) {
        $sex = test_input($_POST["txtSex"]);
      }

      if (!empty($_POST["txtBirthday"])) {
       $birthday = test_input($_POST["txtBirthday"]);
      }

      if (empty($_POST["nhaplaimatkhau"])) {
        $nhapsaipass = "Không được để trống";
        $eeee =$eeee + 1;
      } else {
        $nhaplaimatkhau = test_input($_POST["nhaplaimatkhau"]);
      }
      if (mysql_num_rows(mysql_query("SELECT email FROM dangky WHERE email='$email'")) > 0)
        {
            $emailErr = "Email đã có người sử dụng.";
            $eeee =$eeee + 1;
        }


        if ($password != $nhaplaimatkhau) {
            $nhapsaipass = "Mật khẩu nhập lại không chính xác";
            $eeee =$eeee + 1;
        }

        $password = md5($password);
    }
    

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>Thêm user</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="dangky.css">
    <style>
        .error {
            color: #FF0000;
            float: right;
        }
        .title{
            text-align: center;
        }
        #dangnhaphhh{
            height: 53px;
        }
    </style>

    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title">Thêm tài khoản</h2>
                    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="input-group">
                            <label>Email</label><span class="error"><?php echo " * ".$emailErr;?></span>
                            <input class="input--style-1" type="text" name="email">
                        </div>
                        <div class="input-group">
                            <label>Tên</label><span class="error"><?php echo " * ".$nameErr;?></span>
                            <input class="input--style-1" type="text"  name="txtFullname">
                           
                        </div>
                         <div class="input-group">
                            <label>Mật khẩu</label><span class="error"><?php echo " * ".$passwordErr;?></span>
                            <input class="input--style-1" type="password"name="txtPassword">
                        </div>
                        <div class="input-group">
                            <label>Nhập lại mật khẩu</label><span class="error"><?php echo $nhapsaipass;?></span>
                            <input class="input--style-1" type="password"  name="nhaplaimatkhau">
                        </div>
                        <div class="input-group">
                            <label>Ảnh đại diện</label><span class="error"></span>
                            <input class="input--style-1" type="file"  name="fileUpload">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label>Ngày sinh</label>
                                    <input class="input--style-1 js-datepicker" placeholder="Chọn ngày sinh" type="text" name="txtBirthday">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label>Giới tính</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="txtSex">
                                            <option disabled="disabled" selected="selected">Chọn giới tính</option>
                                            <option>Nam</option>
                                            <option>Nữ</option>
                                            <option>Khác</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="luuy" style="margin-bottom: 30px;">
                            <div class="col-12">
                                <span class="luuy1" style="font-style: italic;">Lưu ý: Trường có dấu  (*) bắt buộc phải nhập</span>
                            </div>
                        </div>
                        <div class="row row-space">
                            <button class="btn btn--radius btn--green" id="buttonregister" name="up"  type="submit">Thêm tài khoản</button>
                        </div>
                        </form>
                        <?php
                        if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
                            if ($_FILES['fileUpload']['error'] > 0){
                                $link = '../upload/no-image-news.png';
                              }
                            else {
                                move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../upload/' . $_FILES['fileUpload']['name']);
                                $link = '../upload/'. $_FILES['fileUpload']['name'];
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <script src="js/global.js"></script>

</body>

</html>

<?php 
    if (!isset($_POST['email'])) {
        die('');
    }
    $now = getdate();
    $currentDate = $now["mday"] . "/" . $now["mon"] . "/" . $now["year"];
    if ($eeee != 0) {
        echo "";
    }else{
        @$addmember = mysql_query("
            INSERT INTO nguoidung (
                password,
                email,
                hoten,
                ngaysinh,
                gioitinh,
                anh,
                ngaytao
            )
            VALUE (
                N'{$password}',
                N'{$email}',
                N'{$name}',
                N'{$birthday}',
                N'{$sex}',
                N'{$link}',
                N'{$currentDate}'
            )
        ");
        if($addmember){
        $message = "Thêm thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>
            window.location.replace('index.php');
            </script>";
        }
    }
 ?>