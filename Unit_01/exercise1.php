 <?php

    const title = "KURSE";

    $kurs1_title = "PHP Kurs";
    $kurs1_unterTitle = "Webentwicklung mit PHP";
    $kurs1_img = "php.png";
    $kurs1_datum = "01.01.2023";
    $kurs1_komentar = "100";
    $kurs1_like = "250";

    $kurs2_title = "NodeJS Kurs";
    $kurs2_unterTitle = "Webentwicklung mit Node.JS";
    $kurs2_img = "nodejs.png";
    $kurs2_datum = "01.08.2022";
    $kurs2_komentar = "120";
    $kurs2_like = "300";

    $kurs3_title = "React Kurs";
    $kurs3_unterTitle = "Webentwicklung mit React";
    $kurs3_img = "react.png";
    $kurs3_datum = "01.02.2023";
    $kurs3_komentar = "180";
    $kurs3_like = "330";

    $kurs4_title = "Bootstrap Kurs";
    $kurs4_unterTitle = "Webentwicklung mit Bootstrap";
    $kurs4_img = "bootstrap.png";
    $kurs4_datum = "01.04.2022";
    $kurs4_komentar = "80";
    $kurs4_like = "150";

    $kurs1_unterTitle = ucfirst(strtolower($kurs1_unterTitle));
    $kurs2_unterTitle = ucfirst(strtolower($kurs2_unterTitle));
    $kurs3_unterTitle = ucfirst(strtolower($kurs3_unterTitle));
    $kurs4_unterTitle = ucfirst(strtolower($kurs4_unterTitle));

    $kurs1_unterTitle = substr($kurs1_unterTitle,0,30)."...";
    $kurs2_unterTitle = substr($kurs2_unterTitle,0,30)."...";
    $kurs3_unterTitle = substr($kurs3_unterTitle,0,30)."...";
    $kurs4_unterTitle = substr($kurs4_unterTitle,0,30)."...";

    $kurs1_url = str_replace([" ","ö","@"],["-","o",""],strtolower($kurs1_title));    
    $kurs2_url = str_replace([" ","ö","@"],["-","o",""],strtolower($kurs2_title));    
    $kurs3_url = str_replace([" ","ö","@"],["-","o",""],strtolower($kurs3_title));    
    $kurs4_url = str_replace([" ","ö","@"],["-","o",""],strtolower($kurs4_title));    

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>
    <title>Document</title>
</head>
<body>
    <div class="container my-3">

        <h1 class="my-3"><?php echo title;?></h1>

        <div class="card mb-3">
            <div class="row">
                <div class="col-3">
                    <img src="img/<?php echo $kurs1_img;?>" alt="" class="img-fluid rounded-start">
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="<?php echo $kurs1_url; ?>">
                                <?php echo $kurs1_title; ?>
                            </a>                            
                        </h5>
                        <p class="card-text"><?php echo $kurs1_unterTitle; ?></p>
                        <p>
                            <span class="badge rounded-pill text-bg-primary">
                               Kommentar: <?php echo $kurs1_komentar; ?>
                            </span>

                            <span class="badge rounded-pill text-bg-danger">
                                Like: <?php echo $kurs1_like; ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="row">
                <div class="col-3">
                    <img src="img/<?php echo $kurs2_img;?>" alt="" class="img-fluid rounded-start">
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <h5 class="card-title">
                        <a href="<?php echo $kurs2_url; ?>">
                                <?php echo $kurs2_title; ?>
                            </a>  
                        </h5>
                        <p class="card-text"><?php echo $kurs2_unterTitle; ?></p>
                        <p>
                            <span class="badge rounded-pill text-bg-primary">
                               Kommentar: <?php echo $kurs2_komentar; ?>
                            </span>

                            <span class="badge rounded-pill text-bg-danger">
                                Like: <?php echo $kurs2_like; ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="row">
                <div class="col-3">
                    <img src="img/<?php echo $kurs3_img;?>" alt="" class="img-fluid rounded-start">
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <h5 class="card-title">
                        <a href="<?php echo $kurs3_url; ?>">
                                <?php echo $kurs3_title; ?>
                            </a>  
                        </h5>
                        <p class="card-text"><?php echo $kurs3_unterTitle;?></p>
                        <p>
                            <span class="badge rounded-pill text-bg-primary">
                               Kommentar: <?php echo $kurs3_komentar; ?>
                            </span>

                            <span class="badge rounded-pill text-bg-danger">
                                Like: <?php echo $kurs3_like; ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="row">
                <div class="col-3">
                    <img src="img/<?php echo $kurs4_img;?>" alt="" class="img-fluid rounded-start">
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <h5 class="card-title">
                        <a href="<?php echo $kurs4_url; ?>">
                                <?php echo $kurs4_title; ?>
                            </a>  
                        </h5>
                        <p class="card-text"><?php echo $kurs4_unterTitle?></p>
                        <p>
                            <span class="badge rounded-pill text-bg-primary">
                               Kommentar: <?php echo $kurs4_komentar; ?>
                            </span>

                            <span class="badge rounded-pill text-bg-danger">
                                Like: <?php echo $kurs4_like; ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
               
    </div>
</body>
</html>