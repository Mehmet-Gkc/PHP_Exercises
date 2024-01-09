<div class="list-group my-3">
    <?php for($i = 0; $i < count($kategories); $i++) :?>
        <a 
            href="#" 
            class="list-group-item list-group-item-action <?php echo ($kategories[$i]["aktive"]) ? "active" : "" ?> " >
            <?php echo $kategories[$i]["kategorie_name"]; ?>
        </a>
    <?php endfor ?>
</div>