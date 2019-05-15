<?php
$conn = mysqli_connect("localhost", "root", "", "classroom_db");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
extract($_POST);
$sql = "UPDATE lecture SET
instructor_id= $teacher ,
subject_id = $subject,
classroom_number= $hall,
time_from='$time_from',
time_to= '$time_to'
 WHERE lecture_id =$lucter_id";
/*
$sql = "INSERT INTO books (
name, author, cost_price, sale_price, total_qty, note, number_stamp, group_books_id
)
VALUES (
  '$name',
  '$author',
  $cost_price,
  $sale_price,
$total_qty,
  '$note',
  '$number_stamp',
  $group_books
)";*/ if (mysqli_query($conn, $sql)) {
     echo "Record updated successfully";
 } else {
     echo "Error updating record: " . mysqli_error($conn);
     
 }
$conn->close();

}else {
  header('Location: http://'. $_SERVER["SERVER_NAME"].'/LibraryRepApp/Pages/404.html');
}
 ?>
