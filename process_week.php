<?php
require_once "conn.php";

$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $day = $_GET["day"];
    $report = $_POST[$day];
    $week_id = $_GET["week_id"];
    $matric_no = $_GET["matric_no"];
    echo $day.$report.$week_id.$matric_no;
    if (empty($day) OR empty($report) OR empty($week_id)) {
        echo "some inputs are missing.";
        return;
    }

    $stmt = $conn->prepare("UPDATE `weekly_report` SET `$day` = CASE WHEN `$day` IS NULL THEN ? ELSE `$day` END WHERE `week_id` = ? AND `matric_number` = ?");
     if (!$stmt) {
        $error = $conn->error;
        echo "Error saving report: An unexpected error occurred. Please try again later.";
        return;
    }

    
    $stmt->bind_param("sii", trim($report), $week_id, $matric_no);
    if ($stmt->execute()) {
        header("location: $previous");
    } else {
        $error = $stmt->error;
        error_log("Error executing SQL statement: " . $error);
        echo "Error saving report: An unexpected error occurred. Please try again later.";
    }
    
    $stmt->close();

}
else {
    echo "Invalid request method.";
}
