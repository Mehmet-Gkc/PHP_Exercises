<?php
    require "libs/variables.php";
    require "libs/functions.php";
?>

<?php include "partials/_message.php" ?>
<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

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
                    <th>Title</th>
                    <th style="width:200px;">Kategorie</th>
                    <th style="width:50px;">Urkunde</th>
                    <th style="width:130px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php $sonuc = getCourses(); while($course = mysqli_fetch_assoc($sonuc)): ?>
                    <tr>
                        <td><?php echo $course["id"]?></td>
                        <td><img class="img-fluid" src="img/<?php echo $course["img"] ?>" alt=""></td>
                        <td><?php echo $course["title"]?></td>    
                        <td><?php echo $course["kategorie_name"]?></td>                          

                        <td style="width:50px;">
                            <?php if ($course["urkunde"]): ?>
                                <i class="fas fa-check"></i>
                            <?php else: ?>
                                <i class="fas fa-times"></i>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="course-edit.php?id=<?php echo $course["id"];?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="course-delete.php?id=<?php echo $course["id"];?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "partials/_footer.php" ?>