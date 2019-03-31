<?php
require_once "../config/Connection.php";
require_once "../models/Event.php";

class EventDAO extends Connection
{
    public function save(Event $e)
    {
        $sql = "insert into event(titre, datedep, datefin, description, cordx, cordy, image, type, id_member) VALUES 
        (
        '$e->titre',
        '$e->datedep',
        '$e->datefin',
        '$e->description',
        $e->cordx,
        $e->cordy,
        '$e->image',
        '$e->type',
        $e->id_member
        )";
        return mysqli_query($this->conn, $sql);
    }
    public function getIndex($id = 0)
    {
        $sql = "select * from event order by active, id desc";
        if($id != 0)
        {
            $sql = "select * from event where id_member = $id ";
        }
        $res = mysqli_query($this->conn,$sql);
        $data = array();
        while($row = mysqli_fetch_assoc($res))
        {
            array_push($data,$row);
        }
        return $data;
    }
    public function search($s)
    {
        $sql = "select * from event where titre like '%$s%' or description  like '%$s%'";
        $res = mysqli_query($this->conn,$sql);
        $data = array();
        while($row = mysqli_fetch_assoc($res))
        {
            array_push($data,$row);
        }
        return $data;
    }
    public function getIndexByType($type)
    {
        $sql = "select * from event where type='$type'";
        $res = mysqli_query($this->conn,$sql);
        $data = array();
        while($row = mysqli_fetch_assoc($res))
        {
            array_push($data,$row);
        }
        return $data;
    }
    public function getIndexByID($id)
    {
        $sql = "select * from event where id = $id";
        $res = mysqli_query($this->conn,$sql);
        if($row = mysqli_fetch_assoc($res))
        {
            return $row;
        }
        return null;
    }
    public function delete($id)
    {
        $sql= "delete from event where id = $id";
        return mysqli_query($this->conn,$sql);
    }
    public function active($id)
    {
        $sql= "update event set active = 1 where id = $id";
        return mysqli_query($this->conn,$sql);
    }
}