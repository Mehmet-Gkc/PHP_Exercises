<?php
// Kategorilerden birini sectik, numeric olup olmadigini kontrol ettik ve id'sini aldik
    if(isset($_GET["categoryid"]) && is_numeric($_GET["categoryid"])) {
        $gewählteKategorie = $_GET["categoryid"];
    };
?>

<div class="list-group my-3">
    <?php 
        $sonuc = getCategories();
        while($kategorie = mysqli_fetch_assoc($sonuc)) : ?>

        <a 
            href="<?php echo "courses.php?categoryid=".$kategorie["id"] ?>" 
            class="list-group-item list-group-item-action
            <?php
            // Yukarida secilen id'nin classini burada active yaptik. Dolayisiyla sadece secilen kategori elemani dinamik olarak active oldu
                if($kategorie["id"] == $gewählteKategorie) {
                    echo "active";
                }
            ?> ">
            <?php echo $kategorie["kategorie_name"]; ?>
        </a>

    <?php endwhile; ?>
</div>