<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (getimagesize($_files['img_blob']['tmp_name'])==false)
	{
	}else{
		$imagee=addslashes($_files['img_blob']['tmp_name']);
		$imagee=file_get_contents($imagee);
		$imagee=base64_encode($imagee);
	}
extract($_POST);
$link = mysqli_connect("localhost", "root", "", "classroom_db");
$sql = "INSERT INTO  instructor (
 instructor_name,instructor_image
)
VALUES (
 '$instructor_name', '$imagee'
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