<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $username='root';
    $server = 'localhost';
    $password='';
    $dbName='news';
  $conn = mysqli_connect($server,$username,$password,$dbName);
 $sql = "select * from new where id = '$id'";

  $res= $conn->query($sql);
  if($res){
      while($c=$res->fetch_assoc()){
          $title = $c['cat_id'];
      }
  }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.jpg" alt="news" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="news.php">News</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>News on <a href="#" class="text-black"><?php echo $id ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">News Menu</h2>
            <?php 
                    $username='root';
                    $server = 'localhost';
                    $password='';
                    $dbName='news';
                  $conn = mysqli_connect($server,$username,$password,$dbName);
                    $sql = "select * from new where  cat_id='$id'";
                    $res = $conn->query($sql);
           while($cat=$res->fetch_assoc()){
                 $image = $cat['image_news'];
                 $title = $cat['name'];
                 $id = $cat['id'];
                 $desc = $cat['description'];
                 ?>
     <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="<?php  echo $image ; ?>" alt="news" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php  echo $title ;?></h4>
                    
                    <p class="food-detail">
                    <?php  echo $desc ;?>
                    </p>
                    <br>

                   
                </div>
            </div>

                     <?php 
           }
         
                   
                   ?>
 
            <div class="clearfix"></div>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Loay Attar</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>