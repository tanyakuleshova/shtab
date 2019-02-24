<?php

class Team extends Model {
    
    public function get_members_info(){
        return parent::$db->query('select * from members');
    }

    public function get_volunteers_info(){
        return parent::$db->query('select * from volunteers');
    }


}