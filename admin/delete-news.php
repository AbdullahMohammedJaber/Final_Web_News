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
          $sql="delete from new where id='$id'";
          $res = $conn->query($sql);
          if($res){
            $_SESSION['news']="the delete new is successfully";
            header("location:manage-news.php");
          }else{
            $_SESSION['admin']="the delete new is error";
            header("location:manage-news.php");
          }
      }
 }else{
     header("location:manage-news.php");
 }