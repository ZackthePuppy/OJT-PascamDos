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



<div class="announcement" style="background-color: #fffbcc; color: #777; font-size: 14px; line-height: 23px; padding: 13px 16px; text-align:center; font-family:ChalkFont; margin-right: 50px; margin-left: 50px; color: black;">
    <?php $results = mysqli_query($link, "SELECT *, DATE_FORMAT(created_at,'%m-%d-%y') FROM announcements order by id desc"); ?>

  <h2 style="text-align: center;">Announcements</h2>
    
    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><h4 style="background-color: #f58f2a; border-radius: 3px; color: black; margin-left: 4px; margin-right: 4px; padding: 3px 5px 3px 4px; text-transform: uppercase;"><?php echo $row['created_at']; ?>&emsp;<?php echo $row['title']; ?></h4></td>
        </tr>
        <tr>
            <td><h3 style="font-family:sans-serif;"><?php echo $row['content']; ?></h3></td>
          </tr>
    <?php } ?>
</div>


</body>

<?php include '../Home/footer.php' ?>

</html>