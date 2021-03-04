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

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<title> BookStore: Home </title>

<style>
    th, td{
        padding: 10px;
    }
</style>
</head>

<body>
<br> <br>
<div style="width: 80%; margin-left:10%;">
<div class="row" >

<?php while($book = mysqli_fetch_array($books)) { ?>    
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
               
                <img src="images/<?php echo $book['BookId'] ?>.jpg" height="300px" width="100px" class="card-img-top" alt="Book Cover for <?php echo $book['BookName']?>">
                
                <div class="card-body">
                    <h5 class="card-title"> 
                         <?php echo $book['BookName']?>
                    </h5>
                    <p class="card-text">
                   
                    <?php
                        echo "<p>Author: {$book['Authors']}</p>";
                        echo "<p>Published: {$book['PublishDate']}</p>";
                        echo "<p>Price: $ {$book['Price']}</p>";
                        echo "<p>Pages: {$book['NoOfPages']}</p>";
                    ?>
                    </p>
                    <?php echo "<a class='btn btn-primary' href='setSession.php?bookId={$book['BookId']}'> Buy Now</a>" ?>
                </div>
            </div>
            <br/>
        </div>
        
    <?php } ?>
</div>
</div>

<!-- 
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

    </tbody>
<table> -->

</body>
</html>