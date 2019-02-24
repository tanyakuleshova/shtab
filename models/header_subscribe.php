<?php
require_once 'lib/db.class.php';
require_once 'init.php';

$nameError = $emailError = $nameErrorEN = $emailErrorEN = $errorMessage = $errorMessageEN = "";
if($_POST){
    $error = 0;
    if(isset($_POST['subscribe-name']) && isset($_POST['subscribe-email'])){
        $sub_name = $shtab_db->escape($shtab_db->check($_POST['subscribe-name']));
        $sub_email = $shtab_db->escape($shtab_db->check($_POST['subscribe-email']));
        
        $sql = "insert into subscribers set name = '{$sub_name}', email = '{$sub_email}';";
        if (!preg_match("/^[a-zA-Z ]*$/", $sub_name)) {
            $nameError = "Ви ввели недопустимі симвлоли.";
            $nameErrorEN = "You have entered invalid characters.";
        } 
        if(!filter_var($sub_email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Ви ввели некоректний email.";
            $emailErrorEN = "You have entered invalid email.";
        } else{
            $shtab_db->query($sql);
        }
    }else{
        $error++;
        $errorMessage = "Форма не відправлена! Виникло помилок: " . "{$error}" . ".";
        $errorMessageEN = "The form is not sent! Errors occurred: " . "{$error}" . ".";
    }
}

