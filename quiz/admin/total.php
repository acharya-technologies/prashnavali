<?php require '../imp.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#d8b4fe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total |  <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="../../css/fonts.css">
    <script src="../../js/index.js"></script>
    <link rel="icon" type="image/x-icon" href="../../img/logo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<?php

if (isset($_GET['clrlog'])) {
    $q7 = "TRUNCATE $tbl_login";
    $con->query($q7);
    echo "<script>alert('Login Credentials Cleared.');
            location.href = './'</script>";
}
?>

<body class="bg-sky-100">
    <p align="center" class="Yatra text-center text-black"> || श्रीराम ||</p>
    <br>
    <h1 class="text-sky-500 text-3xl text-center Laila">Total Students</h1><br>


    <div class="text-lg border-2 border-sky-500 Poppins w-full m-auto lg:w-2/3">
        <div class="text-center flex items-center justify-evenly">
            <span class="p-2 m-1 font-bold bg-sky-300 w-full border-2 border-sky-500 rounded">Sr. No.</span>
            <span class="p-2 m-1 font-bold bg-sky-300 w-full border-2 border-sky-500 rounded">Username</span>
            <span class="p-2 m-1 font-bold bg-sky-300 w-full border-2 border-sky-500 rounded">Name</span>
        </div>


        <?php


        $sql = "SELECT * FROM $tbl_login";
        $query = mysqli_query($con, $sql);
        $i = 1;
        $entries = mysqli_num_rows($query);

        if ($entries > 0) {
            while ($val = mysqli_fetch_assoc($query)) {


                ?>
                <div class="text-center flex items-center justify-evenly">
                    <span class="p-2 m-1 font-bold bg-sky-100 w-full border-2 border-sky-500 rounded">
                        <?php echo $val['sno']; ?>
                    </span>

                    <span class="p-2 m-1 font-bold bg-sky-100 w-full border-2 border-sky-500 rounded">
                        <?php echo $val["username"]; ?>
                    </span>
                    <span class="p-2 m-1 font-bold bg-sky-100 w-full border-2 border-sky-500 rounded">
                        <?php echo $val["name"]; ?>
                    </span>
                </div>

                <?php
                $i++;
            }
        } ?>
    </div>
    <div
        class="bg-gray-200 px-2 py-1 right-0.5 border-t-2 border-l-2 border-gray-900 rounded fixed text-center z-20 bottom-1 text-xs Time">
        <a href="<?php echo $website; ?>">Powered by<span class="Gotu text-red-500 font-bold text-sm">
                प्रश्नावली</span><br></a>
    </div>
    <form autocomplete="off" method="get" action="" class="flex flex-col items-center justify-center mt-80 Poppins">
        <input type="submit" name="clrlog" value="Clear Login Cedentials"
            class="bg-red-100 border-2 border-red-600 hover:bg-red-600 hover:text-white text-red-600 py-1 px-4 rounded-lg"
            onclick="clrusr()"><br>
    </form>
    <br><br><br><br>