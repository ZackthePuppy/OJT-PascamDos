<?php

include 'config.php';

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
            echo '<script>alert("Your password is empty!")</script>';
    }  else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}

else if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($link, "DELETE FROM users WHERE id=$id");
    header('location: superadmin.php');
}

else if (isset($_GET['delannounce'])) {
    $id = $_GET['delannounce'];
    mysqli_query($link, "DELETE FROM announcements WHERE id=$id");
    header('location: admin.php');
}

else if (isset($_POST['add'])) {
    $content = $_POST['content'];
    $title = $_POST['title'];

    mysqli_query($link, "INSERT INTO announcements (title, content) VALUES ('$title', '$content')"); 
    header('location: admin.php');
}

else if (isset($_POST['updateannounce'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = trim($_POST["content"]);

    mysqli_query($link, "UPDATE announcements SET title='$title', content='$content' WHERE id=$id");
    header('location: admin.php');
}

else if (isset($_POST['addservices'])) {
    $title = $_POST['title'];
    $type = $_POST['type'];

    mysqli_query($link, "INSERT INTO services (title, type) VALUES ('$title', '$type')"); 
    header('location: manageservices.php');
}

else if (isset($_POST['updateservices'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $type = $_POST['type'];

    mysqli_query($link, "UPDATE services SET title='$title', type='$type' WHERE id=$id");
    header('location: manageservices.php');
}

else if (isset($_GET['delservices'])) {
    $id = $_GET['delservices'];
    mysqli_query($link, "DELETE FROM services WHERE id=$id");
    header('location: manageservices.php');
}

else if (isset($_GET['delofficials'])) {
    $id = $_GET['delofficials'];
    mysqli_query($link, "DELETE FROM officials WHERE id=$id");
    header('location: manageofficials.php');
}

else if (isset($_POST['addofficials'])) {
    $title = $_POST['title'];
    $content = nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8'));
    $facebook = $_POST['facebook'];

    mysqli_query($link, "INSERT INTO officials (title, content, facebook) VALUES ('$title', '$content', '$facebook')"); 
    header('location: manageofficials.php');
}

else if (isset($_POST['updateofficials'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8'));
    $facebook = $_POST['facebook'];

    mysqli_query($link, "UPDATE officials SET title='$title', content='$content', facebook='$facebook' WHERE id=$id");
    header('location: manageofficials.php');
}


?>

