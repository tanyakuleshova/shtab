<?php
function index(){

session_start();
$search_result_par = '';

$model = new Searching();

if(isset($_POST['search'])){
    $rows = $model->get_search_result();
    $_SESSION['rows'] = $rows;
    
    if(!$rows){
        $search_result_par = "За запитом: '{$model::$search}' нічого не знайдено";
        $_SESSION['search_result_par'] = $search_result_par;
        
    } else {
        $search_result_par = "Результати пошуку за запитом: '{$model::$search}':";
        $_SESSION['search_result_par'] = $search_result_par; 
    }
    
}
}

// if(isset($_POST['search'])){
//     $search = $shtab_db->escape($_POST['search']);
//     $sql = "select * from news where (h1 like '%{$search}%')";
//     $rows = $shtab_db->query($sql);
//     $_SESSION['rows'] = $rows;

//     if(!$rows){
//         $search_result_par = "За запитом: '{$search}' нічого не знайдено";
//         $_SESSION['search_result_par'] = $search_result_par;
        
//     } else {
//         $search_result_par = "Результати пошуку за запитом: '{$search}':";
//         $_SESSION['search_result_par'] = $search_result_par; 
//     }
    
// }

