<?php
    include_once '../database/database.php';
    $stmt = $conn->prepare('SELECT * FROM students');
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
    <h2>Students List</h2>
    <div class="table">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th></th>
            </tr>

            <?php foreach($result as $item): ?>
            <tr>
                <td><?php echo $item['student_id']?></td>
                <td><?php echo $item['student_name']?></td>
                <td><?php echo $item['address']?></td>
                <td><?php echo $item['email']?></td>
                <td><?php echo $item['phone']?></td>
                <td>
                    <span><a href="editStudent.php?id=<?php echo $item['student_id']?>">Update</a></span>
                    <span><a href="deleteStudent.php?id=<?php echo $item['student_id']?>">Delete</a></span>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>
    <a href="addStudent.php" type="button">Add new student</a>
    <?php include '../layout/footer.php'?>
    <?php  ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size > 2097152){
                $errors[]='File size must be excately 2 MB';
            }

            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"image/".$file_name);
                echo "Success";
            }else{
                print_r($errors);
            }
        }
    }
    ?>


    <div id="content">
        <form id="form_upload" method="POST" enctype="multipart/form-data">
            <input type="file" name="image"  id="fileUpload" >
            <input type="submit" name="submit" ><br/>
        </form>
        <?php
//        if (isset($flag) && $flag == true) {
//            ?>
<!--            <img src="--><?php //echo $target_file; ?><!--">-->
<!--            --><?php
//        }
        ?>
    </div>

</body>
</html>
