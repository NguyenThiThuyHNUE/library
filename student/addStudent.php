<?php
    $student_id = '';
    $student_name = '';
    $address = '';
    $email = '';
    $phone  = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['student_id'])) {$student_id = $_POST['student_id'];}
        if(isset($_POST['student_name'])) {$student_name = $_POST['student_name'];}
        if(isset($_POST['address'])) {$address = $_POST['address'];}
        $email = $_POST['email'];
        if(isset($_POST['phone'])) {$phone = $_POST['phone'];}

        include_once '../database/database.php';
        $sql = "INSERT INTO students (student_id, student_name, address, email, phone)
                VALUES ('$student_id', '$student_name', '$address', '$email', '$phone')";
        $conn->exec($sql);
        $conn = null;
        header('location: http://localhost/module-2/library_manager/student/displayStudent.php',true);
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
    <h2>Add new student</h2>
    <div class="table">
        <form method="post" action="">
            <table>
                <tr>
                    <td>ID</td>
                    <td><input type="number" name="student_id" size="20"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="student_name" size="20"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" size="20"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" size="20"></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" size="20"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">Add</button></td>
                </tr>
            </table>
        </form>
    </div>
    <?php include '../layout/footer.php'?>
</body>
</html>
