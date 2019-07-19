<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test-inter</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="qltin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        h2{
            text-align: center;
        }
        .container1{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        $connect = mysqli_connect('localhost','root','','test-intern');
        mysqli_set_charset($connect, 'UTF8');
    ?>
    <?php
        $page=1;
        $limit=10;
 
        $arrs_list = mysqli_query($connect,"
            select id from nguoidung
        ");
        $total_record = mysqli_num_rows($arrs_list);
        
        $total_page=ceil($total_record/$limit);
        if(isset($_GET["page"]))
            $page=$_GET["page"];
        if($page<1) $page=1; 
        if($page>$total_page) $page=$total_page;
        $start=($page-1)*$limit;
        
        $arrs = mysqli_query($connect,"
            select * from nguoidung limit $start,$limit
        ");

    ?>
    <div class="example">
        <div class="container">
            <div class="row">
                <h2>TEST </h2>
                <div>
                    <a href="them_user.php" class="btn btn-primary a-btn-slide-text">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        <span><strong>Thêm user</strong></span>            
                    </a>
                </div>
                <br>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="active">    
                            <th class="td2">Email</th>
                            <th class="td3">Họ tên</th>
                            <th class="td5">Ảnh</th>
                            <th class="td5">Ngày tạo</th>
                            <th class="td5">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($arrs as $row){ ?>
                        <tr>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['hoten']; ?></td>
                            <td><?php echo $row['anh']; ?></td>
                            <td><?php echo $row['ngaytao']; ?></td>
                            <td>
                                <div class="container1">
                                    <div class="row">
                                        <a href="chinhsua_user.php?id=<?php echo $row['id'];?>" class="btn btn-primary a-btn-slide-text">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            <span><strong>Chỉnh sửa</strong></span>            
                                        </a>
                                        <a href="chitiet_user.php?id=<?php echo $row['id'];?>" class="btn btn-success a-btn-slide-text">
                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                            <span><strong>Chi tiết</strong></span>            
                                        </a>
                                        <a href="xoa_user.php?id=<?php echo $row['id'];?>" class="btn btn-danger a-btn-slide-text">
                                           <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            <span><strong>Xóa</strong></span>            
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <div class="col-md-6 div col-md-offset-3">
                <ul class="pagination">
                    <?php 
                    if ($page > 1 && $total_page > 1){
                        echo '<li class="page-item"><a class="page-link" href="ql_nguoidung.php?page='.($page-1).'">Previous</a></li>';
                    }else{
                        echo '<li class="page-item disabled"><a class="page-link" href="ql_nguoidung.php?page='.($page-1).'">Previous</a></li>';
                    }
         
                    for ($i = 1; $i <= $total_page; $i++){
                        if ($i == $page){
                            echo '<li class="page-item active"><a class="page-link">'.$i.'</a></li>';
                        }
                        else{
                            echo '<li class="page-item"><a class="page-link" href="ql_nguoidung.php?page='.$i.'">'.$i.'</a></li>';
                        }
                    }
 
            if ($page < $total_page && $total_page > 1){
                echo '<li class="page-item"><a class="page-link" href="ql_nguoidung.php?page='.($page+1).'">Next</a></li>';
            }else{
                echo '<li class="page-item disabled"><a class="page-link" href="ql_nguoidung.php?page='.($page+1).'">Next</a></li>';
            }
           ?>
                </ul>
            </div>
            </div>
        </div>
 
    </div>
</body>
</html> 