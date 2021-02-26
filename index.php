<?php

require('mysqli_connect.php');

$booksQuery = "SELECT bi.BookId, bi.BookName, bi.Price, bi.NoOfPages, bi.PublishDate, CONCAT(GROUP_CONCAT(' ',a.Name)) AS Authors
               FROM bookinventory bi LEFT JOIN author a 
               ON  bi.BookId = a.BookId
               GROUP BY bi.BookId
               ORDER BY bi.PublishDate DESC";

$books = mysqli_query($dbc, $booksQuery) or die(mysqli_error($dbc)); 
?>


<html>
<head>
<title> BookStore: Home </title>

<style>
    th, td{
        padding: 10px;
    }
</style>
</head>

<body>
<table border="2" >
    <thead>
        <tr>
            <th> Title </th>
            <th> Authors </th>
            <th> Publish Date </th>
            <th> Price (CAD) </th>
            <th> Pages </th>
        </tr>
    </thead>

    <tbody>
        <?php 
            //$bookIndex = 0;
            while($book = mysqli_fetch_array($books))
            {
                echo "<tr>";

                echo "<td>{$book['BookName']}</td>";
                echo "<td>{$book['Authors']}</td>";
                echo "<td>{$book['PublishDate']}</td>";
                echo "<td>$ {$book['Price']}</td>";
                echo "<td>{$book['NoOfPages']}</td>";

                echo "</tr>";
            }
        ?>
    </tbody>
<table>
</body>
</html>