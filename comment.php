<?php

require_once 'conn.php';

$week = $_POST['week'];
$comment = $_POST['comment'];
$matric_no = $_POST['matric_no'];

if (empty($week) || empty($comment) || empty($matric_no)) {
    echo "All fields are required";
    exit();
}

$week = (int)$week;
$matric_no = (int)$matric_no;

if ($week < 1 || $week > 18) {
    echo "Invalid week";
    exit();
}

if ($stmt = $conn->prepare("INSERT INTO comments (matric_number, week, comment) VALUES (?, ?, ?)")) {
    $stmt->bind_param("iis", $matric_no, $week, $comment);
    $stmt->execute();
    $stmt->close();
    echo "Comment added successfully";
} else {
    echo "Error adding comment";
}