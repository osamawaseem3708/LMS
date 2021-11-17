<?php

/* @var $this yii\web\View */

$this->title = 'Register User';
?>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/student/web/css/register.css">
</head>
<div>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
<div class="container rounded bg-white" style="margin-top: 1%">
    <div style="float: left;margin-top: 2%;">
        <a href="<?php echo Yii::$app->getHomeUrl()."users/dashboard"; ?>" class="btn btn-primary">Back</a>
    </div>
    <div class="h3" style="padding: 2%;text-align: center">Registration Form</div>
    <form method="post">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>First Name</label>
                <input type="text" class="form-control" required name="fname"> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Last Name</label>
                <input type="text" class="form-control" name="lname" required> </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Date of Birth</label>
                <input type="date" class="form-control" name="DOB" required> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Gender</label>
                <div class="d-flex align-items-center mt-2"> <label class="option">
                        <input type="radio" name="gender" value="Male" required checked>Male <span class="checkmark"></span> </label>
                    <label class="option ms-4"> <input type="radio" value="Female" required name="gender">Female <span class="checkmark"></span> </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Email</label>
                <input type="email" name="email" class="form-control" required> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Contact Number</label>
                <input type="tel" class="form-control" name="contact" required> </div>
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
                <input type="password" name="password" class="form-control" required> </div>
            <div class="col-md-4 mt-md-0 mt-3"> <label>User Role</label>
                <select class="form-control" id="role" onchange="my(this.value)" name="role" required>
                    <option value="" selected hidden>Choose Option</option>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                </select>
            </div>
            <div class="col-md-2 mt-md-0 mt-3" id="semester" style="display: none"> <label>Semester</label>
                <input type="number" name="semster" id="sem_text" class="form-control"> </div>
        </div>


        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Address</label>
                <textarea required name="address" class="form-control"></textarea></div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>User Status</label>
                <div class="d-flex align-items-center mt-2"> <label class="option">
                        <input type="radio" name="status" value="Active" required checked>&nbsp;Active&nbsp; <span class="checkmark"></span> </label>
                    <label class="option ms-4"> <input type="radio" value="No Active" required name="status">&nbsp;No Active&nbsp; <span class="checkmark"></span> </label>
                </div>
            </div>
        </div>

        <div class="btn btn-primary mt-3">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

    </form>
    </div>
</div>

</div>

<!--Body Ends-->
</body>
</html>

<script>
    function my(name){

        if(name=="Student"){
        document.getElementById('semester').style.display="block";
        }
        if(name=="Teacher"){
            document.getElementById('semester').style.display="none";
            document.getElementById('sem_text').value=0;
        }
    }
</script>