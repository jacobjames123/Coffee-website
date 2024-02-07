<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Login
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
  
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
      echo "<script>alert('Login successful'); window.location.href='addprod.php';</script>";
    } else {
      echo "<script>alert('Invalid email or password');</script>";
    }
  }
  
  // Signup
  if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
  
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
  
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('New record created successfully'); window.location.href='addprod.php';</script>";
    } else {
      echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
  }
  
  $conn->close();
  ?>



