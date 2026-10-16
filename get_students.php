<?php
require 'db.php';

$result = $conn->query('SELECT id, name, course, email FROM students ORDER BY id DESC');
$students = $result->fetch_all(MYSQLI_ASSOC);

foreach ($students as &$s) {
    $s['id'] = (int) $s['id'];   // send id as a number, not a string
}

respond($students);
