<?php
require '../imp.php'; 
$gpin=$_GET['gpin'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#d8b4fe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranks | <?php echo $title;?></title>
    <link rel="stylesheet" href="../../css/fonts.css">
    <script src="../../js/index.js"></script>
    <link rel="icon" type="image/x-icon" href="../../img/logo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<meta http-equiv="Refresh" content="1.5">

<body class="bg-violet-100">
    <p align="center" class="Yatra text-center text-black"> || श्रीराम ||</p>
    <?php

    $sql = "SELECT * FROM $tbl_usr WHERE gamepin='$gpin' ORDER BY marks DESC";
    $query = mysqli_query($con, $sql);
    $i = 1;
    $entries = mysqli_num_rows($query);

    if ($entries > 0) {
        ?>

        <br>
        <h1 class="text-violet-500 text-3xl text-center Laila ">Ranks</h1><br>
        <div class="text-lg border-2 border-violet-500 Poppins w-full m-auto lg:w-2/3">
            <div class="text-center flex items-center justify-evenly">
                <span class="p-2 m-1 font-bold bg-violet-300 w-full border-2 border-violet-500 rounded">Rank</span>
                <span class="p-2 m-1 font-bold bg-violet-300 w-full border-2 border-violet-500 rounded">Username</span>
                <span class="p-2 m-1 font-bold bg-violet-300 w-full border-2 border-violet-500 rounded">Name</span>
                <span class="p-2 m-1 font-bold bg-violet-300 w-full border-2 border-violet-500 rounded">Marks</span>
            </div>
            <?php
            while ($val = mysqli_fetch_assoc($query)) {


                ?>
                <div class="text-center flex items-center justify-evenly">
                    <span class="p-2 m-1 font-bold bg-violet-100 w-full border-2 border-violet-500 rounded">
                        <?php echo $i; ?>
                    </span>

                    <span class="p-2 m-1 font-bold bg-violet-100 w-full border-2 border-violet-500 rounded">
                        <?php echo $val["username"]; ?>
                    </span>
                    <span class="p-2 m-1 font-bold bg-violet-100 w-full border-2 border-violet-500 rounded">
                        <?php echo $val["name"]; ?>
                    </span>
                    <span class="p-2 m-1 font-bold bg-violet-100 w-full border-2 border-violet-500 rounded">
                        <?php echo $val["marks"]; ?>
                    </span>
                </div>

                <?php
                $i++;
            }
    } else if ($entries == 0) {
        echo '<div class="h-screen w-full flex bg-black text-white items-center justify-center text-3xl text-center Yatra"><h1>No Entry Yet..!</h1></div><br>';
    } ?>
    </div>
    <div
        class="bg-gray-200 px-2 py-1 right-0.5 border-t-2 border-l-2 border-gray-900 rounded fixed text-center z-20 bottom-1 text-xs Time">
        <a href="<?php echo $website; ?>">Powered by<span class="Gotu text-red-500 font-bold text-sm">
                प्रश्नावली</span><br></a>
    </div> <br><br><br><br>