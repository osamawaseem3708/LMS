<?php

/* @var $this yii\web\View */

$this->title = 'View Users';
?>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/student/web/css/register.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!------ Include the above in your HEAD tag ---------->
<div class="wrapper rounded bg-white" id="update_course" style="width: 90%">
    <div style="float: left">
        <a href="<?php echo Yii::$app->getHomeUrl()."users/dashboard"; ?>" class="btn btn-primary">Back</a>
    </div>
    <div class="h3" style="padding: 2%;text-align: center">View Users Form</div>

    <?php if (Yii::$app->session->hasFlash('update_course')): ?>
        <div class="alert alert-success alert-dismissable" id="update_div">
            <button aria-hidden="true" data-dismiss="alert" onclick="closediv()" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Updated!</h4>
            <?= Yii::$app->session->getFlash('update_course') ?>
        </div>
    <?php endif; ?>


    <?php if (Yii::$app->session->hasFlash('delete_course')): ?>
        <div class="alert alert-success alert-dismissable" id="update_div">
            <button aria-hidden="true" data-dismiss="alert" onclick="closediv()" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Deleted!</h4>
            <?= Yii::$app->session->getFlash('delete_course') ?>
        </div>
    <?php endif; ?>


    <?php if (Yii::$app->session->hasFlash('delete_user')): ?>
        <div class="alert alert-success alert-dismissable" id="update_div">
            <button aria-hidden="true" data-dismiss="alert" onclick="closediv()" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Deleted!</h4>
            <?= Yii::$app->session->getFlash('delete_user') ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('update_user')): ?>
        <div class="alert alert-success alert-dismissable" id="update_div">
            <button aria-hidden="true" data-dismiss="alert" onclick="closediv()" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Updated!</h4>
            <?= Yii::$app->session->getFlash('update_user') ?>
        </div>
    <?php endif; ?>
    <table class="table table-striped" style="text-align: center">

        <th>
            <th width="5%" scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact</th>
            <th scope="col">Gender</th>
            <th scope="col">DOB</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Country</th>
            <th scope="col">City</th>
            <th scope="col">Action</th>
        </tr>

        <tbody>
       <?php if(count($users)>0) {
           $count=1;
        foreach ($users as $user) {
            ?>
    <tr>
<!--    data-bs-toggle="modal" data-bs-target="#staticBackdrop"      -->
<!--    data-bs-toggle="modal" data-bs-target="#staticBackdrop"      -->
        <td><?php  ?></td>
        <td><?php echo $count; ?></td>
        <td><?php echo $user['fname']." ".$user['lname']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['contact']; ?></td>
        <td><?php echo $user['gender']; ?></td>
        <td><?php echo $user['DOB']; ?></td>
        <td><?php echo $user['Role']; ?></td>
        <td><?php echo $user['status']; ?></td>
        <td><?php echo $user['country']; ?></td>
        <td><?php echo $user['city']; ?></td>
        <td>
            <i data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="fa fa-pencil-square-o" aria-hidden="true"
               onclick="gettablerow('<?php echo $user['uid']; ?>','<?php echo $user['fname']; ?>','<?php echo $user['lname']; ?>',
                       '<?php echo $user['email']; ?>','<?php echo $user['contact']; ?>','<?php echo $user['gender']; ?>',
                       '<?php echo $user['DOB']; ?>','<?php echo $user['Role']; ?>','<?php echo $user['status']; ?>',
                       '<?php echo $user['country']; ?>','<?php echo $user['city']; ?>',
                       '<?php echo $user['address']; ?>','<?php echo $user['semester']; ?>','<?php echo $user['password']; ?>')"></i>&nbsp;
            <a href="/student/web/users/deleteuser?id=<?php echo $user['uid']; ?>&name=<?php echo $user['fname']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
</td>
    </tr>

<?php $count++; }
       }
       else{ ?>
           <tr><td colspan="7" style="color: red">No Data Available</td></tr>
      <?php  }
       ?>

        </tbody>
    </table>
    </div>
</div>

