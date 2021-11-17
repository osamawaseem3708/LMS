<?php

namespace app\controllers;

use app\models\attemptquiz;
use app\models\coursecategory;
use app\models\enrollment;
use app\models\exam;
use app\models\exam_detail;
use app\models\takecourse;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Console;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\users;
use app\models\course;
use yii\helpers\Json;



class UsersController extends Controller
{
    public function actionRegisterstudent()
    {
        if (!empty($_POST)) {
            $password = md5($_POST['password']);
            $model = new users();
            $model->fname = $_POST['fname'];
            $model->lname = $_POST['lname'];
            $model->DOB = date("Y-m-d", strtotime($_POST['DOB']));;
            $model->gender = $_POST['gender'];
            $model->email = $_POST['email'];
            $model->contact = $_POST['contact'];
            $model->country = $_POST['country'];
            $model->city = $_POST['city'];
            $model->password = $password;
            $model->Role = $_POST['role'];
            $model->address = $_POST['address'];
            $model->status = $_POST['status'];
            if ($_POST['semster'] == "") {
                $model->semester = "0";
            } else {
                $model->semester = $_POST['semster'];
            }
            if ($model->validate()) {
                $model->save();
                yii::$app->session->setflash('successs', "User Register Successfully");
                return $this->redirect('dashboard');
            }

        }
       $this->layout=false;
        if(isset($_SESSION['aid'])){
        return $this->render('registerstudent');
        }
        else{
            return $this->redirect('index');
        }
    }

//    Login Function
    public function actionIndex()
    {
        if (!empty($_POST))
        {
            $model = new users();
            unset($_POST['_csrf']);
            $password = md5($_POST['password']);
            $email = $_POST['email'];
            $user = users::find()->where(['email' => $email, 'password' => $password])->one();
            if ($user)
            {

                if ($user->Role == "Admin")
                {
                    $_SESSION['aid'] = $user->uid;
                    $_SESSION['email'] = $email;
                    yii::$app->session->setflash('login', "Login Successfully");
                    return $this->redirect('dashboard');
                }
                if ($user->Role == "Teacher")
                {
                    $_SESSION['tid'] = $user->uid;
                    $_SESSION['email'] = $email;
                    return $this->redirect('tdashboard');
                }
                if ($user->Role == "Student")
                {
                    $_SESSION['sid'] = $user->uid;
                    $_SESSION['semester']=$user->semester;
                    $_SESSION['email'] = $email;
                    return $this->redirect('sdashboard');
                }
            }
            else
                {
                yii::$app->session->setflash('invalid', "Invalid Username password");
                return $this->redirect('index');
                 }
        }
        $this->layout = false;
        return $this->render('index');
    }
//      Admin Dashboard
    public function actionDashboard()
    {
        if(isset($_SESSION['aid'])){
        return $this->render('dashboard');
        }
        else{
            return $this->redirect('index');
        }
    }
//       Admin REgister COurse
    public function actionRegistercourse()
    {
        if (!empty($_POST)) {
            $uid = $_SESSION['aid'];
            unset($_POST['_csrf']);
            $model = new course();
            $model->cname = $_POST['cname'];
            $model->category = $_POST['ccategory'];
            $model->description = $_POST['description'];
            $model->create_date = date("Y-m-d", strtotime($_POST['cdate']));
            $model->batch = $_POST['cyear'];
            $model->status = $_POST['status'];
            $model->uid = $uid;
            $model->credit_hours = $_POST['chrs'];
            $model->offer_semester = $_POST['offer_semester'];
            if ($model->validate()) {
                $model->save();
                yii::$app->session->setflash('create_course', "Course Created Successfully");
                $this->redirect('dashboard');
            } else {
                print_r($model->getErrors());
            }
        }
//     $this->layout=false;
        if(isset($_SESSION['aid'])){
        $category = Yii::$app->db->createCommand("select * from coursecategory")->queryall();
        return $this->render('registercourse', ['category' => $category]);
        }
        else
        {
            return  $this->redirect('index');
        }
    }
//        Admin View Course
    public function actionViewcourse()
    {
        if (!empty($_POST)) {
            unset($_POST['_csrf']);
            $id = $_POST['cid'];
            $model = course::find()->where(['cid' => $id])->one();
            $model->cname = $_POST['cname'];
            $model->category = $_POST['ccategory'];
            $model->description = $_POST['description'];
            $model->batch = $_POST['cyear'];
            $model->status = $_POST['status'];
            $model->credit_hours = $_POST['chrs'];

            if ($model->validate()) {
                $model->save();
                yii::$app->session->setflash('update_course', "Course Updated Successfully");
                return $this->redirect('viewcourse');
            } else {
                print_r($model->getErrors());
            }

        }
        if(isset($_SESSION['aid'])){
        $category = Yii::$app->db->createCommand("select * from coursecategory")->queryall();
        $courses = Yii::$app->db->createCommand("SELECT * from course JOIN coursecategory cc on cc.ccid=course.category")->queryall();
        $this->layout = false;
        return $this->render('viewcourse', ['course' => $courses, 'category' => $category]);
        }
        else{
            return $this->redirect('index');
        }
    }
//        Admin Delete Course
    public function actionDeletecourse($id)
    {
        if(isset($_SESSION['aid'])){
        $model = course::find()->where(['cid' => $id])->one();
        $model->delete();
        yii::$app->session->setflash('delete_course', "Course Deleted Successfully");
        return $this->redirect('viewcourse');
        }
        else
            return $this->redirect('index');
    }
//        Admin View users
    public function actionViewusers()
    {
        if (!empty($_POST)) {
            unset($_POST['_csrf']);
            $id = $_POST['uid'];
            $sem = $_POST['semster'];
            echo $sem;
            $model = users::find()->where(['uid' => $id])->one();
            print_r($model->attributes);
            if ($_POST['role'] == "Teacher") {
                $model->semester = "0";
            }
            if ($_POST['role'] == "Student") {
                $model->semester = $_POST['semster'];
            }
            $password = md5($_POST['password']);
            $model->fname = $_POST['fname'];
            $model->lname = $_POST['lname'];
            $model->DOB = date("Y-m-d", strtotime($_POST['DOB']));;
            $model->gender = $_POST['gender'];
            $model->email = $_POST['email'];
            $model->contact = $_POST['contact'];
            $model->country = $_POST['country'];
            $model->city = $_POST['city'];
            $model->password = $password;
            $model->Role = $_POST['role'];
            $model->address = $_POST['address'];
            $model->status = $_POST['status'];

            if ($model->validate()) {
                $model->save();
                yii::$app->session->setflash('update_user', "User With Name " . $_POST['fname'] . " Updated Successfully");
                return $this->redirect('viewusers');
            }
        }
    if(isset($_SESSION['aid'])){
        $users = Yii::$app->db->createCommand("SELECT * from users where role!='Admin'")->queryall();
        $this->layout = false;
        return $this->render('viewusers', ['users' => $users]);
    }
    else
        return $this->redirect('index');
    }
//  Admin Delete User
    public function actionDeleteuser($id, $name)
    {
        if(isset($_SESSION['aid'])){
        $model = users::find()->where(['uid' => $id])->one();
        $model->delete();
        yii::$app->session->setflash('delete_user', "User With Name " . $name . " Deleted Successfully");
        return $this->redirect('viewusers');
        }
        else
            return $this->redirect('index');
    }
//            Logout For All
    public function actionLogout(){
        session_unset();
        session_destroy();
        return $this->redirect('index');
    }
//        For Students Under Construction
    public function actionUnderconstruction()
    {
        return $this->render('underconstruction');
    }
//        DAshboard for Teacher
    public  function  actionTdashboard(){
        if(isset($_SESSION['tid'])){
        return $this->render('tdashboard');
        }
        else{
            return $this->redirect('index');
        }
    }
//        Dashboard for Students
    public  function  actionSdashboard(){
        if(isset($_SESSION['sid'])){
        return $this->render('sdashboard');
        }
        else{
            return $this->redirect('index');
        }
    }
//    Teacher View Course
    public function actionTviewcourse()
    {
        $uid = $_SESSION['tid'];
        $hrs = "";
        $cid = "";
        $total_hrs = Yii::$app->db->createCommand("select sum(hrs) as total from takecourse where uid='$uid' ")->queryall();
        foreach ($total_hrs as $hr) {
            $hrs = $hr['total'];
        }
        if (!empty($_POST)) {
            $limit = 15;
            $difference = $limit - $hrs;
            $hrs = $hrs + $_POST['cchrs'];
            if ($hrs <= 15) {
                $total_cids = Yii::$app->db->createCommand("select cid from takecourse where uid='$uid' ")->queryall();
                foreach ($total_cids as $cid) {
                    if ($cid['cid'] == $_POST['cid']) {
                        Yii::$app->session->setFlash('Already_taken', 'Cannot Take Course Because You Have Already Enrolled This Course ');
                        return $this->redirect('tviewcourse');
                    }
                }

                $date = date('Y-m-d');
                $model = new takecourse();
                $model->cid = $_POST['cid'];
                $model->hrs = $_POST['cchrs'];
                $model->date_enroll = $date;
                $model->status = "Enroll";
                $model->uid = $_SESSION['tid'];
                if ($model->validate()) {
                    $model->save();
                    Yii::$app->session->setFlash('takecourse', 'Course Taken Successfully');
                    return $this->redirect('tviewcourse');
                }
            } else {
                Yii::$app->session->setFlash('limitout', 'Cannot Take More Course Because You Exceed to
                 Your Hours Limit Your Remaining limit is ' . $difference . " Hours");
                return $this->redirect('tviewcourse');
            }

        }
        if (isset($_SESSION['tid'])) {
            $category = Yii::$app->db->createCommand("select * from coursecategory")->queryall();
            $courses = Yii::$app->db->createCommand("SELECT * from course JOIN coursecategory cc on cc.ccid=course.category")->queryall();
            $this->layout = false;
            return $this->render('tviewcourse', ['course' => $courses, 'category' => $category]);
        } else {
            return $this->redirect('index');
        }
    }
//    Techer Enroll Course
    public function actionTenrollcourse()
    {
        if (isset($_SESSION['tid'])) {
            $uid=$_SESSION['tid'];
            $category = Yii::$app->db->createCommand("select * from coursecategory")->queryall();
            $total_hrs = Yii::$app->db->createCommand("select sum(hrs) as total from takecourse where uid='$uid'")->queryall();
            $courses = Yii::$app->db->createCommand("select *, t.status as tstatus from takecourse t join course c on c.cid=t.cid join coursecategory cc on cc.ccid=c.category where t.uid='$uid'")->queryall();
            $this->layout = false;
            return $this->render('tenrollcourse', ['course' => $courses, 'category' => $category,'total_hrs'=>$total_hrs]);
        } else {
            return $this->redirect('index');
        }
    }
//    Delete Enroll courses of Teacher
    public function actionTdeleteenroll($id){
        if(isset($_SESSION['tid'])){
        $course = Yii::$app->db->createCommand("Delete from takecourse where tid='$id'")->execute();
        if($course){
            Yii::$app->session->setFlash('Enrolled_Delete','Enrolled Course Deleted Successfully');
            return $this->redirect('tenrollcourse');
        }
        }
        else
        {  return $this->redirect('index');  }
    }

//    Offered Courses to the students semester wise

    public  function actionSoffered_courses(){
        $uid=$_SESSION['sid'];
        $cid="";$hrs="";$difference="";
        if(!empty($_POST)){
            unset($_POST['_csrf']);
            $student = Yii::$app->db->createCommand("select * from enrollment where uid='$uid'")->queryall();
            $total_hrs = Yii::$app->db->createCommand("select sum(hrs) as total from enrollment where uid='$uid'")->queryall();
           foreach($total_hrs as $row){
                $hrs=$row['total'];
            }
            $hrs=$hrs+$_POST['cchrs'];
            $difference = 15 - $hrs;
            foreach ($student as $cid) {
                if ($cid['cid'] == $_POST['cid']) {
                    Yii::$app->session->setFlash('Already_taken', 'Cannot Take Course Because You Have Already Enrolled This Course ');
                    return $this->redirect('soffered_courses');
                }
            }
            if($hrs <= 15){

//            //print_r($student);
            $model=new enrollment();
            $model->uid=$uid;
            $model->cid=$_POST['cid'];
            $model->tid=$_POST['tid'];
            $model->hrs=$_POST['cchrs'];
            $model->status="Enrolled";
            $model->date_enroll=date('Y-m-d');
           if($model->validate()){
             $model->save();
           Yii::$app->session->setFlash('student_Enrollment',"Course with title ".$_POST['course_name']." Enrolled Successfully");}
           return $this->redirect('soffered_courses');
        }
            else{
                if($difference < 0){$difference=0;}
                Yii::$app->session->setFlash('limit_out',"Cannot Enroll This course Because your Limited Exceeded! Remaining Limit ".$difference." Hours" );
                return $this->redirect('soffered_courses');
            }
        }

        $semester_id=$_SESSION['semester'];
        if (isset($_SESSION['sid'])) {
            $category = Yii::$app->db->createCommand("select * from coursecategory")->queryall();
            $courses = Yii::$app->db->createCommand("SELECT *, c.status as cstatus, t.uid as teacher_id FROM `takecourse` t join course c on c.cid=t.cid join users u on u.uid=t.uid join coursecategory cc on 
cc.ccid=c.category where c.offer_semester=$semester_id and u.role=\"Teacher\"")->queryall();
            $this->layout = false;
            return $this->render('soffered_courses', ['course' => $courses, 'category' => $category]);
        } else {
            return $this->redirect('index');
        }
    }

//    Student Enrollement
    public function actionSenrollcourse()
    {
        if (isset($_SESSION['sid'])) {
            $uid=$_SESSION['sid'];
            $category = Yii::$app->db->createCommand("select * from coursecategory")->queryall();
            $total_hrs = Yii::$app->db->createCommand("select sum(hrs) as total from enrollment where uid='$uid'")->queryall();
            $courses = Yii::$app->db->createCommand("select *, e.status as estatus from enrollment e join course c on c.cid=e.cid join coursecategory cc on cc.ccid=c.category where e.uid='$uid'")->queryall();
            $this->layout = false;
            return $this->render('senrollcourse', ['course' => $courses, 'category' => $category,'total_hrs'=>$total_hrs]);
        } else {
            return $this->redirect('index');
        }
    }
//    Delete Student Enrollment
    public function actionSdeleteenroll($id){
        if(isset($_SESSION['sid'])){
            $course = Yii::$app->db->createCommand("Delete from enrollment where eid='$id'")->execute();
            if($course){
                Yii::$app->session->setFlash('Enrolled_Delete','Enrolled Course Deleted Successfully');
                return $this->redirect('senrollcourse');
            }
        }
        else
        {  return $this->redirect('index');  }
    }
//    Teacher View Batch
    public  function actionTviewbatch()
    {
        if (isset($_SESSION['tid'])) {
            $uid=$_SESSION['tid'];

            $total_Students = Yii::$app->db->createCommand("SELECT count(*) as total_students,c.cname,c.cid,c.batch,c.offer_semester from enrollment e join course c on c.cid=e.cid where e.tid=$uid GROUP by e.cid , c.offer_semester")->queryall();
            $this->layout = false;
            return $this->render('tviewbatch', ['total_students' => $total_Students]);
        } else {
            return $this->redirect('index');
        }
    }
//     Teacher View Students Batch wise
    public  function actionTstudentdetail($id)
    {
        if (isset($_SESSION['tid'])) {
            $uid=$_SESSION['tid'];
            $total_Students = Yii::$app->db->createCommand("select * FROM enrollment e join users u on u.uid=e.uid join course c on c.cid=e.cid where e.cid=$id and e.tid=$uid")->queryall();
            $this->layout = false;
            return $this->render('tstudentdetail', ['total_students' => $total_Students]);
        } else {
            return $this->redirect('index');
        }
    }



//    Create Quiz form
    public function actionTcreatequiz()
    {
        $tid=$_SESSION['tid'];
        $courses = Yii::$app->db->createCommand("select * from course c join takecourse t on t.cid=c.cid WHERE t.uid='6'")->queryall();
        $this->layout = false;
        if(!empty($_POST)){
            unset($_POST['_csrf']);
            $model=new exam();
            $model->cid=$_POST['course'];
            $model->semester=$_POST['semester'];
            $model->sdate=$_POST['sdate'];
            $model->edate=$_POST['edate'];
            $model->total_question=$_POST['tquestions'];
            $model->estatus=$_POST['status'];
            $model->title=$_POST['title'];
            $model->tid=$tid;
            $model->timelimit=$_POST['timelimit'];
            if($model->validate()){
                echo "Model Validated Successfully";
                $model->save();
                echo "Last ID = ".$model->exam_id;
                return $this->render('tcreatequiz', ['course' => $courses,'examdata' => $model->attributes]);

            }
        }

        if (isset($_SESSION['tid'])) {


            return $this->render('tcreatequiz', ['course' => $courses]);
        } else {
            return $this->redirect('index');
        }
    }
// Teacher Add questions regarding main exam
    public function actionExam_detail(){
        if(isset($_SESSION['tid'])){
        if(!empty($_REQUEST)){
            print_r($_REQUEST);
            try {
            $model=new exam_detail();
            $model->eid=$_REQUEST['lastid'];
            $model->question=$_REQUEST['question'];
            $model->correct_answer=$_REQUEST['correct'];
            $model->option1=$_REQUEST['opt1'];
            $model->option2=$_REQUEST['opt2'];
            $model->option3=$_REQUEST['opt3'];
            if($model->validate()){
                $model->save();
                Yii::$app->session->setFlash('exam_created','Exam Created SuccessFully');
                return Json::encode(['responseCode' => '200', 'responseMessage' => $_POST]);
            }

            } catch (\Exception $ex) {
                return Json::encode(['responseCode' => 500, 'responseMessage' => $ex->getMessage()]);
            }


        }

        }
        else
        {
            return $this->redirect('index');
        }
    }
//    Student View Quiz
    public function actionTakequiz(){
        if(isset($_SESSION['sid'])){
            $sid=$_SESSION['sid'];
            $examid="";
            $semesterid=$_SESSION['semester'];
            $quiz = Yii::$app->db->createCommand("SELECT * FROM `enrollment` en join exam e on e.cid=en.cid join course c on c.cid=en.cid where e.semester=$semesterid and en.uid=$sid")->queryall();
            foreach($quiz as $eid){
                $examid=$eid['exam_id'];
            }
            $attempts = Yii::$app->db->createCommand("select * from attemptquiz where eid='$examid' and sid=$sid")->queryall();

            $this->layout=false;
            return $this->render('takequiz',['quizes'=>$quiz,'attempts'=>$attempts]);
        }
        else{
            return $this->redirect('index');
        }
    }

//      Student Attempt Quiz
    public function actionAttemptquiz($id,$limit){
        if(isset($_SESSION['sid'])){
          $_SESSION['limit']=$limit;
          $sid=$_SESSION['sid'];
          $_SESSION['eid']=$id;

            $quiz = Yii::$app->db->createCommand("SELECT * FROM exam_detail where eid=$id order by rand()")->queryall();
            if(!empty($_POST)){
                unset($_POST['_csrf']);
                foreach($_POST as $key=>$value){
                    $model=new attemptquiz();
                    $model->qid=$key;
                    $model->eid=$id;
                    $model->sid=$_SESSION['sid'];
                    $model->answer=$value;
                    if($model->validate()){
                        $model->save();

                    }

                }
                return $this->redirect('takequiz');
            }
            $attempts = Yii::$app->db->createCommand("SELECT count(*) as count FROM `attemptquiz` where eid='$id' and sid='$sid'")->queryall();
           // print_r($attempts);exit();
        return $this->render('attemptquiz',['questions'=>$quiz,'attempts'=>$attempts,'exam_id'=>$id]);
        }
        else{
            return $this->redirect('index');
        }
    }


//Student View quiz socre
    public function actionViewscore(){

        if(isset($_SESSION['sid'])){
            $sid=$_SESSION['sid'];
            $semester=$_SESSION['semester'];
            $scores=Yii::$app->db->createCommand("SELECT c.cname,exam.title,exam.sdate,count(*) as score FROM `attemptquiz` a join exam_detail e on e.eid=a.eid join exam on exam.exam_id=e.eid join course c on c.cid=exam.cid 
where e.edid=a.qid and e.correct_answer=a.answer and a.sid='$sid' and exam.semester='$semester' GROUP by a.eid")->queryAll();
            $this->layout=false;
            return $this->render('viewscore',['scores'=>$scores]);
        }
        else{
            return $this->redirect('index');
        }
    }

}

