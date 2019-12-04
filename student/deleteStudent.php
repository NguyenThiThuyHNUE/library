<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {$student_id = $_GET['id'];}
    include '../database/database.php';
    $sql = "DELETE FROM students
            WHERE student_id = $student_id";
    $conn->exec($sql);
    $conn = null;
    header('location: http://localhost/module-2/library_manager/student/displayStudent.php',true);
}
?>