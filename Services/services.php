<!DOCTYPE html>
<html>
<?php include '../SuperAdmin/config.php'?>
<head>
	<meta charset="utf-8">
	<title>Official Website of Pasong Camachile II</title>

</head>
<body>

<?php include '../Home/header.php'?>

<br>



<img src="../CSS/services2.jpg" width="400" height="600" class="d-block container" alt="...">



<div style="text-align: center !important;" class="container">
<br>
<p>
  <button style= "width: 80%;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    <h3>Under Programs</h3>
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
  	<h4>


    <?php $results = mysqli_query($link, "SELECT * FROM services where type like '%under%' order by id"); ?>

    <?php while ($row = mysqli_fetch_array($results)) { ?></td>
        </tr>
        <tr>
            <td><li><?php echo $row['title']; ?></li></td>
          </tr>
    <?php } ?>


	</h4>
  </div>
</div>
</div>






<div style="text-align: center !important;" class="container">
<br>
<p>
  <button style= "width: 80%;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
    <h3>Projects</h3>
  </button>
</p>
<div class="collapse" id="collapseExample3">
  <div class="card card-body">
  	<h4>


    <?php $resultz = mysqli_query($link, "SELECT * FROM services where type like '%project%' order by id"); ?>

    <?php while ($row = mysqli_fetch_array($resultz)) { ?></td>
        </tr>
        <tr>
            <td><li><?php echo $row['title']; ?></li></td>
          </tr>
    <?php } ?>


	</h4>
  </div>
</div>
</div>

<br>



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  


</body>

<?php include '../Home/footer.php' ?>

</html>