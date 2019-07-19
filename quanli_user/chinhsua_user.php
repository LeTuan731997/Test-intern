<?php
    include('ket_noi.php');
    $id = $_GET['id'];
   
    $connect = mysqli_connect('localhost','root','','test-intern');
    mysqli_set_charset($connect, 'UTF8');
    $a = mysqli_query($connect,"
           select *from nguoidung where id = '$id'
        ");
?>
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

    <title>Chỉnh sửa user</title>

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

<body>1
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title">Thay đổi thông tin user</h2>
                    <form method="post" enctype="multipart/form-data" action="xl_chinhsua.php">
                        <?php while ($hu = mysqli_fetch_assoc($a)){ ?>
                        <input type="hidden" name ="id" value="<?php echo $id; ?>">
                        <div class="input-group">
                            <label>Email:<?php echo $hu['email']; ?></label>
                        </div>
                        <div class="input-group">
                            <label>Tên</label><span class="error"><?php echo " * ".$nameErr;?></span>
                            <input class="input--style-1" type="text"  name="txtFullname" value="<?php echo $hu['hoten']; ?>">
                           
                        </div>
                        <div class="input-group">
                            <label>Ảnh đại diện</label><span class="error"></span>
                            <input class="form-control" disabled="disabled" type="text" value="<?php echo $hu['anh'];?>">
                            <input type="hidden" name="anh" value="<?php echo $hu['anh'];?>">
                            <input class="input--style-1" type="file"  name="fileUpload">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label>Ngày sinh</label>
                                    <input class="input--style-1 js-datepicker" placeholder="Chọn ngày sinh" type="text" name="txtBirthday" value="<?php echo $hu['ngaysinh']; ?>">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label>Giới tính</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="txtSex">
                                            <option selected="selected"><?php echo $hu['gioitinh']; ?></option>
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
                            <button class="btn btn--radius btn--green" id="buttonregister" name="up"  type="submit">Thay đổi thông tin</button>
                        </div>
                        <?php } ?>
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
