<?php

require "libs/variables.php";
require "libs/functions.php";   

?>
<?php include "partials/_header.php" ;?>
<?php include "partials/_navbar.php" ;?> 

<?php
    $usernameErr = $emailErr = $passwordErr = $repasswordErr = $cityErr = $hobbiesErr = "";
    $username = $email = $password = $repassword = $city = "";
    $hobbies = [];

    if($_SERVER["REQUEST_METHOD"]=="POST") {      
    
        // Form Validation:
        
        if(empty($_POST["username"])) {
            $usernameErr = "Sie müssen einen Benutzername schreiben";
        } else {
            $username = safe_html($_POST["username"]);
        };
        if(empty($_POST["email"])) {
            $emailErr = "Sie müssen eine E-Mail schreiben";
        } else {
            $email = safe_html($_POST["email"]);
        }; 
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

        if($_POST["city"] == -1) {
            $cityErr = "Sie müssen eine Stadt auswählen";
        } else {
            $city = $_POST["city"];
        };
        if(isset($_POST["hobbies"])) {
            $hobbiesErr = "Sie müssen das Hobby auswählen";
        } else {
            $hobbies = $_POST["hobbies"];
        };

        print_r($hobbies);
        
    /* 
        Form Validation olmadan asagidaki gibi yazilir. 

            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];
            $city = $_POST["city"];

            echo $username."<br>";
            echo $email."<br>";
            echo $password."<br>";
            echo $repassword."<br>";
            echo $city."<br>";

            foreach ($hobbies as $hobby) {
                echo $hobby."<br>";
            }

            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
    */
           
    }
?>

<div class="container my-3">

        <div class="row">
            <div class="col-12">
                <form action="register.php" method="post">
                    <div class="mb-3">
                        <label for="username">Kullanici Adi</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
                        <div class="text-danger"><?php echo $usernameErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email;?>">
                        <div class="text-danger"><?php echo $emailErr; ?></div>
                    </div> 
                    <div class="mb-3">
                        <label for="password">Parola</label>
                        <input type="password" name="password" class="form-control">
                        <div class="text-danger"><?php echo $passwordErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="repassword">Parola Tekrar</label>
                        <input type="password" name="repassword" class="form-control">
                        <div class="text-danger"><?php echo $repasswordErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="city">Sehir</label>
                        <select name="city" class="form-select">
                            <option value="-1" selected>Sehir Seciniz</option>

                            <?php foreach($städte as $kenntzeichen => $stadt): ?>
                                <option 
                                    value="<?php echo $kenntzeichen;?>"
                                    <?php echo $city == $kenntzeichen ? " selected" : "" ;?> >
                                    <?php echo $stadt ;?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                        <div class="text-danger"><?php echo $cityErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="hobbies">Hobbies</label>

                        <?php foreach($hobiler as $id => $hobby): ?>
                            <div class="form-check">
                                <input type="checkbox" name="hobbies[]" 
                                value="<?php echo $hobby;?>" 
                                id="hobbies_<?php echo $id;?>"
                                <?php if(in_array($hobby, $hobbies)) echo "checked";?>
                                >
                                <label for="hobbies_<?php echo $id ;?>" class="form-check-label"><?php echo $hobby ;?></label>
                            </div>
                        <?php endforeach; ?>                    
                        
                        <div class="text-danger"><?php echo $hobbiesErr; ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Kayit ol</button>
                </form>
                       
            </div>
        </div>    
                                    
</div>
<?php include "partials/_footer.php" ;?>

