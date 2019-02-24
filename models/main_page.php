<?php

class Main_page extends Model {
    
    public function get_last_news(){
        return parent::$db->query('select * from news limit 1');
    }

    public function getNews(){
        return parent::$db->query('select * from news order by post_date desc limit 6');
    }

    public function getInvestigations(){
        return parent::$db->query('select * from investigations order by post_date desc limit 6');
    }

    public function get_last_investigation(){
        return parent::$db->query('select * from investigations order by post_date desc limit 1');
    }
}