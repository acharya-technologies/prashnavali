<?php require '../imp.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Temporary |
        <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="../../css/fonts.css" />
    <script src="../../js/index.js"></script>
    <link rel="icon" type="image/x-icon" href="../../img/logo.jpeg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <p align="center" class="Yatra text-center text-black"> || श्रीराम ||</p>
    <!-- for main menu -->
    <?php if (!isset($_GET['action'])) { ?>
        <form id="cards" class="md:flex-row flex flex-col flex-wrap flex-col-3 flex-row-2" action="" method="get">
            <div class="w-full Gotu max-w-sm mx-auto my-4 md:mx-4 bg-gray-100 border border-gray-200 rounded-lg shadow">
                <img class="p-2 rounded-t-lg" src="http://source.unsplash.com/1600x900/?gradient" alt="temporary image" />
                <div class="px-5 pb-5">
                    <h5 class="text-xl  text-gray-900 ">Quiz Title</h5>
                    <div class="flex mt-4 items-center justify-between">
                        <input type="submit" name="action" class="px-4 py-2 aspect-video text-green-500 rounded hover:bg-green-500 hover:text-white border-2 border-green-500" value="Preview">
                        <input type="submit" name="action" class="px-4 py-2 text-blue-600 rounded hover:bg-blue-600 hover:text-white border-2 border-blue-600" value="Launch">
                    </div>
                </div>
            </div>


            <div class="w-full Gotu max-w-sm mx-auto my-4 md:mx-4 bg-gray-100 border border-gray-200 rounded-lg shadow">
                <svg part="svg" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" aria-labelledby="icon-add" focusable="false" viewBox="0 0 24 24" class="h-icon icon-primary aspect-video h-icon--no-custom-width"><!---->
                    <g>
                        <path fill="#9333ea" clip-rule="evenodd" d="M19 13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path>
                    </g>
                </svg>
                <div class="px-5 pb-5">
                    <h5 class="text-xl text-center text-gray-900 ">Create New Quiz</h5>
                    <div class="flex mt-8 items-center justify-center">
                        <input type="button" onclick="numQuestion()" name="action" class="px-4 py-2 text-purple-500 rounded hover:bg-purple-500 hover:text-white border-2 border-purple-500" value="New">
                    </div>
                </div>
            </div>

        </form>
        <script>
            function numQuestion() {
                let x = prompt("Enter number of question to enter ");
                if (x == null || x <= 0 || x > 20) { x = 1; }
                location.href = "?action=New&create=" + x;
            }
        </script>

    <?php } ?>

    <?php
    if (isset($_GET['action'])) {

        if ($_GET['action'] == "Preview") { ?>
            <?php
            if (isset($_POST['update'])) {

                for ($i = 1; $i <= 5; $i++) {
                    $sql = "SELECT * FROM $tbl_que where qno='$i'";
                    $result = mysqli_query($con, $sql);
                    $records = mysqli_num_rows($result);
                    if ($records > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $abc = $row['qno'];
                        }
                        $quen = $_POST["quen" . $abc];
                        $quen = mysqli_real_escape_string($con, $quen);
                        $question = $_POST["question" . $abc];
                        $question = mysqli_real_escape_string($con, $question);
                        $ans = $_POST["option" . $abc];
                        $ans = mysqli_real_escape_string($con, $ans);
                        $correct = $_POST["correct" . $abc];
                        $correct = mysqli_real_escape_string($con, $correct);
                        $serAns = $_POST["serialAnswer" . $abc];
                        $serAns = mysqli_real_escape_string($con, $serAns);
                        $serQue = $_POST["serialQuestion" . $abc];
                        $serQue = mysqli_real_escape_string($con, $serQue);
                        $tmp1 = ($quen - 1) * 4 + 1;
                        $tmp2 = ($quen - 1) * 4 + 2;
                        $tmp3 = ($quen - 1) * 4 + 3;
                        $tmp4 = ($quen - 1) * 4 + 4;
                        $q2 = "UPDATE $tbl_que SET question='$question',correct='$correct',qno='$quen' WHERE srno='$serQue';";
                        $q1 = "UPDATE $tbl_ans SET answer='$ans' WHERE srno='$serAns';";
                        $result = $con->query($q1);
                        $result2= $con->query($q2);

                    }
                }
                if ($result) {
                    echo '<script>alert("Questions Updated Successfully")</script>';
                } else {
                    echo "<script>alert('error')</script>";
                }
            } ?>


            <!-- for preview of questions -->
            <form autocomplete="off" class="m-auto Poppins h-full bg-slate-100 w-full flex flex-col justify-center items-center"
                autocomplete="off" action="" method="post"><br>
                <label>Game Pin
                  <input id="gamepin" type="number" name="gamepin" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" readonly/>
                  <i class="fa fa-refresh ml-3 text-xl motion-safe:hover:animate-spin text-gray-500" onclick="generatePin()"></i>
                  </label><br>
                
                <?php
                for ($i = 1; $i <= 20; $i++) {
                    $sql = "SELECT * FROM $tbl_que WHERE qno='$i';";
                    $result = mysqli_query($con, $sql);
                    $records = mysqli_num_rows($result);
                    if ($records > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $abc = $row['qno']; ?>
                            <!--Question -->
                           
                            <input type="number" name="serialQuestion<?php echo $row['qno']; ?>" value="<?php echo $row['srno']; ?>" id="serialQuestion<?php echo $row['qno']; ?>" class="w-10 hidden focus:outline-none focus:border-slate-600 border-2 border-slate-400 rounded text-center" readonly />
                            <input id="quen<?php echo $row['qno']; ?>" type="number" min="1" max="20" name="quen<?php echo $row['qno']; ?>" onchange="check<?php echo $row['qno']; ?>()" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" value="<?php echo $row['qno']; ?>" required /><br>
                            <input id="question<?php echo $row['qno']; ?>" name="question<?php echo $row['qno']; ?>" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" value="<?php echo $row['question']; ?>" onkeyup="replaceme(question<?php echo $row['qno']; ?>)" required /><br>

                                <!--Multiple Choice starts-->
                            <div class=" px-4 py-2">
                                <?php
                                $sql2 = "SELECT * FROM $tbl_ans where que_no='$abc' ORDER BY que_no";
                                $result2 = mysqli_query($con, $sql2);
                                $records2 = mysqli_num_rows($result2);
                                if ($records2 > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                                        <?php $t = ($row2['ano'] % 4);
                                        if ($t == 1)
                                            $t = 'A';
                                        else if ($t == 2)
                                            $t = 'B';
                                        else if ($t == 3)
                                            $t = 'C';
                                        else if ($t == 0)
                                            $t = 'D'; ?>

                                        <label>
                                            <input type="number" name="serialAnswer<?php echo $row['qno']; ?>" value="<?php echo $row2['srno']; ?>" id=" serialAnswer<?php echo $row['qno']; ?>" class="w-10 hidden focus:outline-none focus:border-slate-600 border-2 border-slate-400 rounded text-center" readonly /> <?php $x = ($row2['ano'] % 4); if ($x == 0) $x = 4; echo $x; ?>) 
                                            <input id="option<?php echo $i.$t ?>" name="option<?php echo $row['qno']; ?>" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup='replaceme(option<?php echo $i . $t; ?>)' value="<?php echo $row2['answer']; ?>" required />
                                        </label><br><br>
                                    <?php }
                                } ?>
                            </div>

                            <select id="select<?php echo $row['qno']; ?>" name="select<?php echo $row['qno']; ?>" onchange="check<?php echo $row['qno']; ?>()" class="focus:outline-none w-40 bg-slate-200 border-2 border-slate-400 text-sm focus:border-slate-600 text-center rounded" required />
                            <option value="">--Correct Option--</option>
                            <option value="1" <?php if ($row['correct'] % 4 == 1) echo "selected"; ?>>Option 1</option>
                            <option value="2" <?php if ($row['correct'] % 4 == 2) echo "selected"; ?>>Option 2</option>
                            <option value="3" <?php if ($row['correct'] % 4 == 3) echo "selected"; ?>>Option 3</option>
                            <option value="4" <?php if ($row['correct'] % 4 == 0) echo "selected"; ?>>Option 4</option>
                            </select><br>
                            <input type="number" name="correct<?php echo $row['qno']; ?>" id="correct<?php echo $row['qno']; ?>" class=" w-10 focus:outline-none focus:border-slate-600 border-2 border-slate-400 rounded text-center" readonly />
                            <br>
                            <script>
                                document.ready = check<?php echo $row['qno']; ?>();
                                document.ready = generatePin();
                                function generatePin(){
                                    gamepin.value = Math.floor(1+Math.random()*10000);
                                }
                                function check<?php echo $row['qno']; ?>() {
                                    correct<?php echo $row['qno']; ?>.value = parseInt(select<?php echo $row['qno']; ?>.value) + 4 * (parseInt(quen<?php echo $row['qno']; ?>.value) - 1);
                                }</script>
                            </div>
                            </div><br>

                        <?php }
                    }
                } ?>
                <div align="center">
                    <input type="submit" id="result" onclick="refresh();" name="update"
                        class="px-4 py-2 mx-auto border-2 border-slate-400 hover:bg-slate-400 hover:text-white focus:bg-slate-400 focus:text-white bg-white text-slate-400 rounded focus:outline-none"
                        value="Update">
                </div><br><br><br>
            </form>
            <script>
                function replaceme(inputs) {
                    inputs.value = inputs.value.replace(/["]/g, "&quot;");
                    inputs.value = inputs.value.replace(/[']/g, "&apos;");
                    inputs.value = inputs.value.replace(/[<]/g, "&lt;");
                    inputs.value = inputs.value.replace(/[>]/g, "&gt;");
                    inputs.value = inputs.value.replace(/[=]/g, "&equals;");
                }
            </script>
            <div>
            <?php }
        if ($_GET['action'] == "New") {
            $i = 1; ?>
                <!-- for new of questions -->
                <form autocomplete="off" class="m-auto Poppins h-full w-full flex bg-gray-100 flex-col justify-center items-center" autocomplete="off" action="" method="post"> <br><br>
                    <?php if (!isset($_POST['add']) && $_GET['create'] > 0) {
                        while ($i <= $_GET['create']) { ?>
                            <br>
                            <input id="quen<?php echo $i; ?>" min="1" max="20" type="number" name="quen<?php echo $i; ?>" onchange="check()" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" value="<?php echo $i; ?>" required /><br>
                            <input id="question<?php echo $i; ?>" name="question<?php echo $i; ?>" class=" focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" placeholder="Enter Question" onkeyup='replaceme(question<?php echo $i; ?>)' required /><br>
                            <label>1) <input id="option<?php echo $i; ?>A" name="option<?php echo $i; ?>A" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup='replaceme(option<?php echo $i; ?>A)' required /></label><br>
                            <label>2) <input id="option<?php echo $i; ?>B" name=" option<?php echo $i; ?>B" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup='replaceme(option<?php echo $i; ?>B)' required />
                            </label><br>
                            <label>3) <input id="option<?php echo $i; ?>C" name=" option<?php echo $i; ?>C" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup='replaceme(option<?php echo $i; ?>C)' required />
                            </label><br>
                            <label>4) <input id="option<?php echo $i; ?>D" name=" option<?php echo $i; ?>D" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup='replaceme(option<?php echo $i; ?>D)' required />
                            </label><br>
                            <select id="select<?php echo $i; ?>" name="select<?php echo $i; ?>" onchange="check()" class="focus:outline-none w-40 bg-slate-200 border-2 border-slate-400 text-sm focus:border-slate-600 text-center rounded" required />
                            <option value="">--Correct Option--</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
                            </select>
                            <br>
                            <label>
                                <input type="number" name="correct<?php echo $i; ?>" id="correct<?php echo $i; ?>" onchange="check()" class="w-10 hidden focus:outline-none focus:border-slate-600 border-2 border-slate-400 rounded text-center" readonly /></label><br>
                            <hr>
                            <?php $i++;
                        } ?>
                        <input type="submit" onclick="check()" name="add" class="px-4 py-2 mx-auto border-2 border-slate-400 hover:bg-slate-400 hover:text-white focus:bg-slate-400 focus:text-white bg-white text-slate-400 rounded focus:outline-none" value="Add Question" /><br><br>
                    </form>
                <?php }
                    if (isset($_POST['add'])) {
                        for ($i = 1; $i <= $_GET['create']; $i++) {
                            $quen = $_POST["quen" . $i];
                            $quen = mysqli_real_escape_string($con, $quen);
                            $question = $_POST["question" . $i];
                            $question = mysqli_real_escape_string($con, $question);
                            $a = $_POST["option" . $i . "A"];
                            $a = mysqli_real_escape_string($con, $a);
                            $b = $_POST["option" . $i . "B"];
                            $b = mysqli_real_escape_string($con, $b);
                            $c = $_POST["option" . $i . "C"];
                            $c = mysqli_real_escape_string($con, $c);
                            $d = $_POST["option" . $i . "D"];
                            $d = mysqli_real_escape_string($con, $d);
                            $correct = $_POST["correct" . $i];
                            $correct = mysqli_real_escape_string($con, $correct);
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
                    <h1 class="m-auto w-screen text-gray-500 hover:underline text-center text-2xl Yatra">
                        Inserted question no.
                        <?php echo $quen; ?><br><a href="./">Please, get back and refresh page before re-entering.</a>
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
                        inputs.value = inputs.value.replace(/[<] /g, "&lt;");
                        inputs.value = inputs.value.replace(/[>]/g, "&gt;");
                        inputs.value = inputs.value.replace(/[=]/g, "&equals;");
                    }
                </script>
            <?php }
    } ?>
    </div>
</body>