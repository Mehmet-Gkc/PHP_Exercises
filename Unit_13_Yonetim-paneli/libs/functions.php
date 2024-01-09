<?php

// GET Kategories
    function getCategories() {
    include "connection.php";

    $query = "SELECT * from kategories";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
};

// GET Kurse
function getCourses() {
    include "connection.php";

    $query = "SELECT * from kurse";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
};

    function getDb() {
    $myfile = fopen("db.json","r");
    $size = filesize("db.json");
    $data = json_decode(fread($myfile, $size), true);    
    fclose($myfile);
    return $data;
    };

// GET Kategorie bei ID
    function getCategoryById(int $id) {
    include "connection.php";
    
    $query = "SELECT * from kategories WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
    };

// GET Kurs bei ID
    function getCourseById(int $id) {
    include "connection.php";
    
    $query = "SELECT * from kurse WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
    };

// CREATE Kategorie
    function createCategory(string $kategori) {
    include "connection.php";

    $query = "INSERT INTO kategories(kategorie_name) VALUES (?)";
    $stmt = mysqli_prepare($baglanti,$query);

    mysqli_stmt_bind_param($stmt, 's', $kategori);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $stmt;
};

// CREATE Kurs
    function createCourse(string $title, string $unterTitle, string $img, int $komment=0, int $begeni=0, int $urkunde=0) {
    include "connection.php";

    $query = "INSERT INTO kurse(title, unterTitle, img, komment, begeni, urkunde) VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_prepare($baglanti,$query);

    mysqli_stmt_bind_param($stmt, 'sssiii', $title, $unterTitle, $img, $komment, $begeni, $urkunde);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $stmt;
};

// EDIT Kategorie
    function editCategory(int $id, string $category) {
    include "connection.php";

    $query = "UPDATE kategories SET kategorie_name='$category' WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
};

// EDIT Kurs
    function editCourse(int $id, string $title, string $unterTitle, string $img, int $urkunde) {
    include "connection.php";

    $query = "UPDATE kurse SET title='$title', unterTitle='$unterTitle', img='$img', urkunde='$urkunde' WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
};

// DELETE Kategorie
    function deleteCategory(int $id) {
    include 'connection.php';

    $query = "DELETE FROM kategories WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
};

// UPLOAD FILE
    function uploadImage(array $file) {
    if(isset($file)) {
        $dest_path = "./img/";
        $filename = $file["name"];
        $fileSourcePath = $file["tmp_name"];
        $fileDestPath = $dest_path.$filename;

        move_uploaded_file($fileSourcePath,$fileDestPath);
    }
};

    function kursAddition (string $title,string $unterTitle,string $img,string $datum,int $komment=0,int $begeni=0,bool $urkunde=true) {
        $db = getDb();

        array_push($db["kurse"], array(
            "title" => $title,
            "unterTitle" => $unterTitle,
            "img" => $img,
            "datum" => $datum,
            "komment" => $komment,
            "begeni" => $begeni,
            "urkunde" => $urkunde
        ));
        $myfile  = fopen("db.json","w");
        fwrite($myfile, json_encode($db, JSON_PRETTY_PRINT));
        fclose($myfile);
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