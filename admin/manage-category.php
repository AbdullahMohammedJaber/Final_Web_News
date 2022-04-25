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
        <h1>Manage Section</h1>

        <br>
      
        <!-- Button to Add Admin -->
        <a href="add-category.php" class="btn-primary">Add Section</a>
           <br> <br>  
           <div class="success">
         <?php 
         if(isset($_SESSION['section'])){
            $see = $_SESSION['section'];
            echo "$see";
            unset($_SESSION['section']);
         }
         
         ?>

      </div>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
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
                }  else{
                    $sql = "select * from category";
                    $res =   $conn->query($sql);
                    if($res ){
                         while($u=$res->fetch_assoc()){
                           $id = $u['id'];
                           $title = $u['title'];
                           $active=$u['active'];
                           $featured = $u['featured'];
                           $imageName = $u['image_name'];
                           ?>
 <tr>
                <td> <?php echo $id ?></td>
                <td> <?php echo $title ?></td>

                <td>
                    <img src=<?php echo "../".$imageName ?> width="50px">


                </td>

                <td><?php echo $featured ?></td>
                <td><?php echo $active ?></td>
                <td>
                    <a href="update-category.php?id=<?php echo $id ?>" class="btn-secondary">Update Section</a>
                    <a href="delete-category.php?id=<?php echo $id ?>" class="btn-danger">Delete Section</a>
                </td>
            </tr>
<?php
                          }
                    }
                    else{
                        echo   '<tr>
                        <td colspan="6">
                        <div class="error">No Category Added.</div>
                    </td>
                    </tr>';
                    }
              }
             ?>
 
        </table>
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