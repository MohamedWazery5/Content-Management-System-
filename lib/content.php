<?php

class content extends DB{
    public function addContent($data){
       return $this->insert("content",$data)->excute();
    }
    public function getContentList(){
        return $this->select("content","*")->getAll();
    }
    public function getContentbyID($id){
        return $this->select("content","*")->where("id","=",$id)->getRow();
    }
    public function singleBlog($id){
        return $this->select("content","content.* , category.name AS c_name , user.name AS u_name")->join("category","category.id","content.category_id")->join("user","`user`.id","content.user_id")->where("content.id","=",$id)->getRow();
    }
    public function updateContent($data,$id){
        return $this->update("content",$data)->where("id","=",$id)->excute();
    }
    public function deleteContent($id){
        return $this->delete("content")->where("id","=",$id)->excute();

    }
}