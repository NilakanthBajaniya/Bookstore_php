<?php


require('mysqli_connect.php');

session_start();


$errors = [];
$error = false;

$firstname = "";
$lastname = "";
$paymentMehod = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(empty($_POST['firstname']))
  {
    $errors[] = "Please enter Firstname!!";
    $error = true;
  }
  else
  {
    $firstname = mysqli_real_escape_string ($dbc, $_POST['firstname']);
  }

  if(empty($_POST['lastname']))
  {
    $errors[] = "Please enter Lastname!!"; $error = true;
  }
  else
  {
    $lastname = mysqli_real_escape_string ($dbc, $_POST['lastname']);
  }

  if(empty($_POST['paymentMethod']))
  {
    $errors[] = "Please select payment method!!"; $error = true;
  }
  else
  {
    $paymentMehod = mysqli_real_escape_string ($dbc, $_POST['paymentMethod']);
  }

  if($error){

      foreach ($errors as $err ) {

        echo "<strong>" . $err . "</strong><br/>";
      }
  }
  else
  {

    $insertOrder =  "INSERT INTO `order` VALUES (0, '{$firstname}', '{$lastname}', '{$paymentMehod}', '{$_SESSION['selectedBookId']}')";

    mysqli_begin_transaction($dbc);
    //echo $insertQry;
    if(mysqli_query($dbc, $insertOrder) or die(mysqli_error($dbc)))
    {

        $updateBookInventory = "UPDATE bookinventory SET Inventory = Inventory - 1 WHERE BookId = {$_SESSION['selectedBookId']}";

        if(mysqli_query($dbc, $updateBookInventory) or die(mysqli_error($dbc)))
        {
            mysqli_commit($dbc);
            session_destroy();

            //header('Location: index.php');

            echo "<h2>Order placed!! </h2> <br/> <a href='index.php'> Click here to start again</a>";
            
        }
        else
        {
            mysqli_rollback($dbc);
            echo mysqli_error($dbc);
            echo "<h2>Error Occured!! </h2> <br/> <a href='index.php'> Click here to start again</a>";
        }
    }
    else
    {
        mysqli_rollback($dbc);
        echo mysqli_error($dbc);
        echo "<h2>Error Occured!! </h2> <br/> <a href='index.php'>Click here to start again</a>";
    }
  }
}

?>
