<?php

session_start();
 
?>
<!--  -->
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
        <h1>Add Admin</h1>

        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


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
         $name = $_POST['username'];
         $Fname = $_POST['full_name'];
         $pass = md5($_POST['password']);

         $sql = " insert into admin set username='$name' , fullname=' $Fname',password='$pass' ";
         $res = $conn->query($sql);
         if($res){
             $_SESSION['admin']="the add admin is successfully";

             header("location:manage-admin.php");
         }else{
            $_SESSION['admin']="the add admin is error";
         }
        }
   }
   $conn->close();
?>
