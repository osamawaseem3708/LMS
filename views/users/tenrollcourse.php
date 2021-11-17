<?php

/* @var $this yii\web\View */

$this->title = 'Enrolleds Course';
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
    <div class="h3" style="padding: 2%;text-align: center">Enrolled Courses Form</div>


    <?php if (Yii::$app->session->hasFlash('Enrolled_Delete')): ?>
        <div class="alert alert-success alert-dismissable" id="update_div">
            <button aria-hidden="true" data-dismiss="alert" onclick="closediv()" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Success!</h4>
            <?= Yii::$app->session->getFlash('Enrolled_Delete') ?>
        </div>
    <?php endif; ?>
    <div style="float:left">
        <label style="font-weight: bold">Total Credit Hours</label>
        <?php foreach ($total_hrs as $hr) {
            echo "<label style='color: #1c7430;'>".$hr['total']."/15</label>";
        }?>

    </div>

    <table class="table table-striped" style="text-align: center">

        <th>
            <th width="5%" scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Batch</th>
            <th scope="col">Category</th>
            <th scope="col">Offer Semester</th>
            <th scope="col">Credit Hrs</th>
            <th scope="col">Status</th>
            <th scope="col">Action </th>
        </tr>

        <tbody>
       <?php if(count($course)>0) {
           $count=1;
        foreach ($course as $corse) {
            ?>
    <tr>
<!--    data-bs-toggle="modal" data-bs-target="#staticBackdrop"      -->
<!--    data-bs-toggle="modal" data-bs-target="#staticBackdrop"      -->
        <td><?php  ?></td>
        <td><?php echo $count; ?></td>
        <td><?php echo $corse['cname']; ?></td>
        <td><?php echo $corse['batch'];; ?></td>
        <td><?php echo $corse['name'];; ?></td>
        <td><?php echo $corse['offer_semester']." Semester"; ?></td>
        <td><?php echo $corse['credit_hours']." hrs"; ?></td>
        <td><?php echo $corse['tstatus']; ?></td>
        <td><a class="btn btn-primary" style="color: white" href="/student/web/users/tdeleteenroll?id=<?php echo $corse['tid']; ?>">Remove</a>  &nbsp;

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


<script>

    function closediv(){
        $("#update_div").fadeOut(1000);
    }
</script>