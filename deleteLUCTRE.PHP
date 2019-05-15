<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>	lecture table</title>
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
     <h3><i class="fa fa-angle-right"></i>Delete LUCTRE</h3>
     <!--  TIME PICKERS -->
     <div class="row mt">

       <div class="col-lg-12">
         <div class="form-panel">
           <form class="form-horizontal style-form" id="delete_luctar_form">
                          <br>
             <label class="control-label col-md-3">Teacher / Subject</label>

               <select class="form-control" name="delete" id="delete">
                                                           <?php
$conn = mysqli_connect("localhost", "root", "", "classroom_db");
                                                         $sql = "SELECT l.*, i.* , s.*,c.* FROM  lecture l, instructor i ,subject s, classroom c 
														 WHERE l.instructor_id = i.instructor_id and s.subject_id = l.subject_id and c.classroom_number=l.classroom_number";
                                                   $result = $conn->query($sql);
                                                   if ($result->num_rows > 0) {
                                                   // output data of each row
                                                   while($row = $result->fetch_assoc()) {
                                                   ?>
                                                   <option value=<?= $row["lecture_id"]; ?>>
                                                   <?= $row["instructor_name"]; ?> / <?= $row["Subject_name"]?> / <?= $row["time_from"]; ?>
                                                   </option>
                                                   <?php
                                                   }
                                                   } else {
                                                   echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
                                                   }
                                                   ?>

                                                   </select>
               <br>
               
             
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
      $("#delete_luctar_form").on("submit", function (event) {
   if (event.isDefaultPrevented()) {
      // handle the invalid form...
   } else {
      // everything looks good!
      event.preventDefault();
      $.ajax({
          type: 'POST',
          url: 'Operations/DELETE_luctar.php',
          data: $(this).serialize()
      })
      .done(function(data){

   $("#delete_luctar_form")[0].reset();
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
