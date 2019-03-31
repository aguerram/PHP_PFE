<?php
    require_once "../config/Connection.php";

    class ContactDAO extends Connection{
        public function contact($name,$email,$msg)
        {
            $sql = "insert into contact VALUES (null,'$name','$email','$msg')";
            return mysqli_query($this->conn,$sql);
        }
        public function getIndex()
        {
            $sql ="select * from contact";
            $data = array();
            $res =mysqli_query($this->conn,$sql);
            while($row = mysqli_fetch_assoc($res))
                array_push($data,$row);
            return $data;
        }
        public function delete($id)
        {
            return mysqli_query($this->conn,"delete from contact WHERE id= $id");
        }
    }