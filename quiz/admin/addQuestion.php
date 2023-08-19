<?php
require '../imp.php';
$i = 1; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Add a Question | <?php echo $title; ?>
  </title>
  <link rel="stylesheet" href="../../css/fonts.css" />
  <script src="../../js/index.js"></script>
  <link rel="icon" type="image/x-icon" href="../../img/logo.jpeg" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-slate-100 text-slate-500">
  <p align="center" class="Yatra text-center text-black">|| श्रीराम ||</p>
  <form autocomplete="off" class="m-auto Poppins h-full w-full flex flex-col justify-center items-center"
    autocomplete="off" action="" method="post">
    <br /><br />
    <?php if (!isset($_POST['add']) && $_GET['create'] > 0) {
      while ($i <= $_GET['create']) { ?>
        <br>
        <input id="quen<?php echo $i; ?>" type="number" name="quen<?php echo $i; ?>" onchange="check()"
          class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded"
          value="<?php echo $i; ?>" required /><br />
        <input id="question<?php echo $i; ?>" name="question<?php echo $i; ?>"
          class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded"
          placeholder="Enter Question" onkeyup='replaceme(question<?php echo $i; ?>)' required /><br />
        <label>1) <input id="option<?php echo $i; ?>A" name="option<?php echo $i; ?>A"
            class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded"
            onkeyup='replaceme(option<?php echo $i; ?>A)' required /></label><br>
        <label>2) <input id="option<?php echo $i; ?>B" name="option<?php echo $i; ?>B"
            class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded"
            onkeyup='replaceme(option<?php echo $i; ?>B)' required /></label><br>
        <label>3) <input id="option<?php echo $i; ?>C" name="option<?php echo $i; ?>C"
            class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded"
            onkeyup='replaceme(option<?php echo $i; ?>C)' required /></label><br>
        <label>4) <input id="option<?php echo $i; ?>D" name="option<?php echo $i; ?>D"
            class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded"
            onkeyup='replaceme(option<?php echo $i; ?>D)' required /></label><br>
        <select id="select<?php echo $i; ?>" name="select<?php echo $i; ?>" onchange="check()"
          class="focus:outline-none w-40 bg-slate-200 border-2 border-slate-400 text-sm focus:border-slate-600 text-center rounded"
          required />
        <option value="">--Correct Option--</option>
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
        <option value="4">Option 4</option>
        </select>
        <br />
        <label>Don't Touch :-
          <input type="number" name="correct<?php echo $i; ?>" id="correct<?php echo $i; ?>" onchange="check()"
            class="w-10 focus:outline-none focus:border-slate-600 border-2 border-slate-400 rounded text-center"
            readonly /></label><br>
        <hr>
        <?php $i++;
      } ?>
      <input type="submit" onclick="check()" name="add"
        class="px-4 py-2 mx-auto border-2 border-slate-400 hover:bg-slate-400 hover:text-white bg-white text-slate-400 rounded focus:outline-none"
        value="Add Question" /><br /><br />
    </form>
  <?php }
    if (isset($_POST['add'])) {
      for ($i = 1; $i <= $_GET['create']; $i++) {
        $quen = $_POST["quen" . $i];
        $question = $_POST["question" . $i];
        $a = $_POST["option" . $i . "A"];
        $b = $_POST["option" . $i . "B"];
        $c = $_POST["option" . $i . "C"];
        $d = $_POST["option" . $i . "D"];
        $correct = $_POST["correct" . $i];
        $tmp1 = ($quen - 1) * 4 + 1;
        $tmp2 = ($quen - 1) * 4 + 2;
        $tmp3 = ($quen - 1) * 4 + 3;
        $tmp4 = ($quen - 1) * 4 + 4;
        $q1 = "INSERT INTO $tbl_que (`qno`,`question`,`correct`) VALUES ('$quen','$question','$correct');";
        $q2 = "INSERT INTO $tbl_ans (`ano`,`answer`,`que_no`) VALUES ('$tmp1','$a','$quen');";
        $q3 = "INSERT INTO $tbl_ans (`ano`,`answer`,`que_no`) VALUES ('$tmp2','$b','$quen');";
        $q4 = "INSERT INTO $tbl_ans (`ano`,`answer`,`que_no`) VALUES ('$tmp3','$c','$quen');";
        $q5 = "INSERT INTO $tbl_ans (`ano`,`answer`,`que_no`) VALUES ('$tmp4','$d','$quen');";
        $con->query($q1);
        $con->query($q2);
        $con->query($q3);
        $con->query($q4);
        $con->query($q5);
      }
      ?>
    <h1 class="m-auto h-screen w-screen font- text-center text-2xl Yatra">
      Inserted question no.
      <?php echo $quen; ?><br /><a href="./">Please, get back and refresh page before re-entering.</a>
    </h1>
  <?php } ?>
  <div
    class="bg-gray-200 px-2 py-1 right-0.5 border-t-2 border-l-2 border-gray-900 rounded fixed text-center z-20 bottom-1 text-xs Time">
    <a href="<?php echo $website; ?>">Powered by<span class="Gotu text-red-500 font-bold text-sm">
        प्रश्नावली</span><br></a>
  </div>
  <script>
    function check() {
      <?php for ($i = 1; $i <= $_GET['create']; $i++) { ?>
        correct<?php echo $i; ?>.value = parseInt(select<?php echo $i; ?>.value) + 4 * (parseInt(quen<?php echo $i; ?>.value) - 1);
      <?php } ?>
    }
    
    function replaceme(inputs) {
      inputs.value = inputs.value.replace(/["]/g, "&quot;");
      inputs.value = inputs.value.replace(/[']/g, "&apos;");
      inputs.value = inputs.value.replace(/[<]/g, "&lt;");
      inputs.value = inputs.value.replace(/[>]/g, "&gt;");
      inputs.value = inputs.value.replace(/[=]/g, "&equals;");
    }
  </script>


</body>