<?php 

    require('mysqli_connect.php');
    
    session_start();
    $query = "SELECT * FROM bookinventory WHERE BookId= {$_SESSION['selectedBookId']}";

    $book = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

    $bookId; $bookName; $price;

    if(mysqli_num_rows($book) == 1)
    {
        while($row = mysqli_fetch_array($book))
        {
            $bookId = $row['BookId'];
            $bookName = $row['BookName'];
            $price = $row['Price'];
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>BookStore: Checkout</title>
</head>
<body>

<h2> Checkout</h2>

<form action="insertOrder.php" method="post">

  <p><label for="firstname">Firstname: <input type="text" name="firstname" size="22"  maxlength="20"></label></p>

  <p><label for="lastname">Lastname: <input type="text" name="lastname" size="22" maxlength="20"></label></p>

  <p><label for="paymentMethod">Payment Option: 
            Credit Card: <input type="radio" name="paymentMethod" value="credit"> &nbsp;
            Debit Card: <input type="radio" name="paymentMethod" value="debit">
        </label>
  </p>

  <p> <input type="submit" value="Place Order"/></p>

</from>

</body>
</html>

