<?php

session_start();
 
?>

<html>
<head>
    <title>News Web - Home Page</title>
   <!--  -->
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
        <h1>Manage Admin</h1>
        
        <br/>
      <div class="success">
         <?php 
         if(isset($_SESSION['admin'])){
            $see = $_SESSION['admin'];
            echo "$see";
            unset($_SESSION['admin']);
         }
         
         ?>

      </div>
        <br><br><br>

        <!-- Section Button to Add Admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <br/><br/><br/>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

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
                         $sql = "select * from admin";
                        $res =   $conn->query($sql);
                        if($res && $res->num_rows  > 0){
                             while($userAdmin=$res->fetch_assoc()){
                               $id = $userAdmin['id'];
                               $name = $userAdmin['username'];
                               $fullName=$userAdmin['fullname'];
                               ?>

                      <tr>
                <td><?php echo"$id"  ?></td>
                <td><?php echo"$name"  ?></td>
                <td><?php echo"$fullName"  ?></td>
                <td>
                    <a href="update-admin.php?id=<?php echo $id   ?>" class="btn-secondary"> update </a> &nbsp;
                    <a href="delete-admin.php?id=<?php echo $id   ?>" class="btn-danger"> delete </a>&nbsp;
                    <a href="update-password.php?id=<?php echo $id   ?>" class="btn-primary"> change password </a>&nbsp;

                </td>
            </tr>
               <?php

                             }                     
                        }
                        else{
                         echo   '<tr>
                            <td>
                                <p> no admin yet ! </p></td>
                        </tr>';
                        }

                     }
                ?>
           

           

        </table>

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

 