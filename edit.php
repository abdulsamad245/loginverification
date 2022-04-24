<?php
    $title = "Edit Record";
    require_once 'snippets/header.php';
    require_once 'snippets/auth_check.php';
    require_once 'db/conn.php';

    $result = $crud->getSpecialties();

    if (!isset($_GET['id'])){
        // echo 'error!';
        include 'snippets/errormessage.php';


    }else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);

    ?>
  


    <div class="container">
        <h1 class="text-center">Edit Record</h1>
        <form method="post" action="edit-post.php">
            <input type="hidden" id="attendee_id"  name="attendee_id" value="<?php echo $attendee['attendee_id'] ?>">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" value="<?php echo $attendee['firstname']?>" aria-describedby="firstname" required name="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" value="<?php echo $attendee['lastname']?>"  aria-describedby="lastname" name="lastname">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="text" class="form-control" id="dob" value="<?php echo $attendee['dob']?>"  aria-describedby="dob" name="dob">
            </div>


            <!-- <div class="mb-3">
                <label for="specialty" class="form-label">Area of Expertise</label>
                <select class="form-control" id="specialty_id" name="specialty_id">
                    <option  value="1">Database Admin</option>
                    <option value="9">Software Developer</option>
                    <option value="3">Web Administrator</option>
                    <option value="4">Other</option>
                </select> -->

            <div class="mb-3">
                <label for="specialty" class="form-label">Area of Expertise</label>
                <select class="form-control" id="specialty_id" name="specialty_id">
                    <?php while($r = $result->FETCH(PDO::FETCH_ASSOC)) {?>
                        <option  value="<?php echo $r['specialty_id']?>"
                        <?php if($r['specialty_id'] == $attendee['specialty_id']){
                            echo 'selected';}?>>
                            <?php echo $r['name']?></option>
                    <?php }?>

                </select>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="tel" class="form-control" id="phone" aria-describedby="phone" value="<?php echo $attendee['contact']?>"  name="phone">
                <div id="emailHelp" class="form-text">We'll never share your number with anyone else.</div>
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $attendee['emailaddress']?>"  name="email">
                <div id="phone" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <div class="d-grid mb-3 text-center">
                <button type="submit" class="btn btn-success" name="submit">Save Changes</button>
            </div>
            <br>
            <br>
        </form>
        <?php }?>
    </div>
<?php
    require_once 'snippets/footer.php';
?>