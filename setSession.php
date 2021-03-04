<?php

    $bookId = $_GET['bookId'];
echo $bookId;
    if($bookId != null || $bookId != 0)
    {
        session_start();
        $_SESSION['selectedBookId'] = $bookId;
        header("Location: checkout.php");
    }else
    {
        echo "<h1>Please make a valid selection!</h1>";
    }

?>