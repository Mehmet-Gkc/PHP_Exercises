<?php
include "libs/connection.php";
require "libs/variables.php";
require "libs/functions.php";   





if(isLoggedIn()) {
    header("Location: index.php");
}

$usernameErr = $passwordErr = "";
$username = $password = $loginErr = "";

if(isset($_POST["login"])) {

    if(empty($_POST["username"])) {
        $usernameErr = "Sie müssen einen Username schreiben";
    } else {
        $username = safe_html($_POST["username"]);
    };

    if(empty($_POST["password"])) {
        $passwordErr = "Sie müssen einen Password schreiben";
    } else {
        $password = safe_html($_POST["password"]);
    };

    // Login kodlari
    if(empty($usernameErr) && empty($passwordErr)) {
        $sql = "SELECT id, username, password from usersTable WHERE username=?";

        if($stmt = mysqli_prepare($baglanti, $sql)) {
            mysqli_stmt_bind_param($stmt, "s" ,$username);

            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1) {
                    // parola kontrolü
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)) {
                        if(password_verify($password, $hashed_password)) {
                            $_SESSION["loggedIn"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            

                            header("Location: index.php");
                        } else {
                            $loginErr = "Password falsch";
                        }
                    }
                } else {
                    $loginErr = "Username falsch";
                }
                } else {
                    $loginErr = "Fehler";
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($baglanti);
        }
    }
?>

<?php

if(!empty($loginErr)) {
    echo "<div class='alert alert-danger'>".$loginErr."</div>";
}
?>

<?php include "partials/_header.php" ;?>
<?php include "partials/_navbar.php" ;?> 

<div class="container my-3">

        <div class="row">
            <div class="col-12">
            <form action="login.php" method="post">
            <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
                        <div class="text-danger"><?php echo $usernameErr; ?></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                        <div class="text-danger"><?php echo $passwordErr; ?></div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>
            </div>
        </div>    
                                    
</div>
<?php include "partials/_footer.php" ;?>

