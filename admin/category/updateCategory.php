<?php 

require "../../lib/helper.php";

session_start();
if(empty($_SESSION['user'])){
  helper::redirect("../../login");
}

require "../../lib/DB.php";
require "../../lib/category.php";
require "../../lib/validation.php";

$category = new category();
$category_data=$category->getCategorybyID($_GET['id']);



// print_r($category_data);die;

if(isset($_POST['category'])){

        $category->updateCategory($_POST['id'], ["name" => $_POST['category']]);
        helper::redirect("viewCategory");
        
}

include "../header.php"; 



?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Update</h3>

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
          
        <div class="card card-primary">

              <!-- /.card-header -->
              <!-- form start -->
              <form action="updateCategory.php" method="post">
                <div class="card-body">
 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category name</label>
                    <input type="text" name="category" class="form-control" id="exampleInputEmail1" value="<?= $category_data['name']; ?>">
                  </div>

                </div>
                <!-- /.card-body -->
                <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" value="<?= $category_data['id']; ?>">
                <div class="card-body">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>

        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
 <?php include "../footer.php";   ?>