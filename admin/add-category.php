<?php
       
       session_start();


?>
   
   <html>
    <head>
        <title>News Web - Home Page</title>

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
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>



        <br><br>

        <!-- Add CAtegory Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes" checked> Yes
                        <input type="radio" name="featured" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes" checked> Yes
                        <input type="radio" name="active" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Add CAtegory Form Ends -->


    </div>
</div>

    <div class="footer">
        <div class="wrapper">
            <p class="text-center">2021 All rights reserved, News House</p>
        </div>
    </div>
    <!-- Footer Section Ends -->

    </body>
    </html>
    <?php
         $username='root';
         $server = 'localhost';
         $password='';
         $dbName='news';
       $conn = mysqli_connect($server,$username,$password,$dbName);
          if($conn->connect_error){
              echo "the connected is Error";
          } 
          else{
              if(isset($_POST['submit'])){
                 $title =$_POST['title'] ;
                $featured=$_POST['featured'];
                 $active=$_POST['active'];
                 if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                     $name = $_FILES['image']['name'];
                     $temp = $_FILES['image']['tmp_name'];
                     $ext = explode(".",$name);
                     $ext = end($ext);
                     $image_name = "images/".$title.".".$ext;
                     move_uploaded_file($temp,"../".$image_name);
                 }else{
                     $image_name = "../images/logo.png";
                 }
                 $sql = "insert into category set title ='$title'
                 ,featured ='$featured',
                 active = '$active',
                 image_name = '$image_name'
                 ";
               $res=  $conn->query($sql);
               if($res){
                $_SESSION['section']="the add section is successfully";
   
                header("location:manage-category.php");
            }else{
               $_SESSION['section']="the add section is error";
            }
              }
          }    
          $conn->close();




?>