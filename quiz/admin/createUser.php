<?php require '../imp.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Create Users |
        <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="../../css/fonts.css" />
    <script src="../../js/index.js"></script>
    <link rel="icon" type="image/x-icon" href="../../img/logo.jpeg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<div class="flex items-center justify-center min-h-screen Gotu bg-gray-100" id="create-user">
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
        <div class="flex items-center justify-center text-4xl text-blue-600 mb-4 fa fa-user-plus"></div>
        <h3 class="text-2xl font-bold text-center text-blue-600">Create New User</h3>
        <form action="" method="GET">
            <div class="mt-4">
                <div class="flex">
                    <input type="text" required name="name" placeholder="Enter Name"
                        class="w-full px-4 py-2 mt-2 focus:border-0 border focus:border-0 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                </div>
                <div class="mt-4">
                    <input type="number" name="regid" placeholder="Registration ID"
                        class="w-full px-4 py-2 mt-2 focus:border-0 border focus:border-0 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                </div><br>
                <select id="class" name="class" class="m-auto flex items-center justify-center w-full focus:outline-none w-40 border-blue-600 border text-center rounded" required />
                            <option value="">--Select Class--</option>
                            <option value="1">SY CO-B</option>
                            <option value="2">SY HA</option>
                            <option value="3">SY CO-A</option>
                            <option value="4">SY ME</option>
                            </select>
                <div class="flex items-baseline justify-between">
                    <input type="submit" name="create"
                        class="px-6 py-2 mt-4 text-blue-600 rounded hover:bg-blue-600 hover:text-white focus:bg-blue-600 focus:outline-none focus:text-white border-2 border-blue-600 m-auto"
                        value="Create" required />

                </div>
            </div>
        </form>
    </div>
</div>


<?php
if (isset($_GET['create'])) {
    $name = $_GET['name'];
    $regid = $_GET['regid'];
    $class = $_GET['class'];
    $query1 = "INSERT INTO $tbl_login (`name`,`username`,`class`) VALUES('$name','$regid','$class')";
    $result = $con->query($query1);
    if ($result)
        echo "<script>alert('User Created.!')</script>";
} 
  ?>