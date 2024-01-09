<?php

const title = "KURSE";

$kategories = array(
    array(
        "kategorie_name" => "Programming", 
        "aktive" => true
        ),
    array(
        "kategorie_name" => "Web Developer", 
        "aktive" => false
        ),
    array(
        "kategorie_name" => "Data Analysis", 
        "aktive" => false
        ),
    array(
        "kategorie_name" => "Mobilapp Developer", 
        "aktive" => false
        )
);
sort($kategories);

$kurse = array(
    "1" => array(
        "title" => "PHP Kurs",
        "unterTitle" => "Webentwicklung mit PHP",
        "img" => "php.png",
        "datum" => "01.01.2023",
        "komment" => 0,
        "like" => 250,
        "urkunde" => true
    ),
    "2" => array(
        "title" => "NodeJS Kurs",
        "unterTitle" => "Webentwicklung mit Node.JS",
        "img" => "nodejs.png",
        "datum" => "01.08.2022",
        "komment" => 50,
        "like" => 0,
        "urkunde" => true
    ),
    "3" => array(
        "title" => "React Kurs",
        "unterTitle" => "Webentwicklung mit React",
        "img" => "react.png",
        "datum" => "01.02.2023",
        "komment" => 190,
        "like" => 340,
        "urkunde" => true
    ),
    "4" => array(
        "title" => "Bootstrap Kurs",
        "unterTitle" => "Webentwicklung mit Bootstrap",
        "img" => "bootstrap.png",
        "datum" => "01.04.2022",
        "komment" => 0,
        "like" => 50,
        "urkunde" => true
    )
);

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
                <?php for($i = 0; $i < count($kategories); $i++) :?>
                    <a 
                        href="#" 
                        class="list-group-item list-group-item-action <?php echo ($kategories[$i]["aktive"]) ? "active" : "" ?> " >
                        <?php echo $kategories[$i]["kategorie_name"]; ?>
                    </a>
                <?php endfor ?>
            </div>
        </div>
        <div class="col-9">
            <h1 class="my-3"><?php echo title;?></h1>
            <p class="lead">
                <?php echo count($kurse);?> Kurse sind in <?php echo count($kategories); ?> Kategorien aufgeführt 
            </p>

            <?php foreach($kurse as $key => $kurs) :?>
                <?php if($kurs["urkunde"]): ?>
                <div class="card mb-3">
                <div class="row">
                    <div class="col-4">
                        <img src="img/<?php echo $kurs["img"];?>" alt="" class="img-fluid rounded-start">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?php echo $kurs1_url; ?>">
                                    <?php echo $kurs["title"]; ?>
                                </a>                            
                            </h5>
                            <p class="card-text">
                                <?php if(strlen($kurs["unterTitle"]) > 30 ): ?>
                                    <?php echo substr($kurs["unterTitle"],0,30)."..." ?>
                                <?php else: ?>
                                    <?php echo $kurs["unterTitle"]; ?>
                                <?php endif ?>
                            </p>
                            <p>
                                <?php if ($kurs["komment"] > 0) :?>
                                     <span class="badge rounded-pill text-bg-primary">
                                        Kommentar: <?php echo $kurs["komment"]; ?>
                                     </span>
                                <?php else :?>
                                    <span class="badge rounded-pill text-bg-warning">
                                        kommentieren
                                    </span>
                                <?php endif ?>                                

                                <?php if($kurs["like"] > 0) :?>
                                    <span class="badge rounded-pill text-bg-danger">
                                        Like: <?php echo $kurs["like"]; ?>
                                    </span>
                                <?php endif ?>    
                               
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>  
            <?php endforeach ?>    

             

        </div>
    </div>    
           
</div>
</body>
</html>