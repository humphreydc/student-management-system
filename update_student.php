<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(['success' => false, 'message' => 'Use POST'], 405);
}

$id     = (int) ($_POST['id'] ?? 0);
$name   = trim($_POST['name']   ?? '');
$course = trim($_POST['course'] ?? '');
$email  = trim($_POST['email']  ?? '');

if ($id <= 0 || $name === '' || $course === '') {
    respond(['success' => false, 'message' => 'id, name and course are required'], 400);
}

$stmt = $conn->prepare('UPDATE students SET name = ?, course = ?, email = ? WHERE id = ?');
$stmt->bind_param('sssi', $name, $course, $email, $id);
$stmt->execute();

respond(['success' => true, 'message' => 'Student updated']);
