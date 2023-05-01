<!DOCTYPE html>
<?php
    session_start();
    $dir = dirname(__DIR__);
    include $dir . '/bin/conn.php';
    // Checking if a user is Logging out
    if(isset($_POST['logoutSubmit'])) {
        session_destroy();
        header('Location: ./login-page/');
    } 
    if(isset($_SESSION['user-name'])) {
        // Retrieve user's name by SESSION
        $userName = $_SESSION['user-name'];
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://kit.fontawesome.com/ba0903e616.js" crossorigin="anonymous"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins'],
                    },
                },
            },
        }
    </script>
    <title>Digital Invitation Maker | Made for Practice</title>
</head>
<body>
    <?php
    ?>
    <main class="relative">
        <section id="menu-popup" class="max-w-full transition delay-1000 ease-in duration-1000 hidden max-h-full h-full w-full top-0 bg-black/30 flex-row">
            <div class="w-3/4 max-h-full h-full bg-white">
                <div class="p-2 cursor-pointer w-12 h-12" id="inner-burger-icon">
                    <svg class="w-12 h-12" data-v-17696d62="" viewBox="0 0 16 16" focusable="false" role="img" aria-label="list" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-list b-icon bi">
                        <g data-v-17696d62="">
                            <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                        </g>
                    </svg>
                </div>
                <div class="mt-6">
                    <div class="flex justify-center content-center flex-col flex-wrap">
                        <i class="fa-regular fa-user fa-4x mx-auto"></i>
                        <p class="mt-2">
                            <?php
                                if(isset($_SESSION['user-name'])) {
                                    $userName = $_SESSION['user-name'];
                                    echo "Welcome back, $userName";
                                } else if(!isset($_SESSION['user-name'])) {
                                    echo "You haven't signed in";
                                }
                            ?>
                        </p>
                    </div>
                    <?php
                        // Prompt if user is not logged in
                        $loginPromptNo = '<hr class="border-1 border-black w-32 mx-auto my-4 drop-shadow-xl shadow-black">
                        <p class="text-center text-lg">Please sign in first</p>
                        <a href="./login-page/"><p class="ml-1 font-semibold text-center cursor-pointer text-blue-500">Sign In</p></a>';

                        // Prompt if user is logged in
                        $loginPromptYes = '<hr class="border-1 border-black w-32 mx-auto my-4 drop-shadow-xl shadow-black">
                        <a href="./"><p class="ml-1 font-semibold text-center cursor-pointer text-blue-500">Home</p></a>
                        <a href="./dashboard/"><p class="ml-1 font-semibold text-center cursor-pointer text-blue-500">My Profile</p></a>
                        <a href="./dashboard/"><p class="ml-1 font-semibold text-center cursor-pointer text-blue-500">Dashboard</p></a>
                        <form method="post" class="text-center">
                            <input type="submit" class="ml-1 font-semibold text-center cursor-pointer text-blue-500" name="logoutSubmit" id="logoutSubmit" value="Sign Out">
                        </form>';

                        // Condition if SESSION is set, whether user is logged in or not
                        if(isset($_SESSION['user-name'])) {
                            echo "$loginPromptYes";
                        } else if(!isset($_SESSION['user-name'])) {
                            echo "$loginPromptNo";
                        }
                    ?>
                    <hr class="border-1 border-black w-32 mx-auto my-4 drop-shadow-xl shadow-black">`
                </div>
            </div>
            <div id="blank-space" class="w-1/4 max-h-full h-full"></div>
        </section>
        <nav id="navbar-fixed" class="container fixed flex justify-between align-middle top-0 bg-white/100 p-1">
            <div class="mt-1 ml-1 order-firsts cursor-pointer" id="outer-burger-icon">
                <svg class="w-12 h-12" data-v-17696d62="" viewBox="0 0 16 16" focusable="false" role="img" aria-label="list" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-list b-icon bi">
                    <g data-v-17696d62="">
                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                    </g>
                </svg>
            </div>
            <div class="mt-1">
                <a href="./"><img class="w-12" src="../assets/pngegg.png" alt=""></a>
            </div>
            <div class="mr-1 w-12 h-12"></div>
        </nav>
        <article>
            <section class="mt-16 max-w-xs mx-auto">
                <h1 class="font-bold text-center text-2xl font-poppins text-slate-600">Create, <span class="text-blue-500">Design</span>, Share</h1>
                <p class="text-center font-poppins mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit ex qui minus dolore quis, sunt nostrum corporis neque soluta officia. Fuga officia facilis ex iure?</p>
                <img class="mt-4 rounded-md" src="https://source.unsplash.com/random/?wedding" alt="Image Content">
            </section>
            <section class="mt-4 max-w-xs mx-auto text-center">
                <h1 class="font-bold text-center text-2xl font-poppins text-blue-500">Interested?</h1>
                <p class="text-center font-poppins mt-2">Just dive right in by clicking the button below!</p>
                <input type="button" class="bg-blue-700 hover:bg-blue-400 mt-2 px-5 py-1.5 rounded-2xl text-white font-bold shadow-md shadow-blue-800 mx-auto transition-all cursor-pointer" value="Make your card">
            </section>
            <section class="border-blue-400 border-2 mx-4 shadow-md shadow-slate-400 mt-8 rounded-lg bg-transparent p-4">
                <h1 class="font-bold text-2xl font-poppins text-blue-500">Everything <span class="text-slate-600">is easier.</span></h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt exercitationem doloremque tempore similique veniam. Asperiores veniam dignissimos cumque quidem et esse provident, neque velit nulla laudantium corrupti fugit nesciunt quisquam nihil fugiat sit culpa! Ut repellendus facilis reiciendis nihil dicta tempore incidunt, dignissimos animi magnam doloremque saepe excepturi quisquam rem?</p>
            </section>
        </article>
        <footer class="container mt-4 max-w-full w-full">
            <section class="shadow-lg shadow-black/20 p-2 bg-slate-600">
                <div class="pl-2 pt-2">
                    <h6 class="text-white font-poppins text-center">Copyright &#169; UMake Corp.</h6>
                </div>
                <div class="pl-2 pt-2 flex justify-center">
                    <a href="https://www.instagram.com/liushensimp/" target="_blank"><i class="fa-brands fa-instagram fa-2xl cursor-pointer mt-3 mx-2 text-white hover:text-white/20 transition-all"></i></a>
                    <a href="https://github.com/Zeinshirou04" target="_blank"><i class="fa-brands fa-square-github fa-2xl cursor-pointer mt-3 mx-2 text-white hover:text-white/20 transition-all"></i></a>
                </div>
                <div class="pl-2 pt-4">
                    <p class="text-white/50 bottom-0 text-center">This website is made on 4th April 2023.</p>
                </div>
            </section>
        </footer>
    </main>
    <script src="../bin/js/page-cont.js"></script>
</body>
</html>