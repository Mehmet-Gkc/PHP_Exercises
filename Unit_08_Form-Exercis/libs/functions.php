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
    };

    /*   
    Form güvenligi icin asagidaki fonksiyonu yaziyoruz.

    stripslashes() fonksiyonu, bir dizgedeki kaçış karakterlerini kaldırmak için kullanılan bir PHP fonksiyonudur. 
    Kaçış karakterleri, genellikle ters eğik çizgi (backslash - \) ile temsil edilen karakterlerdir.

    htmlspecialchars() fonksiyonu, bir dizgedeki HTML özel karakterlerini (örneğin, <, >, &, ", ve ') HTML kodlarına dönüştürerek, 
    kullanıcı girişlerinden kaynaklanan güvenlik sorunlarını önlemeye yardımcı olan bir PHP fonksiyonudur.
    Bu fonksiyon, özellikle web uygulamalarında kullanıcıların sağladığı verilerin güvenli bir şekilde gösterilmesi için önemlidir. 
    Kullanıcıların giriş yapabileceği alanlarda (formlar, yorumlar, vs.), kullanıcılar tarafından sağlanan verilerin içindeki 
    potansiyel olarak tehlikeli HTML etiketlerini veya özel karakterleri etkisizleştirir
*/

    function safe_html($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data); 
        return $data;


    }

?>