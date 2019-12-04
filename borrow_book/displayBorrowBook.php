<?php
    include_once '../database/database.php';
    $stmt = $conn->prepare('SELECT * FROM borrow_book');
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    $conn = null
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>United</title>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php include '../layout/header.php'?>
<h2>Borrow Books List</h2>
<div class="table">
    <table>
        <tr>
            <th>Number</th>
            <th>Student ID</th>
            <th>Book ID</th>
            <th></th>
        </tr>

        <?php foreach($result as $item): ?>
            <tr>
                <td><?php echo $item['borrow_book_number']?></td>
                <td><?php echo $item['student_id']?></td>
                <td><?php echo $item['book_id']?></td>
                <td>
                    <span><a href="editBorrowBook.php?id=<?php echo $item['borrow_book_number']?>">Update</a></span>
                    <span><a href="deleteBorrowBook.php?id=<?php echo $item['borrow_book_number']?>">Delete</a></span>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
<a href="addBorrowBook.php" type="button">Add new borrow book</a>
<?php include '../layout/footer.php'?>
<?php  ?>
</body>
</html>
