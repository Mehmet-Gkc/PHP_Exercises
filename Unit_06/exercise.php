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
        "unterTitle" => "Webentwicklung mit PHP. Bevor PHP müssen Sie HTML und CSS lernen.",
        "img" => "php.png",
        "datum" => "01.01.2023",
        "komment" => 0,
        "like" => 250,
        "urkunde" => true
    ),
    "2" => array(
        "title" => "NodeJS Kurs",
        "unterTitle" => "Webentwicklung mit Node.JS. Außerdem können Sie auch MongoBD lernen.",
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

function kursAddition (&$kurse, string $title, string $unterTitle,string $img,string $datum,int $komment=0,int $like=0,bool $urkunde=true) {
    
    $neu_kurs[count($kurse) + 1] = array(
        "title" => $title,
        "unterTitle" => $unterTitle,
        "img" => $img,
        "datum" => $datum,
        "komment" => $komment,
        "like" => $like,
        "urkunde" => $urkunde
    );
    $kurse = array_merge($kurse, $neu_kurs);
};

kursAddition($kurse, "Neu Kurs - 1", "Neu Kurs Unter Titel 1", "react.png", "25.11.2023");
kursAddition($kurse, "Neu Kurs - 2", "Neu Kurs Unter Titel 2", "php.png", "25.11.2023");

function kursUrl($title) {
    return str_replace([" ","ö","@","."],["-","o","","-"],strtolower($title));
}

function kursInfo ($unterTitle) {
    if (strlen($unterTitle) > 50) {
        return substr($unterTitle,0,50)."...";
    } else {
        return $unterTitle;
    }
}
   

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
                                <a href="<?php echo kursUrl($kurs["title"]); ?>">
                                    <?php echo $kurs["title"]; ?>
                                </a>                            
                            </h5>
                            <p class="card-text">
                                <?php echo kursInfo($kurs["unterTitle"]);?>                                
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