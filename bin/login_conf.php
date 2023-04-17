<?php
    
    include_once '../public/index.php';
    include 'conn.php';

    if(isset($_POST['submit_reg'])) {
        // Retrieve Data
        $userName = $_POST['name_reg'];
        $userEmail = $_POST['email_reg'];
        $userPass = $_POST['password_reg'];


        // Query lang
        $query = "INSERT INTO user_login_information (user_name, user_email, user_password) VALUES ('$userName', '$userEmail', '$userPass')";
        
        // Session Start
        session_start();
        $cookie_name = $userName;
        setcookie('username',  $cookie_name);
        if(!isset($_COOKIE["username"])) {
            echo "Cookie named " . $_COOKIE["username"] . " isn't connected!";
            die();
        }

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
                header("Location: ./dashboard/");
        }
    }
?>
