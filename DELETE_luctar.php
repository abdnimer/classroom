<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
extract($_POST);
$link = mysqli_connect("localhost", "root", "", "classroom_db");

$sql = "DELETE FROM lecture WHERE lecture_id='$delete'" ;

if ($link->query($sql) === TRUE) {
    echo "thanks";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}
$link->close();
}else {
  header('Location: http://'. $_SERVER["SERVER_NAME"].'/d/Pages/404.html');
}

?>