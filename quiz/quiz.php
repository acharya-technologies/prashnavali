<?php
require 'imp.php';
$count = $userAccess = 0;

if (isset($_GET['gpin'])){
    $gpin = $_GET['gpin'];
    $rollno = $_GET['rollno'];
}
if (!isset($_POST['result'])) {
    ?>
    <?php if (isset($_GET['gpin'])) {
        $sql_query = "select count(*) as gpin from gamepins where gpin='$gpin';";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['gpin'];
        $sql_query2 = "select count(*) as username from $tbl_login where username='$rollno' and gamepin='$gpin' ;";
        $result2 = mysqli_query($con, $sql_query2);
        $row2 = mysqli_fetch_array($result2);
        $userAccess = $row2['username'];
    }
     ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="#fed7aa">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz | <?php echo $title; ?>
        </title>
        <link rel="stylesheet" href="../css/fonts.css">
        <script src="../js/index.js"></script>
        <link rel="icon" type="image/x-icon" href="../img/logo.jpeg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>



    <body class="text-black bg-orange-50 h-screen w-screen Time">
        <p align="center" class="Yatra text-center bg-orange-100 text-black"> || श्रीराम ||</p>
        <!-- default page -->
        <?php if ($count == 0 || $userAccess==0) {

            ?>
            <br><br>
            <form autocomplete="off" method="get" action="" class="mx-4 lg:m-auto lg:w-1/3" align="center">
                <?php if (isset($_GET['gpin']) && $count == 0) { ?><i class="text-xl text-red-500 Poppins ">No Quiz
                        Found.</i><br><br>
                <?php } ?>
                <?php if (isset($_GET['gpin']) && $userAccess == 0 && $count==1) { ?><i class="text-xl text-red-500 Poppins ">
                    You Don't Have Access.
                </i><br><br>
                <?php } ?>
                <div align="center"><input id="gpin" name="gpin" type="number" placeholder="Enter Quiz Pin"
                        class="text-center text-xl border-2 py-2 w-80 Gotu rounded border-orange-200 focus:outline-none focus:border-orange-500"
                        required></div><br>
                <div align="center">
                    <input id="rollno" type="number" name="rollno" placeholder="Enter Roll Number"
                        class="text-center text-xl border-2 py-2 w-80 Gotu rounded border-orange-200 focus:outline-none focus:border-orange-500"
                        required>
                </div><br>
                <input type="submit" name="checkpin" value="Start Quiz"
                    class="m-auto bg-transparent py-1 px-2 rounded-lg Gotu font-bold border-2 border-orange-400 hover:text-white hover:bg-orange-400"><br>


            </form>

        <?php } ?>
<!-- quiz starts after right quiz pin and user registration -->
        <?php if ($count == 1 && $userAccess == 1) {
            $sql = "SELECT * FROM gamepins WHERE gpin='$gpin'";
            $query = mysqli_query($con, $sql);
            $entries = mysqli_num_rows($query);
            while ($val = mysqli_fetch_assoc($query)) {

                ?>
                <br>
                <h1 class="text-center text-2xl Gotu text-orange-500 font-bold">

                </h1>
                <br>
                <form autocomplete="off" method="post" action="" class="m-auto mx-4 lg:mx-auto lg:w-1/3" id="form">
                    <h1 class="text-center text-2xl Gotu text-orange-500 font-bold">
                        <?php echo $val['title']; ?><br>
                    </h1><br>
                    <?php
                    for ($i = 1; $i <= 20; $i++) {
                        $sql = "SELECT * FROM $tbl_que where qno='$i' and  gamepin='$gpin';";
                        $result = mysqli_query($con, $sql);
                        $records = mysqli_num_rows($result);
                        if ($records > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <!--Question -->

                                <div class="bg-orange-100 question border-2 rounded-lg border-orange-500">

                                    <h2
                                        class="text-xl bg-orange-200 border-orange-500 rounded-tr-lg rounded-tl-lg border-b-2 py-2 px-4 font-bold">
                                        <?php echo $i . ". " . $row["question"]; ?>
                                    </h2>

                                    <!--Multiple Choice starts-->
                                    <div class="px-4 options py-2">
                                        <?php

                                        $sql2 = "SELECT * FROM $tbl_ans where que_no='$i' and  gamepin='$gpin' ORDER BY que_no";
                                        $result2 = mysqli_query($con, $sql2);
                                        $records2 = mysqli_num_rows($result2);
                                        if ($records2 > 0) {
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                ?>
                                                <label class="text-lg"> <input type="radio" value="<?php echo $row2['ano']; ?>"
                                                        name="final[<?php echo $row2['que_no']; ?>]" id="final[<?php echo $row2['que_no']; ?>]"> <?php echo $row2['answer']; ?></label><br>
                                            <?php }
                                        } ?>
                                    </div>
                                </div><br>
                            <?php }
                        }
                    } ?>
                    <input name="usrnm" type="hidden" value="<?php echo $username ?>">
                    <input name="name" type="hidden" value="<?php echo $name ?>">
                    <div align="center">
                        <input type="submit" id="result" onclick="refresh();" name="result"
                            class="bg-transparent py-1 px-2 rounded-lg Gotu font-bold border-2 border-orange-400 hover:text-white hover:bg-orange-400"
                            value="Submit">
                    </div>
                </form>
                <script>
                    window.onblur = submitform;
                    function submitform() {
                        // alert("Form submitted as you changed the window.");
                        // result.click();
                    }
                </script>
            <?php }
        }
}?>

