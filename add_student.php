<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(['success' => false, 'message' => 'Use POST'], 405);
}

$name   = trim($_POST['name']   ?? '');
$course = trim($_POST['course'] ?? '');
$email  = trim($_POST['email']  ?? '');

if ($name === '' || $course === '') {
    respond(['success' => false, 'message' => 'Name and course are required'], 400);
}

$stmt = $conn->prepare('INSERT INTO students (name, course, email) VALUES (?, ?, ?)');
$stmt->bind_param('sss', $name, $course, $email);
$stmt->execute();

respond(['success' => true, 'message' => 'Student added']);
