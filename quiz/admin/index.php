<?php require '../imp.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Teacher | <?php echo $title; ?>
  </title>
  <link rel="stylesheet" href="../../css/fonts.css" />
  <script src="../../js/index.js"></script>
  <link rel="icon" type="image/x-icon" href="../../img/logo.jpeg" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-slate-100 text-slate-500">
  <p align="center" class="Yatra text-center text-black">|| श्रीराम ||</p>
  <div class="m-auto Poppins h-screen w-full flex flex-col justify-center items-center">
    <a href="temp.php"
      class="bg-slate-200 border-2 border-slate-600 hover:text-white px-5 py-1.5 rounded hover:bg-slate-600">Add a
      Question</a>
    <br> <a href="managedb.php"
      class="bg-slate-200 border-2 border-slate-600 hover:text-white px-5 py-1.5 rounded hover:bg-slate-600">Manage
      Database</a>
    <br><a href="total.php"
      class="bg-slate-200 border-2 border-slate-600 hover:text-white px-5 py-1.5 rounded hover:bg-slate-600">Total
      Users</a>
    <br><a href="createUser.php"
      class="bg-slate-200 border-2 border-slate-600 hover:text-white px-5 py-1.5 rounded hover:bg-slate-600">Create New
      User</a>
    <br><a href="ranks.php"
      class="bg-slate-200 border-2 border-slate-600 hover:text-white px-5 py-1.5 rounded hover:bg-slate-600">Open
      Ranking Page</a>
    <br />
  </div>



  <div
    class="bg-gray-200 px-2 py-1 right-0.5 border-t-2 border-l-2 border-gray-900 rounded fixed text-center z-20 bottom-1 text-xs Time">
    <a href="<?php echo $website; ?>">Powered by<span class="Gotu text-red-500 font-bold text-sm">
        प्रश्नावली</span><br /></a>
  </div>
  <br /><br /><br /><br />
  <script>
    function numQuestion() {
      let x = prompt("Enter number of question to enter ");
      if (x == null || x <= 0 || x > 20) { x = 1; }
      location.href = "addQuestion.php?create=" + x;
    }
  </script>