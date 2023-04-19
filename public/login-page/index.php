<!DOCTYPE html>
<?php
// Checking if a user is Logging out
if(isset($_POST['logoutSubmit'])) {
    setcookie('login-username', '', time() - 3600, '/');
    unset($_COOKIE['login-username']);
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
        include '../../bin/login-app.php';
    ?>
    <main class="max-h-full h-screen flex flex-col justify-center align-middle">
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
                        <p class="mt-2">You haven't signed in</p>
                    </div>
                    <hr class="border-1 border-black w-32 mx-auto my-4 drop-shadow-xl shadow-black">
                    <p class="text-center text-lg">Please sign in first</p>
                    <a href="./"><p class="ml-1 font-semibold text-center cursor-pointer text-blue-500">Sign In</p></a>
                    <hr class="border-1 border-black w-32 mx-auto my-4 drop-shadow-xl shadow-black">
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
                <a href="../"><img class="w-12" src="../../assets/pngegg.png" alt=""></a>
            </div>
            <div class="mr-1 w-12 h-12"></div>
        </nav>
        <section class="mx-auto w-3/4 <?php if(isset($_COOKIE['login-username'])) { echo 'block'; } else { echo 'hidden'; }  ?>">
            <h1 class="text-center m-1">You Currently logged in, Please Log out to proceed</h1>
            <form method="post" class="text-center mt-2">
                    <input type="submit" class="border border-blue-600 shadow-md shadow-black/20 w-24 h-8 mx-auto rounded-md bg-blue-500 hover:bg-blue-700 text-white" name="logoutSubmit" id="logoutSubmit" value="Log Out" required>
            </form>
        </section>
        <section class=" w-full max-w-full <?php if(isset($_COOKIE['login-username'])) { echo 'hidden'; } else { echo 'block'; } ?>" id="login-form">
            <h1 class="text-slate-600 text-center text-5xl font-bold leading-tight">Getting <span class="text-blue-500">Ready Your</span> Account</h1>
            <form method="post" name="user-login-form" class="mx-auto border-2 mt-4 border-slate-700 w-3/4 rounded-xl shadow-2xl shadow-black/20 h-auto">
                <table class="mx-auto border-spacing-4 border-separate">
                    <tr>
                        <td class="text-center">
                            <label for="userEmailLogin" class="text-center w-full inline-block">Email</label><br>
                            <input type="email" class="border-2 border-slate-700 rounded-md w-48 mt-1 h-8 mx-auto px-1" name="userEmailLogin" id="userEmailLogin" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <label for="userPassLogin" class="text-center w-full inline-block">Password</label><br>
                            <input type="password" class="border-2 border-slate-700 rounded-md w-48 mt-1 h-8 mx-auto px-1" name="userPassLogin" id="userPassLogin" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <input type="submit" class="border border-blue-600 shadow-md shadow-black/20 w-24 h-8 mx-auto rounded-md bg-blue-500 hover:bg-blue-700 text-white" name="loginSubmit" id="loginSubmit" value="Submit" required>
                        </td>
                    </tr>
                </table>
            </form>
            <p class="text-center mt-4">Doesn't have one? <a href="#register-form" class="text-blue-700 cursor-pointer" onclick="showRegisterForm()">Click Me!</a></p>
        </section>
        <section class=" w-full max-w-full <?php if(isset($_COOKIE['login-username'])) { echo 'hidden'; } else { echo 'hidden'; }; ?>" id="register-form">
            <h1 class="text-slate-600 text-center text-5xl font-bold leading-tight">Create <span class="text-blue-500">Your Own</span> Account</h1>
            <form method="post" name="user-register-form" class="mx-auto border-2 mt-4 border-slate-700 w-3/4 rounded-xl shadow-2xl shadow-black/20 h-auto">
                <table class="mx-auto border-spacing-4 border-separate">
                    <tr>
                        <td class="text-center">
                            <label for="userName" class="text-center w-full inline-block">Name</label><br>
                            <input type="text" class="border-2 border-slate-700 rounded-md w-48 mt-1 h-8 mx-auto px-1" name="userName" id="userName" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <label for="userEmailReg" class="text-center w-full inline-block">Email</label><br>
                            <input type="email" class="border-2 border-slate-700 rounded-md w-48 mt-1 h-8 mx-auto px-1" name="userEmailReg" id="userEmailReg" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <label for="userPassReg" class="text-center w-full inline-block">Password</label><br>
                            <input type="password" class="border-2 border-slate-700 rounded-md w-48 mt-1 h-8 mx-auto px-1" name="userPassReg" id="userPassReg" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <input type="submit" class="border border-blue-600 shadow-md shadow-black/20 w-24 h-8 mx-auto rounded-md bg-blue-500 hover:bg-blue-700 text-white" name="regSubmit" id="regSubmit" value="Submit" required>
                        </td>
                    </tr>
                </table>
            </form>
        </section>
    </main>
    <script>
        var loginForm = document.getElementById("login-form");
        var registerForm = document.getElementById("register-form");

        window.onhashchange = function () {
            console.log(`Current location is: ${window.location.href}`);
            if(window.location.href == "http://localhost/pwl_invitation_card/public/login-page/") {
                hideRegisterForm();
            } else if(window.location.href == "http://localhost/pwl_invitation_card/public/login-page/#register-form") {
                showRegisterForm();
            }
        }

        function showRegisterForm() {
            loginForm.classList.add("hidden");
            registerForm.classList.remove("hidden");
            window.location.href = "../../public/login-page/#register-form";
        }

        function hideRegisterForm() {
                loginForm.classList.remove("hidden");
                registerForm.classList.add("hidden");
        }
    </script>
    <script src="../../bin/js/page-cont.js"></script>
</body>
</html>