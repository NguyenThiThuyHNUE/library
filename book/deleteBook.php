<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {$book_id = $_GET['id'];}
    include '../database/database.php';
    $sql = "DELETE FROM book
            WHERE book_id = $book_id";
    $conn->exec($sql);
    $conn = null;
    header('location: http://localhost/module-2/library_manager/book/displayBook.php',true);
}
?>