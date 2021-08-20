<!DOCTYPE html>
<html>

<?php include '../SuperAdmin/config.php'?>
<head>
	<meta charset="utf-8">
	<title>Official Website of Pasong Camachile II</title>

<style>
  .fa {
    padding: 10px;
    margin: 10px;
    width: 38px;
    border-radius: 50%;
    text-align: center;
    text-decoration: none
}

.fa:hover {
    opacity: 0.7
}

.fa-facebook {
    background: #3B5998;
    color: white
}

.fa-twitter {
    background: #55ACEE;
    color: white
}

.fa-linkedin {
    background: #007bb5;
    color: white
}

h1 {
    font-family: 'Yrsa', serif;
    font-size: 50px
}

.flip-card {
    background-color: transparent;
    width: 260px;
    height: 100px;
    perspective: 1000px
}

.flip-card-inner {
    width: 260px;
    height: 300px;
    text-align: center;
    transition: transform 0.8s;
    transform-style: preserve-3d
}

.flip-card:hover .flip-card-inner {
    transform: rotateY(180deg)
}

.flip-card-front,
.flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden
}

.flip-card-front {
    background-color: #bbb;
    color: black
}

.flip-card-back {
    transform: rotateY(180deg);
    width: 260px;
    height: 300px;
    background-color: #f2f2f2
}

.card-title {
    color: #007b5e;
    padding: 20px
}

header {
    background-color: #007b5e
}

.person {
    color: #007b5e;
    font-family: 'Yrsa', serif;
    font-size: 30px;
    padding: 15px
}
}

.card-body {
    background-color: #f2f2f2
}

  @font-face {
  font-family: ChalkFont;
  src: url(../CSS/KGBlankSpaceSketch.ttf);
}

</style>


</head>
<body>

<?php include '../Home/header.php'?>
 <br>


    <header class=" text-center py-5 mb-4 new">
        <div class="container">
            <h1 class="font-weight-light text-white" style="font-family: ChalkFont !important; text-align: center;">Barangay Official Corner</h1>
        </div>
        <h5>(You can visit some of their FB profiles by clicking their name)</h5>
    </header>



<div class="announcement wrapper container" style = "background-color: #fffbcc; color: #777; font-size: 14px; line-height: 23px; padding: 13px 16px; text-align:center; font-family:ChalkFont; color: black;">
    <?php $results = mysqli_query($link, "SELECT * FROM officials order by id"); ?>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><h4 style="background-color: #f58f2a; border-radius: 3px; color: black; margin-left: 4px; margin-right: 4px; padding: 3px 5px 3px 4px; text-transform: uppercase;">&emsp; 

                <?php if (!empty($row['facebook']) ): ?>
                <a href="<?php echo $row['facebook']; ?>" target="_blank" > <?php echo $row['title']; ?> </a> 


                <?php else: ?>
                <?php echo $row['title']; ?> 
                <?php endif ?>

            </h4></td>
        </tr>
        <tr>
            <td><h3 style="font-family:sans-serif;"><?php echo $row['content']; ?></h3></td>
          </tr><br>
    <?php } ?>

</div>

<br>

<?php include '../Home/footer.php' ?>

</body>

</html>


