<?php


class Searching extends Model {
    public static $search;
    
    public function get_search_result(){

        self::$search = $search_request = parent::$db->escape($_POST['search']);

        $sql = "select * from news where (h1 like '%{$search_request}%')";
        
        return parent::$db->query($sql);
    }
}

