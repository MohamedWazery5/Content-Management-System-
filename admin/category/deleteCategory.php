<?php

require "../../lib/helper.php";

session_start();
if(empty($_SESSION['user'])){
  helper::redirect("../../login");
}
require "../../lib/DB.php";
require "../../lib/category.php";
$category= new category();

$category->deleteCategory($_GET['id']);

helper::redirect("viewCategory");

