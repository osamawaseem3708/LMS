<?php

/* @var $this yii\web\View */

$this->title = 'View Course';
?>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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

    <?php if (Yii::$app->session->hasFlash('exam_created')): ?>
        <div class="alert alert-danger alert-dismissable" style="display: none" id="update_div">
            <button aria-hidden="true" data-dismiss="alert" onclick="closediv()" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Warning!</h4>
            <?= Yii::$app->session->getFlash('exam_created') ?>
        </div>
    <?php endif; ?>


    <div class="h3" style="padding: 2%;text-align: center">Create Quiz Form</div>
    <section style="border: groove 1px;">
            <div class="container"><br>
            <div class="row">
                <div class="col-md-3">
                    <form method="post">
                        <input type="hidden" name="_csrf" id="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                    <label>Course Name </label>
                    <select name="course" id="course" required class="form-control" <?php if(isset($examdata)) echo "disabled"; ?>>
                        <option value="">Choose....</option>
                        <?php foreach ($course as $row){?>
                        <option value="<?php echo $row['cid']; ?>" <?php if(isset($examdata) && $examdata['cid']==$row['cid']) echo "selected";?>><?php echo $row['cname']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Semester </label>
                    <select name="semester" id="semester" required class="form-control" <?php if(isset($examdata)) echo "disabled"; ?>>
                        <option value="">Choose....</option>
                        <?php foreach ($course as $row){?>
                            <option value="<?php echo $row['offer_semester']; ?>" <?php if(isset($examdata) && $examdata['semester']==$row['offer_semester']) echo "selected";?>><?php echo $row['offer_semester']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Start Date </label>
                    <input type="date" class="form-control" name="sdate" id="sdate" <?php if(isset($examdata)) echo "disabled"; ?> value="<?php if(isset($examdata)) echo $examdata['sdate'];?>" required>
                </div>
                <div class="col-md-3">
                    <label>End Date </label>
                    <input type="date" class="form-control" name="edate" id="edate" required <?php if(isset($examdata)) echo "disabled"; ?> value="<?php if(isset($examdata)) echo $examdata['edate'];?>">
                </div>
            </div> <br>


            <div class="row">
                <div class="col-md-3">
                    <label>Total Questions </label>
                    <input type="number" class="form-control" min="1" name="tquestions" id="tquestions" <?php if(isset($examdata)) echo "disabled"; ?> required value="<?php if(isset($examdata)) echo $examdata['total_question'];?>">
                </div>

                <div class="col-md-3">
                    <label>Time Limit</label>
                    <input type="number" class="form-control" name="timelimit" id="timelimit" <?php if(isset($examdata)) echo "disabled"; ?> required >
                </div>
                <div class="col-md-3">
                    <label>Exam Status </label>
                    <select name="status" id="status" required class="form-control" <?php if(isset($examdata)) echo "disabled"; ?>>
                        <option value="">Choose....</option>
                        <option value="Active" <?php if(isset($examdata) && $examdata['estatus']=="Active") echo "selected";?>>Active</option>
                        <option value="No Active" <?php if(isset($examdata) && $examdata['estatus']=="No Active") echo "selected";?>>No Active</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Exam Title </label>
                    <input type="text" class="form-control"  name="title" id="title" <?php if(isset($examdata)) echo "disabled"; ?> required value="<?php if(isset($examdata)) echo $examdata['title'];?>">
                </div>

            </div> <br>
                <input type="hidden" name="lastid" id="lastid" value="<?php if(isset($examdata['exam_id']))echo $examdata['exam_id']; ?>">

            <div class="row">


                <?php if(!isset($examdata)){ ?>
                <div class="col-md-3" >

                    <label>Action </label>
                    <input type="submit" class="btn btn-primary"  name="submit" id="submit" value="Create Quiz">
                </div>
                <?php } ?>
            </form>
            </div>


    </div>
            <br>

        </section>
        <br>

    <?php if(isset($examdata)){ ?>
    <table class="" cellspacing="5px" id="table_container"  style="text-align: center;border-collapse: unset">

        <tr>
            <th scope="col">#</th>
            <th scope="col">Question</th>
            <th scope="col">Correct Answer</th>
            <th scope="col">Option 1</th>
            <th scope="col">Option 2</th>
            <th scope="col">Option 3</th>
            <th scope="col">Action </th>
        </tr>

        <tbody id="table_body">
        <?php if(isset($examdata)){
            $count=1;
            $total_question=$examdata['total_question'];
          while ($count <= (int)$total_question) { ?>
            <tr id="<?php echo $count; ?>">
                <td><?php echo $count; ?></td>
                <td class="row-data"><input type="text" name="question" id="question"></td>
                <td class="row-data"><input type="text" name="correct" id="correct"></td>
                <td class="row-data"><input type="text" name="opt1" id="opt1"></td>
                <td class="row-data"><input type="text" name="opt2" id="opt2"></td>
                <td class="row-data"><input type="text" name="opt3" id="opt3"></td>
                <td class="row-data"><input type="button" class="btn btn-primary" value="Add" onclick="my('<?php echo $count?>','<?php echo $total_question; ?>')" ></td>
            </tr>


          <?php
          $count++;
          }

        } ?>


        </tbody>
    </table>
    <?php } ?>
    <div id="hurrah" style="display: none">
        <a href="/student/web/users/tdashboard" class="btn btn-primary" style="text-align: center" >Go Back</a>
    </div>

    </div>
</div>

</body>
</html>


<script>
    function closediv(){
        $("#update_div").fadeOut(1000);
    }
    let count=0;
    function  my(id,total_row) {

        var lastid=document.getElementById('lastid').value;
        var rowId =event.target.parentNode.parentNode.id;
        var csrf=document.getElementById('_csrf').value;

        var data = document.getElementById(rowId).querySelectorAll(".row-data");
        var question = data[0].querySelectorAll("input[type=text]")[0].value;
        var correct = data[1].querySelectorAll("input[type=text]")[0].value;
        var opt1 = data[2].querySelectorAll("input[type=text]")[0].value;
        var opt2 = data[3].querySelectorAll("input[type=text]")[0].value;
        var opt3 = data[4].querySelectorAll("input[type=text]")[0].value;

        if (question != "" && correct != "" && opt1 != "" && opt2 != "" && opt3 != "" && csrf!="") {

            var table = document.getElementById('table_container');

                $.ajax({
                    url:"<?php echo Yii::$app->getHomeUrl()."users/exam_detail";  ?>",
                    method:"GET",
                    data:{
                        question:question,
                        correct:correct,
                        opt1:opt1,
                        opt2:opt2,
                        opt3:opt3,
                        lastid:lastid,
                        csrf:csrf
                    },
                    success:function(response)
                    {
                        if(response){
                            count++;
                            document.getElementById('table_container').deleteRow(1);
                        }
                        if(parseInt(count)===parseInt(total_row)){
                            document.getElementById('hurrah').style.display="block";
                        }
                    },error:function (res) {
                        console.log(res);
                    }
                });



        } else {
            alert('Enter Text ');
        }
    }
</script>