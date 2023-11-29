<?php
// *** COOK ÖNEMLI *** Arama cubugunda arama yapan fonksiyon.
    if(!empty($_GET['q'])) {
        $keyword = $_GET['q'];
        
        $kurse = array_filter($kurse, function($kurs) use ($keyword) {
            return stristr($kurs["title"], $keyword) or stristr($kurs["unterTitle"], $keyword);
        });
    }
?>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
        <a href="/" class="navbar-brand">CourseApp</a>

        <ul class="navbar-nav me-auto">
            <li class="nav-item">
               <a href="" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
               <a href="" class="nav-link">Kurse</a>
            </li>
        </ul>

        <form action="index.php" class="d-flex" method="GET">
            <input type="text" name="q" class="form-control me-2" placeholder="Keyword">
            <button type="submit" class="btn btn-warning ">Ara</button>
        </form>
    </div>
</nav>