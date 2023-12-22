<?php

require "libs/variables.php";
require "libs/functions.php";   

?>
<?php include "partials/_header.php" ;?>
<?php include "partials/_navbar.php" ;?> 

<?php
    session_start();
    $title = $titleErr = $unterTitle = $unterTitleErr = $img = $imgErr = "";


    if($_SERVER["REQUEST_METHOD"]=="POST") {      
    
        // Form Validation:
        
        if(empty($_POST["title"])) {
            $titleErr = "Sie müssen einen Title schreiben";
        } else {
            $title = safe_html($_POST["title"]);
        };

        if(empty($_POST["unterTitle"])) {
            $unterTitleErr = "Sie müssen einen Untertitle schreiben";
        } else {
            $unterTitle = safe_html($_POST["unterTitle"]);
        };

        if(empty($_POST["img"])) {
            $imgErr = "Sie müssen eine Image schreiben";
        } else {
            $img = safe_html($_POST["img"]);
        };
        
        if(empty($titleErr) && empty($unterTitleErr) && empty($imgErr)) {
            createCourse($title, $unterTitle, $img);
            $_SESSION["message"] = $title."kurse ist hinzugefügt.";
            $_SESSION["type"] = "success";
            header('Location: admin-courses.php');
        }
    }
?>

<div class="container my-3">

        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="title">Kurstitle</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $title;?>">
                            <div class="text-danger"><?php echo $titleErr; ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="unterTitle">Untertitle</label>
                            <textarea name="unterTitle" class="form-control"><?php echo $unterTitle;?></textarea>
                            <div class="text-danger"><?php echo $unterTitleErr; ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="img">Image</label>
                            <textarea name="img" class="form-control"><?php echo $img;?></textarea>
                            <div class="text-danger"><?php echo $imgErr; ?></div>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Speichern</button>
                </form>
                </div>                      
            </div>
        </div>    
                                    
</div>
<?php include "partials/_footer.php" ;?>

