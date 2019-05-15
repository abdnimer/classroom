
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
 ?><?php
 include "partview/sidebar.php";
 ?>
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
          <div class="content-panel"><div style="padding-left: 1%;"><a href="INSERTLUCTRE.php"><button type="button" class="btn btn-primary" >Insert</button></a>
		  <a href="deleteLUCTRE.php"><button type="button" class="btn btn-primary" >Delete</button></a></div><br><br>
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th><center>instructor name</center></th>
                    <th><center>Subject name</center></th>
                    <th><center>Classroom number</center></th>
                    <th><center>Time from-To</center></th>
                    <th ><center>Operations</center></th>
					<th  style="display:none;"><center>classroom_equipment</center></th>
					<th  style="display:none;"><center>classroom_equipment</center></th>
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
     <td><?= $row["time_from"] ?> - <?= $row["time_to"] ?></td>
     <td><center><a href="editlucter.php?id=<?= $row["lecture_id"];?>"><img border="0" alt="Edit" src="img/edit.png" width="25" height="25"></a>&nbsp&nbsp&nbsp&nbsp&nbsp
      </center></td>
	 <td  style="display:none;"><?= $row["classroom_equipment"] ?></td>
	 <td  style="display:none;"><?= $row["classroom_capacity"] ?></td>
     </div>

     </tr>
     <?php
}
} else {
echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
}
//$conn->close();
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

  </section>
  <!-- js placed at the end of the document so the pages load faster -->
<?php include "partview/script.html"; ?>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Instructor:<img src="dr.image/'+aData[1]+'.jpg" alt="instructor" style="  padding-left: 2%;" width="200" height="300">Classroom:<img src="Classroom/'+aData[3]+'.jpeg" alt="Classroom" width="200" height="300"style="  padding-left: 2%;"></td></tr>';
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
