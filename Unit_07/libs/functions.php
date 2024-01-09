<?php
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