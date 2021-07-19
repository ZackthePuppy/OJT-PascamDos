<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js">


<style type="text/css">
  @font-face {
  font-family: ChalkFont;
  src: url(../CSS/KGBlankSpaceSketch.ttf);
}

body {
 background-image: url("../CSS/back.jpg");
background-repeat: no-repeat;
background-size: cover;
}


.sticky {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 999;
}

</style>

</head>
<body>

<h1 style="font-family: ChalkFont !important; text-align: center;">BRGY. PASONG CAMACHILE II UNOFFICIAL WEBSITE
<img width="150" height="150" alt="" class="header-image" src="../CSS/logo.png">
</h1>

<div class="topnav" id="myHeader">
<nav class="navbar navbar-expand-lg navbar-dark bg-success" id="myHeader">

  <div class="collapse navbar-collapse container" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" style="font-size: 20px;">
      <li class="nav-item">
        <a class="nav-link" href="../Home/home.php">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../About/about.php">ABOUT BRGY.</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../BRGYCaptain/brgycorner.php">BRGY CAPTAIN CORNER</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Services/services.php">SERVICES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Announcements/announcements.php">ANNOUNCEMENTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#"></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    </form>
  </div>
</nav>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script type="text/javascript">
  window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>


</body>

</html>