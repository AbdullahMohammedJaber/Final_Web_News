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
              $oldPassword = $admin['password'];
            
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
            <li><a href="manage-category.php">Category</a></li>
            <li><a href="manage-food.php">Food</a></li>
            <li><a href="manage-order.php">Order</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</div>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>


<div class="footer">
    <div class="wrapper">
        <p class="text-center">2021 All rights reserved, Food House</p>
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
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        if($current_password==$oldPassword){
                   if($new_password==$confirm_password){
                    $sql = "update admin set password='$new_password'  where id='$id' ";
                    $res = $conn->query($sql);
                     if( $res){
                        $_SESSION['admin']="the update password is successfully";
            
                        header("location:manage-admin.php");
                    }else{
                       $_SESSION['admin']="the update password is error";
                    }
                   }
                   else{
                    header("location:manage-admin.php");
 
                   }
        }else{
            header("location:manage-admin.php");
        }
       
  
    }
     
   }




?>