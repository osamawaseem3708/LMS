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
<body>
<!------ Include the above in your HEAD tag ---------->
<div class="wrapper rounded bg-white" style="margin-top: 0%">
    <div style="float: left">
        <a href="<?php echo Yii::$app->getHomeUrl()."users/dashboard"; ?>" class="btn btn-primary">Back</a>
    </div>
    <div class="h3" style="padding: 2%;text-align: center">Registration Course Form</div>
    <form method="post">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Course Name</label>
                <input type="text" class="form-control" required name="cname"> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Create Date</label>
                <input type="date" class="form-control" name="cdate" required> </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Course Category</label>
                <select class="form-control" name="ccategory" required>
                    <option value="" selected>Choose Option</option>
              <?php   foreach ($category as $item) { ?>
                   <option value="<?php echo $item['ccid'];?>"><?php echo $item['name'];?></option>
                   <?php } ?>
                </select>
            </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Course Year</label>
                <div class="d-flex align-items-center mt-2">

                   <input type="text" class="form-control" required name="cyear">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6 mt-md-0 mt-3"> <label>Course Credit Hours</label>
                <input type="number" class="form-control" min="1" maxlength="6" required name="chrs"> </div>

            <div class="col-md-2 mt-md-0 mt-3"> <label>Course Status</label>
                <div class="d-flex align-items-center mt-2">
                    <label class="option"><input type="radio" name="status" value="Active" required checked>&nbsp;Active <span class="checkmark"></span> </label>&nbsp;
                    <label class="option ms-4"> <input type="radio" value="No Active" required name="status">&nbsp;No Active <span class="checkmark"></span> </label>
                </div>
            </div>

            <div class="col-md-2 mt-md-0 mt-3"> <label>For Semester</label>
                <input type="number" class="form-control" min="1" value="1" maxlength="8" required name="offer_semester"> </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-md-0 mt-3"> <label>Course Description</label>
                <textarea style="resize: none;height: 65%" required name="description" class="form-control"></textarea>
            </div>
        </div>
        <div class="btn btn-primary " style="margin-top: 4%;">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
    </div>
</div>


<!--Body Ends-->
</body>
</html>

