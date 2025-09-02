<?php
// Get inputs 
$name = isset($_GET['name']) ? $_GET['name'] : "Unknown Student";
$grade = isset($_GET['grade']) ? (int)$_GET['grade'] : 0;

// Determine grade and remarks
if ($grade >= 95 && $grade <= 100) {
    $grade = "A (Excellent)";
    $remark = "Outstanding Performance!";
} elseif ($grade >= 90 && $grade <= 94) {
    $grade = "B (Very Good)";
    $remark = "Great Job!";
} elseif ($grade >= 85 && $grade <= 89) {
    $grade = "C (Good)";
    $remark = "Good effort, keep it up!";
} elseif ($grade >= 75 && $grade <= 84) {
    $grade = "D (Needs Improvement)";
    $remark = "Work harder next time.";
} else {
    $grade = "F (Failed)";
    $remark = "You need to improve.";
}

// Display results
echo "Student Name: " . $name . "<br>";
echo "grade: " . $grade . "<br>";
echo "Grade: " . $grade . "<br>";
echo "Remarks: " . $remark;
?>
    