<?php
    include dirname(__DIR__) . '/bin/conn.php';
    include_once dirname(__DIR__) . '/public/dashboard/index.php';

    function showTagProfile() {
        if(isset($_POST['profileData'])) {
            $_POST = array();
            echo "block";
        } else if(isset($_POST['informationData'])) {
            echo "hidden";
        } else if(isset($_POST['othersData'])) {
            echo "hidden";
        } else {
            echo "block";
        }
    }

    function showTagInformation() {
        if(isset($_POST['informationData'])) {
            $_POST = array();
            echo "block";
        } else {
            echo "hidden";
        }
    }

    function showTagOthers() {
        if(isset($_POST['othersData'])) {
            $_POST = array();
            echo "block";
        } else {
            echo "hidden";
        }
    }

    if(isset($_POST['submitEditProfile'])) {
        $currentUserName = $_POST['username'];
        $currentUserEmail = $_POST['userEmail'];

        $oldUserName = $_SESSION['user-name'];

        // Query Update for User Email or User Name
        $queryEmailUpdate = "UPDATE user_login_information SET user_email = '$currentUserEmail' WHERE user_name = '$oldUserName'";
        $queryNameUpdate = "UPDATE user_login_information SET user_name = '$currentUserName' WHERE user_email = '$currentUserEmail'";

        // Retrieve user's email
        $queryEmail = "SELECT user_email FROM user_login_information WHERE user_name = '$currentUserName'";

        if(($currentUserName != $oldUserName) && ($currentUserEmail != $userEmail)) {
            // Update User Email and User Name
            mysqli_query($conn, $queryEmailUpdate);

            // Taking user's new Name
            mysqli_query($conn, $queryNameUpdate);
            
            $queryName = "SELECT user_name FROM user_login_information WHERE user_email = '$currentUserEmail'";

            $result = mysqli_query($conn, $queryName);
            if(mysqli_num_rows($result) > 0) {
                while($data = mysqli_fetch_assoc($result)) {
                    $newUserName = strval($data['user_name']);
                }
            }

            // Query to change Table Name
            $userOldTableName = strtolower($oldUserName) . "_invitation_data";
            $userNewTableName = strtolower($currentUserName) . "_invitation_data";
            $queryTable = "RENAME TABLE $userOldTableName TO $userNewTableName";

            // Change the user table name
            mysqli_query($conn_tables, $queryTable);

            // Update Session
            $sessionName = $newUserName;
            $_SESSION['user-name'] = $sessionName;
            
            $message = "Email and Username has changed, Please wait a moment...";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('refresh: 1');
        } else if($currentUserName != $oldUserName) {

            // Update user's new Name
            mysqli_query($conn, $queryNameUpdate);

            // Query to change Table Name
            $userOldTableName = strtolower($oldUserName) . "_invitation_data";
            $userNewTableName = strtolower($currentUserName) . "_invitation_data";
            $queryTable = "RENAME TABLE $userOldTableName TO $userNewTableName";

            // Change the user table name
            mysqli_query($conn_tables, $queryTable);
            $sessionName = $currentUserName;
            $_SESSION['user-name'] = $sessionName;
            
            // Sending Message to User
            $message = "Username has changed, Please wait a moment...";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('refresh: 1');
        } else if($currentUserEmail != $userEmail) {

            // Update user's email
            mysqli_query($conn, $queryEmailUpdate);
            
            // Sending Message to User
            $message = "Email has changed, Please wait a moment...";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('refresh: 1');
        }
        $_POST = array();
    }

    // Checking whether user submit to change password or profile
    if(isset($_POST['submitChangePass'])) {
        $userOldPass = $_POST['userOldPass'];
        $userNewPass = $_POST['userNewPass'];
        $userConfirmNewPass = $_POST['userConfirmNewPass'];

        // Query to select user's old passs
        $queryPass = "SELECT user_password FROM user_login_information WHERE user_name = '$userName'";
        
        // Query Connect and retrieve result
        $resultTake = mysqli_query($conn, $queryPass);
        if(mysqli_num_rows($resultTake) > 0) {
            while($data = mysqli_fetch_assoc($resultTake)) {
                $userPass = $data['user_password'];
            }
        }

        // Password Checking
        if($userPass != $userOldPass) {
            $message = "Old Password is Incorrect";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else if ($userPass == $userOldPass) {
            $message = "Change Password Succesfull";

            // Change Var queryPass to Update
            $queryPass = "UPDATE user_login_information SET user_password = '$userNewPass' WHERE user_name = '$userName'";

            // Update Password 
            mysqli_query($conn, $queryPass);
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        $_POST = array();
    }

    // Checking whether a user submitted to change information
    if(isset($_POST['submitEditInformation'])) {
        // Receive data from Submit
        $groomName = $_POST['groomName'];
        $brideName = $_POST['brideName'];
        $marriageDate = $_POST['marriageDate'];
        $resDate = $_POST['reservationDate'];
        $resTime = $_POST['reservationTime'];
        $resPlace = $_POST['reservationPlace'];

        // User's Table name
        $userTableName = strtolower($userName) . '_invitation_data';
        echo $userTableName;

        // Query Update into user's only table
        $queryInformation = "UPDATE $userTableName SET groom_name = '$groomName', bride_name = '$brideName', marriage_date = '$marriageDate', reservation_date = '$resDate', reservation_time = '$resTime', reservation_place = '$resPlace' WHERE id = 1";

        // Checking is the table empty or not
        $queryCheck = "SELECT * FROM $userTableName";
        
        // Result 
        $result = mysqli_query($conn_tables, $queryCheck);
        if(mysqli_num_rows($result) < 1) {
            // Query Insert into user's only table
            $queryInformation = "INSERT INTO $userTableName (groom_name, bride_name, marriage_date, reservation_date, reservation_time, reservation_place) VALUES ('$groomName', '$brideName', '$marriageDate', '$resDate', '$resTime', '$resPlace')";

            // Connect Database
            mysqli_query($conn_tables, $queryInformation);

            // Taking New Result
            $result = mysqli_query($conn_tables, $queryCheck);
            if(mysqli_num_rows($result) > 0) {
                while($data = mysqli_fetch_assoc($result)) {
                    $groomName = $data['groom_name'];
                    $brideName = $data['bride_name'];
                    $marriageDate = $data['marriage_date'];
                    $resDate = $data['reservation_date'];
                    $resTime = $data['reservation_time'];
                    $resPlace = $data['reservation_place'];
                }
            }

            // Sending Message to User
            $message = "New Information has updated, Please wait a moment...";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('refresh: 1');
        } else {
            // Update Information data
            mysqli_query($conn_tables, $queryInformation);

            // Taking Data
            while($data = mysqli_fetch_assoc($result)) {
                $groomName = $data['groom_name'];
                $brideName = $data['bride_name'];
                $marriageDate = $data['marriage_date'];
                $resDate = $data['reservation_date'];
                $resTime = $data['reservation_time'];
                $resPlace = $data['reservation_place'];
            }

            // Sending Message to User
            $message = "Information has updated, Please wait a moment...";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('refresh: 1');
        }
    }
?>