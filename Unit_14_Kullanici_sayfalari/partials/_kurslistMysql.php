<?php 
    $sonuc = getCourses(); while($kurs = mysqli_fetch_assoc($sonuc)) :?>
    <?php if($kurs["urkunde"] > 0 ): ?>
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
                <?php if ($kurs["komment"] > 0): ?>
                        <span class="badge rounded-pill text-bg-danger">
                            Yorum: <?php echo $kurs["komment"]; ?>
                        </span>
                    <?php else: ?>
                        <span class="badge rounded-pill text-bg-warning">
                            İlk yorumu sen yap
                        </span>
                    <?php endif ?>     

                    <?php if ($kurs["begeni"] > 0): ?>
                        <span class="badge rounded-pill text-bg-primary">
                        <?php echo $kurs["begeni"]; ?> Beğeni
                        </span>
                    <?php endif ?>                     
                </p>
            </div>
        </div>
    </div>
    </div>
    <?php endif ?>  
<?php endwhile ?>  