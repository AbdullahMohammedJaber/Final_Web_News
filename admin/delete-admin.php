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
          $sql="delete from admin where id='$id'";
          $res = $conn->query($sql);
          if($res){
            $_SESSION['admin']="the delete admin is successfully";
            header("location:manage-admin.php");
          }else{
            $_SESSION['admin']="the delete admin is error";
            header("location:manage-admin.php");
          }
      }
 }else{
     header("location:manage-admin.php");
 }