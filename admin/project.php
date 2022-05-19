<?php
include 'db/connection.php';

if(isset($_GET['del'])){
  mysqli_query($con, "update project set status=0 where id='".$_GET['id']."'");
  echo"project deleted";
}
?>
<html>
    <head>
      <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
      <title>To Do List | Admin Project</title>
      <link href="img/icons/logo.png" rel="shortcut icon">
      <!--FONT AWESOME CDN SECTION-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css"/>
          <link href="./css/sidenav.css" rel="stylesheet"/>
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>
    </head>

    <body>
<?php include 'includes/sidenav.inc.php'; ?>

<div class="main">

<form class="form" method="post" enctype="multipart/form-data">
  <div class="adminform_div">
    <label class="adminform_label" for="basicinput">add project</label><br>
    <input type="text" name="addProject" placeholder="Enter Project Name" class="adminform_input" >
  </div>
  <div class="adminform_div">
    <button type="submit" name="addProjectbtn" class="adminform_btn">add project</button>
  </div>
</form>
<br><br><br>

      <table id="datable">
        <thead>
            <tr>
              <th>#</th>
              <th>project name</th>
              <th>project Description</th>
              <th>update date</th>
              <th>due date</th>
              <th>status</th>
              <th>action</th>
            </tr>
        </thead>

        <tbody>

          <?php
          $query= mysqli_query($con,"select * from project");
          $cnt=1;
          while($row=mysqli_fetch_array($query)){
           ?>
          <tr>
            <td><?php echo htmlentities ($cnt);?></td>
            <td><?php echo htmlentities ($row['projectName']); ?></td>
            <td><?php echo htmlentities ($row['projectDescription']);?></td>
            <td><?php echo htmlentities ($row['updateDate']); ?></td>
            <td><?php echo htmlentities ($row['dueDate']); ?></td>
            <td><?php echo htmlentities ($row['status']); ?></td>
            <td>
              <a href="editproject.php?id=<?php echo $row['id']?>" ><i class="fa fa-plus"></i></a>
              <a name="deleteProject" href="project.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a>
            </td>
          </tr>
        <?php $cnt++; } ?>
        </tbody>
      </table>
</div>


      <!--DATATABLES SECTION JS-->
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      <!--END DATATABLES SECTION JS-->

      <script>
      	$(document).ready(function() {
      	    $('#datable').DataTable( {
      	        "columnDefs": [
      	            {
      	              "render": function ( data, type, row ) {
      	              	return data +' ('+ row[3]+')';
      				      },
      				            "targets": 0
      				         },
      				          	{ "visible": false,  "targets": [ 3 ] }
      				        ]
      	    });
      			});
      </script>
    </body>
</html>
