<?php
    require "libs/variables.php";
    require "libs/functions.php";

    session_start();
    $id = $_GET["id"];

    if(deleteCategory($id)) {
        $_SESSION["message"] = $id." ist gelöscht.";
        $_SESSION["type"] = "danger";

        header('Location: admin-categories.php');
    } else {
        echo "Ein Fehler beim Löschen";
    }

?>