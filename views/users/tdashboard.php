<?php

/* @var $this yii\web\View */

$this->title = 'Teacher Dashboard';
?>
<?php if (Yii::$app->session->hasFlash('successs')): ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Saved!</h4>
        <?= Yii::$app->session->getFlash('successs') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('create_course')): ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Saved!</h4>
        <?= Yii::$app->session->getFlash('create_course') ?>
    </div>
<?php endif; ?>

<!------ Include the above in your HEAD tag ---------->


<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/student/web/css/dashboard.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body
<div class="container" >
    <h1 style="text-align: center">Teacher Dashboard</h1>
    <div class="row"id="first_row" >
        <div class="col-md-3 blocks" >
            <label><a href="<?php echo Yii::$app->getHomeUrl()."users/tviewcourse"; ?>">View Courses</a></label>
        </div>

        <div class="col-md-3 blocks" >
            <label><a href="<?php echo Yii::$app->getHomeUrl()."users/tenrollcourse"; ?>">Enrolled Courses</a></label>
        </div>

        <div class="col-md-3 blocks">
            <label><a href="<?php echo Yii::$app->getHomeUrl()."users/tviewbatch";?>">View Batch</a></label>
        </div>



    </div>
<br><br>
    <div class="row" style="column-count: 3;column-gap: 40px;">
        <div class="col-md-3 blocks">
            <label><a href="<?php echo Yii::$app->getHomeUrl()."users/tcreatequiz"; ?>">Create Quiz</a></label>
        </div>
        <div class="col-md-3 blocks">
            <label><a href="#">Create Comment </a></label>
        </div>
        <div class="col-md-3 blocks">
            <label><a href="<?php echo Yii::$app->getHomeUrl()."users/logout"; ?>">Logout</a></label>
        </div>
    </div>
</div>
</body>
</html>