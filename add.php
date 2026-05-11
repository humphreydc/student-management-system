<?php
include_once("connections/connection.php");
$conn = connection();

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $course = $_POST['course'];

    $sql = "INSERT INTO `students` (`name`, `course`) VALUES ('$name', '$course')";

    $conn->query($sql) or die($conn->error);

    echo header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">

        <label>Name</label>
        <input type="text" name="name" id="name">

        <label>Course</label>
        <input type="text" name="course" id="course">

        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>