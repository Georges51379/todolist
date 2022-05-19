<?php
include 'db/connection.php';

if(isset($_POST['addBannerbtn'])){
  $companyName = $_POST['companyName'];
  $image=$_FILES['image']['name'];
  $endDate = $_POST['endDate'];
  $bannerForm = $_POST['bannerForm'];
  $price = $_POST['price'];
  $status = $_POST['status'];
  $url = $_POST['url'];

  $query= mysqli_query($con," insert into banners (companyName, image, endDate, form, price, status, url) values('$companyName',
   '$image', '$endDate', '$bannerForm', '$price', '$status', '$url')");

   echo "banner Successfully updated!!";
}

if(isset($_GET['del'])){
  mysqli_query($con, "update banners set status=0 where id='".$_GET['id']."'");
  echo "project deleted";
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

<?php
  $query= mysqli_query($con, "select * from banners");
  $row=mysqli_fetch_array($query);
 ?>
<div class="main">

  <form class="form" method="post" enctype="multipart/form-data">
    <div class="adminform_div">
      <label class="adminform_label" for="basicinput">add company name</label><br>
      <input type="text" name="companyName" placeholder="Enter company name" class="adminform_input" >
    </div>

    <div class="adminform_div">
      <label class="adminform_label" for="basicinput">image</label><br>
      <input type="file" name="image" id="image" value="" class="adminform_input" required>
    </div>

    <div class="adminform_div">
      <label class="adminform_label" for="basicinput">end date</label><br>
      <input type="date" name="endDate" placeholder="Enter end date" class="adminform_input" >
    </div>

    <div class="adminform_div">
      <label class="adminform_label" for="basicinput">form</label><br>
      <select   name="bannerForm"  id="bannerForm" class="adminform_select" required>
      <option value="">Select</option>
      <option value="landscape">landscape</option>
      <option value="portrait">portrait</option>
      </select>
    </div>

    <div class="adminform_div">
      <label class="adminform_label" for="basicinput">price</label><br>
      <input type="text" name="price" placeholder="Enter price" class="adminform_input" >
    </div>

    <div class="adminform_div">
      <label class="adminform_label" for="basicinput">status</label><br>
      <input type="text" name="status" placeholder="Enter banner status" class="adminform_input" >
    </div>

    <div class="adminform_div">
      <label class="adminform_label" for="basicinput">add URL</label><br>
      <input type="text" name="url" placeholder="Enter URL" class="adminform_input" >
    </div>

    <div class="adminform_div">
      <button type="submit" name="addBannerbtn" class="adminform_btn">add banner</button>
    </div>
  </form>
<br><br><br>

  <table id="datable">
    <thead>
        <tr>
          <th>#</th>
          <th>company name</th>
          <th>image</th>
          <th>end date</th>
          <th>form banner</th>
          <th>price</th>
          <th>status</th>
          <th>URL</th>
          <th>action</th>
        </tr>
    </thead>

    <tbody>

      <?php
      $query= mysqli_query($con,"select * from banners");
      $cnt=1;
      while($row=mysqli_fetch_array($query)){
       ?>
      <tr>
        <td><?php echo htmlentities ($cnt);?></td>
        <td><?php echo htmlentities ($row['companyName']); ?></td>
        <td><?php echo htmlentities ($row['image']);?></td>
        <td><?php echo htmlentities ($row['endDate']); ?></td>
        <td><?php echo htmlentities ($row['form']); ?></td>
        <td>$<?php echo htmlentities ($row['price']); ?></td>
        <td><?php echo htmlentities ($row['status']); ?></td>
        <td><?php echo htmlentities ($row['url']); ?></td>
        <td>
          <a href="editbanners.php?id=<?php echo $row['id']?>" ><i class="fa fa-plus"></i></a>
          <a name="deleteBanner" href="banners.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a>
        </td>
      </tr>
    <?php $cnt++; } ?>
    </tbody>
  </table>

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

</div>
    </body>
</html>
