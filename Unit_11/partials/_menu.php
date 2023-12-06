<div class="list-group my-3">
    <?php foreach (getDb()["kategories"] as $kategorie) :?>
        <a 
            href="#" 
            class="list-group-item list-group-item-action <?php echo ($kategorie["aktive"]) ? "active" : "" ?> " >
            <?php echo $kategorie["kategorie_name"]; ?>
        </a>
    <?php endforeach; ?>
</div>