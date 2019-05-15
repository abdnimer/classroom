<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
extract($_POST);
$link = mysqli_connect("localhost", "root", "", "classroom_db");
$sql = "INSERT INTO  subject (
 subject_id , subject_name
)
VALUES (
 $Subject_ID, '$Subject_name'
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