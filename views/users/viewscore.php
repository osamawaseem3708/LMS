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
    <div class="h3" style="padding: 2%;text-align: center">View Quiz Scores</div>
    <table class="table" >
        <thead>
        <th>Quiz Title</th>
        <th>Course Name</th>
       <th>Quiz Date</th>
        <th>Score</th>

        </thead>
        <tbody>
        <?php
        if(count($scores)>0){
            foreach ($scores as $score){?>
                <tr>
                    <td><?php echo $score['title'];  ?></td>
                    <td><?php echo $score['cname'];  ?></td>
                    <td><?php echo date('d-m-Y',strtotime($score['sdate']));  ?></td>
                    <td><?php echo $score['score'];  ?></td>
                </tr>
           <?php  }
        }
        ?>
        </tbody>

    </table>



    </div>
</div>

</body>
</html>
