<?php
class All_news extends Model {
    
    public function getNews(){
        
        return parent::$db->query('select * from news order by post_date desc limit 6');
    }

    public function getLastNews(){
        return parent::$db->query('select * from news order by post_date desc limit 1');
    }


    public function getById($id){
        $id = (int)$id;
        $sql = "select * from news where id = '{$id}' limit 1";
        $result = parent::$db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getByAlias($alias){
        $alias = parent::$db->escape($alias);
        $sql = "select * from news where h1 = '{$alias}' limit 1";
        $result = parent::$db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

}