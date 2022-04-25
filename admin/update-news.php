<?php
   $id = $_GET['id'];
   $username='root';
   $server = 'localhost';
   $password='';
   $dbName='news';
 $conn = mysqli_connect($server,$username,$password,$dbName);
 if(isset($_GET['id'])){
   
     if($conn->connect_error){
         echo "the connected is Error";
     }else{
         $sql = "select * from new where id = '$id'";
         $res = $conn->query($sql);
         if($res&&$res->num_rows>0){
              $news = $res->fetch_assoc();
              $title = $news['name']; 
              $image = $news['image_news'];
              $active = $news['active'];
              $feather=$news['featured'];
              $category = $news['cat_id'];
         }else{
            header("location:manage-news.php");

         }
     }
 }
 else{
    header("location:manage-news.php");

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

<div class="main-content">
    <div class="wrapper">
        <h1>Update News</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value=<?php echo $title   ?>>
                    </td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5"  ></textarea>
                    </td>
                </tr>

               

                <tr>
                    <td>Current Image:</td>
                    <td>
                    <img  src=<?php echo "../".$image;   ?> width="80px" >
                    </td>
                </tr>

                <tr>
                    <td>Select New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category" value=<?php echo $category;  ?>>


                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes" 
                        <?php 
                            if($feather=="Yes"){
                                echo "checked" ;
                            }
                            else{
                                echo "";
                            }
                         
                         
                         ?>
                          
                         > Yes
                        
                        
                       
                        <input type="radio" name="featured" value="No"
                        <?php 
                            if($feather=="No"){
                                echo "checked" ;
                            }
                            else{
                                echo "";
                            }
                         
                         
                         ?>
                        
                        > No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes"
                        <?php 
                            if($active=="Yes"){
                                echo "checked" ;
                            }
                            else{
                                echo "";
                            }
                         
                         
                         ?>
                        > Yes
                        <input type="radio" name="active" value="No"
                        <?php 
                            if($active=="No"){
                                echo "checked" ;
                            }
                            else{
                                echo "";
                            }
                         
                         
                         ?>
                        > No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="current_image" value="">

                        <input type="submit" name="submit" value="Update News" class="btn-secondary">
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