</body>
</html>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update User Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<!--                Model Start-->

                <form method="post" novalidate>
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                    <div class="row">
                        <div class="col-md-6 mt-md-0 mt-3"> <label>First Name</label>
                            <input type="text" class="form-control" id="fname" required name="fname"> </div>
                        <div class="col-md-6 mt-md-0 mt-3"> <label>Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" required> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-md-0 mt-3"> <label>Date of Birth</label>
                            <input type="date" class="form-control" name="DOB" id="dob" required> </div>
                        <div class="col-md-6 mt-md-0 mt-3"> <label>Gender</label>
                            <div class="d-flex align-items-center mt-2"> <label class="option">
                                    <input type="radio" name="gender" value="Male" id="genderm" required checked>&nbsp;Male&nbsp; <span class="checkmark"></span> </label>
                                <label class="option ms-4"> <input type="radio" value="Female" id="genderf" required name="gender">&nbsp;Female &nbsp;<span class="checkmark"></span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-md-0 mt-3"> <label>Email</label>
                            <input type="email" id="email" name="email" class="form-control" required> </div>
                        <div class="col-md-6 mt-md-0 mt-3"> <label>Contact Number</label>
                            <input type="tel" id="contact" class="form-control" name="contact" required> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-md-0 mt-3"> <label>Country</label>
                            <select class="form-control" id="country" name="country" required>
                                <option value="" selected hidden>Choose Option</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="India">India</option>
                                <option value="China">China</option>
                                <option value="England">England</option>
                            </select> </div>
                        <div class="col-md-6 mt-md-0 mt-3"> <label>City</label>
                            <select class="form-control" id="city" name="city" required>
                                <option value="" selected hidden>Choose Option</option>
                                <option value="Lahore">Lahore</option>
                                <option value="Islamabad">Islamabad</option>
                                <option value="Rawalpindi">Rawalpindi</option>
                                <option value="Karachi">Karachi</option>
                            </select> </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mt-md-0 mt-3"> <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" required> </div>
                        <div class="col-md-4 mt-md-0 mt-3"> <label>User Role</label>
                            <select class="form-control" onchange="my(this.value)" id="role" name="role" required>
                                <option value="" selected hidden>Choose Option</option>
                                <option value="Student">Student</option>
                                <option value="Teacher">Teacher</option>
                            </select>
                        </div>
                        <div class="col-md-2 mt-md-0 mt-3" id="semester" style="display: none"> <label>Semester</label>
                            <input type="number" name="semster" min="1" max="12" id="sem_text" class="form-control"> </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mt-md-0 mt-3"> <label>Address</label>
                            <textarea required name="address" id="address" class="form-control"></textarea></div>
                        <div class="col-md-6 mt-md-0 mt-3"> <label>User Status</label>
                            <div class="d-flex align-items-center mt-2"> <label class="option">
                                    <input type="radio" name="status" id="statusa" value="Active" required checked>&nbsp;Active&nbsp; <span class="checkmark"></span> </label>
                                <label class="option ms-4"> <input type="radio" id="statusn" value="No Active" required name="status">&nbsp;No Active&nbsp; <span class="checkmark"></span> </label>
                            </div>
                        </div>
                    </div>

<!--                    <div class="btn btn-primary mt-3">-->
<!--                        <button type="submit" class="btn btn-primary">Register</button>-->
<!--                    </div>-->

<input type="hidden" name="uid" id="uid">

<!--        Model Body Ends -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var semester;
    function gettablerow(uid, fname, lname, email, contact, gender, DOB, Role, status, country, city,address,semester,password) {
        console.log("uid= " + uid + " fname= " + fname + " lname= " + lname + " email= " + email + " contact= " + contact + " gender= " + gender
            + " DOB= " + DOB + " Role= " + Role + " status= " + status + " country= " + country + " city= " + city+" Address= "+address);
        document.getElementById('uid').value=uid;
        document.getElementById('fname').value=fname;
        document.getElementById('lname').value=lname;
        document.getElementById('dob').value=DOB;
        document.getElementById('email').value=email;
        document.getElementById('contact').value=contact;
        document.getElementById('city').value=city;
        document.getElementById('country').value=country;
        document.getElementById('address').value=address;
        document.getElementById('role').value=Role;
        document.getElementById('password').value=password;
        if(Role=="Teacher"){
            document.getElementById('semester').style.display="none";
            document.getElementById('sem_text').value=0;
        }
        if(Role=="Student"){
            document.getElementById('semester').style.display="block";
            document.getElementById('sem_text').value=semester;
        }
        semester=document.getElementById('sem_text').value;

        // document.getElementById('role').value=Role;
    }
    function closediv(){
        $("#update_div").fadeOut(1000);
    }

    function my(name){

        if(name=="Student"){
            document.getElementById('semester').style.display="block";
        }
        if(name=="Teacher"){
            document.getElementById('semester').style.display="none";

        }
    }
</script>