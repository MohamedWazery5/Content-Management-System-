<?php



class user extends DB{
    public function getUser($email,$password){
        return $this->select("user","*")->where("email","=",$email)->andWhere("password","=",$password)->getRow();
    }
}
