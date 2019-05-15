<?php
if(isset($_GET['id'])) {
  $id = $_GET['id'];
}else {
  // code...
}
?>
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
     <h3><i class="fa fa-angle-right"></i>Edit lucter</h3>
     <!--  TIME PICKERS -->
     <div class="row mt">

       <div class="col-lg-12">
         <div class="form-panel">
           <form class="form-horizontal style-form" id="editlucter_form">
             <input type="hidden" id="lucter_id" name="lucter_id" value="<?= $id ?>">
             <br>
             <label class="control-label col-md-3">Instructor</label>

               <select class="form-control" name="teacher" id="teacher">
                                                           <?php
$conn = mysqli_connect("localhost", "root", "", "classroom_db");
                                                         $sql = "SELECT * FROM instructor";
                                                   $result = $conn->query($sql);
                                                   if ($result->num_rows > 0) {
                                                   // output data of each row
                                                   while($row = $result->fetch_assoc()) {
                                                   ?>
                                                   <option value=<?= $row["instructor_id"]; ?>>
                                                   <?= $row["instructor_name"]; ?>
                                                   </option>
                                                   <?php
                                                   }
                                                   } else {
                                                   echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
                                                   }
                                                   ?>

                                                   </select>
               <br>
               <label class="control-label col-md-3">Subject</label>
               <select class="form-control" id="subject"name="subject">
                 <?php

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

                 <br>
                 <label class="control-label col-md-3">Classroom</label>
                 <select class="form-control" id="clssroom"name="classroom">
                   <?php

                  $sql = "SELECT * FROM classroom ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            ?>
            <option value=<?= $row["classroom_number"]; ?>>
            <?= $row["classroom_number"]; ?>
            </option>
            <?php
            }
            } else {
            echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
            }
            ?>
                   </select>
                    <br>

             <div class="form-group">
               <br>
               <label class="control-label col-md-3">24hr Timepicker</label>
               <div class="col-md-4">
                 <div class="input-group bootstrap-timepicker">
                   <input type="text" class="form-control timepicker-24" id="time_from" name="time_from">
                   <span class="input-group-btn">
                     <button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
                     </span>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="input-group bootstrap-timepicker">
                   <input type="text" class="form-control timepicker-24" id="time_to" name="time_to">
                   <span class="input-group-btn">
                     <button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
                     </span>
                 </div>
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
      $("#editlucter_form").on("submit", function (event) {
   if (event.isDefaultPrevented()) {
      // handle the invalid form...
   } else {
      // everything looks good!
      event.preventDefault();
      $.ajax({
          type: 'POST',
          url: 'Operations/update_luctar.php',
          data: $(this).serialize()
      })
      .done(function(data){

   $("#editlucter_form")[0].reset();
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
