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
                    <img src="images/logo.jpg" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Section</a>
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
   
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Section</h2>
         <?php     
          $username='root';
          $server = 'localhost';
          $password='';
          $dbName='news';
        $conn = mysqli_connect($server,$username,$password,$dbName);
          $sql = "select * from category where active='Yes' and featured='Yes' limit 3 ";
          $res = $conn->query($sql);
           while($cat=$res->fetch_assoc()){
                 $image = $cat['image_name'];
                 $title = $cat['title'];
                 $id = $cat['id'];
                 ?>
                <a href="category-news.php?id=<?php echo $id  ?> ">
            <div class="box-3 float-container">
                <img src="<?php echo $image ; ?>" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php echo $title ; ?></h3>
            </div>
            </a>
            <?php 
           }
         
         
         ?>
          

            
 

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

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
                    $sql = "select * from new  limit 8";
                    $res = $conn->query($sql);
           while($cat=$res->fetch_assoc()){
                 $image = $cat['image_news'];
                 $title = $cat['name'];
                 $id = $cat['id'];
                 $desc = $cat['description'];
                 ?>
     <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="<?php  echo $image ;    ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php  echo $title ;    ?></h4>
                    
                    <p class="food-detail">
                    <?php  echo $desc ;    ?>
                    </p>
                    <br>

                   
                </div>
            </div>

                     <?php 
           }
         
                   
                   ?>
        
            <div class="clearfix"></div>
 
        </div>

        <p class="text-center">
            <a href="#">See All news</a>
        </p>
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