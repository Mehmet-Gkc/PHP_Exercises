<?php
    // Verilerimiz libs/variables.php icinde
    require "libs/variables.php";
    require "libs/functions.php";   
?>

<?php
    // Kurs ekleme fonksiyonunu index.php den buraya tasidik
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $title = $_POST["title"];
        $subtitle = $_POST["subtitle"];
        $image = $_POST["image"];
        $dateAdded = $_POST["dateAdded"];

        kursAddition($title, $subtitle, $image, $dateAdded);

        header("Location: index.php");
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
            <div class="col-12">
                <form action="index.php" method="post">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="subtitle">Untertitle</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="text" name="image" id="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="dateAdded">Datum</label>
                        <input type="text" name="dateAdded" id="dateAdded" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Hinzufügen</button>
                </form>
            </div>
        </div>    
                                    
</div>
<?php include "partials/_footer.php" ;?>

