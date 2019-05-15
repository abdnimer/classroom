<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>	lecture table</title>

  <!-- Favicons -->
  <link href="img/ui-sam.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
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

<body  >
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="#" class="logo"><b>lecture<span>table</span></b></a>
      <!--logo end-->
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!  --sidebar start-->
    <aside>

      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><img src="img/ui-sam.png" class="img-circle" width="80"></p>
          <h5 class="centered">	lecture tables</h5>
          <li class="sub-menu">
            <a href="advanced_table.php">
              <i class="fa fa-desktop"></i>
              <span>classroom table</span>
              </a>
          </li>
		    <li class="sub-menu">
            <a href="login.php">
              <i class="fa fa-desktop"></i>
              <span>Admin page</span>
              </a>
          </li>
		</ul>
		   

        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
	
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>lecture</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
           <div class="adv-table">
		   	<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
 <p id="demo"> 
 <?php
$conn = mysqli_connect("localhost", "root", "", "classroom_db");
$sql = "select admin_description from admin where admin_id =1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc())  echo ($row["admin_description"] )?> <?php
}
 else {
echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
}
//$conn->close();
?>  </p><P></p>
</div>
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th><center>instructor name</center></th>
                    <th><center>Subject name</center></th>
                    <th ><center>Classroom number</center></th>
                    <th ><center>Time from</center></th>
                    <th ><center>Time to</center></th>
                    <th  style="display:none;"><center>classroom equipment</center></th>
					<th  style="display:none;"><center>classroom capacity</center></th>
					<th  style="display:none;"><center>instructor id</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
$conn = mysqli_connect("localhost", "root", "", "classroom_db");
$sql = "SELECT l.*, i.* , s.*,c.* FROM  lecture l, instructor i ,subject s, classroom c WHERE l.instructor_id = i.instructor_id and s.subject_id = l.subject_id and c.classroom_number=l.classroom_number";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

     ?>
     <tr>
     <td><?= $row["instructor_name"] ?></td>
     <td><?= $row["Subject_name"] ?></td>
     <td><?= $row["classroom_number"] ?></td>
     <td><?= $row["time_from"] ?></td>
     <td><?= $row["time_to"] ?></td>
     <td  style="display:none;"><?= $row["classroom_equipment"] ?></td>
	 <td  style="display:none;"><?= $row["classroom_capacity"] ?></td>
	 <td  style="display:none;"><?= $row["instructor_id"] ?></td>
     </div>

     </tr>
     <?php
}
} else {
echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
}

?>          </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>JU</strong>. All Rights Reserved
        </p>
        <div class="credits">
        </div>
        <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Other Information:</td><td>Classroom equipment:' + aData[6] + ' 	/Classroom capacity: ' + aData[7] + '</td></tr>';
      sOut += '<tr><td>Instructor:<img src="dr.image/'+aData[8]+'.jpg" alt="instructor" style="  padding-left: 2%;" width="200" height="300">Classroom:<img src="Classroom/'+aData[3]+'.jpeg" alt="Classroom" width="200" height="300"style="  padding-left: 2%;"></td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [3, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
		$('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
</body>

</html>
