<?php
session_start();
include 'include/config.php'; // Database connection

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Encrypt password with MD5

    $sql = "SELECT id FROM tbadmin WHERE username = :username AND password = :password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_OBJ);

    if ($result) {
        $_SESSION['adminid'] = $result->id;
        header('Location: index.php'); // Redirect to admin dashboard
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<style>
  /* General Style */
body {
    background-color: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: 'Poppins', sans-serif;
}

/* Login Box Container */
.login-box {
    width: 360px;
    background-color: #fff;
    padding: 40px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    text-align: center;
}

/* Header */
.login-head {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Input Fields */
.form-group {
    margin-bottom: 20px;
    text-align: left;
}

.form-group label {
    font-weight: 500;
    margin-bottom: 5px;
    display: block;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 16px;
    transition: 0.3s;
}

/* Focus effect on inputs */
.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    outline: none;
}

/* Button Style */
.btn {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Error Message */
div[style*='color: red;'] {
    margin-bottom: 15px;
    font-size: 14px;
    background-color: #ffdddd;
    border: 1px solid #ff0000;
    padding: 10px;
    border-radius: 5px;
}

/* Responsive Design */
@media (max-width: 400px) {
    .login-box {
        width: 300px;
    }
}

</style>
<body class="app sidebar-mini rtl">
    <div class="login-box">
        <form method="POST" action="">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Admin Login</h3>
            <?php if (isset($error)) { echo "<div style='color: red;'>$error</div>"; } ?>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
