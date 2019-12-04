<?php
$category_code = '';
$category_name = '';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_GET['id'])) {$category_code = $_GET['id'];}
    if(isset($_POST['category_name'])) {$category_name = $_POST['category_name'];}

    include_once '../database/database.php';
    $sql = "UPDATE category 
            SET category_code = '$category_code',
                category_name = '$category_name'
            WHERE category_code = $category_code";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    header('location: http://localhost/module-2/library_manager/category/displayCategory.php',true);
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
<h2>Edit category infomation</h2>
<div class="table">
    <form method="post" action="">
        <table>
            <tr>
                <td>Code</td>
                <td><?php if(isset($_GET['id'])) {$category_code = $_GET['id']; echo $category_code;} ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="category_name" size="20"></td>
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
