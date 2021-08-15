<?php

// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$username = "";
include 'config.php'
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Super Admin</title>
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
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $record = mysqli_query($link, "SELECT * FROM users WHERE id=$id");

        if ((is_object($record) && count(get_object_vars($record)) > 0) || count($record) == 1 ) {
            $n = mysqli_fetch_array($record);
            $username = $n['username'];
        }
    }
?>


<body>

    <h2 style="border-top: 3px solid gray; padding-top: 1%;" class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>! You can manage admin accounts here.</h2>


    <?php $results = mysqli_query($link, "SELECT * FROM users where userlevel = 2 order by created_at"); ?>
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    
    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td>
                <a href="superadmin.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Change Password</a>
            </td>
            <td>
                <a href="edit.php?del=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this account?');" class="del_btn">Delete Account</a>
            </td>
        </tr>
    <?php } ?>
    </table>



    <?php if ($update == true): ?>
    <form method="post" action="edit.php" >

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="input-group w-50">
            <label>Enter new password for: <b><?php echo $username; ?></b></label>
        </div>
        <div class="form-group">
            <label>New Password
            <input name="new_password" id="new_password" type="password" onkeyup='check();' />
            </label>
        </div>
        <div class="form-group">
            <label>Confirm Password
            <input name="confirm_password" id="confirm_password" type="password" onkeyup='check();' />
            <span style = "text-shadow: 2px 2px 20px white; font-weight: bold;" id='message'></span>
            </label>
        </div>
        <div class="input-group">
            <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update" disabled id="button" style="background: #556B2F;" >Update</button>
                <a href="superadmin.php" class="btn btn-primary" style="background-color: green;">Cancel</a>
            <?php else: ?>
            <?php endif ?>
        </div>


    </form>
    <?php else: ?>
    <?php endif ?>
    <p>
        <a href="register.php" class="btn btn-primary" style="background-color: green;">Add Admin Account</a>
        <a href="reset-password.php" class="btn btn-primary" style="background-color: green;">Change Superadmin Password</a>
        <a href="logout.php" onclick="return confirm('Are you sure to logout?');" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
</body>

<script type="text/javascript">
    var check = function() {
  if (document.getElementById('confirm_password').value == ''){
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Empty input.';
    document.getElementById('button').disabled = true;
  }
  else if (document.getElementById('new_password').value == ''){
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Empty input.';
    document.getElementById('button').disabled = true;
  }
  else if (document.getElementById('new_password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password matched!';
    document.getElementById('button').disabled = false;
  }
  else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password did not match';
    document.getElementById('button').disabled = true;
  }
    }
</script>
</html>