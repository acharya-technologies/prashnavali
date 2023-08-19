<?php require '../imp.php'; 
if(isset($_GET['gpin'])) $gpin = $_GET['gpin'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="../../css/fonts.css" />
    <script src="../../js/index.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="icon" type="image/x-icon" href="../../img/logo.jpeg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <p align="center" class="Yatra text-center text-black"> || श्रीराम ||</p>
    <!-- delete game -->
    <?php if(isset($_GET['delete'])){
        $gpin = $_GET['delete'];
        $q1 = "DELETE FROM $tbl_que WHERE gamepin='$gpin';";
        $q2 = "DELETE FROM $tbl_ans WHERE gamepin='$gpin';";
        $q3 = "DELETE FROM gamepins WHERE gpin='$gpin';";
        $con->query($q1);
        $con->query($q2);
        $con->query($q3);
    }?>

    <!-- for main menu -->
    <?php if (!isset($_GET['action'])) { ?>
        <title>Temporary | <?php echo $title; ?></title>
        <form id="cards" class="grid md:grid-cols-3 grid-cols-1" action="" method="get">
        <?php
                    $sql = "SELECT * FROM gamepins;";
                    $result = mysqli_query($con, $sql);
                    $records = mysqli_num_rows($result);
                    $i=1;
                    if ($records > 0) {
                        while ($rowGamepin= mysqli_fetch_assoc($result)) {?>
                        <div class="w-full Gotu max-w-sm mx-auto my-4 bg-gray-100 border border-gray-200 rounded-lg shadow">
                <img class="p-2 rounded-t-lg" src="http://source.unsplash.com/1600x900/?<?php for($j=1;$j<=$i;$j++) echo "gradient,";?>" alt="<?php echo $rowGamepin['title']; ?>" />
                <div class="px-5 pb-5">
                    <h5 class="text-xl  text-gray-900 "><?php echo $rowGamepin['title'];?></h5>
                    <div class="flex mt-4 items-center justify-between ">
                        <input type="button" onclick="preview<?php echo $i;?>()"  name="action" class="px-4 py-2 text-green-500 rounded hover:bg-green-500 hover:text-white border-2 border-green-500" value="Preview"/>
                        <input type="submit" id="gpin<?php echo $i;?>" class="hidden" value="<?php echo $rowGamepin['gpin'];?>"/>
                        <input type="submit" name="action" class="px-4 py-2 text-blue-600 rounded hover:bg-blue-600 hover:text-white border-2 border-blue-600" value="Launch"/>
                    </div>
                </div>
            </div>
            <script>
              function preview<?php echo $i;?>() {
                location.href = "?action=Preview&gpin="+gpin<?php echo $i;?>.value;
            }
            </script>
            <?php $i++;}} ?>


            <div class="w-full Gotu max-w-sm mx-auto my-4 bg-gray-100 border border-gray-200 rounded-lg shadow">
                <svg part="svg" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" aria-labelledby="icon-add" focusable="false" viewBox="0 0 24 24" class="h-icon icon-primary aspect-video h-icon--no-custom-width"><!---->
                    <g>
                        <path fill="#9333ea" clip-rule="evenodd" d="M19 13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path>
                    </g>
                </svg>
                <div class="px-5 pb-5">
                    <h5 class="text-xl text-center text-gray-900 ">Create New Quiz</h5>
                    <div class="flex mt-8 items-center justify-center">
                        <input type="button" onclick="numQuestion()" name="action" class="px-4 py-2 text-purple-500 rounded hover:bg-violet-500 hover:text-white border-2 border-purple-500" value="New">
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
            $sql = "SELECT * FROM gamepins WHERE gpin='$gpin';";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($query);
            $questionCount = $row['total'];

            if (isset($_POST['update'])) {

                for ($i = 1; $i <= $questionCount; $i++) {
                    $sql = "SELECT * FROM $tbl_que where qno='$i' AND gamepin='$gpin'";
                    $result = mysqli_query($con, $sql);
                    $records = mysqli_num_rows($result);
                    if ($records > 0) {
                        while ($rowQuestion= mysqli_fetch_assoc($result)) {
                            $abc = $rowQuestion['qno'];
                        }
                        $quen = $_POST["quen" . $abc];
                        $quen = mysqli_real_escape_string($con, $quen);
                        $gamepin = $_POST["gamepin"];
                        $gamepin = mysqli_real_escape_string($con, $gamepin);
                        $gametitle = $_POST["gametitle"];
                        $gametitle = mysqli_real_escape_string($con, $gametitle);
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
                        $q2 = "UPDATE $tbl_que SET gamepin='$gamepin', question='$question',correct='$correct',qno='$quen' WHERE srno='$serQue';";
                        $q1 = "UPDATE $tbl_ans SET gamepin='$gamepin', answer='$ans' WHERE srno='$serAns';";
                        
                        $result = $con->query($q1);
                       
                        $con->query($q2);
                    }
                }
                $q3 = "UPDATE gamepins SET title='$gametitle' WHERE gpin='$gamepin';";
                $con->query($q3);
                if ($result) {
                    echo '<script>alert("Questions Updated Successfully")</script>';
                } else {
                    echo "<script>alert('error')</script>";
                }
            } ?>


            <!-- for preview of questions -->

            <form autocomplete="off" class="m-auto Poppins h-full bg-slate-100 w-full flex flex-col justify-center items-center" autocomplete="off" action="" method="post"><br>
            <?php
                    
                    $sql = "SELECT * FROM gamepins WHERE gpin='$gpin';";
                    $result = mysqli_query($con, $sql);
                    $records = mysqli_num_rows($result);
                    if ($records > 0) {
                        while ($rowGamepin= mysqli_fetch_assoc($result)) {?>
                <title>Preview - <?php echo $rowGamepin['title'];?></title>
                <label>Game Pin
                  <input value="<?php echo $gpin;?>" id="gamepin" type="number" name="gamepin" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" readonly/>
                  <i class="fa fa-refresh ml-3 text-xl motion-safe:hover:animate-spin text-gray-500" onclick="generatePin()"></i>
                  </label><br>
                <label class="-ml-10 pb-4 border-b-2 border-gray-500"> Game Title
                <input id="gameTitle" name="gametitle" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" value="<?php echo $rowGamepin['title'];?>"  onkeyup="replaceme(gameTitle)" required />
                </label><br><hr>
                
                <?php }} ?>
                <?php
                for ($i = 1; $i <= 20; $i++) {
                    $sql = "SELECT * FROM $tbl_que WHERE qno='$i' AND gamepin='$gpin';";
                    $result = mysqli_query($con, $sql);
                    $records = mysqli_num_rows($result);
                    if ($records > 0) {
                        while ($rowQuestion= mysqli_fetch_assoc($result)) {
                            $abc = $rowQuestion['qno']; ?>
                            <!--Question -->
                           
                            <input type="number" name="serialQuestion<?php echo $rowQuestion['qno']; ?>" value="<?php echo $rowQuestion['srno']; ?>" id="serialQuestion<?php echo $rowQuestion['qno']; ?>" class="w-10 hidden focus:outline-none focus:border-slate-600 border-2 border-slate-400 rounded text-center" readonly />
                            <input id="quen<?php echo $rowQuestion['qno']; ?>" type="number" min="1" max="20" name="quen<?php echo $rowQuestion['qno']; ?>" onchange="check<?php echo $rowQuestion['qno']; ?>()" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 rounded px-0 w-12 text-center pl-2" value="<?php echo $rowQuestion['qno']; ?>" required /><br>
                            <input id="question<?php echo $rowQuestion['qno']; ?>" name="question<?php echo $rowQuestion['qno']; ?>" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" value="<?php echo $rowQuestion['question']; ?>" onkeyup="replaceme(question<?php echo $rowQuestion['qno']; ?>)" required /><br>

                                <!--Multiple Choice starts-->
                            <div class=" px-4 py-2">
                                <?php
                                $sql2 = "SELECT * FROM $tbl_ans where que_no='$abc' AND gamepin='$gpin' ORDER BY que_no";
                                $result2 = mysqli_query($con, $sql2);
                                $records2 = mysqli_num_rows($result2);
                                if ($records2 > 0) {
                                    while ($rowAnswer = mysqli_fetch_assoc($result2)) { ?>
                                        <?php $t = ($rowAnswer['ano'] % 4);
                                        if ($t == 1)
                                            $t = 'A';
                                        else if ($t == 2)
                                            $t = 'B';
                                        else if ($t == 3)
                                            $t = 'C';
                                        else if ($t == 0)
                                            $t = 'D'; ?>

                                        <label>
                                            <input type="number" name="serialAnswer<?php echo $rowQuestion['qno']; ?>" value="<?php echo $rowAnswer['srno']; ?>" id=" serialAnswer<?php echo $rowQuestion['qno']; ?>" class="w-10 hidden focus:outline-none focus:border-slate-600 border-2 border-slate-400 rounded text-center" readonly /> <?php $x = ($rowAnswer['ano'] % 4); if ($x == 0) $x = 4; echo $x; ?>) 
                                            <input id="option<?php echo $i.$t ?>" name="option<?php echo $rowQuestion['qno']; ?>" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup='replaceme(option<?php echo $i . $t; ?>)' value="<?php echo $rowAnswer['answer']; ?>" required />
                                        </label><br><br>
                                    <?php }
                                } ?>
                            </div>

                            <select id="select<?php echo $rowQuestion['qno']; ?>" name="select<?php echo $rowQuestion['qno']; ?>" onchange="check<?php echo $rowQuestion['qno']; ?>()" class="focus:outline-none w-40 bg-slate-200 border-2 border-slate-400 text-sm focus:border-slate-600 text-center rounded" required />
                            <option value="">--Correct Option--</option>
                            <option value="1" <?php if ($rowQuestion['correct'] % 4 == 1) echo "selected"; ?>>Option 1</option>
                            <option value="2" <?php if ($rowQuestion['correct'] % 4 == 2) echo "selected"; ?>>Option 2</option>
                            <option value="3" <?php if ($rowQuestion['correct'] % 4 == 3) echo "selected"; ?>>Option 3</option>
                            <option value="4" <?php if ($rowQuestion['correct'] % 4 == 0) echo "selected"; ?>>Option 4</option>
                            </select><br>
                            <input type="number" name="correct<?php echo $rowQuestion['qno']; ?>" id="correct<?php echo $rowQuestion['qno']; ?>" class=" w-10 focus:outline-none focus:border-slate-600 border-2 border-slate-400 rounded text-center hidden" readonly />
                            <br>
                            <script>
                                document.ready = check<?php echo $rowQuestion['qno']; ?>();
                                function generatePin(){
                                    gamepin.value = Math.floor(1+Math.random()*10000);
                                }
                                function check<?php echo $rowQuestion['qno']; ?>() {
                                    correct<?php echo $rowQuestion['qno']; ?>.value = parseInt(select<?php echo $rowQuestion['qno']; ?>.value) + 4 * (parseInt(quen<?php echo $rowQuestion['qno']; ?>.value) - 1);
                                }</script>
                            </div>
                            </div><br>

                        <?php }
                    }
                } ?>
                <div align="center">
                    <input type="submit" id="update" onclick="refresh();" name="update" class="px-4 py-2 mx-auto border-2 border-slate-400 hover:bg-slate-400 hover:text-white focus:bg-slate-400 focus:text-white bg-white text-slate-400 rounded focus:outline-none" value="Update">
                </div><br>
                <input type="button" class="bg-red-100 border-2 border-red-600 hover:bg-red-600 hover:text-white text-red-600 py-1 px-4 rounded-md" value="Delete Game" onclick="deleteGame()">
                <br><br>
            </form>
            <script>
                let gpin = <?php echo $gpin;?>;
                function deleteGame(){
                    if(confirm("Are You Sure To Delete Quiz")){
                         location.href= "./temp.php?delete="+gpin;
                    }
                }
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
            $i = 1;$total=1; ?>
                <!-- for new questions -->
                <title>New Quiz</title>
                <form autocomplete="off" class="m-auto Poppins h-full w-full flex bg-gray-100 flex-col justify-center items-center" autocomplete="off" action="" method="post"> <br><br>
                

                    <?php if (!isset($_POST['add']) && $_GET['create'] > 0) {
                      ?>
                      <label>Game Pin
                  <input value="<?php echo $rowGamepin['gpin'];?>" id="gamepin" type="number" name="gamepin" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" readonly/>
                  <i class="fa fa-refresh ml-3 text-xl motion-safe:hover:animate-spin text-gray-500" onclick="generatePin()"></i>
                  </label><br>
                <label class="-ml-10 pb-4 border-b-2 border-gray-500"> Game Title
                <input id="gameTitle" name="gametitle" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup="replaceme(gameTitle);document.title=this.value;" required />
                </label><br><hr>
                      <?php
                      
                        while ($i <= $_GET['create']) { ?>
                            <br>
                            <input type="number" class="hidden" value="<?php echo $total++;?>" name="total">
                            <input id="quen<?php echo $i; ?>" min="1" max="20" type="number" name="quen<?php echo $i; ?>" onchange="check()" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" value="<?php echo $i; ?>" required /><br>
                            <input id="question<?php echo $i; ?>" name="question<?php echo $i; ?>" class=" focus:outline-none bg-slate-100 border-2 border-slate-400 focus:border-slate-600 text-center rounded" placeholder="Enter Question" onkeyup='replaceme(question<?php echo $i; ?>)' required /><br>
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
                        <input type="submit" onclick="check()" name="add" class="px-4 py-2 mx-auto btn btn-info border-2 border-slate-400 hover:text-white focus:bg-cyan-600 focus:text-white  text-slate-400 rounded focus:outline-none" value="Add Question" /><br><br>
                    </form>
                <?php }
                    if (isset($_POST['add'])) {
                        for ($i = 1; $i <= $_GET['create']; $i++) {
                            $total=$_POST['total'];
                            $quen = $_POST["quen" . $i];
                            $quen = mysqli_real_escape_string($con, $quen);
                            $question = $_POST["question" . $i];
                            $question = mysqli_real_escape_string($con, $question);
                            $gamepin = $_POST["gamepin"];
                            $gamepin = mysqli_real_escape_string($con, $gamepin);
                            $gametitle = $_POST["gametitle"];
                            $gametitle = mysqli_real_escape_string($con, $gametitle);
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
                            $q1 = "INSERT INTO $tbl_que (`qno`,`question`,`correct`,`gamepin`) VALUES ('$quen','$question','$correct','$gamepin');";
                            $q2 = "INSERT INTO $tbl_ans (`ano`,`answer`,`que_no`,`gamepin`) VALUES ('$tmp1','$a','$quen','$gamepin');";
                            $q3 = "INSERT INTO $tbl_ans (`ano`,`answer`,`que_no`,`gamepin`) VALUES ('$tmp2','$b','$quen','$gamepin');";
                            $q4 = "INSERT INTO $tbl_ans (`ano`,`answer`,`que_no`,`gamepin`) VALUES ('$tmp3','$c','$quen','$gamepin');";
                            $q5 = "INSERT INTO $tbl_ans (`ano`,`answer`,`que_no`,`gamepin`) VALUES ('$tmp4','$d','$quen','$gamepin');";
                            $con->query($q1);
                            $con->query($q2);
                            $con->query($q3);
                            $con->query($q4);
                            $con->query($q5);
                        }
                        $q6 = "INSERT INTO gamepins (`title`,`gpin`,`total`) VALUES ('$gametitle','$gamepin','$total');";
                        $insertedNewGame = $con->query($q6);
                        ?>
                    <h1 class="m-auto w-screen h-screen flex flex-col justify-center items-center text-gray-500  text-center text-2xl Yatra">
                        Inserted <?php echo $quen; ?> Questions.<br><a class="hover:underline" href="./tmp.php">Please, get back and refresh page before re-entering.</a>
                    </h1>
                <?php } ?>
                <div
                    class="bg-gray-200 px-2 py-1 right-0.5 border-t-2 border-l-2 border-gray-900 rounded fixed text-center z-20 bottom-1 text-xs Time">
                    <a href="<?php echo $website; ?>">Powered by<span class="Gotu text-red-500 font-bold text-sm">
                            प्रश्नावली</span><br></a>
                </div>
                <script>
                  document.ready = generatePin();
                  function generatePin(){
                                    gamepin.value = Math.floor(1+Math.random()*10000);
                                }
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