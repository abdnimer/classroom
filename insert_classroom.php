<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
extract($_POST);
$link = mysqli_connect("localhost", "root", "", "classroom_db");
$sql = "INSERT INTO  classroom (
 classroom_number , classroom_equipment , classroom_capacity
)
VALUES (
 $classroom_number, '$classroom_equipment','$classroom_capacity'
 )";

if ($link->query($sql) === TRUE) {
    echo "Êthanks";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}
$link->close();
}else {
  header('Location: http://'. $_SERVER["SERVER_NAME"].'/d/Pages/404.html');
}

?>