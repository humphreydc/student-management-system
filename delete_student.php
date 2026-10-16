<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(['success' => false, 'message' => 'Use POST'], 405);
}

$id = (int) ($_POST['id'] ?? 0);
if ($id <= 0) {
    respond(['success' => false, 'message' => 'Valid id is required'], 400);
}

$stmt = $conn->prepare('DELETE FROM students WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();

respond(['success' => true, 'message' => 'Student deleted']);
