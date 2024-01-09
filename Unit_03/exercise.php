<?php
    $a = 20;
    $b = 2;
    $c = 25;

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
    $sonuc = ($a > $b and $a > $c);
    echo "a en büyük: ".$sonuc."<br>"; 
    
    $sonuc = ($b > $a and $b > $c);
    echo "b en büyük: ".$sonuc."<br>"; 

    $sonuc = ($c > $a and $c > $b);
    echo "c en büyük: ".$sonuc."<br>"; 

    // 8) 2 vize %60 ve final %40 notuna göre ortalama hesaplayiniz
    //    a. Eger ortalama 50 ve üzeri ise gecti degilse kaldi yazdirin
    //    b. Gecmek icin ortalama 50 olsa bile final notu en az 50 olmalidir
    //    c. Gecmek icin finalden 70 alindiginda ortalamanin önemi olmasin 

    $vize1 = 80;
    $vize2 = 70;
    $final = 75;

    $ortalama = (($vize1 + $vize2) / 2) * 0.6 + ($final * 0.4) ;
    echo "Ortalama: ".$ortalama."<br>";

    $gecmeDurumuA = ($ortalama >=50);
    $gecmeDurumuB = ($ortalama >=50 and $final >= 50);
    $gecmeDurumuC = ($ortalama >=50 or $final >= 70);

    echo "Gecme durumu A: ".$gecmeDurumuA;
    echo "Gecme durumu B: ".$gecmeDurumuB;
    echo "Gecme durumu C: ".$gecmeDurumuC;


    



?>