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
    $category = "0"; 
    $categoryErr = "";


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

        if($_POST["category"] == "0") {
            $categoryErr = "Sie müssen eine Kategorie auswählen.!";
        } else {
            $category = $_POST["category"];
        }

        if(empty($titleErr) && empty($unterTitleErr) && empty($imgErr) && empty($categoryErr)) {
            createCourse($title,$unterTitle,$img,$category);
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

                    <div class="mb-3">
                        <label for="category" class="form-label">Kategorie</label>
                        <select name="category" id="category" class="form-select">
                            <option value="0" selected>Auswählen</option>
                            <?php foreach(getCategories() as $c): ?>
                                <option value="<?php echo $c["id"] ;?>"><?php echo $c["kategorie_name"]; ?></option>
                            <?php endforeach; ?>                            
                        </select>
                        <div class="text-danger"><?php echo $categoryErr; ?></div>
                        <script type="text/javascript">
                            document.getElementById("category").value = "<?php echo $category;?>";
                        </script>
                    </div>

                    <button type="submit" class="btn btn-primary">Speichern</button>
                </form>
           </div>

        </div>
    </div>

</div>
<?php include "partials/_footer.php" ?>