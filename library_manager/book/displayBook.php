<?php
    include_once '../database/database.php';
    $stmt = $conn->prepare('SELECT * FROM book');
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
<h2>Books List</h2>
<div class="table">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Author</th>
            <th>Quality</th>
            <th></th>
        </tr>

        <?php foreach($result as $item): ?>
            <tr>
                <td><?php echo $item['book_id']?></td>
                <td><?php echo $item['book_name']?></td>
                <td><?php echo $item['category_code']?></td>
                <td><?php echo $item['author']?></td>
                <td><?php echo $item['quality']?></td>
                <td>
                    <span><a href="editBook.php?id=<?php echo $item['book_id']?>">Update</a></span>
                    <span><a href="deleteBook.php?id=<?php echo $item['book_id']?>">Delete</a></span>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
<a href="addBook.php" type="button">Add new book</a>
<?php include '../layout/footer.php'?>
<?php  ?>
</body>
</html>
