<?php

// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$username = $show = $showadd = $title = $content = $facebook = "";
include 'config.php'
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }

        body {
    font-size: 19px;
}
table{
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
    background-color: white;
}
tr {
    border: 2px solid red;
    border-radius: 10px;
}
th, td{
    border: 3px solid green;
    height: 30px;
    padding: 5px;
    font-family: Kristen ITC;
    border-radius: 10px;
}
tr:hover {
    background: lightgray;
}

form {
    width: 45%;
    margin: 50px auto;
    text-align: left;
    padding: 20px; 
    border: 1px solid #bbbbbb; 
    border-radius: 5px;
}

.input-group {
    margin: 10px 0px 10px 0px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}
.edit_btn {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
}

.del_btn {
    text-decoration: none;
    padding: 2px 5px;
    color: white;
    border-radius: 3px;
    background: #800000;
}
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}
    </style>
</head>

<?php include 'header.php'?>

<?php 
    if (isset($_GET['editannounce'])) {
        $id = $_GET['editannounce'];
        $update = true;
        $show = true;
        $record = mysqli_query($link, "SELECT * FROM officials WHERE id=$id");

        if ((is_object($record) && count(get_object_vars($record)) > 0) || count($record) == 1 ) {
            $n = mysqli_fetch_array($record);
            $title = $n['title'];
            $content = $n['content'];
            $facebook = $n['facebook'];
        }
    }
    
    if (isset($_GET['editdummy'])) {
        $show = true;
        $showadd = true;
    }
?>


<body>
    <h1>OFFICIALS MANAGEMENT</h1>
    <h2 style="border-top: 3px solid gray; font-size: 23px; font-weight: bold; padding-top: 1%;" class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>! You can manage barangay officials here. 
        <br>To manage announcements, <a href="manageofficials.php">click here.</a>
        <br>To edit services, <a href="manageservices.php">click here. </a> </h2>


    <?php $results = mysqli_query($link, "SELECT * FROM officials order by id desc"); ?>
    <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Position/Description</th>
            <th>Facebook Link</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    
    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td><?php echo $row['facebook']; ?></td>
            <td>
                <a href="manageofficials.php?editannounce=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="edit.php?delofficials=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this official?');" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </table>



    <?php if ($show == true): ?>
    <form method="post" action="edit.php" >

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="input-group w-50">
            <?php if ($showadd == true): ?>
            <label><b>Add new barangay official</b></label>
            <?php else: ?>
            <?php endif ?>

            <?php if ($update == true): ?>
            <label><b>Edit barangay official</b></label>
            <?php else: ?>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label>Full Name
            <input name="title" id="title" type="text" value="<?php echo $title; ?>" onkeyup='check();' />
            </label>
        </div>
        <div class="form-group">
            <label>Position/Description
            <textarea class="w-100" name="content" id="content" type="text" value="<?php echo $content; ?>" onkeyup='check();'  cols="40" rows="5"><?php echo $content; ?></textarea>
            <span style = "text-shadow: 2px 2px 20px white; font-weight: bold;" id='warning'></span>
            </label>
        </div>
        <div class="form-group">
            <label>Facebook link (Ex. <a href="https://www.facebook.com/brgypasongcamachileII/" target="_blank">https://www.facebook.com/brgypasongcamachileII/</a>)
            <input name="facebook" id="facebook" type="text" value="<?php echo $facebook; ?>" onkeyup='check();' />
            </label>
        </div>

            <?php if ($showadd == true): ?>
        <div class="input-group">
                <button class="btn" type="submit" name="addofficials" disabled id="button" style="background: #556B2F;" >Add</button>
                <a href="manageofficials.php" class="btn btn-primary" style="background-color: green;">Cancel</a>
        </div>
            <?php else: ?>
            <?php endif ?>

            <?php if ($update == true): ?>
        <div class="input-group">
                <button class="btn" type="submit" name="updateofficials" disabled id="button" style="background: #556B2F;" >Update</button>
                <a href="manageofficials.php" class="btn btn-primary" style="background-color: green;">Cancel</a>
        </div>
            <?php else: ?>
            <?php endif ?>


    </form>
    <?php else: ?>
    <?php endif ?>
    <p>
        <a href="manageofficials.php?editdummy=0" class="btn btn-primary" style="background-color: green;">Add Officials</a>
        <a href="logout.php" onclick="return confirm('Are you sure to logout?');" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
</body>

<script type="text/javascript">
    var check = function() {
  if (document.getElementById('content').value == ''){
    document.getElementById('warning').style.color = 'red';
    document.getElementById('warning').innerHTML = 'Empty input.';
    document.getElementById('button').disabled = true;
  }
  else if (document.getElementById('title').value == ''){
    document.getElementById('warning').style.color = 'red';
    document.getElementById('warning').innerHTML = 'Empty input.';
    document.getElementById('button').disabled = true;
  }

  else {
    document.getElementById('warning').style.color = 'red';
    document.getElementById('warning').innerHTML = '';
    document.getElementById('button').disabled = false;
  }
}

</script>
</html>