<?php

const title = "KURSE";

$kategories = array("Programming", "Web Developer", "Data Analysis");
sort($kategories);

$kurse = array(
    "1" => array(
        "title" => "PHP Kurs",
        "unterTitle" => "Webentwicklung mit PHP",
        "img" => "php.png",
        "datum" => "01.01.2023",
        "komment" => "100",
        "like" => "250"
    ),
    "2" => array(
        "title" => "NodeJS Kurs",
        "unterTitle" => "Webentwicklung mit Node.JS",
        "img" => "nodejs.png",
        "datum" => "01.08.2022",
        "komment" => "120",
        "like" => "300"
    ),
    "3" => array(
        "title" => "React Kurs",
        "unterTitle" => "Webentwicklung mit React",
        "img" => "react.png",
        "datum" => "01.02.2023",
        "komment" => "190",
        "like" => "340"
    ),
    "4" => array(
        "title" => "Bootstrap Kurs",
        "unterTitle" => "Webentwicklung mit Bootstrap",
        "img" => "bootstrap.png",
        "datum" => "01.04.2022",
        "komment" => "80",
        "like" => "150"
    )
);

$neuKurs = array(
    "title" => "Angular Kurs",
    "unterTitle" => "Webentwicklung mit Angular",
    "img" => "bootstrap.png",
    "datum" => "01.04.2021",
    "komment" => "90",
    "like" => "190"
);

$kurse["5"] = $neuKurs;

$kurs1_unterTitle = ucfirst(strtolower($kurse["1"]["unterTitle"]));
$kurs2_unterTitle = ucfirst(strtolower($kurse["2"]["unterTitle"]));
$kurs3_unterTitle = ucfirst(strtolower($kurse["3"]["unterTitle"]));
$kurs4_unterTitle = ucfirst(strtolower($kurse["4"]["unterTitle"]));

$kurs1_unterTitle = substr($kurs1_unterTitle,0,30)."...";
$kurs2_unterTitle = substr($kurs2_unterTitle,0,30)."...";
$kurs3_unterTitle = substr($kurs3_unterTitle,0,30)."...";
$kurs4_unterTitle = substr($kurs4_unterTitle,0,30)."...";

$kurs1_url = str_replace([" ","ö","@"],["-","o",""],strtolower($kurse["1"]["title"]));    
$kurs2_url = str_replace([" ","ö","@"],["-","o",""],strtolower($kurse["2"]["title"]));    
$kurs3_url = str_replace([" ","ö","@"],["-","o",""],strtolower($kurse["3"]["title"]));    
$kurs4_url = str_replace([" ","ö","@"],["-","o",""],strtolower($kurse["4"]["title"]));    

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

    <div class="row">
        <div class="col-3">
            <div class="list-group my-3">
                <a href="#" class="list-group-item list-group-item-action active"><?php echo $kategories[0]; ?></a>
                <a href="#" class="list-group-item list-group-item-action"><?php echo $kategories[1]; ?></a>
                <a href="#" class="list-group-item list-group-item-action"><?php echo $kategories[2]; ?></a>

            </div>
        </div>
        <div class="col-9">
            <h1 class="my-3"><?php echo title;?></h1>
            <p class="lead">
                <?php echo count($kurse);?> Kurse sind in <?php echo count($kategories); ?> Kategorien aufgeführt 
            </p>

            <div class="card mb-3">
                <div class="row">
                    <div class="col-4">
                        <img src="img/<?php echo $kurse["1"]["img"];?>" alt="" class="img-fluid rounded-start">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?php echo $kurs1_url; ?>">
                                    <?php echo $kurse["1"]["title"]; ?>
                                </a>                            
                            </h5>
                            <p class="card-text"><?php echo $kurs1_unterTitle; ?></p>
                            <p>
                                <span class="badge rounded-pill text-bg-primary">
                                Kommentar: <?php echo $kurse["1"]["komment"]; ?>
                                </span>

                                <span class="badge rounded-pill text-bg-danger">
                                    Like: <?php echo $kurse["1"]["like"]; ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="row">
                    <div class="col-4">
                        <img src="img/<?php echo $kurse["2"]["img"];?>" alt="" class="img-fluid rounded-start">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">
                            <a href="<?php echo $kurs2_url; ?>">
                                    <?php echo $kurse["2"]["title"]; ?>
                                </a>  
                            </h5>
                            <p class="card-text"><?php echo $kurs2_unterTitle; ?></p>
                            <p>
                                <span class="badge rounded-pill text-bg-primary">
                                Kommentar: <?php echo $kurse["2"]["komment"]; ?>
                                </span>

                                <span class="badge rounded-pill text-bg-danger">
                                    Like: <?php echo $kurse["2"]["like"]; ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="row">
                    <div class="col-4">
                        <img src="img/<?php echo $kurse["3"]["img"];?>" alt="" class="img-fluid rounded-start">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">
                            <a href="<?php echo $kurs3_url; ?>">
                                    <?php echo $kurse["3"]["title"]; ?>
                                </a>  
                            </h5>
                            <p class="card-text"><?php echo $kurs3_unterTitle;?></p>
                            <p>
                                <span class="badge rounded-pill text-bg-primary">
                                Kommentar: <?php echo $kurse["3"]["komment"]; ?>
                                </span>

                                <span class="badge rounded-pill text-bg-danger">
                                    Like: <?php echo $kurse["3"]["like"]; ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="row">
                    <div class="col-4">
                        <img src="img/<?php echo $kurse["4"]["img"];?>" alt="" class="img-fluid rounded-start">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">
                            <a href="<?php echo $kurs4_url; ?>">
                                    <?php echo $kurse["4"]["title"]; ?>
                                </a>  
                            </h5>
                            <p class="card-text"><?php echo $kurs4_unterTitle?></p>
                            <p>
                                <span class="badge rounded-pill text-bg-primary">
                                Kommentar: <?php echo $kurse["4"]["komment"]; ?>
                                </span>

                                <span class="badge rounded-pill text-bg-danger">
                                    Like: <?php echo $kurse["4"]["like"]; ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="row">
                    <div class="col-4">
                        <img src="img/<?php echo $kurse["5"]["img"];?>" alt="" class="img-fluid rounded-start">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">
                            <a href="<?php echo $kurs4_url; ?>">
                                    <?php echo $kurse["5"]["title"]; ?>
                                </a>  
                            </h5>
                            <p class="card-text"><?php echo $kurs4_unterTitle?></p>
                            <p>
                                <span class="badge rounded-pill text-bg-primary">
                                Kommentar: <?php echo $kurse["5"]["komment"]; ?>
                                </span>

                                <span class="badge rounded-pill text-bg-danger">
                                    Like: <?php echo $kurse["5"]["like"]; ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
           
</div>
</body>
</html>