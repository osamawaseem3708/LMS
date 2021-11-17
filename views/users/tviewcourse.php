<?php

/* @var $this yii\web\View */

$this->title = 'View Course';
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
        <a href="<?php echo Yii::$app->getHomeUrl()."/users/tdashboard"; ?>" class="btn btn-primary">Back</a>
    </div>
    <div class="h3" style="padding: 2%;text-align: center">View Course Form</div>

    <?php if (Yii::$app->session->hasFlash('update_course')): ?>
        <div class="alert alert-success alert-dismissable" id="update_div">
            <button aria-hidden="true" data-dismiss="alert" onclick="closediv()" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Updated!</h4>
            <?= Yii::$app->session->getFlash('update_course') ?>
        </div>
    <?php endif; ?>


    <?php if (Yii::$app->session->hasFlash('takecourse')): ?>
        <div class="alert alert-success alert-dismissable" id="update_div">
            <button aria-hidden="true" data-dismiss="alert" onclick="closediv()" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Success!</h4>
            <?= Yii::$app->session->getFlash('takecourse') ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('Already_taken')): ?>
        <div class="alert alert-danger alert-dismissable" id="update_div">
            <button aria-hidden="true" data-dismiss="alert" onclick="closediv()" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Warning!!</h4>
            <?= Yii::$app->session->getFlash('Already_taken') ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('limitout')): ?>
        <div class="alert alert-danger alert-dismissable" id="update_div">
            <button aria-hidden="true" data-dismiss="alert" onclick="closediv()" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Warning!!</h4>
            <?= Yii::$app->session->getFlash('limitout') ?>
        </div>
    <?php endif; ?>
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
        <td><?php echo $corse['status']; ?></td>
        <td><a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary" style="color: white" aria-hidden="true" onclick="gettablerow('<?php echo $corse['cname']; ?>','<?php echo $corse['batch']; ?>'
                    ,'<?php echo $corse['ccid']; ?>','<?php echo $corse['description'];; ?>',
                    '<?php echo $corse['credit_hours']; ?>','<?php echo $corse['status']; ?>',
                    '<?php echo $corse['cid']; ?>','<?php echo $corse['offer_semester']; ?>')">Enroll</a>  &nbsp;

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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Enroll Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<!--                Model Start-->
                <form method="post">
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                    <div class="row">
                        <div class="col-md-12 mt-md-0 mt-3"> <label>Course Name</label>
                            <input type="text" class="form-control" disabled id="cname" required name="cname"> </div>
<!--                        <div class="col-md-6 mt-md-0 mt-3"> <label>Create Date</label>-->
<!--                            <input type="date" class="form-control" name="cdate" required> </div>-->
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-md-0 mt-3"> <label>Course Category</label>
                            <select class="form-control" id="ccategory" disabled name="ccategory" required>
                                <option value="" selected>Choose Option</option>
                                <?php   foreach ($category as $item) { ?>
                                    <option value="<?php echo $item['ccid'];?>"><?php echo $item['name'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mt-md-0 mt-3"> <label>Course Year</label>
                            <div class="d-flex align-items-center mt-2">

                                <input type="text" class="form-control" id="cyear" disabled required name="cyear">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mt-md-0 mt-3"> <label>Course Credit Hours</label>
                            <input type="number" id="chrs" disabled class="form-control" min="1" maxlength="6" required name="chrs">
                            <input type="hidden" id="cchrs"  class="form-control" min="1" maxlength="8" required name="cchrs">
                            <input type="hidden" id="cid" required name="cid">
                        </div>

                        <div class="col-md-6 mt-md-0 mt-3"> <label>Course Semester</label>
                            <div class="d-flex align-items-center mt-2">
                                <input type="number" id="offer_semester" disabled class="form-control" min="1" maxlength="6" required name="offer_semester">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-md-0 mt-3"> <label>Course Description</label>
                            <textarea style="resize: none;height: 65%" required disabled id="description" name="description" class="form-control"></textarea>
                        </div>
                    </div>
<!--                    <div class="btn btn-primary " style="margin-top: 4%;">-->
<!--                        <button type="submit" class="btn btn-primary">Register</button>-->
<!--                    </div>-->

<!--                Model Ends-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" onClick="this.form.submit(); this.disabled=true; this.value='Sending…'; " class="btn btn-primary">Enroll Course</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function gettablerow(name,batch,category,description,credit_hours,status,cid,offer_semester){
    console.log("name= "+name+" batch= "+batch+" category= "+category+" description= "+description+" credit hours= "+credit_hours+" status= "+status);
    document.getElementById('cname').value=name;
      document.getElementById('ccategory').selectedIndex =category;
     document.getElementById('cyear').value=batch;
     document.getElementById('chrs').value=credit_hours;
     document.getElementById('cchrs').value=credit_hours;
     document.getElementById('description').value=description;
     document.getElementById('cid').value=cid;
     document.getElementById('offer_semester').value=offer_semester;
     if(status=="Active"){
         document.getElementById('radioA').checked=true;
     }
     else {
         document.getElementById('radioN').checked=true;
     }

    }
    function closediv(){
        $("#update_div").fadeOut(1000);
    }
</script>