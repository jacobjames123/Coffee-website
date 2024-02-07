<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  <title>Document</title>

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

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, price, image FROM Products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<a href='checkout.php?id=" . $row["id"] . "'>";
    echo "<div class='products-new mt-5 col '>";
    echo "<div class='products-content-new '>";
    echo "<img src='Images/" . $row["image"] . "' alt=''>";
    echo "<div class='product-texts-new'>";
    echo "<h3>" . $row["name"] . "</h3>";
    echo "<p>Rs." . $row["price"] . "</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</a>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>


<?php

include 'footer.php'; // include your header file here

?>

  
</body>
</html>

