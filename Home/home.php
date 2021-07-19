<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Official Website of Pasong Camachile II</title>

</head>
<?php include 'header.php'?>
<body>


<br>


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner container">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../CSS/home1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../CSS/home2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../CSS/home3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div
  id="carouselMultiItemExample"
  class="carousel slide carousel-dark text-center"
  data-mdb-ride="carousel"
>
  <!-- Controls -->
  <!-- Inner -->
  <div class="carousel-inner py-4">
    <!-- Single item -->
    <div class="carousel-item active">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <img
                src="../CSS/corner.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">BRGY Captain Corner</h5>
                <p class="card-text">
                  View our friendly officials here!
                </p>
                <a href="../BRGYCaptain/brgycorner.php" class="btn btn-primary">Officials</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 d-none d-lg-block">
            <div class="card">
              <img
                src="../CSS/services.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Services</h5>
                <p class="card-text">
                  View our BRGY services here!
                </p>
                <a href="../Services/services.php" class="btn btn-primary">Services</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 d-none d-lg-block">
            <div class="card">
              <img
                src="../CSS/announcements.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Announcements</h5>
                <p class="card-text">
                  For more news and announcements, click here.
                </p>
                <a href="../Announcements/announcements.php" class="btn btn-primary">Announcements</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- Inner -->
</div>
<!-- Carousel wrapper -->









</body>

<?php include 'footer.php' ?>

</html>