<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
extract($_POST);
$link = mysqli_connect("localhost", "root", "", "classroom_db"); 
$sql = "UPDATE classroom SET classroom_equipment='$classroom_equipment', classroom_capacity=$classroom_capacity WHERE classroom_number=$CLASSROOM";

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