   <?php

session_start();
$username='root';
$server = 'localhost';
$password='';
$dbName='news';
$conn = mysqli_connect($server,$username,$password,$dbName);
 
 

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
        <h1>Add News</h1>

        <br><br>



        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the News">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the News."></textarea>
                    </td>
                </tr>
 

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                           <?php 
                             
                             
                                   $sql = "select * from category";
                                   $res = $conn->query($sql);
                                   if($res && $res->num_rows>0){
                                       while($cat = $res->fetch_assoc()){
                                           $id=$cat['id'];
                                           $title = $cat['title'];
                                           echo "<option value=' $id'> $title</option>";

                                       }
                                   }
                                   else{
                             echo "<option value='0'>No Category Found</option> ";
                                   }
                               

                           ?>
                         </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes 
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes 
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add News" class="btn-secondary">
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

 if(isset($_POST['submit'])){
    
    $title =$_POST['title'] ;
    $featured=$_POST['featured'];
     $active=$_POST['active'];
     $des = $_POST['description'];
     $category=$_POST['category'];
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
    $sql = "insert into new set name ='$title',featured ='$featured',active = '$active',description='$des',image_news = '$image_name',cat_id = '$category'
    ";
  $res= $conn->query($sql);
  if($res){
    $_SESSION['news']="the add News is successfully";

    header("location:manage-news.php");
}else{
   $_SESSION['news']="the add News is error";
}
 }

$conn->close();
?>