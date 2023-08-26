<?php

class review extends DB{
    public function addReview($data){
        return $this->insert("review",$data)->excute();
    }
    public function getReviewList($id){
        return $this->select("review","*")->where("content_id","=",$id)->getAll();
    }
}

?>