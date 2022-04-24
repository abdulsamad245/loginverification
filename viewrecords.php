<?php
    $title = "View Attendees";
    require_once 'snippets/header.php';
    require_once 'db/auth_check.php';
    require_once 'db/conn.php';

    $result = $crud->getAttendees();

?>
    <table class="table">
        <tr> 
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialty</th>
            <th class="text-center">View Details</th>
            <th class="text-center">Edit Details</th>
            <th class="text-center">Delete Details</th>
        </tr>
        <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){?>
            <tr> 
                <td><?php echo $r['attendee_id']?></td>
                <td><?php echo $r['firstname']?></td>
                <td><?php echo $r['lastname']?></td>
                <td><?php echo $r['name']?></td>
                <td><a href="view.php?id=<?php echo $r['attendee_id']?>" style="width:100%;" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="edit.php?id=<?php echo $r['attendee_id']?>" style="width:100%;" class="btn btn-warning btn-sm">Edit</a></td>
                <td><a onclick="return confirm('Are you sure you want to delete this record ?')" href="delete.php?id=<?php echo $r['attendee_id']?>" style="width:100%;" class="btn btn-danger btn-sm">Delete</a></td>
           </tr>
        <?php }?>

    </table>
    <br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br>

<?php
    require_once 'snippets/footer.php';
?>