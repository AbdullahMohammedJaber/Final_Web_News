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
          $sql="delete from category where id='$id'";
          $res = $conn->query($sql);
          if($res){
            $_SESSION['section']="the delete Section is successfully";
            header("location:manage-category.php");
          }else{
            $_SESSION['admin']="the delete admin is error";
            header("location:manage-category.php");
          }
      }
 }else{
     header("location:manage-category.php");
 }