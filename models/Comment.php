<?php
    class Comment{
        public $id;
        public $article_id;
        public $id_member;
        public $content;
        public $at;
        public $validate;
        public function __construct($article_id, $id_member, $content)
        {
            $this->article_id = $article_id;
            $this->id_member = $id_member;
            $this->content = $content;
        }


    }