
 <!-- 
    
    
    
    8) 2 vize %60 ve final %40 notuna göre ortalama hesaplayiniz
        a. Eger ortalama 50 ve üzeri ise gecti degilse kaldi yazdirin
        b. Gecmek icin ortalama 50 olsa bile final notu en az 50 olmalidir
        c. Gecmek icin finalden 70 alindiginda ortalamanin önemi olsun 
-->

<?php
    $a = 20;
    $b = 2;
    $c = 5;

    // 1) a, b, c carpimi ile a,b,c toplamini  farki nedir? 
    echo ($a * $b * $c) - ($a + $b + $c)."<br>"; // 83

    // 2) a,b,c toplaminin mod3 ü nedir?
    echo (($a + $b + $c) % 3)."<br>"; // 2

    // 3) b'nin c'inci kuvveti nedir?
    echo $b**$c."<br>"; // 32

    // 4) a icin 50-100 arasi kontrolü yapiniz
    $sonuc = ($a > 50) and ($a < 100);
    echo var_dump($sonuc)."<br>";

    // 5) a icin pozitif cift syi kontrolü yapiniz
    $cift = ($a > 0) and ($a % 2 == 0);
    echo var_dump(($cift))."<br>";

    // 6) username ve password ile uygulama giris kontrolü yapiniz
    $username = "Ali";
    $password = "123456";

    $login = ($username == "Ali") and ($password == "123456");
    echo var_dump($login)."<br>";

    // 7) a,b,c icin büyüklük kontrolü yapiniz

    



?>