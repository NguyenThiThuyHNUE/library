<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {$borrow_book_number = $_GET['id'];}
    include '../database/database.php';
    $sql = "DELETE FROM borrow_book
            WHERE borrow_book_number = $borrow_book_number";
    $conn->exec($sql);
    $conn = null;
    header('location: http://localhost/module-2/library_manager/borrow_book/displayBorrowBook.php',true);
}
?>