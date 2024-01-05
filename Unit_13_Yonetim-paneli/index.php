<?php
// Verilerimiz libs/variables.php icinde
require "libs/variables.php";
require "libs/functions.php";   

session_start();

if(isset($_SESSION["message"])) {
    echo "<div class='alert alert-danger mb-0 text-center'>".$_SESSION['message']."</div>";
    unset($_SESSION["message"]);
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
            <div class="col-3">
                <?php include "partials/_menu.php" ;?>               
            </div>

            <div class="col-9">
                <?php include "partials/_title.php" ;?>                
                <?php include "partials/_kurslist.php" ;?>            
            </div>
        </div>    
                                    
</div>
<?php include "partials/_footer.php" ;?>

