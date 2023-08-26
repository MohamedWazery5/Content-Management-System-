<?php 
error_reporting(E_ERROR | E_PARSE);
require "../../lib/helper.php";
session_start();
if(empty($_SESSION['user'])){
  helper::redirect("../../login");
}

require "../../lib/DB.php";
require "../../lib/category.php";
require "../../lib/validation.php";
require "../../lib/content.php";

$category=new category();
$categoryData=$category->getCategoryList();
$success='';
$error='';

if(isset($_POST['name'])){
      if(validation::string_empty($_POST['name'])==false && validation::string_empty($_POST['short_desc'])==false){
        $data=[
          "title" => $_POST['name'],
          "cover" => $_FILES['cover']['name'],
          "short_desc" => $_POST['short_desc'],
          "main_content" => addslashes($_POST['desc']),
          "user_id" => $_SESSION['user']['id'],
          "category_id" => $_POST['category']
        ];
        move_uploaded_file($_FILES['cover']['tmp_name'],"../../design/upload/".$_FILES['cover']['name']);
        // echo "<pre>";
        // print_r($data);die;  
        $content=new content();
        $res=$content->addContent($data);
        if($res){
          $success="Content added successfully";  
          helper::redirect("viewContent",0.5);
        }else{
          $error="invalid operation";
        }
      }
}


include "../header.php"; 



?>
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add Content</h3>

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
              <form action="addContent.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
 
                  <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Short Description</label>
                    <input type="text" name="short_desc" class="form-control" id="exampleInputEmail1" placeholder="Enter Short Description">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea id="summernote" name="desc"></textarea>    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cover</label>
                    <input type="file" name="cover" class="form-control" id="exampleInputEmail1" placeholder="Enter Short Description" onchange="readURL(this);" />
                    <img id="blah" src="#" alt=". . ." />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                        <select name="category">
                            <?php foreach($categoryData as $category): ?>
                            <option value="<?= $category['id']?>"><?= $category['name']?></option>
                            <?php endforeach; ?>
                        </select>
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
    <script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>    
 <?php include "../footer.php";   ?>