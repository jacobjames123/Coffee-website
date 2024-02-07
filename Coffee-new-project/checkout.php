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

$id = $_GET['id']; // get the product id from the URL

// fetch the product details from the database
$sql = "SELECT id, name, price, image FROM Products WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo "<div class='product-details'>";
echo "<img src='Images/" . $row["image"] . "' alt=''>";
echo "<h3><i class='fas fa-coffee'></i> " . $row["name"] . "</h3>"; // coffee icon for product name
echo "<p id='price'><i class='fas fa-tag'></i> Rs." . $row["price"] . "</p>"; // tag icon for price
echo "<div class='quantity-control'>";
echo "<button id='decrease'><i class='fas fa-minus'></i></button>"; // minus icon for decreasing quantity
echo "<input type='number' id='quantity' min='1' value='1'>";
echo "<button id='increase'><i class='fas fa-plus'></i></button>"; // plus icon for increasing quantity
echo "</div>";
echo "<p id='total'><i class='fas fa-shopping-cart'></i> Total: Rs." . $row["price"] . "</p>"; // shopping cart icon for total
echo "<button id='purchase'>Purchase</button>"; // purchase button
echo "</div>";

echo "<script>
document.getElementById('decrease').addEventListener('click', function() {
    var quantityInput = document.getElementById('quantity');
    if (quantityInput.value > 1) {
        quantityInput.value--;
    }
    updateTotal();
});
document.getElementById('increase').addEventListener('click', function() {
    var quantityInput = document.getElementById('quantity');
    quantityInput.value++;
    updateTotal();
});
document.getElementById('quantity').addEventListener('change', updateTotal);

function updateTotal() {
    var price = " . $row["price"] . ";
    var quantity = document.getElementById('quantity').value;
    var total = price * quantity;
    document.getElementById('total').innerHTML =  'Total: Rs.' + total;
}

document.getElementById('purchase').addEventListener('click', function() {
    var popup = document.createElement('div');
    popup.id = 'popup';
    
    // Create a form for the billing information
    var form = document.createElement('form');
    form.innerHTML = `
        <h2>Billing Information</h2>
        <label>
            Name:
            <input type='text' name='name' required>
        </label>
        <label>
            Email:
            <input type='email' name='email' required>
        </label>
        <label>
            Address:
            <textarea name='address' required></textarea>
        </label>
        <button type='submit'>Submit</button>
    `;

    // Append the form to the pop-up
    popup.appendChild(form);

    // Append the pop-up to the body
    document.body.appendChild(popup);

    // Prevent scrolling on the body
    document.body.style.overflow = 'hidden';

    // Remove the pop-up when the form is submitted
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        document.body.removeChild(popup);
        document.body.style.overflow = '';
    });
});

</script>";



include 'footer.php'; // include your footer file here

?>