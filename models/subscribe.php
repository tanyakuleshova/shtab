<?php
class Subscribe extends Model {

    public function get_subscription(){
        
        $subscribe_name = parent::$db->escape($_POST['subscribe_name']);
        $subscribe_email = parent::$db->escape($_POST['subscribe_email']);
        
        $sql=
            "INSERT INTO subscribers (`name`, email) 
            VALUES ('".$subscribe_name."','".$subscribe_email."')";

        return $result = parent::$db->query($sql);
    
}
public function join_shtab(){
        
    $joinForm_name = parent::$db->escape($_POST['joinForm_name']);
    $joinForm_phone = parent::$db->escape($_POST['joinForm_phone']);
    $joinForm_email = parent::$db->escape($_POST['joinForm_email']);
    $joinForm_region = parent::$db->escape($_POST['joinForm_region']);
    $joinForm_social_link = parent::$db->escape($_POST['joinForm_social_link']);
    $joinForm_additional_msg = parent::$db->escape($_POST['joinForm_additional_msg']);
    $joinForm__HelpType = $_POST['joinForm__HelpType'];
    $helpValue = '';
    foreach($joinForm__HelpType as $value){
        if($value !== ''){
            $helpValue = parent::$db->escape($value);
        }
    }
    $sql=
        "INSERT INTO joined_members (`name`, email, phone, region, social_link, additional_msg, help_type) 
        VALUES ('".$joinForm_name."','".$joinForm_email."','".$joinForm_phone."','".$joinForm_region."'
        ,'".$joinForm_social_link."', '".$joinForm_additional_msg."', '".$helpValue."')";

    return $result = parent::$db->query($sql);

}

public function disclose_corruption(){
        $corruptionForm_name = parent::$db->escape($_POST['corruptionForm_name']);
        $corruptionForm_email = parent::$db->escape($_POST['corruptionForm_email']);
        $corruptionForm_phone = parent::$db->escape($_POST['corruptionForm_phone']);
        $corruptionForm_region = parent::$db->escape($_POST['corruptionForm_region']);
        $corruptionForm_situation = parent::$db->escape($_POST['corruptionForm_situation']);
        $corruptionForm_arguments = parent::$db->escape($_POST['corruptionForm_arguments']);
        $corruptionForm_corruptName = parent::$db->escape($_POST['corruptionForm_corruptName']);

        $sql=
        "INSERT INTO corruption_info (`name`, email, phone, region, `description`, arguments, corrupt_name, files) 
        VALUES ('".$corruptionForm_name."','".$corruptionForm_email."','".$corruptionForm_phone."','".$corruptionForm_region."'
        ,'".$corruptionForm_situation."', '".$corruptionForm_arguments."', '".$corruptionForm_corruptName."', '".$file_name."')";

    return $result = parent::$db->query($sql);
    }

}