<!-- for result after submission -->
<?php if (isset($_POST['result'])) { ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="theme-color" content="#fed7aa">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Result |
                <?php echo $title; ?>
            </title>
            <link rel="stylesheet" href="../css/fonts.css">
            <script src="../js/index.js"></script>
            <link rel="icon" type="image/x-icon" href="../img/logo.jpeg">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        </head>

        <?php

        $sql = "SELECT * FROM $tbl_que WHERE gamepin='$gpin';";
        $query = mysqli_query($con, $sql);
        $choice = $_POST['final'];
        $j = 1;
        $result = 0;
        $entries = mysqli_num_rows($query);
        if ($entries > 0) {
            while ($val = mysqli_fetch_assoc($query)) {
                if ($val['correct'] == $choice[$j]) {
                    $result++;
                }
                $j++;
            }
        } ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Result |
                <?php echo $title; ?>
            </title>
            <link rel="stylesheet" href="../css/fonts.css">
            <script src="../js/index.js"></script>
            <link rel="icon" type="image/x-icon" href="../img/logo.jpeg">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        </head>

        <body class="text-black Noto bg-teal-50 h-screen w-screen">
            <p align="center" class="Yatra text-center bg-teal-100 text-black"> || श्रीराम ||</p>
            <br>
            <h1 class="text-center text-2xl Gotu text-teal-500 font-bold">Result</h1>
            <br>
            <h1 class="text-center text-xl Gotu text-green-600 font-bold">Quiz submitted successfully.<br>Wait for
                results.<br>You will be redirected in 3 seconds</h1>

            <!-- <meta http-equiv="Refresh" content="3;url='./'"> -->
            <i id="result"></i>
            <br>

            <div
                class="bg-gray-200 px-2 py-1 right-0.5 border-t-2 border-l-2 border-gray-900 rounded fixed text-center z-20 bottom-1 text-xs Time">
                <a href="<?php echo $website; ?>">Powered by<span class="Gotu text-red-500 font-bold text-sm">
                        प्रश्नावली</span><br></a>
            </div> <br><br><br><br>

            <?php
            $queryLogin = "SELECT * FROM $tbl_login WHERE username='$rollno';";
            $query = mysqli_query($con, $queryLogin);
            $entries = mysqli_num_rows($query);

            if ($entries > 0) {while ($val = mysqli_fetch_assoc($query)) { $name=$val['name'];$username=$rollno;}}

            $q2 = "INSERT INTO $tbl_usr (`name`,`username`,`marks`,`gamepin`) VALUES ('$name','$username','$result','$gpin');";
            $ins = $con->query($q2);
            ?>
        <?php } ?>





        <!-- footer -->
        <div
            class="bg-gray-200 px-2 py-1 right-0.5 border-t-2 border-l-2 border-gray-900 rounded fixed text-center z-20 bottom-1 text-xs Time">
            <a href="<?php echo $website; ?>">Powered by<span class="Gotu text-red-500 font-bold text-sm">
                    प्रश्नावली</span><br></a>
        </div> <br><br><br><br>