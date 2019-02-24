<?php
class Shtab_investigations extends Model {

    public function getInvestigations(){

        return parent::$db->query('select * from investigations order by post_date desc limit 6');
    }

    public function getLastInvestigation(){
        return parent::$db->query('select * from investigations order by post_date desc limit 1');
    }


    public function getById($id){
        $id = (int)$id;
        $sql = "select * from investigations where id = '{$id}' limit 1";
        $result = parent::$db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getByAlias($alias){
        $alias = parent::$db->escape($alias);
        $sql = "select * from investigations where h1 = '{$alias}' limit 1";
        $result = parent::$db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

}