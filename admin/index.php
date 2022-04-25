<?php
 $username='root';
 $server = 'localhost';
 $password='';
 $dbName='news';
 $contCategory = 0 ;
 $contAdmin = 0 ;
 $contNews = 0 ;


$conn = mysqli_connect($server,$username,$password,$dbName);
  
       $sql = "select * from category";
       $ad = "select * from admin";
       $ne = "select * from new";
     $res = $conn->query($sql);
    if($res && $res->num_rows>0){
             $contCategory = $res->num_rows;
     }
     $r = $conn->query($ad);
     if($r && $r->num_rows>0){
        $contAdmin = $r->num_rows;
       }
       $e = $conn->query($ne);
       if($e && $e->num_rows>0){
          $contNews = $r->num_rows;
         }
?>


<html>
<head>
    <title>News Web  - Home Page</title>

    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
<!-- Menu Section Starts -->
<div class="menu text-center">
    <div class="wrapper">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="manage-admin.php">Admin</a></li>
            <li><a href="manage-category.php">Section</a></li>
            <li><a href="manage-news.php">News</a></li>
             <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</div>
        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>

                <br><br>

                <div class="col-4 text-center">
                <?php  
                 echo  "<h1>".$contCategory."</h1>";
                
                ?>


                   
                    <br />

                    Section
                </div>

                <div class="col-4 text-center">


                  
                <?php  
                 echo  "<h1>".$contNews."</h1>";
                
                ?>
                    <br />
                    News
                </div>

                <div class="col-4 text-center">



                <?php  
                 echo  "<h1>".$contAdmin."</h1>";
                
                ?>
                    <br />
                    Admin
                </div>

            

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

<div class="footer">
    <div class="wrapper">
        <p class="text-center">2021 All rights reserved, News House</p>
    </div>
</div>
<!-- Footer Section Ends -->

</body>
</html>