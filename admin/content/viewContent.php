<?php 
error_reporting(E_ERROR | E_PARSE);
require "../../lib/helper.php";
session_start();
if(empty($_SESSION['user'])){
  helper::redirect("../../login");
}

require "../../lib/DB.php";
require "../../lib/category.php";
require "../../lib/content.php";

$content= new content();
$contentList=$content->getContentList();

?>
<?php include "../header.php"; ?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <!-- <h3 class="card-title">Title</h3> -->
          <a href="addContent.php" class="btn btn-primary">Add new content</a>
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
                      <th>content name</th>
                      <th>short description</th>
                      <th>main content</th>
                      <th>cover</th>
                      <th>user_id</th>
                      <th>category_id</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($contentList as $content): ?>

                    <tr>
                      <td><?= $content['id']; ?></td>
                      <td><?= $content['title']; ?></td>
                      <td><?= $content['short_desc']; ?></td>
                      <td><?= $content['main_content']; ?></td>
                      <td><img src="../../design/upload/<?= $content['cover'];?>" width="150px" height="150px" alt="..."></td>
                      <td><?= $content['user_id']; ?></td>
                      <td><?= $content['category_id']; ?></td>
                      <td><a href="updateContent.php?id=<?= $content['id'] ?>" class="btn btn-primary">Update</a></td>
                      <td><a href="deleteContent.php?id=<?= $content['id']?>" class="btn btn-danger">Delete</a></td>
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