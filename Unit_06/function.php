<?php
    // Kendisine gönderilen bir kelimeyi belirtilen kez ekranda gösteren fonksiyonu yaziniz.
        function yazdir($kelime, $sayi) {
            for($i = 0; $i < $sayi; $i++) {
                echo $kelime."<br>";
            }
        }
        yazdir("ali", 5);

    // Dikdörtgenin alan ve cevresini hesaplayan fonksiyonu yaziniz

        function dikdortgen($a, $b) {
            $alan = $a * $b."<br>";
            $cevre = 2*($a + $b)."<br>";
            return "Cevre: $cevre Alan: $alan";
        }
        echo dikdortgen(3,5);

    // Yazi tura uygulamasini fonksiyon kullanacak yaziniz

        function yaziTura() {
            $sayi = rand(1,10);
            if($sayi <= 5) {
                echo "Yazi";
            } else {
                echo "Tura";
            };
        };
        yaziTura();

    // Kendisine gönderilen bir sayinin tam bölenlerini bir diziyle döndüren fonksiyonu yaziniz

        function tamBolenler($sayi) {
            $bölenler = array();
            
            for($i = 2; $i < $sayi; $i++){
                if($sayi % $i == 0) {
                    array_push($bölenler, $i);
                }
            }
            return $bölenler;

        };
        print_r(tamBolenler(50));
        
?>