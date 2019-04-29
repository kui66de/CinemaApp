<?php


include "../model/database.php";


function edit_movie($id){
    $id = $_POST['id'];
    $msg = "success";
    return json_encode($msg);
}



