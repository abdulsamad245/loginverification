<?php
    $title = "View eEcord";
    require_once 'snippets/header.php';
    require_once 'db/conn.php';

    //Get Attendees by Id
    if( !isset($_GET["id"])){
        echo "<h1 class='text-danger'>Please Check Details and try again!</h1>";
    }else{
        try{
            $id = $_GET["id"];
            $result = $crud->getAttendeeDetails($id);
            $r = $result;
        }catch(Exception $e){
            echo "j";
        }
    ?>
    



<div class="card " style="width: 22rem; margin-left:auto; margin-right:auto;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $r['attendee_id']?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $r['firstname']." ".$r['lastname']?></h6>
                <p class="card-text">Specialty: <?php echo $r['name']?></p>
                <p class="card-text">Email:<?php echo $r['emailaddress']?></p>
                <p class="card-text">Contact Number:  <?php echo $r['contact']?></p>
                <p class="card-text">Date of Birth:<?php echo $r['dob']; ?></p>
            </div>
       </div><br>
       <div style="width: 22rem; margin-left:auto; margin-right:auto;" class="text-center" >
                 <a href="viewrecords.php" class="btn btn-primary btn-sm"  style="width: 7rem;"  >Back to List</a>
                <a href="edit.php?id=<?php echo $r['attendee_id']?>"  class="btn btn-warning btn-sm" style="width: 7rem;">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record ?')" href="delete.php?id=<?php echo $r['attendee_id']?>"class="btn btn-danger btn-sm" style="width: 7rem;" >Delete</a>
       </div>

        
<?php }?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
    require_once 'snippets/footer.php';
?>