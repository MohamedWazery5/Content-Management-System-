<?php
require "lib/DB.php";
require "lib/review.php";

$name=$_POST['name'];
$email=$_POST['email'];
$review=$_POST['review'];
$content_id=$_POST['content_id'];
// print_r($name);die;

$data=[
    "name" => $name,
    "email" => $email,
    "comment" => $review,
    "content_id" => $content_id
];
$reviewD=new review();
$reviewD->addReview($data);
