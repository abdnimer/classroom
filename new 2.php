
<html>
    <head>
	<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
    </head>
    <body onload="myFunction()">
	<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
 <p id="demo"> 
 <?php
$conn = mysqli_connect("localhost", "root", "", "hall_project");
$sql = "select cdfd from clothes where id =1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc())  echo ($row["cdfd"] )?> <?php
}
 else {
echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
}
//$conn->close();
?>  </p><P></p>
</div>


  
    </body>
</html>