<?php
require_once "../config/Connection.php";
require_once "../models/Comment.php";

class CommentDAO extends Connection
{

    /**
     * CommentDAO constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Comment $cm)
    {
        $sql = "insert into commentaires(article_id, id_member, content) VALUES ($cm->article_id,$cm->id_member,'$cm->content')";
        return mysqli_query($this->conn,$sql);
    }

    public function validate($id)
    {
        $sql = "update commentaires set validate = 1 where id= $id";
        return mysqli_query($this->conn,$sql);
    }
    public function delete($id)
    {
        $sql = "delete from commentaires where id= $id";
        return mysqli_query($this->conn,$sql);
    }
    public function getByArticleID($id)
    {
        require_once "../models/Member.php";
        $mb = new Member();
        $sql = "select * from commentaires where article_id = $id and validate = 1";
        $res = mysqli_query($this->conn,$sql);
        $data = array();
        while($row = mysqli_fetch_assoc($res))
        {
            $id_member = $mb->getMemberName($row['id_member']);
            $row = array_merge($row,["full_name"=>$id_member ]);
            array_push($data,$row);

        }
        return $data;
    }
    public function countComments($id_member)
    {
        require_once "../models/Member.php";
        $mb = new Member();
        $sql = "select count(id) cnt from commentaires where article_id in (select ID_ARTICLE from article where ID_MEMBRE = $id_member ) and validate = 0";
        $res = mysqli_query($this->conn,$sql);
        $count = 0;
        if($row = mysqli_fetch_assoc($res))
        {
            $count = $row['cnt'];
        }
        return $count;
    }
    public function getByUserID($id_user,$validate=0)
    {
        require_once "../models/Member.php";
        $mb = new Member();
        $sql = "select * from commentaires where article_id in (select ID_ARTICLE from article where ID_MEMBRE = $id_user ) and validate = $validate";
        $res = mysqli_query($this->conn,$sql);
        $data = array();
        while($row = mysqli_fetch_assoc($res))
        {
            $id_member = $mb->getMemberName($row['id_member']);
            $row = array_merge($row,["full_name"=>$id_member ]);
            array_push($data,$row);
        }
        return $data;
    }
}