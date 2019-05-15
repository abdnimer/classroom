<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>	Update Subject</title>
<?php include "partview/links.html"; ?>

</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->

<?php include "partview/header.php";
 include "partview/sidebar.php";
 ?>
 <section id="main-content">
   <section class="wrapper">
   <h3><i class="fa fa-angle-right"></i>INSERT Subject</h3>
     <!--  TIME PICKERS -->
     <div class="row mt">

       <div class="col-lg-12">
         <div class="form-panel">
           <form method="post"class="form-horizontal style-form" id="insert_Subject_form"name="insert_Subject_form">
                          <br>
						   <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Subject ID</label>
                  <div class="col-sm-10">
                    <input type="text" name="Subject_ID"id="Subject_ID" class="form-control">
                  </div>
				  
                </div>
				<div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Subject Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="Subject_name"id="Subject_name" class="form-control">
                  </div>
				  
                </div>
          <div  class="col-4">
<input type="submit" value="أدخال" class="btn btn-primary">
          </div>
           </form>
         </div>
         <!-- /form-panel -->
       </div>
       <!-- /col-lg-12 -->
     </div>
     <!-- row -->
   
     <h3><i class="fa fa-angle-right"></i>Update Subject</h3>
     <!--  TIME PICKERS -->
     <div class="row mt">

       <div class="col-lg-12">
         <div class="form-panel">
           <form method="post"class="form-horizontal style-form" id="UPDATE_Subject_form"name="UPDATE_Subject_form">
                          <br>
						  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Subject ID</label>
						   <div class="col-sm-10">
						   <select class="form-control" id="Subject"name="Subject">
                 <?php
$conn = mysqli_connect("localhost", "root", "", "classroom_db");

         $sql = "SELECT * FROM subject  ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
          ?>
          <option value=<?= $row["subject_id"]; ?>>
          <?= $row["subject_id"]; ?>
          </option>
          <?php
          }
          } else {
          echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
          }
          ?>
                 </select>     </div>                  </div>

						   <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Subject Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="subject_name"id="subject_name" class="form-control">
                  </div>
                </div>

          <div  class="col-4">
<input type="submit" value="تعديل" class="btn btn-primary">
          </div>
           </form>
         </div>
         <!-- /form-panel -->
       </div>
       <!-- /col-lg-12 -->
     </div>
     <h3><i class="fa fa-angle-right"></i>Delete Subject</h3>
     <div class="row mt">

       <div class="col-lg-12">
         <div class="form-panel">
           <form method="post"class="form-horizontal style-form" id="DELETE_Subject_form"name="DELETE_Subject_form">
                          <br>

						<select class="form-control" id="subject"name="subject">
                 <?php
$conn = mysqli_connect("localhost", "root", "", "classroom_db");

         $sql = "SELECT * FROM subject  ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
          ?>
          <option value=<?= $row["subject_id"]; ?>>
          <?= $row["Subject_name"]; ?>
          </option>
          <?php
          }
          } else {
          echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
          }
          ?>
                 </select>
<BR>
          <div  class="col-4">
<input type="submit" value="حذف" class="btn btn-primary">

          </div>
           </form>
         </div>
         <!-- /form-panel -->
       </div>
       <!-- /col-lg-12 -->
     </div>
     <!-- row -->
   </section>
   <!-- /wrapper -->
 </section>
    <!--main content end-->

  </section>
  <!-- js placed at the end of the document so the pages load faster -->
<?php include "partview/script.html"; ?>
  <!--script for this page-->
  <script type="text/javascript">


    $(document).ready(function() {
      $("#insert_Subject_form").on("submit", function (event) {
   if (event.isDefaultPrevented()) {
      // handle the invalid form...
   } else {
      // everything looks good!
      event.preventDefault();
      $.ajax({
          type: 'POST',
          url: 'Operations/insert_Subject.php',
          data: $(this).serialize()
      })
      .done(function(data){

   $("#insert_Subject_form")[0].reset();
      })
      .fail(function() {
          // just in case posting your form failed
          alert( "حصل خطأ ما الرجاء اعادة المحاولة ! ..." );
      });
      // to prevent refreshing the whole page page
      return false;
   }
   });
  });

    $(document).ready(function() {
      $("#UPDATE_Subject_form").on("submit", function (event) {
   if (event.isDefaultPrevented()) {
      // handle the invalid form...
   } else {
      // everything looks good!
      event.preventDefault();
      $.ajax({
          type: 'POST',
          url: 'Operations/update_Subject.php',
          data: $(this).serialize()
      })
      .done(function(data){

   $("#UPDATE_Subject_form")[0].reset();
      })
      .fail(function() {
          // just in case posting your form failed
          alert( "حصل خطأ ما الرجاء اعادة المحاولة ! ..." );
      });
      // to prevent refreshing the whole page page
      return false;
   }
   });
  });
$(document).ready(function() {
      $("#DELETE_Subject_form").on("submit", function (event) {
   if (event.isDefaultPrevented()) {
      // handle the invalid form...
   } else {
      // everything looks good!
      event.preventDefault();
      $.ajax({
          type: 'POST',
          url: 'Operations/DELETE_Subject.php',
          data: $(this).serialize()
      })
      .done(function(data){

   $("#DELETE_Subject_form")[0].reset();
      })
      .fail(function() {
          // just in case posting your form failed
          alert( "حصل خطأ ما الرجاء اعادة المحاولة ! ..." );
      });
      // to prevent refreshing the whole page page
      return false;
   }
   });
  });
  </script>
</body>

</html>
