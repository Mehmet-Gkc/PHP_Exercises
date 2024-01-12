<?php

require "libs/variables.php";
require "libs/functions.php";   

?>
<?php include "partials/_header.php" ;?>
<?php include "partials/_navbar.php" ;?> 

<?php
    $usernameErr = $emailErr = $passwordErr = $repasswordErr =  "";
    $username = $email = $password = $repassword = "";


    if($_SERVER["REQUEST_METHOD"]=="POST") {      
    
        // Form Validation:
        // Username
        if(empty($_POST["username"])) {
            $usernameErr = "Sie müssen einen Benutzername schreiben";
        } elseif(strlen($_POST["username"] > 5 ) && strlen($_POST["username"] < 20 )) {
            $usernameErr = "Der Benutzername muss zwischen 5-20 Zeichen lang sein.";
        } elseif(!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST["username"])) {
            $usernameErr = "Benutzername sollte nur aus Zahlen, Buchstaben und Unterstrichen bestehen.";
        }
        else {
            $username = safe_html($_POST["username"]);
        };
        // Email
        if(empty($_POST["email"])) {
            $emailErr = "Sie müssen eine E-Mail schreiben";
        } elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "E-Mail ist fehlerhaft";
        } 
        else {
            $email = safe_html($_POST["email"]);
        }; 

        // Password
        if(empty($_POST["password"])) {
            $passwordErr = "Sie müssen einen Password schreiben";
        } else {
            $password = safe_html($_POST["password"]);
        };

        if($_POST["password"] != $_POST["repassword"]) {
            $repasswordErr = "Passwörter stimmen nicht überein";
        } else {
            $password = safe_html($_POST["password"]);
        };

        // Register
        if(empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($repasswordErr)) {
            include "libs/connection.php";
            $sql = "INSERT INTO usersTable(username,email,password) VALUES (?,?,?)";

            if($stmt = mysqli_prepare($baglanti, $sql)) {
                $param_username = $username;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

                if(mysqli_stmt_execute($stmt)) {
                    header("Location: login.php");
                } else {
                    echo mysqli_error($baglanti);
                    echo "<br>";
                    echo "Fehler";
                }
            }
        }
           
    }
?>

<div class="container my-3">

        <div class="row">
            <div class="col-12">
                <!-- Form icerisine novalidate yazarak, email kontrolünü html5 degil biz yapmis oluyoruz. -->
                <form action="register.php" method="post" novalidate>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
                        <div class="text-danger"><?php echo $usernameErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email;?>">
                        <div class="text-danger"><?php echo $emailErr; ?></div>
                    </div> 
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                        <div class="text-danger"><?php echo $passwordErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="repassword">Password wiederholen</label>
                        <input type="password" name="repassword" class="form-control">
                        <div class="text-danger"><?php echo $repasswordErr; ?></div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Kayit ol</button>
                </form>
                       
            </div>
        </div>    
                                    
</div>
<?php include "partials/_footer.php" ;?>

