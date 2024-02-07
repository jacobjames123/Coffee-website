<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_form (name, email, message)
VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
  header('Location: contact.html');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
