<?php
    // Verilerimiz libs/variables.php icinde
    require "libs/variables.php";
    require "libs/functions.php";   
?>

<?php
   session_start();
   
   if(empty($_GET["id"])) {
    header('Location: admin-kurse.php');
   };

   $id = $_GET["id"];

   $result = getCourseById($id);
   $course = mysqli_fetch_assoc($result);

   if($_SERVER["REQUEST_METHOD"]=="POST") {
        if(deleteCourse($id)) {
        $_SESSION["message"] = $id." ist gelöscht.";
        $_SESSION["type"] = "danger";

        header('Location: admin-kurse.php');
        } else {
        echo "Fehler";
        }
   }

  
?>

<?php include "partials/_header.php" ;?>
<?php include "partials/_navbar.php" ;?> 


<div class="container my-3">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            Möchten Sie den <b><?php echo $course["title"]?></b> löschen?
                            <button type="submit" class="btn btn-danger">Löschen</button>
                        </form>
                    </div>
                </div>                
            </div>
        </div>    
                                    
</div>
<?php include "partials/_footer.php" ;?>