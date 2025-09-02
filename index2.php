<?php
// Get inputs 
$name = isset($_GET['name']) ? $_GET['name'] : "Unknown Student";
$grade = isset($_GET['score']) ? (int)$_GET['score'] : 0;

// Determine grade and remarks
if ($score >= 95 && $score <= 100) {
    $grade = "A (Excellent)";
    $remark = "Outstanding Performance!";
} elseif ($score >= 90 && $score <= 94) {
    $grade = "B (Very Good)";
    $remark = "Great Job!";
} elseif ($score >= 85 && $score <= 89) {
    $grade = "C (Good)";
    $remark = "Good effort, keep it up!";
} elseif ($score >= 75 && $score <= 84) {
    $grade = "D (Needs Improvement)";
    $remark = "Work harder next time.";
} else {
    $grade = "F (Failed)";
    $remark = "You need to improve.";
}

// Display results
echo "Student Name: " . $name . "<br>";
echo "Score: " . $score . "<br>";
echo "Grade: " . $grade . "<br>";
echo "Remarks: " . $remark;
?>
    