<?php
$conn = mysqli_connect("localhost", "root", "", "classroom_db");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
extract($_POST);
/*$sql = "UPDATE lecture SET
Teacher_id= $teacher ,
subject_id = $subject,
hall_name= $hall,
time_from='$time_from',
time_to= '$time_to'
 WHERE lecture_id =$lucter_id";
*/
$sql = "INSERT INTO lecture (
instructor_id, subject_id, classroom_number, time_from, time_to
)
VALUES (
  $teacher,
  $subject,
  $hall,
  '$time_from',
'$time_to'
)";if (mysqli_query($conn, $sql)) {
     echo "Record updated successfully";
 } else {
     echo "Error updating record: " . mysqli_error($conn);

 }
$conn->close();

}else {
  header('Location: http://'. $_SERVER["SERVER_NAME"].'/LibraryRepApp/Pages/404.html');
}
 ?>
