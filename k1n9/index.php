<?php require "../quiz/imp.php";
$i = 1; 
$present_tbl = "CREATE TABLE IF NOT EXISTS present_tables (`table_name` text NOT NULL);";
$con->query($present_tbl);
$gamepin_tbl = "CREATE TABLE IF NOT EXISTS gamepins (`gpin` int(50) NOT NULL,`title` TEXT NOT NULL);";
$con->query($gamepin_tbl);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>k1n9's Admin Page</title>
    <link rel="stylesheet" href="../css/fonts.css">
    <script src="../js/index.js"></script>
    <link rel="icon" type="image/x-icon" href="https://acharya-technologies.me/img/logo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body class="text-orange-900 bg-gray-800 h-full w-screen font-mono">
    <p align="center" class="Yatra text-center text-orange-500"> || जय श्रीराम ||</p> <!-- temporary testing -->
    <!-- temporary testing ends -->
    <form class="m-auto h-screen flex flex-col justify-center items-center" action="" method="GET" autocomplete="off">
        <input id="usr" name="tbl_usr"
            class="focus:outline-none focus:text-orange-500 w-96 px-2 py-1 bg-gray-900 border-2 border-orange-900 focus:border-orange-500 text-center rounded"
            placeholder="Enter User Table Name" onkeyup="replaceMe(tbl_usr);"><br> <input id=" que" name="tbl_que"
            class="focus:outline-none focus:text-orange-500 w-96 px-2 py-1 bg-gray-900 border-2 border-orange-900 focus:border-orange-500 text-center rounded"
            placeholder="Enter Question Table Name"
            onkeyup="replaceMe(tbl_que);"'><br> <input id="ans"            name="tbl_ans"            class="focus:outline-none focus:text-orange-500 w-96 px-2 py-1 bg-gray-900 border-2 border-orange-900 focus:border-orange-500 text-center rounded"            placeholder="Enter Answer Table Name" onkeyup="replaceMe(tbl_ans);"'><br>
        <input id="login" name="tbl_login"
            class="focus:outline-none focus:text-orange-500 w-96 px-2 py-1 bg-gray-900 border-2 border-orange-900 focus:border-orange-500 text-center rounded"
            placeholder="Enter Login Table Name" onkeyup="replaceMe(tbl_login);"><br> <input type="submit"
            onclick="this.value='Wait'" name="create"
            class="px-3 py-1.5 cursor-pointer mx-auto border-2 border-orange-500 hover:bg-orange-600 hover:text-white focus:bg-orange-600 focus:text-white bg-gray-900 text-orange-500 rounded focus:outline-none"
            value="Create New Tables" />
    </form>
    <?php if (isset($_GET['create'])) { 
        $crt_users = $_GET['tbl_usr'];
        $crt_question = $_GET['tbl_que'];
        $crt_answers = $_GET['tbl_ans'];
        $crt_login = $_GET['tbl_login'];
        $q1 = "CREATE TABLE $crt_answers (`ano` int(50) NOT NULL,`answer` text NOT NULL,`que_no` int(50) NOT NULL,`gamepin` int(15) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $q2 = "CREATE TABLE $crt_login (`sno` int(200) NOT NULL,`name` text NOT NULL,`username` varchar(500) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $q3 = "CREATE TABLE $crt_question (`qno` int(50) NOT NULL,`question` text NOT NULL,`correct` int(50) NOT NULL,`gamepin` int(15) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $q4 = "CREATE TABLE $crt_users (`id` int(11) NOT NULL,`name` text DEFAULT NULL,`class` text DEFAULT NULL,`username` varchar(100) NOT NULL,`marks` int(50) DEFAULT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
        $q5 = "ALTER TABLE $crt_login ADD PRIMARY KEY (`sno`), ADD UNIQUE KEY `username` (`username`);";
        $q6 = "ALTER TABLE $crt_users ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `rollno` (`username`);";
        $q7 = "ALTER TABLE $crt_login MODIFY `sno` int(200) NOT NULL AUTO_INCREMENT;";
        $q8 = "ALTER TABLE $crt_users MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
        $q9 = "ALTER TABLE $crt_question ADD `srno` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`srno`);";
        $q10 = "ALTER TABLE $crt_answers ADD `srno` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`srno`);";

        if ($crt_answers) {
            $con->query($q1);
            $final_query = "INSERT INTO present_tables (`table_name`) VALUES ('$crt_answers');";
            $con->query($final_query);
        }
        if ($crt_login) {
            $con->query($q2);
            $con->query($q5);
            $con->query($q7);
            $final_query = "INSERT INTO present_tables (`table_name`) VALUES ('$crt_login');";
            $con->query($final_query);
        }
        if ($crt_question) {
            $con->query($q3);
            $final_query = "INSERT INTO present_tables (`table_name`) VALUES ('$crt_question');";
            $con->query($final_query);
        }
        if ($crt_users) {
            $con->query($q4);
            $con->query($q6);
            $con->query($q8);
            $final_query = "INSERT INTO present_tables (`table_name`) VALUES ('$crt_users');";
            $con->query($final_query);
        }
    } ?>
    <?php if (isset($_GET['dlttbl'])) {
        $toDelete = $_GET['dlttbl'];
        $qDelete = "DROP TABLE $toDelete;";
        $qName = "DELETE FROM `present_tables` WHERE `table_name` = '$toDelete' ;";
        $con->query($qName);
        $con->query($qDelete);
    }
    $sql = "SELECT * FROM present_tables ORDER BY  table_name";
    $query = mysqli_query($con, $sql);
    $entries = mysqli_num_rows($query);
    if ($entries > 0) { ?>
        <br>
        <form action="" class="flex flex-col Yatra justify-center items-center " method="GET"> <select name="dlttbl"
                class="focus:outline-none focus:text-white  w-40 text-sm px-1 py-0.5 bg-gray-900 border-2 border-orange-900 focus:border-orange-500 text-center focus:text-left rounded"
                required>
                <option value="">---Delete Table---</option>
                <?php while ($val = mysqli_fetch_assoc($query)) { ?>
                    <option value="<?php echo $val['table_name']; ?>"><?php echo $i . ". " . $val["table_name"]; ?> </option>
                    <?php $i++;
                } ?>
            </select><br> <input type="submit" onclick="this.value='Deleting'" name="delete"
                class="px-1 py-0.5 cursor-pointer w-36 border-2 border-orange-500 hover:bg-orange-600 hover:text-white focus:bg-orange-600 focus:text-white bg-gray-900 text-orange-500 text-xs rounded focus:outline-none"
                value="Delete Table" /> <br><br> </form>
    <?php } ?>
    <script>        function replaceMe(inputs) { inputs.value = inputs.value.replace(/[ ]/g, "_"); inputs.value = inputs.value.replace(/[']/g, ""); inputs.value = inputs.value.replace(/[^A-Za-z_ 0-9']/g, ""); }</script>
</body>