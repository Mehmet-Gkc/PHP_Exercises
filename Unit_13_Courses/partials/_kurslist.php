<?php foreach(getDb()["kurse"] as $key => $kurs) :?>
    <?php if($kurs["urkunde"]): ?>
    <div class="card mb-3">
    <div class="row">
        <div class="col-4">
            <img src="img/<?php echo $kurs["img"];?>" alt="" class="img-fluid rounded-start">
        </div>
        <div class="col-8">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="<?php echo kursUrl($kurs["title"]); ?>">
                        <?php echo $kurs["title"]; ?>
                    </a>                            
                </h5>
                <p class="card-text">
                    <?php echo kursInfo($kurs["unterTitle"]);?>                                
                </p>
                <p>
                    <?php if ($kurs["komment"] > 0) :?>
                         <span class="badge rounded-pill text-bg-primary">
                            Kommentar: <?php echo $kurs["komment"]; ?>
                         </span>
                    <?php else :?>
                        <span class="badge rounded-pill text-bg-warning">
                            kommentieren
                        </span>
                    <?php endif ?>                             
                    <?php if($kurs["like"] > 0) :?>
                        <span class="badge rounded-pill text-bg-danger">
                            Like: <?php echo $kurs["like"]; ?>
                        </span>
                    <?php endif ?>    
                    
                </p>
            </div>
        </div>
    </div>
    </div>
    <?php endif ?>  
<?php endforeach ?>  