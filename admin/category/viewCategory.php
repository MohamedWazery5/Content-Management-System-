<?php 
error_reporting(E_ERROR | E_PARSE);
require "../../lib/helper.php";
session_start();
if(empty($_SESSION['user'])){
  helper::redirect("../../login");
}

require "../../lib/DB.php";
require "../../lib/category.php";


$category= new category();
$categoryList=$category->getCategoryList();

?>
<?php include "../header.php"; ?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <!-- <h3 class="card-title">Title</h3> -->
          <a href="addCategory.php" class="btn btn-primary">Add new category</a>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Category name</th>
                      <th>Update</th>
                      <th style="width: 40px">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($categoryList as $category): ?>

                    <tr>
                      <td><?= $category['id']; ?></td>
                      <td><?= $category['name']; ?></td>
                      <td><a href="updateCategory.php?id=<?= $category['id'] ?>" class="btn btn-primary">Update</a></td>
                      <td><a href="deleteCategory.php?id=<?= $category['id']?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
 <?php include "../footer.php";   ?>