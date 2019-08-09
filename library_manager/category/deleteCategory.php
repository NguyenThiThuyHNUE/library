<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {$category_code = $_GET['id'];}
    include '../database/database.php';
    $sql = "DELETE FROM category
            WHERE category_code = $category_code";
    $conn->exec($sql);
    $conn = null;
    header('location: http://localhost/module-2/library_manager/category/displayCategory.php',true);
}
?>