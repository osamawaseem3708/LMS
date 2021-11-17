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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
<?php
$ids="";
$remaiing_limit="";
//foreach ($id as $fid){ $ids=$fid['id'];}
//foreach ($limit as $l){ $remaiing_limit=$l['limit'];}


?>
<!------ Include the above in your HEAD tag ---------->
<div class="wrapper rounded bg-white" id="update_course" style="width: 90%">
    <div style="float: left">
        <a href="/student/web/users/sdashboard" class="btn btn-primary">Back</a>
    </div>
    <div class="h3" style="padding: 2%;text-align: center">Attempt Quiz</div>
    <div id="counter"></div>
    <?php if(count($questions)>0){
        $count=1;
        foreach ($questions as $q) {?>

            <form method="post" id="myForm" >
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <section style="border: solid 1px red">
                <div class="container">
                    <label style="font-weight: bold">Question : <?php echo $count." ".$q['question'];?></label>
                    <label><input type="radio" name="<?php echo $q['edid']; ?>"  value="<?php echo $q['correct_answer'];?>">&nbsp;<?php echo $q['correct_answer'];?></label>
                    <label><input type="radio" name="<?php echo $q['edid']; ?>"  value="<?php echo $q['option1'];?>">&nbsp;<?php echo $q['option1'];?></label>
                    <label><input type="radio" name="<?php echo $q['edid']; ?>"  value="<?php echo $q['option2'];?>">&nbsp;<?php echo $q['option2'];?></label>
                    <label><input type="radio" name="<?php echo $q['edid']; ?>"  value="<?php echo $q['option3'];?>">&nbsp;<?php echo $q['option3'];?></label>
                </div>

            </section><br>

    <?php
            $count++;
        }?>
 <br> <div style="float: right"><button type="submit" id="submit" class="btn btn-success">Finish All</button></div><br>
            </form>
    <?php }
    else{
        echo "<label>No Questions Available <a href='/student/web/users/sdashboard'> Click Here To return Dashboard</a> </label>";
    }
    ?>


    </div>
</div>

</body>
</html>

<script>
    const startingminute='<?php echo $_SESSION['limit'];?>';
    //const startingminute=1;
    let time =startingminute*60;
    var interval=setInterval(updatecountdown,1000);

    function updatecountdown(){
        const minutes=Math.floor(time/60);
        let second=time % 60;
        if(second >= 0){
        second=second < 10 ? '0' + second:second ;
        console.log(second)
        document.getElementById('counter').innerHTML=`${minutes}:${second}`;

            time--;
        }
      else{
          clearTimeout(second);
          clearTimeout(interval)
            alert("Quiz Times Up!!!!");
          document.getElementById('submit').click();
           window.location.href='/student/web/users/sdashboard';
        }
    }
</script>