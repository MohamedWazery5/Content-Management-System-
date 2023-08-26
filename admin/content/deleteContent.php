<?php 
require "../../lib/helper.php";
require "../../lib/DB.php";
require "../../lib/content.php";
session_start();
if(!isset($_SESSION['user'])){
    helper::redirect("login");
}

$content=new content();
$content->deleteContent($_GET['id']);
helper::redirect("viewContent");