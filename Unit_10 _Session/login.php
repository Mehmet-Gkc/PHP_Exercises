<?php
// Verilerimiz libs/variables.php icinde
require "libs/variables.php";
require "libs/functions.php";   

session_start();

if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

// db_user["username"] ve db_user["password"] leri variables icinde array olarak tanimladik
    if($username == db_user["username"] && $password == db_user["password"]) {
        setcookie("auth[username]", db_user["username"], time() + (60 * 60 * 24));
        setcookie("auth[name]", db_user["name"], time() + (60 * 60 * 24));
        $_SESSION["message"] = $username." hat sich eingeloggt";
        header("Location: index.php"); // Burada yönlendirme islemi yaptik. Login olduktan sonra index.php sayfasina gidiyoruz
    } else {
        echo "<div class='alert alert-danger mb-0 text-center'>Das falsche Passwort oder der falsche Benutzername</div>";
    }
}

?>
<?php include "partials/_header.php" ;?>
<!-- 
    Aramayi _navbar.php icinde yapacagiz. 
    Yukarida variables.php icinden gelen verileri burada filtreleyip index.php de filtrelenmis gösterecegiz.
    Yukaridan asagiya okudugu icin, önce variables.php icinde verileri okuyor, sonra _navbar.php de filtreliyor.
-->
<?php include "partials/_navbar.php" ;?> 

<div class="container my-3">

        <div class="row">
            <div class="col-12">
            <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="username">Kullanici Adi</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username;?>">                
                    </div>
                    
                    <div class="mb-3">
                        <label for="password">Parola</label>
                        <input type="password" name="password" class="form-control">                       
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>
            </div>
        </div>    
                                    
</div>
<?php include "partials/_footer.php" ;?>

