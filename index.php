<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<!-- 
<script>
    location.replace("quiz/home")
</script> -->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#fecdd3">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>प्रश्नावली</title>
  <link rel="stylesheet" href="./css/fonts.css">
  <script src="./js/index.js"></script>
  <link rel="icon" type="image/x-icon" href="img/pra-logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="bg-rose-50 Time">
  <p align="center" class="Yatra text-center pt-2 text-sm bg-red-200 text-black">|| श्रीराम ||</p>
  <header class="header-2 border-b-4 border-red-700 overflow-hidden w-screen">

    <nav class="bg-red-200 py-2 md:py-4 Poppins" id="home">
      <div class="container px-4 mx-auto md:flex md:items-center">

        <div class="flex justify-between items-center">
          <a href="#home" class="font-bold text-xl pb-1 border-b border-red-700 Gotu text-red-500">प्रश्नावली</a>
          <button class="border-2 border-solid border-red-800 px-3 py-1 rounded opacity-50 hover:opacity-75 md:hidden"
            id="navbar-toggle">
            <i class="fa font-bold text-red-800 text-2xl fa-bars"></i>
          </button>
        </div>

        <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
          <a href="#home"
            class="p-2 lg:px-4 md:mx-2 text-gray-800 rounded hover:bg-red-400 hover:text-white transition-colors duration-300">Home</a>
          <a href="#about"
            class="p-2 lg:px-4 md:mx-2 text-gray-800 rounded hover:bg-red-400 hover:text-white transition-colors duration-300">About</a>
          <a href="#features"
            class="p-2 lg:px-4 md:mx-2 text-gray-800 rounded hover:bg-red-400 hover:text-white transition-colors duration-300">Features</a>
          <a href="#demo"
            class="p-2 lg:px-4 md:mx-2 text-gray-800 rounded hover:bg-red-400 hover:text-white transition-colors duration-300">Demo</a>
          <a href="#contact"
            class="p-2 lg:px-4 md:mx-2 text-gray-800 rounded hover:bg-red-400 hover:text-white transition-colors duration-300">Contact</a>

        </div>
      </div>
    </nav>
  </header>

  <main class="w-screen overflow-x-hidden ">
    <div class="py-6 md:py-12">
      <div class="container px-4 mx-auto">
        <h1 class="text-center text-red-500 text-5xl font-bold Gotu">प्रश्नावली</h1>
        <h2 class="text-center text-red-400 text-3xl Yatra">यः जानाति सः पण्डितः |</h2>
      </div>
    </div>
    </div>

    <a class="container my-4 mx-auto Time text-black " id="about">
      <div class="flex flex-wrap -m-4">
        <div class="p-4 w-full">
          <div class="h-full bg-red-100 lg:w-1/2 w-11/12 mx-auto px-8 rounded-3xl border-4 border-red-700 text-justify">
            <span class="p-4 Yatra text-2xl flex justify-center text-red-600 border-b-4 border-red-700">ABOUT</span><br>
            <span class="leading-relaxed mb-6 text-lg text-justify font-medium">
              This quiz application is a platform that allows users to test their knowledge and challenge
              themselves with various categories of questions. With the motto
              <i class="font-bold Yatra">"यः जानाति सः
                पण्डितः |"</i>
              this application is designed to be an enjoyable and
              educational experience for students learning in various institutions . The platform features
              a wide range of categories, from general knowledge to curriculum subjects and everything in
              between, to fulfill to the need and interests of students.</span>
            <br><br>

          </div>
        </div>
      </div>
    </a>
    <br><br><br>
    <a class="container my-4 mx-auto Time text-black " id="features">
      <div class="flex flex-wrap -m-4">
        <div class="p-4 w-full">
          <div class="h-full bg-red-100 lg:w-1/2 w-11/12 mx-auto px-8 rounded-3xl border-4 border-red-700 text-justify">
            <span
              class="p-4 Yatra text-2xl flex justify-center text-red-600 border-b-4 border-red-700">FEATURES</span><br>
            <span class="leading-relaxed mb-6 text-lg text-justify font-medium">
              <ul class="list-decimal">
                <li>Users can take quizzes and compete against others in timed quizzes to see who can answer the most
                  questions correctly in the shortest amount of time.</li>
                <li>Prashnavali also offers a leaderboard that displays the top quiz takers in the current sessions.
                </li>
                <li>Prashnavali has admin panel to manage database for questions and answers also users.</li>
                <li>Prashnavali has basic level security for managing integrity.</li>
                <li>Website is completely costomizable with tons of varieties e.g. Logo, Tagline, Name, etc.</li>
                <li>We provide after delivery support if user or admin face any difficulty.</li>
              </ul>
            </span>
            <br>
          </div>
        </div>
      </div>
    </a><br><br>

    <a class="container my-4 mx-auto Time text-black " id="demo">
      <div class="flex flex-wrap -m-4">
        <div class="p-4 w-full">
          <div class="h-full bg-red-100 lg:w-1/2 w-11/12 mx-auto px-8 rounded-3xl border-4 border-red-700 text-justify">
            <span class="p-4 Yatra text-2xl flex justify-center text-red-600 border-b-4 border-red-700">DEMO</span>
            <div class="leading-relaxed mb-6 text-center text-xl font-medium">
              <br>If you want a demo then you should visit following sites :
              <ul class="list-disc flex flex-col items-center text-center">
                <li class="hover:underline hover:text-red-500 text-lg"><a href="./quiz/">Home Page</a></li>
                <li class="hover:underline hover:text-red-500 text-lg"><a href="./quiz/quiz.php">Quiz Page</a></li>
                <li class="hover:underline hover:text-red-500 text-lg"><a href="./quiz/admin/ranks.php">Ranking Page</a>
                </li>
                <li class="hover:underline hover:text-red-500 text-lg"><a href="./quiz/admin/">Admin Panel</a></li>

              </ul>

            </div>

          </div>
        </div>
      </div>
    </a><br><br><br>


    <a class="container my-4 mx-auto Time text-black " id="contact">
      <div class="flex flex-wrap -m-4">
        <div class="p-4 w-full">
          <div class="h-full bg-red-100 lg:w-1/2 w-11/12 mx-auto px-8 rounded-3xl border-4 border-red-700 text-justify">
            <span class="p-4 Yatra text-2xl flex justify-center text-red-600 border-b-4 border-red-700">CONTACT
              US</span><br>
            <span class="leading-relaxed mb-6 text-md text-center font-medium">
              <form class="flex flex-col justify-center mx-auto items-center lg:w-1/3" method="post"
                action="https://formsubmit.co/prashnavali@acharya-technologies.me">
                <label><input id="name" name="name" placeholder="Enter Your Name"
                    class="text-center border-2 py-1 w-80 Gotu rounded border-red-400 focus:outline-none focus:border-red-700 mb-2"
                    required></label>
                <label><input id="mobile" name="mobile" placeholder="Enter Your Mobile Number "
                    class="text-center border-2 py-1 w-80 Gotu rounded border-red-400 focus:outline-none focus:border-red-700 mb-2"
                    type="number" required></label>
                <label><input id="email" name="email" placeholder="Enter Your Email ID "
                    class="text-center border-2 py-1 w-80 Gotu rounded border-red-400 focus:outline-none focus:border-red-700 mb-2"
                    type="email"></label><br>
                <input type="submit"
                  class="bg-transparent py-1 px-2 rounded-lg Gotu font-bold border-2 border-red-600 hover:text-white hover:bg-red-600"
                  value="Contact Us"><br>
              </form>
              <h1 class="text-center Yatra text-red-700 text-2xl">OR</h1>

              <div class="text-3xl text-center flex flex-wrap justify-evenly">
                <div><a
                    class="text-green-500 hover:bg-green-500 hover:text-white w-12 h-12 flex items-center rounded-full justify-center"
                    href="https://wa.me/918208607477"><i class="fa fa-whatsapp"> </i> </a></div>
                <div><a
                    class="text-green-800 hover:bg-green-800 hover:text-white w-12 h-12 flex items-center rounded-full justify-center"
                    href="tel:+918208607477"><i class="fa fa-phone"> </i> </a></div>
                <div><a
                    class="text-amber-700 hover:bg-amber-700 hover:text-white w-12 h-12 flex items-center rounded-full justify-center"
                    href="mailto:k1n9@acharya-technologies.me"><i class="fa fa-envelope"></i> </a></div>
              </div>
              <br>

          </div>
        </div>
      </div>
    </a><br><br><br>
    <div class="relative text-sm w-screen text-center bottom-0 text-black text-center">--| Developed by
      <span class="Gotu text-orange-500 font-bold "><a href="http://acharya-technologies.github.io/">आचार्य <sub
            class="text-green-600">Technologies </sub></span>|--</a>
    </div><br>
    <script>
      let toggleBtn = document.querySelector("#navbar-toggle");
      let collapse = document.querySelector("#navbar-collapse");

      toggleBtn.onclick = () => {
        collapse.classList.toggle("hidden");
        collapse.classList.toggle("flex");
      };
      //document.ready = location.replace("#home");
    </script>