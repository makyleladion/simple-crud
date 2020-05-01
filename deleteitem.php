<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$query ="DELETE FROM storage WHERE id=$id";
$result = mysqli_query($mysqli, $query);

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

