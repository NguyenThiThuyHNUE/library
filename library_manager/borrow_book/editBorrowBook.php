<?php
$borrow_book_number = '';
$student_id = '';
$book_id = '';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_GET['id'])) {$borrow_book_number = $_GET['id'];}
    if(isset($_POST['student_id'])) {$student_id = $_POST['student_id'];}
    if(isset($_POST['book_id'])) {$book_id = $_POST['book_id'];}

    include_once '../database/database.php';
    $sql = "UPDATE borrow_book 
            SET borrow_book_number = '$borrow_book_number',
                student_id = '$student_id',
                book_id = '$book_id'
            WHERE borrow_book_number = $borrow_book_number";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    header('location: http://localhost/module-2/library_manager/borrow_book/displayBorrowBook.php',true);

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Manager</title>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php include '../layout/header.php'?>
<h2>Edit borrow book</h2>
<div class="table">
    <form method="post" action="">
        <table>
            <tr>
                <td>Number</td>
                <td><?php if(isset($_GET['id'])) {$borrow_book_number = $_GET['id']; echo $borrow_book_number;} ?></td>
            </tr>
            <tr>
                <td>Student ID</td>
                <td><input type="text" name="student_id" size="20"></td>
            </tr>
            <tr>
                <td>Book ID</td>
                <td><input type="text" name="book_id" size="20"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Update</button></td>
            </tr>
        </table>
    </form>
</div>
<?php include '../layout/footer.php'?>
</body>
</html>
