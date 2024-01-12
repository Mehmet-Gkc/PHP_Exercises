<?php
    require "libs/variables.php";
    require "libs/functions.php";
?>

<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

<?php
    session_start();

    $id = $_GET["id"];
    $sonuc = getCategoryById($id);
    $selectedCategory = mysqli_fetch_assoc($sonuc);

    $categoryErr = $category = "";

    if($_SERVER["REQUEST_METHOD"]=="POST") {

        if(empty($_POST["category"])) {
            $categoryErr = "Man muss einen Kategoriename schreiben.";
        } else {
            $category = safe_html($_POST["category"]);
        }

        if(empty($categoryErr)) {
            if(editCategory($id, $category)) {
                $_SESSION["message"] = $category." ist aktualisiert.";
                $_SESSION["type"] = "success";
                header('Location: admin-kategories.php');
            } else {
                echo "hata";
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
                        <label for="category">Kategoriename</label>
                        <input type="text" name="category" class="form-control" value="<?php echo $selectedCategory["kategorie_name"];?>">
                        <div class="text-danger"><?php echo $categoryErr; ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Speichern</button>
                </form>
           </div>

        </div>
    </div>

</div>
<?php include "partials/_footer.php" ?>