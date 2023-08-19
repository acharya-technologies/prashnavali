<?php require "./imp.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#7dd3fc">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home |
        <?php echo $title; ?>
    </title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <script src="../js/index.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/logo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body class="bg-sky-50 Time">
    <p align="center" class="Yatra w-screen text-center bg-sky-100 text-black"> || श्रीराम ||</p>

    <!--header -->
    <header class="bg-sky-200 w-screen py-4 border-b-4 border-sky-700">
        <div class="flex justify-around items-center flex-col">
            <img class="aspect-square h-36" src="../img/logo.jpeg"><br>
            <span class="text-sky-600 text-2xl Gotu">Quizzeled !</span><br>
            <a href="quiz.php"
                class="bg-white rounded py-1 px-2 border-2 hover:text-white Gotu  hover:bg-sky-500 border-sky-500">Start
                Quiz Now</a>
        </div>
    </header>

    <!--main content -->
    <main class="bg-sky-50"><br>
        <div class="container p-6 mx-auto Time text-black ">
            <div class="flex flex-wrap -m-4">
                <div class="p-4 w-full">
                    <div
                        class="h-full bg-sky-100 lg:w-2/3 lg:mx-auto px-8 rounded-3xl border-4 border-sky-700 text-justify">

                        <!--	<p class="about"></p>-->

                        <span
                            class="p-4 Yatra text-xl flex justify-center text-sky-600 border-b-4 border-sky-700">MOTTO</span><br>
                        <span class="leading-relaxed mb-6 text-lg text-center font-medium">
                            A quiz application is a platform that allows users to test their knowledge and challenge
                            themselves with various categories of questions. With the motto <i class="font-black">"Quiz
                                on, expand your horizon"</i> this application is designed to be an enjoyable and
                            educational experience for students learning diploma in RIT, Islampur. The platform features
                            a wide range of categories, from general knowledge to curriculum subjects and everything in
                            between, to fulfill to the need and interests of students.</span>
                        <br><br>
                        <a class="flex items-center text-center justify-center">
                            <img alt="RIT" src="../img/logo.jpeg"
                                class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center justify-center">
                            <span class="flex-grow flex mb-4 flex-col pl-4">
                                <span class="title-font Time font-medium text-sky-700 text-lg">RIT Diploma
                                    Students</span>
                                <span class="text-gray-500 text-sm text-sky-400">-2023</span>
                            </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <div
        class="bg-gray-200 px-2 py-1 right-0.5 border-t-2 border-l-2 border-gray-900 rounded fixed text-center z-20 bottom-1 text-xs Time">
        <a href="<?php echo $website; ?>">Powered by<span class="Gotu text-red-500 font-bold text-sm">
                प्रश्नावली</span><br></a>
    </div> <br><br>




    <!--footer-->


    <br><br>
    <div class="w-screen flex justify-evenly Laila">
        <div
            class="bottom-0 z-10 w-screen flex justify-evenly z-20 bg-sky-300 border-t-4 border-sky-700  items-center py-1 relative -mx-2 footer">
            <a href="https://ritindia.edu"><img src="../img/favicon.ico" class="w-12 h-12 rounded-full">
                <a href="quiz.php" class="py-3 Gotu hover:text-sky-800">Start Quiz</a>

        </div>
    </div>