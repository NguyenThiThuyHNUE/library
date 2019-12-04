<?php
$book_id = '';
$book_name = '';
$category_code = '';
$author = '';
$quality  = '';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_GET['id'])) {$book_id = $_GET['id'];}
    if(isset($_POST['book_name'])) {$book_name = $_POST['book_name'];}
    if(isset($_POST['category_code'])) {$category_code = $_POST['category_code'];}
    $author = $_POST['author'];
    if(isset($_POST['quality'])) {$quality = $_POST['quality'];}

    include_once '../database/database.php';
    $sql = "UPDATE book 
            SET book_id = '$book_id',
                book_name = '$book_name',
                category_code = '$category_code',
                author = '$author',
                quality = '$quality'
            WHERE book_id = $book_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    header('location: http://localhost/module-2/library_manager/book/displayBook.php',true);

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
<h2>Edit book infomation</h2>
<div class="table">
    <form method="post" action="">
        <table>
            <tr>
                <td>ID</td>
                <td><?php if(isset($_GET['id'])) {$book_id = $_GET['id']; echo $book_id;} ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="book_name" size="20"></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><input type="number" name="category_code" size="20"></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><input type="text" name="author" size="20"></td>
            </tr>
            <tr>
                <td>Quality</td>
                <td><input type="number" name="quality" size="20"></td>
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
