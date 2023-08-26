<?php 

require "../../lib/helper.php";
session_start();

if(empty($_SESSION['user'])){
  helper::redirect("../../login");
}
require "../../lib/DB.php";
require "../../lib/category.php";
require "../../lib/validation.php";
$success='';
$error='';
if (isset($_POST['category'])){
    $validation_res=validation::string_empty($_POST['category']);
    if($validation_res==false){
        $category= new category();
        $res = $category->addCategory(
            ["name" => $_POST['category']]);
        //  echo $res;die;
        if($res){
            $success='category  inserted';
            // $helper=new helper();
            // $helper->redirect
            helper::redirect("viewCategory",0.5);
            // helper::redirectWait("viewCategory",0.5);
        }else{
            $success='category not inserted';
        }
    }else{
        $error="category input must be required";
    }
    }
//  echo strlen($success);die;

include "../header.php"; 



?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add Category</h3>

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
                   <?php  if(strlen($success)>0):    ?>
                   <div class="alert alert-success" role="alert">
                     <?= $success;?>
                    </div>
                    <?php endif; ?>
                    <?php  if(strlen($error)>0):    ?>
                   <div class="alert alert-danger" role="alert">
                     <?= $error;?>
                    </div>
                    <?php endif; ?>
              <form action="addCategory.php" method="post">
                <div class="card-body">
 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category name</label>
                    <input type="text" name="category" class="form-control" id="exampleInputEmail1" placeholder="Enter Category name">
                  </div>
                </div>
                <!-- /.card-body -->

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