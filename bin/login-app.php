<?php
    include dirname(__DIR__) . '/bin/conn.php';
    include_once dirname(__DIR__) . '/public/login-page/index.php';

    // Checking if users is submitted login
    if(isset($_POST['loginSubmit'])) {
        $userEmail = $_POST['userEmailLogin'];
        $userPass = $_POST['userPassLogin'];
        $queryPass = "SELECT * FROM user_login_information WHERE user_password = '$userPass'";

        // Query Connect
        $resultTakePass = mysqli_query($conn, $queryPass);
        if(mysqli_num_rows($resultTakePass) > 0) {
            while($data = mysqli_fetch_assoc($resultTakePass)) {
                if($data['user_email'] == $userEmail) {
                    session_start();
                    $sessionName = $data['user_name'];
                    $_SESSION['user-name'] = $sessionName;
                    header("Location: ../dashboard/");
                    mysqli_close($conn);
                }
            }
            while($data = mysqli_fetch_assoc($resultTakePass)) {
                if($data['user_email'] != $userEmail) {
                $errMsg = "Email is incorrect";
                echo "<script type='text/javascript'>alert('$errMsg');</script>";
                $_POST = array();
                break;
                }
            }
        } else {
            $errMsg = "Email or Password is incorrect or not registered";
            echo "<script type='text/javascript'>alert('$errMsg');</script>";
        }
    }

    // Checking if users is submitted register
    if(isset($_POST['regSubmit'])) {

        // POST Data from Register Form
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmailReg'];
        $userPass = $_POST['userPassReg'];

        // Register Query
        $query = "INSERT INTO user_login_information (user_name, user_email, user_password) VALUES ('$userName', '$userEmail', '$userPass')";

        // Starting Session
        session_start();
        $sessionName = $userName;
        $_SESSION['user-name'] = $sessionName;

        // Checking if Query return true
        if(mysqli_query($conn, $query)) {

            // Creating User only Tables
            $userTableName = $userName . '_invitation_data';
            $sql_tables = "CREATE TABLE $userTableName (
                id INT NOT NULL AUTO_INCREMENT,
                groom_name VARCHAR(255) NOT NULL,
                bride_name VARCHAR(255) NOT NULL,
                marriage_date DATE NOT NULL,
                reservation_date DATE NOT NULL,
                reservation_time TIME NOT NULL,
                reservation_place VARCHAR(255) NOT NULL,
                PRIMARY KEY (id)
                )";
                mysqli_query($conn_tables, $sql_tables);

                // Closing MySql Connection
                mysqli_close($conn_tables);
                mysqli_close($conn);

                // Moving Page
                header("Location: ../dashboard/");
        }
    }