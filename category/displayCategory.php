<?php
    include_once '../database/database.php';
    $stmt = $conn->prepare('SELECT * FROM category');
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
<h2>Categories</h2>
<div class="table">
    <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th></th>
        </tr>

        <?php foreach($result as $item): ?>
            <tr>
                <td><?php echo $item['category_code']?></td>
                <td><?php echo $item['category_name']?></td>
                <td>
                    <span><a href="editCategory.php?id=<?php echo $item['category_code']?>">Update</a></span>
                    <span><a href="deleteCategory.php?id=<?php echo $item['category_code']?>">Delete</a></span>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
<a href="addCategory.php" type="button">Add new category</a>
<?php include '../layout/footer.php'?>
<?php  ?>
</body>
</html>
