<?php
    require "libs/variables.php";
    require "libs/functions.php";
?>

<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

<?php
    session_start();

    $id = $_GET["id"];
    $sonuc = getCourseById($id);
    $selectedCourse = mysqli_fetch_assoc($sonuc);


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

        if(empty($_POST["img"])) {
            $imgErr = "Man muss einen Image schreiben.";
        } else {
            $img = safe_html($_POST["img"]);
        }

        $urkunde = $_POST["urkunde"] == "on" ? 1 : 0;

        if(empty($titleErr) && empty($unterTitleErr) && empty($imgErr)) {
            editCourse($id,$title,$unterTitle,$img,$urkunde);
            $_SESSION["message"] = $title." ist aktualisiert.";
            $_SESSION["type"] = "success";
            header('Location: admin-kurse.php');
        }
        
    }

?>

<div class="container my-3">

    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $selectedCourse["title"];?>">
                        <div class="text-danger"><?php echo $titleErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="unterTitle">Untertitle</label>
                        <textarea name="unterTitle" class="form-control"><?php echo $selectedCourse["unterTitle"];?></textarea>
                        <div class="text-danger"><?php echo $unterTitleErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="img">Image</label>
                        <textarea name="img" class="form-control"><?php echo $selectedCourse["img"];?></textarea>
                        <div class="text-danger"><?php echo $imgErr; ?></div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="urkunde" name="urkunde" 
                            <?php echo $selectedCourse["urkunde"]?"checked":""?>>
                        <label class="form-check-label" for="urkunde">
                            urkunde
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Speichern</button>
                </form>
           </div>

        </div>
    </div>

</div>
<?php include "partials/_footer.php" ?>