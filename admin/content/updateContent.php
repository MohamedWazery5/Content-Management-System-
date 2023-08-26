<?php
require "../../lib/helper.php";
session_start();
if(!isset($_SESSION['user'])){
    helper::redirect("login");
}
require "../../lib/DB.php";
require "../../lib/content.php";
require "../../lib/category.php";
require "../../lib/validation.php";

$category=new category();
$categoryData=$category->getCategoryList();
$content=new content();
$contentData=$content->getContentbyID($_GET['id']);

if(isset($_POST['name'])){
    if(validation::string_empty($_POST['name'])==false && validation::string_empty($_POST['short_desc'])==false){
        $data=[
          "title" => $_POST['name'],
          "cover" => $_FILES['cover']['name'],
          "short_desc" => $_POST['short_desc'],
          "main_content" => addslashes(strip_tags($_POST['desc'])),
          "user_id" => $_SESSION['user']['id'],
          "category_id" => $_POST['category']
        ];
        move_uploaded_file($_FILES['cover']['tmp_name'],"../../design/upload/".$_FILES['cover']['name']);
        // print_r($data);die;
        $res=$content->updateContent($data,$_POST['id']);
        if($res){
            helper::redirect("viewContent");
          }else{
            $error="invalid operation";
          }
    }

}



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

              <form action="updateContent.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
 
                  <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" name="name" value="<?= $contentData['title']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Short Description</label>
                    <input type="text" value="<?= $contentData['short_desc']; ?>" name="short_desc" class="form-control" id="exampleInputEmail1" placeholder="Enter Short Description">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea id="summernote" value="<?= $contentData['main_content']; ?>" name="desc"></textarea>    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cover</label>
                    <input type="file" name="cover" value="<?= $contentData['cover']; ?>"  class="form-control" id="exampleInputEmail1" placeholder="Enter Short Description">
                  </div>
                  <input type="hidden" name="id" class="form-control" id="exampleInputEmail1"value="<?= $contentData['id'] ?>">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                        <select name="category">
                            <?php foreach($categoryData as $category): ?>
                            <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
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
 <?php include "../footer.php";   ?>