<?php
    require "libs/variables.php";
    require "libs/functions.php";
    
    session_start();
    $id = $_GET["id"];

    if(deleteCategory($id)) {
        $_SESSION["message"] = $id." ist gelöscht.";
        $_SESSION["type"] = "danger";

        header('Location: admin-kategories.php');
    } else {
        echo "Fehler";
    }

?>
