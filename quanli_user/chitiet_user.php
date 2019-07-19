<?php
    include('ket_noi.php');
    $id = $_GET['id'];
   
    $connect = mysqli_connect('localhost','root','','test-intern');
    mysqli_set_charset($connect, 'UTF8');
    $a = mysqli_query($connect,"
           select *from nguoidung where id = '$id'
        ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>Chi tiết</title>

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
        .labe11{
            width: 200px;
        }
        .input-group{
            text-align: center;
        }
    </style>

    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
      
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title">Chi tiết user</h2>
                        <?php while ($hu = mysqli_fetch_assoc($a)){ ?>
                        <div style="text-align: center;">
                            <img style="width: 200px; height: 200px;border-radius: 50%; margin-bottom: 30px;" src="<?php echo $hu['anh']?>" alt="">
                        </div>
                        <div class="input-group">
                            <label class="labe11">ID:   <?php echo $hu['id']; ?></label>
                        </div>
                        <div class="input-group">
                            <label class="labe11">Email:   <?php echo $hu['email']; ?></label>
                        </div>
                        <div class="input-group">
                            <label class="labe11">Tên:   <?php echo $hu['hoten']; ?></label>
                        </div>
                        <div class="input-group">
                            <label class="labe11">Ngày sinh:   <?php echo $hu['ngaysinh']; ?></label>
                        </div>
                        <div class="input-group">
                            <label class="labe11">Giới tính:   <?php echo $hu['gioitinh']; ?></label>
                        </div>
                        <div class="input-group">
                            <label class="labe11">Ngày tạo:   <?php echo $hu['ngaytao']; ?></label>
                        </div>
                        <div class="row row-space">
                        <button class="btn btn--radius btn--green" id="buttonregister" name="up"  type="submit"><a href="index.php" style="color: white;">Về trang quản lý</a></button>
                        </div>
                    <?php } ?>
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

