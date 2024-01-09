<?php
    require "libs/variables.php";
    require "libs/functions.php";
?>

<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

<?php
    session_start();
    $title = $titleErr = "";
    $unterTitle = $unterTitleErr = "";
    $img = $imgErr = "";

    if($_SERVER["REQUEST_METHOD"]=="POST") {

        if(empty($_POST["title"])) {
            $titleErr = "Man muss einen Title schreiben.";
        } else {
            $title = safe_html($_POST["title"]);
        };

        if(empty($_POST["unterTitle"])) {
            $unterTitleErr = "Man muss einen Untertitle schreiben.";
        } else {
            $unterTitle = safe_html($_POST["unterTitle"]);
        };

        /*
        Burada resmi sadece isim olarak gönderiyoruz.
        if(empty($_POST["img"])) {
            $imgErr = "Man muss einen Image schreiben.";
        } else {
            $img = safe_html($_POST["img"]);
        }
        */

        // Burada resmi dosya olarak gönderiyoruz.
        if(empty($_FILES["imageFile"]["name"])) {
            $imgErr = "Image auswählen.";
        } else {
            uploadImage($_FILES["imageFile"]);
            $img = $_FILES["imageFile"]["name"];
        }

        if(empty($titleErr) && empty($unterTitleErr) && empty($imgErr)) {
            createCourse($title,$unterTitle,$img);
            $_SESSION["message"] = $title." ist hinzugefügt.";
            $_SESSION["type"] = "success";
            header('Location: admin-kurse.php');
        }
        
    }

?>

<div class="container my-3">

    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $title;?>">
                        <div class="text-danger"><?php echo $titleErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="unterTitle">Untertitle</label>
                        <textarea name="unterTitle" class="form-control"><?php echo $unterTitle;?></textarea>
                        <div class="text-danger"><?php echo $unterTitleErr; ?></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="imageFile" id="imageFile" class="form-control">
                        <label for="imageFile" class="input-group-text">Hochladen</label>
                    </div>
                    <div class="text-danger"><?php echo $imgErr; ?></div>

                    <button type="submit" class="btn btn-primary">Speichern</button>
                </form>
           </div>

        </div>
    </div>

</div>
<?php include "partials/_footer.php" ?>