<?php
if (!isset($SESSION)) {
    session_start();
}

include_once("connections/connection.php");
$conn = connection();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM student_users WHERE username = '$username' AND password = '$password'";

    $user = $conn->query($sql) or die($conn->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
</head>

<body>
    <h1>Login Page</h1>

    <form action="index.php" method="post">
        <label>Username</label>
        <input type="text" name="username" id="username">

        <label>Password</label>
        <input type="password" name="password" id="password">

        <button type="submit" name="submit">Login</button>
    </form>

</body>

</html>