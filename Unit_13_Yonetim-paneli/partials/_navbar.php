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
               <a href="index.php" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
               <a href="admin-kategories.php" class="nav-link">Admin Kategories</a>
            </li>
            <li class="nav-item">
               <a href="admin-kurse.php" class="nav-link">Admin Courses</a>
            </li>
        </ul>

        <ul class="navbar-nav me-2">

            <?php if(isset($_COOKIE["auth"])): ?>
                <li class="nav-item">
                   <a href="logout.php" class="nav-link">Logout</a>
                </li>
                <li class="nav-item">
                   <a href="login.php" class="nav-link">Herzlich Willkommen, <?php echo $_COOKIE["auth"]["name"];?></a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                   <a href="login.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                   <a href="register.php" class="nav-link">Register</a>
                </li>
            <?php endif; ?>
        </ul>

        <form action="index.php" class="d-flex" method="GET">
            <input type="text" name="q" class="form-control me-2" placeholder="Keyword">
            <button type="submit" class="btn btn-warning ">Ara</button>
        </form>
    </div>
</nav>