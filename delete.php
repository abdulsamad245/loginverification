<?php
    
    require_once 'db/auth_check.php';
    require_once 'db/conn.php';
    if(!isset($_GET['id'])){
        // echo 'error!';
        include 'snippets/error.php';
        include 'snippets/successmessage.php';
    }else{
        $id = $_GET['id'];
        $result = $crud -> deleteAttendee($id); 

        if($result){
            header('Location:viewrecords.php');
        
         }else{
            // echo 'error';
            include 'snippets/errormessage.php';

    }
}

?>
