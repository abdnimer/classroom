<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
extract($_POST);
$link = mysqli_connect("localhost", "root", "", "classroom_db"); 
$sql = "UPDATE subject SET Subject_name='$subject_name' WHERE subject_id='$Subject'";

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