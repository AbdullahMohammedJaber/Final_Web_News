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
        <h1>Manage News</h1>

        <br/><br/>

        <!-- Button to Add Admin -->
        <a href="add-news.php" class="btn-primary">Add News</a>

        <br/><br/><br/>
        <div class="success">
        <?php 
         if(isset($_SESSION['news'])){
            $see = $_SESSION['news'];
            echo "$see";
            unset($_SESSION['news']);
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
                     }  
                     else{
                         $sql = "select * from new";
                        $res =   $conn->query($sql);
                        if($res && $res->num_rows  > 0){
                             while($userAdmin=$res->fetch_assoc()){
                               $id = $userAdmin['id'];
                               $name = $userAdmin['name'];
                               $des=$userAdmin['description'];
                               $act=$userAdmin['active'];
                               $fea=$userAdmin['featured'];
                               $image = $userAdmin['image_news'];
                               $category = $userAdmin['cat_id'];
                               ?>
                                     <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>
               
              <td>  <img src=<?php echo "../".$image ?> width="30px"></td>
                <td><?php echo $fea ?></td>
                <td><?php echo $act ?></td>
                <td>
                <a href="update-news.php?id=<?php echo $id ?>" class="btn-secondary">Update News</a>
                    <a href="delete-news.php?id=<?php echo $id ?>" class="btn-danger">Delete News</a>
                </td>
                       </tr>
                       <?php
                             }
                          
                            }else{
                                echo   '<tr>
                                <td>
                                    <p> no news yet ! </p></td>
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