<?php


class category extends DB
{
    public function addCategory($data)
    {
        $res = $this->insert("category",$data)->excute();
        // print_r($this);die;dd();
        return $res;
    }
    public function getCategoryList(){
       return $this->select("category","*")->getAll();
    }
    public function deleteCategory($id){
        return $this->delete("category")->where("id","=",$id)->excute();
    }
    public function updateCategory($id,$data){
        return $this->update("category", $data)->where("id","=",$id)->excute();
    }
    public function getCategorybyID($id){
       return $this->select("category","*")->where("id","=",$id)->getRow();
    }
}



?>