<?php
// Verilerimiz libs/variables.php icinde
require "libs/variables.php";
require "libs/functions.php";   

?>
<?php

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $title = $_POST["title"];
        $subtitle = $_POST["subtitle"];
        $image = $_POST["image"];
        $dateAdded = $_POST["dateAdded"];

        kursAddition($kurse, $title, $subtitle, $image, $dateAdded);
    };    

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

