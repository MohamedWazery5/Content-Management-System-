<?php
class DB{
    public $connection;
    public $sql;
    public $query;
    
    public function __construct(){
        $this->connection=mysqli_connect("localhost","root","","cms");
    }
    public function select($table,$column){
        $this->sql="Select $column from $table";
        return $this;
    }
    public function where($thing,$compare,$value){
        $this->sql .=" where $thing $compare '$value'";
        // print_r($this->sql);die;
        return $this;
    }
    public function andWhere($thing,$compare,$value){
        $this->sql .=" AND `$thing` $compare '$value'";
        return $this;
    }
    public function orWhere($thing,$compare,$value){
        $this->sql .=" OR `$thing` $compare '$value'";
        return $this;
    }
    public function join($table,$column1,$column2){
        $this->sql .=" INNER JOIN $table ON $column1 = $column2 ";
        return $this;
    }
    public function getRow(){
        // print_r($this);die;
        $this->query=mysqli_query($this->connection,$this->sql);
        $row=mysqli_fetch_assoc($this->query);
        return $row;
    }
    public function getAll(){
        $this->query=mysqli_query($this->connection,$this->sql);
        while ($row=mysqli_fetch_assoc($this->query)){
            $date[] =$row;
        }
        return $date;
    }
    public function insert($table,$data){
        $column="";
        $value="";
        foreach($data as $key => $val){
            $column .= " `$key` ,";
            $value .= (gettype($val) == 'string' ) ?  " '$val' ," : " $val ,";  
        }
        $column = rtrim($column, ',');
        $value = rtrim($value, ',');
        $this->sql="INSERT INTO `$table` ($column) VALUES ($value)";
        return $this;
    }
    public function excute(){
        //   print_r($this->sql);die;
        $this->query = mysqli_query($this->connection,$this->sql);
        if(mysqli_affected_rows($this->connection)>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function update($table,$data){
        $row="";
        foreach($data as $key=>$val){
            $row .=" `$key`='$val',";        
        }
        $row=rtrim($row,',');
        // print_r($row);die;
        $this->sql="UPDATE `$table` SET $row";
        return $this;
    }
    public function delete($table){
        $this->sql="DELETE FROM `$table`";
        return $this;
    }
    public function __destruct() {
        mysqli_close($this->connection);
    }

    

}

// $db= new db();
// $user=[
//     "name" => "mousa"
// ];

// echo "<pre>";
// print_r($db->select("users","*")->getAll());
// print_r($db->select("users","*")->where("id","=",5)->andWhere("name","=","ahmed")->getRow());
//  echo $db->insert("users",$user)->excute();
// $db->update("users",$user)->where("id","=",4)->excute();
// $db->delete("users")->where("id","=",4)->excute();