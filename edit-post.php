<?php
 
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        //extract values from the post array
        $id = $_POST['attendee_id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty_id = $_POST['specialty_id'];
        $dob = $_POST['dob'];

        $result = $crud -> editAttendee($id,$fname,$lname,$email,$contact,$specialty_id,$dob);
        if($result){
            header('Location:viewrecords.php');
        }else{
            echo 'error';
        }


    }else{
        echo 'error_2';
    }

    ?>

<?php
    require_once 'snippets/footer.php';
?>