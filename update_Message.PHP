<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>	Update instructor</title>
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
   <h3><i class="fa fa-angle-right"></i>INSERT Message</h3>
     <!--  TIME PICKERS -->
     <div class="row mt">

       <div class="col-lg-12">
         <div class="form-panel">
           <form method="post"class="form-horizontal style-form" id="insert_Message_form"name="insert_Message_form">
                          <br>
						   <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Text Message</label>
                  <div class="col-sm-10">
                    <input type="text" name="Message"id="Message" class="form-control">
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
      $("#insert_Message_form").on("submit", function (event) {
   if (event.isDefaultPrevented()) {
      // handle the invalid form...
   } else {
      // everything looks good!
      event.preventDefault();
      $.ajax({
          type: 'POST',
          url: 'Operations/update_Message.php',
          data: $(this).serialize()
      })
      .done(function(data){

   $("#insert_Message_form")[0].reset();
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
