<?php require '../imp.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DBMS | <?php echo $title; ?>
  </title>
  <link rel="stylesheet" href="../../css/fonts.css">
  <script src="../../js/index.js"></script>
  <link rel="icon" type="image/x-icon" href="../../img/logo.jpeg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="bg-slate-100 text-slate-500">
  <p align="center" class="Yatra text-center text-black"> || श्रीराम ||</p>

  <?php
  if (!isset($_GET['clrusr']) && !isset($_GET['clrqna'])) { ?>
    <form autocomplete="off" method="get" action="" class="m-auto h-screen Gotu flex flex-col justify-center items-center">

      <label><a href="question.txt">
          <input type="submit" name="o-usr" value="Store User Data in Text File"
            class="bg-gray-200 border-2 border-gray-600 hover:bg-gray-600 hover:text-white text-gray-600 py-1 px-4 rounded-lg"></a>
      </label><br>

      <input type="submit" name="o-ans" value="Store Answers in Text File"
        class="bg-gray-200 border-2 border-gray-600 hover:bg-gray-600 hover:text-white text-gray-600 py-1 px-4 rounded-lg"><br>

      <input type="submit" name="o-que" value="Store Question in Text File"
        class="bg-gray-200 border-2 border-gray-600 hover:bg-gray-600 hover:text-white text-gray-600 py-1 px-4 rounded-lg"><br>

      <input type="submit" name="clrusr" value="Clear User Table"
        class="bg-red-100 border-2 border-red-600 hover:bg-red-600 hover:text-white text-red-600 py-1 px-4 rounded-lg"
        onclick="clrusr()"><br>

      <input type="submit" name="clrqna" value="Clear Questions and Answers"
        class="bg-red-100 border-2 border-red-600 hover:bg-red-600 hover:text-white text-red-600 py-1 px-4 rounded-lg"
        onclick="clrqna()"><br>

      <br>
    </form>

  <?php } ?>
  <?php

  if (isset($_GET['clrusr'])) {
    $sql = "SELECT * FROM $tbl_usr ORDER BY id";
    $result = $con->query($sql);
    $file = '../txt/users.txt';
    $data = '';
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data .= $row['id'] . "\t" . $row['name'] . "\t" . $row['username'] . "\t" . $row['marks'] . "\n\n";
      }
    }
    file_put_contents($file, $data);
    $q6 = "TRUNCATE $tbl_usr";
    $tmp = $con->query($q6);
    echo "<script>alert('Users Table Cleared.');</script>";
  }

  if (isset($_GET['clrqna'])) {
    $q7 = "TRUNCATE $tbl_que";
    $tmp = $con->query($q7);
    $q8 = "TRUNCATE $tbl_ans";
    $tmp = $con->query($q8);
    echo "<script>alert('Questions and Answers Table Cleared.');</script>";
  }

  if (isset($_GET["o-usr"])) {
    $sql = "SELECT * FROM $tbl_usr ORDER BY id";
    $result = $con->query($sql);
    $file = '../txt/users.txt';
    $data = '';
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data .= $row['id'] . "\t" . $row['name'] . "\t" . $row['username'] . "\t" . $row['marks'] . "\n\n";
      }
    }
    file_put_contents($file, $data);
  }


  if (isset($_GET["o-que"])) {
    $sql = "SELECT * FROM $tbl_que ORDER BY qno";
    $result = $con->query($sql);
    $file = '../txt/question.txt';
    $data = '';
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data .= $row['qno'] . "\t" . $row['question'] . "\n\n";
      }
    }
    file_put_contents($file, $data);
  }


  if (isset($_GET["o-ans"])) {
    $sql = "SELECT * FROM $tbl_ans ORDER BY que_no";
    $result = $con->query($sql);
    $file = '../txt/answer.txt';
    $data = '';
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data .= "Q." . $row['que_no'] . ") " . $row['answer'] . "\n";
      }
    }
    file_put_contents($file, $data);
  }



  if (isset($_GET['clrqna']) || isset($_GET['clrusr'])) { ?>

    <div class="m-auto h-screen w-screen text-center text-2xl Yatra "><a href="./"><br>Please, Get Back of This Page.</a>
    </div>

  <?php } ?>

  <div
    class="bg-gray-200 px-2 py-1 right-0.5 border-t-2 border-l-2 border-gray-900 rounded fixed text-center z-20 bottom-1 text-xs Time">
    <a href="<?php echo $website; ?>">Powered by<span class="Gotu text-red-500 font-bold text-sm">
        प्रश्नावली</span><br></a>
  </div> <br><br><br><br>