<!DOCTYPE html>
<?php
    session_start();
    include dirname(__DIR__, 2) . '/bin/conn.php';
    
    // Checking if a user is Logging out
    if(isset($_POST['logoutSubmit'])) {
        session_destroy();
        header('Location: ../login-page/');
    } else if(isset($_POST['signOutButton'])) {
        session_destroy();
        header('Location: ../login-page/');
    } else if(isset($_POST['login'])) {
        header('Location: ../login-page/');
    } 
    
    if(isset($_SESSION['user-name'])) {

        // Retrieve user's name by SESSION
        $userName = $_SESSION['user-name'];

        // Retrieve user's email
        $queryEmail = "SELECT user_email FROM user_login_information WHERE user_name = '$userName'";

        // Query Connect
        $result = mysqli_query($conn, $queryEmail);
        if(mysqli_num_rows($result) > 0) {
            while($data = mysqli_fetch_assoc($result)) {
                $userEmail = strval($data['user_email']);
            }
        } else {
            die();
        }
    }

    include dirname(__DIR__, 2) . '/bin/dashboard-app.php';
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
                    fontSize: {
                        '4.5xl' : '2.7rem',
                    },
                },
            },
        }
    </script>
    <title>Digital Invitation Maker | Made for Practice</title>
</head>
<body>
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
                        <p class="mt-2">
                            <?php
                                if(isset($_SESSION['user-name'])) {
                                    // Retrieve User's name by SESSION
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
                        <a href="../login-page/"><p class="ml-1 font-semibold text-center cursor-pointer text-blue-500">Sign In</p></a>';

                        // Prompt if user is logged in
                        $loginPromptYes = '<hr class="border-1 border-black w-32 mx-auto my-4 drop-shadow-xl shadow-black">
                        <a href="../"><p class="ml-1 font-semibold text-center cursor-pointer text-blue-500">Home</p></a>
                        <a href="./"><p class="ml-1 font-semibold text-center cursor-pointer text-blue-500">My Profile</p></a>
                        <a href="./"><p class="ml-1 font-semibold text-center cursor-pointer text-blue-500">Dashboard</p></a>
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
        <section class="mx-auto w-full mt-12 <?php if(isset($_SESSION['user-name'])) { echo 'block'; } else { echo 'hidden'; }  ?>"> 
            <p class="text-center m-1 mt-4 font-bold text-3xl">Welcome back<br><span class="text-blue-600"><?php echo $userName ?></span></p>
        </section>
        <section class="mx-auto w-full max-h-full h-full <?php if(isset($_SESSION['user-name'])) { echo 'block'; } else { echo 'hidden'; }  ?>">
            <div class="mx-6">
                <table>
                    <tbody>
                        <tr>
                            <form name="dashboardForm" method="post" class="text-left mt-4">
                                <td class="align-top">
                                    <table class="text-left">
                                        <tr>
                                            <th class="pr-4 py-2 align-top font-normal">
                                                <input type="submit" class="cursor-pointer" name="profileData" id="profileData" value="Profile">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="pr-4 py-2 align-top font-normal">
                                                <input type="submit" class="cursor-pointer" name="informationData" id="informationData" value="Information">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="pr-4 py-2 align-top font-normal">
                                                <input type="submit" class="cursor-pointer" name="othersData" id="othersData" value="Others">
                                            </th>
                                        </tr>
                                    </table>
                                </td>
                            </form>
                            <td class="pl-4 border-l-2 border-black/10">
                                <form action="./index.php" name="userInformationForm" method="POST">
                                    <table class="table-fixed <?php showTagProfile() ?>">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="p-1" for="username">Username :</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="bg-transparent p-1 border-b border-black/10" name="username" id="username" value="<?php echo $userName; ?>" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="p-1" for="userEmail">Email :</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                ><input type="text" class="bg-transparent p-1 border-b border-black/10" name="userEmail" id="userEmail" value="<?php echo $userEmail ?>" disabled>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="p-1 hidden" for="userOldPass">Old Password :</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="password" class="bg-transparent p-1 border-b border-black/10 hidden" name="userOldPass" id="userOldPass" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="p-1 hidden" for="userNewPass">New Password :</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="password" class="bg-transparent p-1 border-b border-black/10 hidden" name="userNewPass" id="userNewPass" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="p-1 hidden" for="userConfirmNewPass">Confirm New Password :</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="password" class="bg-transparent p-1 border-b border-black/10 hidden" name="userConfirmNewPass" id="userConfirmNewPass" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="submit" class="bg-blue-500 py-1 px-2 rounded-md text-white hover:bg-blue-600" name="edit_profile" id="edit_profile" value="Edit Profile"><br>
                                                    <input type="submit" class="bg-blue-500 mt-2 py-1 px-2 rounded-md text-white hover:bg-blue-600" name="changePass" id="changePass" value="Change Password">
                                                    <input type="submit" class="bg-blue-500 py-1 px-2 rounded-md text-white hover:bg-blue-600 hidden" name="cancelEditProfile" id="cancelEditProfile" value="Cancel">
                                                    <input type="submit" class="cursor-pointer bg-blue-500 py-1 px-2 rounded-md text-white hover:bg-blue-600 hidden" name="submitEditProfile" id="submitEditProfile" value="Submit">
                                                    <input type="submit" class="cursor-pointer bg-blue-500 py-1 px-2 rounded-md text-white hover:bg-blue-600 hidden" name="submitChangePass" id="submitChangePass" value="Submit">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table-fixed <?php showTagInformation() ?>">
                                        <?php
                                            // User's Table names
                                            $userTableName = $userName . '_invitation_data';

                                            // Checking is the table empty or not
                                            $queryCheck = "SELECT * FROM $userTableName";
                                            
                                            // Result 
                                            $result = mysqli_query($conn_tables, $queryCheck);
                                            if(mysqli_num_rows($result) < 1) {
                                                $groomName = "";
                                                $brideName = "";
                                                $marriageDate ="";
                                                $resDate = "";
                                                $resTime = "";
                                                $resPlace = "";
                                            } else {
                                                while($data = mysqli_fetch_assoc($result)) {
                                                    $groomName = $data['groom_name'];
                                                    $brideName = $data['bride_name'];
                                                    $marriageDate = $data['marriage_date'];
                                                    $resDate = $data['reservation_date'];
                                                    $resTime = $data['reservation_time'];
                                                    $resPlace = $data['reservation_place'];
                                                }
                                            }
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><label class="p-1" for="groomName">Groom's Name :</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="bg-transparent p-1 border-b border-black/10" name="groomName" id="groomName" value="<?php echo $groomName; ?>" disabled></td>
                                            </tr>
                                            <tr>
                                                <td><label class="p-1" for="brideName">Bride's Name :</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="bg-transparent p-1 border-b border-black/10" name="brideName" id="brideName" value="<?php echo $brideName; ?>" disabled></td>
                                            </tr>
                                            <tr>
                                                <td><label class="p-1" for="marriageDate">Marriage Date :</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="bg-transparent p-1 border-b border-black/10" name="marriageDate" id="marriageDate" value="<?php echo $marriageDate; ?>" disabled></td>
                                            </tr>
                                            <tr>
                                                <td><label class="p-1" for="reservationDate">Reservation Date :</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="bg-transparent p-1 border-b border-black/10" name="reservationDate" id="reservationDate" value="<?php echo $resDate; ?>" disabled></td>
                                            </tr>
                                            <tr>
                                                <td><label class="p-1" for="reservationTime">Reservation Time :</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="time" class="bg-transparent p-1 border-b border-black/10" name="reservationTime" id="reservationTime" value="<?php echo $resTime; ?>" disabled></td>
                                            </tr>
                                            <tr>
                                                <td><label class="p-1" for="reservationPlace">Reservation Place :</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="bg-transparent p-1 border-b border-black/10" name="reservationPlace" id="reservationPlace" value="<?php echo $resPlace; ?>" disabled></td>
                                            </tr>
                                            <tr>
                                                <td class="pt-2">
                                                    <input type="button" class="bg-blue-500 py-1 px-2 rounded-md text-white hover:bg-blue-600" name="editInformation" id="editInformation" value="Edit">
                                                    <input type="button" class="bg-blue-500 py-1 px-2 rounded-md text-white hover:bg-blue-600 hidden" name="cancelEditInformation" id="cancelEditInformation" value="Cancel">
                                                    <input type="submit" class="bg-blue-500 py-1 px-2 rounded-md text-white hover:bg-blue-600 hidden" name="submitEditInformation" id="submitEditInformation" value="Submit">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table-fixed <?php showTagOthers() ?>">
                                        <tbody>
                                            <tr>
                                                <td><label class="p-1" for="signOutButton">Sign out ?</label></td>
                                            </tr>
                                            <tr>
                                                <td class="pt-2">
                                                    <input type="submit" class="bg-blue-500 py-1 px-2 rounded-md text-white hover:bg-blue-600" name="signOutButton" id="signOutButton" value="Sign Out">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pt-4"><label class="p-1" for="deleteButton">Delete your account ?</label></td>
                                            </tr>
                                            <tr>
                                                <td class="pt-2">
                                                    <input type="submit" class="bg-blue-500 py-1 px-2 rounded-md text-white hover:bg-blue-600" name="deleteButton" id="deleteButton" value="Delete Account">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="mx-auto w-3/4 max-h-full h-full flex flex-col content-center justify-center <?php if(isset($_SESSION['user-name'])) { echo 'hidden'; } else { echo 'block'; }  ?>">
            <div>
                <h1 class="text-center m-1">You Haven't logged in, Please proceed to the login page.</h1>
                <form method="post" class="text-center mt-2">
                        <input type="submit" class="border border-blue-600 shadow-md shadow-black/20 w-24 h-8 mx-auto rounded-md bg-blue-500 hover:bg-blue-700 text-white" name="login" id="login" value="Sign In" required>
                </form>
            </div>
        </section>
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
    <script src="../../bin/js/page-cont.js"></script>
    <script src="../../bin/js/dashboard-app.js"></script>
</body>
</html>