<?php
    $title = "Home";
    require_once 'snippets/header.php';
    //require_once 'db/conn.php';

    //$result = $crud->getSpecialties();

?>
    <div class="container">
        <h1 class="text-center">Registration for IT Conference</h1>
        <form method="post" action="success.php">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" aria-describedby="firstname" required name="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" aria-describedby="lastname" name="lastname">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="text" class="form-control" id="dob" aria-describedby="dob" name="dob">
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
                        <option  value="<?php echo $r['specialty_id']?>"><?php echo $r['name']?></option>
                    <?php }?>

                </select>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="tel" class="form-control" id="phone" aria-describedby="phone" name="phone">
                <div id="emailHelp" class="form-text">We'll never share your number with anyone else.</div>
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="phone" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3 custom-file">
               
                <input type="file" class="custom-file-input" id="avatar" aria-describedby="avatar" name="avatar">
                <label for="avatar" class="custom-fle-label">Choose File</label>
                <small id="avatar-text" class="form-text-danger">Upload Image (Optional)</small>

             
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
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
            <br>
            <br>
        </form>
    </div>
<?php
    require_once 'snippets/footer.php';
?>
