<?php
    // GET 
    function getCategories() {
        include "ayar.php";

        $query = "SELECT * from kategories"; // Kategorilerin hepsini sectik.
        $sonuc = mysqli_query($baglanti, $query);
        mysqli_close($baglanti);
        return $sonuc;
    };

      // GET 
      function getCourses() {
        include "ayar.php";

        $query = "SELECT * from kurse"; // Kurslarin hepsini sectik.
        $sonuc = mysqli_query($baglanti, $query);
        mysqli_close($baglanti);
        return $sonuc;
    };

    // GET
    function getCategoryById (int $id) {
        include "ayar.php";

        $query = "SELECT * from kategories WHERE id='$id'"; // Kategorilerin icinden, parametre olarak girilen id'ye göre sectik.
        $sonuc = mysqli_query($baglanti, $query);
        mysqli_close($baglanti);
        return $sonuc;
    };
    // UPDATE
    function editCategory ($id, string $kategorie) {
        include "ayar.php";

        $query = "UPDATE kategories SET kategorie_name='$kategorie' WHERE id=$id";
        $sonuc = mysqli_query($baglanti, $query);
        mysqli_close($baglanti);
        return $sonuc;
    };
    // DELETE
    function deleteCategory(int $id) {
        include "ayar.php";

        $query = "DELETE FROM kategories WHERE id=$id";
        $sonuc = mysqli_query($baglanti, $query);
        mysqli_close($baglanti);
        return $sonuc;
    };
    // CREATE
    function createCategory(string $kategorie) {
        include "ayar.php";

        $query = "INSERT INTO kategories(kategorie_name) VALUE (?)"; // Kategoriye, value=kategorie_name olarak icerik gönderdik.
        $stmt = mysqli_prepare($baglanti, $query);

        mysqli_stmt_bind_param($stmt, "s", $kategorie);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $stmt;
    };

    function getDb() {
        $myfile = fopen("db.json","r");     // db.json i okuyoruz
        $size = filesize("db.json");        // db.json'un boyutunu ögreniyoruz
        $data = json_decode(fread($myfile, $size), true); // okumus oldugumuz bilgiyi diziye ceviriyoruz ve data parametresi oluturuyoruz
        fclose($myfile);
        return $data;
    }

    function kursAddition (string $title, string $unterTitle,string $img,string $datum,int $komment=0,int $like=0,bool $urkunde=true) {
        $db = getDb();
        
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