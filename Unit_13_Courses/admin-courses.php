<?php
// Verilerimiz libs/variables.php icinde
    require "libs/variables.php";
    require "libs/functions.php";
?>
<?php include "partials/_message.php" ;?>
<?php include "partials/_header.php" ;?>
<!-- 
    Aramayi _navbar.php icinde yapacagiz. 
    Yukarida variables.php icinden gelen verileri burada filtreleyip index.php de filtrelenmis gösterecegiz.
    Yukaridan asagiya okudugu icin, önce variables.php icinde verileri okuyor, sonra _navbar.php de filtreliyor.
-->
<?php include "partials/_navbar.php" ;?> 

<div class="container my-3">

        <div class="row">
            <div class="col-12">
                <div class="border p-2 mb-2">
                    <a href="course-create.php" class="btn btn-primary">Kurs hinzufügen</a>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:50px;">Id</th>
                            <th style="width:120px;">Image</th>
                            <th >Title</th>
                            <th style="width:50px;">Urkunde</th>
                            <th style="width:130px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sonuc = getCourses(); while($kurs = mysqli_fetch_assoc($sonuc)): ?>
                            <tr>
                                <td><?php echo $kurs["id"]?></td>
                                <td><img class="img-fluid" src="img/<?php echo $kurs["img"] ?>" alt=""></td>
                                <td><?php echo $kurs["title"]?></td>
                                <td>
                                    <?php if($kurs["urkunde"]): ?>
                                        <i class="fas fa-check"></i>
                                    <?php else :?>
                                        <i class="fas fa-times"></i>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="kurs-edit.php?id=<?php echo $kurs["id"]; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="kurs-delete.php?id=<?php echo $kurs["id"]; ?>" class="btn btn-danger btn-sm">Delete</a>

                                </td>

                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>    
                                    
</div>
<?php include "partials/_footer.php" ;?>

