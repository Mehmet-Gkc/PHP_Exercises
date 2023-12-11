<?php

require "libs/variables.php";
require "libs/functions.php";   

?>
<?php include "partials/_header.php" ;?>
<?php include "partials/_navbar.php" ;?> 

<?php
    session_start();

    $id = $_GET["id"];
    $sonuc = getCategoryById($id);
    $selectedCategory = mysqli_fetch_assoc($sonuc);


    $kategorie = $kategorieErr = "";


    if($_SERVER["REQUEST_METHOD"]=="POST") {      
    
        // Form Validation:
        
        if(empty($_POST["kategorie"])) {
            $kategorieErr = "Sie müssen eine kategorie schreiben";
        } else {
            $kategorie = safe_html($_POST["kategorie"]);
        };
        
        if(empty($kategorieErr)) {
            if(editCategory($id, $kategorie)) {
                $_SESSION["message"] = $kategorie." aktualisiert.";
                $_SESSION["type"] = "success";
                header('Location: admin-categories.php');
            } else {
                echo "Ein Fehler bei der Aktualisierung..!";
            }
           
           
        }
    }
?>

<div class="container my-3">

        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="kategorie">Kategoriename</label>
                            <input type="text" name="kategorie" class="form-control" value="<?php echo $selectedCategory;?>">
                            <div class="text-danger"><?php echo $kategorieErr; ?></div>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Speichern</button>
                </form>
                </div>                      
            </div>
        </div>    
                                    
</div>
<?php include "partials/_footer.php" ;?>

