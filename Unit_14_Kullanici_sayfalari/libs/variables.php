<?php
    const title = "KURSE";
   
    const db_user = array(
        "username" => "Mehmet",
        "password" => "12345",
        "name" => "Mehmet Gkc"
    );

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
            "begeni" => 250,
            "urkunde" => true
        ),
        "2" => array(
            "title" => "NodeJS Kurs",
            "unterTitle" => "Webentwicklung mit Node.JS. Außerdem können Sie auch MongoBD lernen.",
            "img" => "nodejs.png",
            "datum" => "01.08.2022",
            "komment" => 50,
            "begeni" => 0,
            "urkunde" => true
        ),
        "3" => array(
            "title" => "React Kurs",
            "unterTitle" => "Webentwicklung mit React",
            "img" => "react.png",
            "datum" => "01.02.2023",
            "komment" => 190,
            "begeni" => 340,
            "urkunde" => true
        ),
        "4" => array(
            "title" => "Bootstrap Kurs",
            "unterTitle" => "Webentwicklung mit Bootstrap",
            "img" => "bootstrap.png",
            "datum" => "01.04.2022",
            "komment" => 0,
            "begeni" => 50,
            "urkunde" => true
        )
    );

    $städte = array(
        "61" => "Trabzon",
        "27" => "Gaziantep",
        "28" => "Giresun",
        "29" => "Gümüshane",
        "07" => "Antalya"
    );
    sort($städte);

    $hobiler = array(
        "1" => "Musik",
        "2" => "Spor",
        "3" => "Cinema",
        "4" => "Lesen"
    );

?>