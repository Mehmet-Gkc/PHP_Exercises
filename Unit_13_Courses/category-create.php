<?php

require "libs/variables.php";
require "libs/functions.php";   

?>
<?php include "partials/_header.php" ;?>
<?php include "partials/_navbar.php" ;?> 

<?php
    session_start();
    $kategorie = $kategorieErr = "";


    if($_SERVER["REQUEST_METHOD"]=="POST") {      
    
        // Form Validation:
        
        if(empty($_POST["kategorie"])) {
            $kategorieErr = "Sie müssen eine kategorie schreiben";
        } else {
            $kategorie = safe_html($_POST["kategorie"]);
        };
        
        if(empty($kategorieErr)) {
            createCategory($kategorie);
            $_SESSION["message"] = $kategorie." hinzugefügt.";
            $_SESSION["type"] = "success";
            header('Location: admin-categories.php');
        }
    }
?>

<div class="container my-3">

        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <form action="category-create.php" method="post">
                        <div class="mb-3">
                            <label for="kategorie">Kategoriename</label>
                            <input type="text" name="kategorie" class="form-control" value="<?php echo $kategorie;?>">
                            <div class="text-danger"><?php echo $kategorieErr; ?></div>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Speichern</button>
                </form>
                </div>                      
            </div>
        </div>    
                                    
</div>
<?php include "partials/_footer.php" ;?>

