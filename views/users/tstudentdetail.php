<?php

/* @var $this yii\web\View */

$this->title = 'Batch ';
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
        <a href="<?php echo Yii::$app->getHomeUrl()."users/tdashboard";?>" class="btn btn-primary">Back</a>
    </div>
    <div class="h3" style="padding: 2%;text-align: center">Course Wise Student Detail</div>


    <?php if (Yii::$app->session->hasFlash('Enrolled_Delete')): ?>
        <div class="alert alert-success alert-dismissable" id="update_div">
            <button aria-hidden="true" data-dismiss="alert" onclick="closediv()" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Success!</h4>
            <?= Yii::$app->session->getFlash('Enrolled_Delete') ?>
        </div>
    <?php endif; ?>
    <div style="float:left">

    </div>

    <table class="table table-striped" style="">

        <th>
            <th width="5%" scope="col">#</th>
            <th scope="col">Student Name</th>
            <th scope="col">Batch</th>
            <th scope="col">Semester</th>
            <th scope="col">Email</th>
            <th scope="col">Contact</th>

        </tr>

        <tbody>
       <?php if(count($total_students)>0) {
           $count=1;
        foreach ($total_students as $corse) {
            ?>
    <tr>
<!--    data-bs-toggle="modal" data-bs-target="#staticBackdrop"      -->
<!--    data-bs-toggle="modal" data-bs-target="#staticBackdrop"      -->
        <td><?php  ?></td>
        <td><?php echo $count; ?></td>
        <td><?php echo $corse['fname']." ".$corse['lname']; ?></td>
        <td><?php echo $corse['batch'];; ?></td>
        <td><?php echo $corse['semester']." Semester"; ?></td>
        <td><?php echo $corse['email']; ?></td>
        <td><?php echo $corse['contact']; ?></td>

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


<script>

    function closediv(){
        $("#update_div").fadeOut(1000);
    }
</script>