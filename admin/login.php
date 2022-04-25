
<html>
    <head>
        <title>Login - News Web  System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>


            <br><br>

            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            <!-- Login Form Ends HEre -->

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
          $pass=md5( $_POST['password']);
          $sql = "select * from admin where username ='$name' and password='$pass' ";
          $res = $conn->query($sql);
          if($res && $res->num_rows>0){
              
            header("location:manage-admin.php");
       
          }
          else {
            header("location:login.php");
  
          }
      }
      
  }



?>

