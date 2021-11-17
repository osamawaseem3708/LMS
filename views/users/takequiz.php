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
        <a href="/student/web/users/sdashboard" class="btn btn-primary">Back</a>
    </div>
    <div class="h3" style="padding: 2%;text-align: center">Take Quiz</div>
    <table class="table" >
        <thead>
        <th>Quiz Title</th>
        <th>Course Name</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Time Limit</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php if(count($quizes)>0){
             $date=date('Y-m-d');
            // $edate='2021-11-17';//date('Y-m-d');
                foreach($quizes as $quiz){?>
                <tr>
                    <td><?php echo $quiz['title']; ?></td>
                    <td><?php echo $quiz['cname']; ?></td>
                    <td><?php echo date('d-m-Y',strtotime($quiz['sdate'])) ; ?></td>
                    <td><?php echo date('d-m-Y',strtotime($quiz['edate'])); ?></td>
                    <td><?php echo $quiz['timelimit']." mins"; ?></td>
    <?php $eid=$quiz['exam_id'];
            $sid=$_SESSION['sid'];
    $res=Yii::$app->db->createCommand("select count(*) as total from attemptquiz where eid='$eid' and sid=$sid")->queryAll();
  //  print_r($res);
    foreach ($res as $single){
        if(($single['total'])>0){
            echo "<td style='color: #0c5460'>Attempted</td>";
        }
        else{
            if($date >= $quiz['sdate']   && $date <= $quiz['edate']) {?>

                <td>
                    <a href='<?php echo Yii::$app->getHomeUrl() . "users/attemptquiz?id=" . $quiz['exam_id']; ?>&limit=<?php echo $quiz['timelimit']; ?>'
                       class="btn btn-primary">Attempt</a></td>
            <?php }
        }
    }

    ?>
                    <?php

                }

                        ?>
                </tr>
          <?php  }

            else{
                echo "<tr colspan='6' style='color: red'><td>No Quiz Found Here</td></tr>";
            }
            ?>
        </tbody>

    </table>



    </div>
</div>

</body>
</html>
