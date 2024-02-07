<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .disp-container {
          justify-content: center;
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        img {
    width: 200px;
    height: 150px;
}
        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 16px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            justify-content: center;
            margin-left: 12%;
            margin-bottom: 5%;
            overflow: hidden;
        }
        form input[type="text"], form input[type="file"] {
            padding: 10px;
            width: 40%;
            justify-content: center;
            align-items: center;
        }
        form input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            width: 40%;
        }
        form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

<?php

include 'header.php'; // include your header file here

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, price, image FROM Products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<div class='disp-container'>";
  echo "<table><tr><th>ID</th><th>Name</th><th>Price</th><th>Image</th></tr>";
  while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["price"]. "</td><td><img src='" . $row["image"]. "'></td></tr>";
  }
  echo "</table>";
  echo "</div>";
} else {
  echo "0 results";
}
$conn->close();
?>

    <form action="add-product.php" method="post" enctype="multipart/form-data">
        ID: <input type="text" name="id"><br>
        Name: <input type="text" name="name"><br>
        Price: <input type="text" name="price"><br>
        Image: <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" name="submit">
      </form>

      <?php

include 'footer.php'; 

?>
      
</body>
</html>