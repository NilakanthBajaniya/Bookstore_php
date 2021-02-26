<?php

require('mysqli_connect.php');

$booksQuery = "SELECT * FROM bookinventory";
$books = mysqli_query($dbc, $booksQuery) or die(mysqli_error($dbc)); 
?>


<html>
<head>
<title> BookStore: Home </title>

</head>

<body>
<table>
    <thead>
        <tr>
            <th> Title </th>
            <th> Price </th>
            <th> Pages </th>
        </tr>
    </thead>

    <tbody>
        <?php 
            while($book = mysqli_fetch_array($books))
            {
                echo "<tr>";

                echo "<td>{$book['BookName']}</td>";
                echo "<td>{$book['Price']}</td>";
                echo "<td>{$book['Pages']}</td>";

                echo "</tr>";
            }
        ?>
    </tbody>
<table>
</body>
</html>