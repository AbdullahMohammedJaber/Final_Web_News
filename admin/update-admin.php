<?php
session_start();
 $username='root';
 $server = 'localhost';
 $password='';
 $dbName='news';
$conn = mysqli_connect($server,$username,$password,$dbName);
 if(isset($_GET['id'])){
     $id = $_GET['id'];  
    
      if($conn->connect_error){
          echo "the connected is Error";
      }  else{
          $sql="select * from admin where id='$id'";
          $res = $conn->query($sql);
          if($res && $res->num_rows >0){
              $admin= $res->fetch_assoc();
              $Uname = $admin['username'];
              $Fname = $admin['fullname'];
          }else{
            header("location:manage-admin.php");
          }
      }
 }else{
     header("location:manage-admin.php");
 }

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
        <h1>Update Admin</h1>

        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo "$Fname" ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo "$Uname" ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
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
   }else{
    if(isset($_POST['submit'])){
        $newName = $_POST['username'];
        $newFullName = $_POST['full_name'];
        $sql = "update admin set username='$newName',fullname='$newFullName' where id='$id' ";
        $res = $conn->query($sql);
         if( $res){
            $_SESSION['admin']="the update admin is successfully";

            header("location:manage-admin.php");
        }else{
           $_SESSION['admin']="the update admin is error";
        }
  
    }
     
   }




?>