<?php
    include 'conn.php';
    include_once dirname(__DIR__) . '/public/login-page/index.php';

    // Checking if users is submitted login
    if(isset($_POST['loginSubmit'])) {
        $userEmail = $_POST['userEmailLogin'];
        $userPass = $_POST['userPassLogin'];
        $query = "SELECT * FROM user_login_information WHERE user_email = '$userEmail'";

        // Query Connect
        $resultTake = mysqli_query($conn, $query);
        if(mysqli_num_rows($resultTake) > 0) {
            while($data = mysqli_fetch_assoc($resultTake)) {
                if(strval($data['user_email']) == $userEmail) {
                    if(strval($data['user_password']) == $userPass) {
                        session_start();
                        $cookie_name = strval($data['user_name']);
                        setcookie('login-username', $cookie_name, 0, '/');
                        header("Location: ../dashboard/index.php");
                        mysqli_close($conn);
                    } else {
                        echo "Password is wrong!";
                    }
                } else {
                    echo "Email is wrong!";
                }
            }
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
        $cookie_name = $userName;
        setcookie('login-username', $cookie_name, 0, '/');

        // Opening MySql Connection
        mysqli_query($conn, $query);
        if(mysqli_query($conn, $query)) {

            // Creating User only Tables
            $userTableName = $userName . '_invitation_data';
            $sql_tables = "CREATE TABLE $userTableName (
                id INT NOT NULL AUTO_INCREMENT,
                groom_name VARCHAR(255) NOT NULL,
                bride_name VARCHAR(255) NOT NULL,
                marriage_date DATE NOT NULL,
                reservation_date DATE NOT NULL,
                reservation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                reservation_place VARCHAR(255) NOT NULL,
                PRIMARY KEY (id)
                )";
                mysqli_query($conn_tables, $sql_tables);

                // Closing MySql Connection
                mysqli_close($conn_tables);
                mysqli_close($conn);

                // Moving Page
                header("Location: ../dashboard/index.php");
        }
    }