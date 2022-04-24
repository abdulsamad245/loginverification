<?php
    $title = "Success";
    require_once 'snippets/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        //extract values from the post array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty_id = $_POST['specialty_id'];
        $dob = $_POST['dob'];

        $isSuccess = $crud->insert($fname,$lname,$email,$contact,$specialty_id,$dob); 
        $specialtyName = $crud -> getSpecialtyById($specialty_id);

        if($isSuccess){
            include 'snippets/successmessage.php';


        }else{
            echo "<h1 class='text-center text-danger'>There was an error processing!</h1>";

        }
    }
?>
    
    <div class="card " style="width: 18rem; padding-left:auto; padding-right:auto;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $_POST['firstname'].' '.$_POST['lastname'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $specialtyName['name'];?></h6>
                <p class="card-text">Specialty: <?php echo $specialtyName['name']; ?></p>
                <p class="card-text">Email:<?php echo $_POST['email']; ?></p>
                <p class="card-text">Contact Number:  <?php echo $_POST['phone']; ?></p>
                <p class="card-text">Date of Birth:<?php echo $_POST['dob']; ?></p>
            </div>
       </div>
    <?php 

    ?>
<br>
<br>
<br>
<br>
<br>
<?php
    require_once 'snippets/footer.php';
?>