<?php

require "libs/variables.php";
require "libs/functions.php";   

?>
<?php include "partials/_header.php" ;?>
<?php include "partials/_navbar.php" ;?> 

<?php
    if($_SERVER["REQUEST_METHOD"]=="POST") {
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
    }
?>

<div class="container my-3">

        <div class="row">
            <div class="col-12">
                <form action="register.php" method="post">
                    <div class="mb-3">
                        <label for="username">Kullanici Adi</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" class="form-control">
                    </div> 
                    <div class="mb-3">
                        <label for="password">Parola</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="repassword">Parola Tekrar</label>
                        <input type="password" name="repassword" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="city">Sehir</label>
                        <select name="city" class="form-select">
                            <option value="-1" selected>Sehir Seciniz</option>
                            <option value="1">Trabzon</option>
                            <option value="2">Gaziantep</option>
                            <option value="3">Gümüshane</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hobbies">Hobbies</label>
                        <div class="form-check">
                            <input type="checkbox" name="hobbies[]" value="cinema" id="hobbies_0">
                            <label for="hobbies_0" class="form-check-label">Cinema</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="hobbies[]" value="spor" id="hobbies_1">
                            <label for="hobbies_1" class="form-check-label">Spor</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Kayit ol</button>
                </form>
                       
            </div>
        </div>    
                                    
</div>
<?php include "partials/_footer.php" ;?>

