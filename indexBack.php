<?php
//connection to database file
require'conTDb.php';
//initial value for variables
$error=false;
$phoneerr=$emailFoundError='';
//sure that the form has been submited
if(isset($_POST['submit'])){
    //______store input froem user in variables
    $firstname  = test_input($_POST['fname']);
    $lastname   = test_input($_POST['lname']);
    $email      = test_input($_POST['email']);
    $phone      = test_input($_POST['phone']);
    $university = test_input($_POST['university']);
    $department = test_input($_POST['department']);
    $year       = $_POST['year'];
    $aboutus    = $_POST['relation'];
    $committee   =$_POST['committee'];
    //______validation on phone number
    if (!preg_match("/^(010|011|015|012)[0-9]{8}$/",$phone))
    {
        $phoneerr="Phone must be 11 number start with 012 or 011 or 010 or 015";
        $error=true;
    }
    //check if the email of the user is already used before
    $sql="SELECT email FROM user WHERE email LIKE '$email'";
    $result=mysqli_query($connDb,$sql);
    if(mysqli_fetch_assoc($result)>0){
        $emailFoundError=" Sorry Your Email Is Already Found \n";
        $error=true;
    }
    //______if the validtion is ok , sent data to data base
    if($error==false){
        //_____variable to store the sql command, Table name is (user)
        $sql="INSERT INTO user (firstname,lastname,email,phone,univeristy,departmeant,year,about,commitee_name) 
            VALUES ('$firstname','$lastname','$email','$phone','$university','$department','$year','$aboutus','$committee') ";
        //_____sent the sql ststment to database or give me what's wrong
        $sentToDb=mysqli_query($connDb,$sql)or die(mysqli_error($connDb));
        //get user id from database__________________________________________________________________________
        $sql= "select user_id from user where email like '$email' and commitee_name like '$committee';";
        $result = mysqli_query($connDb, $sql);
        if(mysqli_num_rows($result) > 0 ){

            $row = mysqli_fetch_assoc($result);
            //$name = $row["Buyer_Email"];
            $user_id =  $row['user_id'];
            //echo $user_id;
            //echo "Welcome: Buyer";

        }

        //___________________________________
        //echo"Sent to database user sucsses ";
        //_____if the selected comnittee from user is pr , sent the questions to pr table in database
        if($committee=='pr'){
            $q1=mysqli_real_escape_string($connDb,$_POST['pr-q1']);
            $q2=mysqli_real_escape_string($connDb,$_POST['pr-q2']);
            $q3=mysqli_real_escape_string($connDb,$_POST['pr-q3']);
            $q4=mysqli_real_escape_string($connDb,$_POST['pr-q4']);
            //echo"PR \n";
            $sql="INSERT INTO pr(user_id,q1,q2,q3,q4)VALUES('$user_id','$q1','$q2','$q3','$q4')";
            $sentToDb=mysqli_query($connDb,$sql)or die(mysqli_error($connDb));
            mysqli_close($connDb);
        }
        //_____if the selected comnittee from user is hr , sent the questions to hr table in database
        elseif ($committee=='hr'){
            $q1=mysqli_real_escape_string($connDb,$_POST['hr-q1']);
            $q2=mysqli_real_escape_string($connDb,$_POST['hr-q2']);
            $q3=mysqli_real_escape_string($connDb,$_POST['hr-q3']);
            $q4=mysqli_real_escape_string($connDb,$_POST['hr-q4']);
            //echo"PR \n";
            $sql="INSERT INTO hr(user_id,q1,q2,q3,q4)VALUES('$user_id','$q1','$q2','$q3','$q4')";
            $sentToDb=mysqli_query($connDb,$sql)or die(mysqli_error($connDb));
            mysqli_close($connDb);
            echo"HR \n";
        }
        //_____if the selected comnittee from user is media , sent the questions to media table in database
        elseif ($committee=='social'){
            $q1=mysqli_real_escape_string($connDb,$_POST['social-q1']);
            $q2=mysqli_real_escape_string($connDb,$_POST['social-q2']);
            $q3=mysqli_real_escape_string($connDb,$_POST['social-q3']);
            //echo"PR \n";
            $sql="INSERT INTO social(user_id,q1,q2,q3)VALUES('$user_id','$q1','$q2','$q3')";
            $sentToDb=mysqli_query($connDb,$sql)or die(mysqli_error($connDb));
            mysqli_close($connDb);
        }
        //_____if the selected comnittee from user is social , sent the questions to social table in database
        elseif ($committee=='media'){
            $q1=mysqli_real_escape_string($connDb,$_POST['media-q1']);
            $q2=mysqli_real_escape_string($connDb,$_POST['media-q2']);
            $q3=mysqli_real_escape_string($connDb,$_POST['media-q3']);
            $q4=mysqli_real_escape_string($connDb,$_POST['media-q4']);
            //echo"PR \n";
            $sql="INSERT INTO media(user_id,q1,q2,q3,q4)VALUES('$user_id','$q1','$q2','$q3','$q4')";
            $sentToDb=mysqli_query($connDb,$sql)or die(mysqli_error($connDb));
            mysqli_close($connDb);
        }
        //_____if the selected comnittee from user is java , sent the questions to java table in database
        elseif ($committee=='java'){
            $q1=mysqli_real_escape_string($connDb,$_POST['java-q1']);
            $q2=mysqli_real_escape_string($connDb,$_POST['java-q2']);
            $q3=mysqli_real_escape_string($connDb,$_POST['java-q3']);
            $q4=mysqli_real_escape_string($connDb,$_POST['java-q4']);
            //echo"PR \n";
            $sql="INSERT INTO java(user_id,q1,q2,q3,q4)VALUES('$user_id','$q1','$q2','$q3','$q4')";
            $sentToDb=mysqli_query($connDb,$sql)or die(mysqli_error($connDb));
            mysqli_close($connDb);
        }
        //_____if the selected comnittee from user is android , sent the questions to android table in database
        elseif ($committee=='android'){
            $q1=mysqli_real_escape_string($connDb,$_POST['android-q1']);
            $q2=mysqli_real_escape_string($connDb,$_POST['android-q2']);
            $q3=mysqli_real_escape_string($connDb,$_POST['android-q3']);
            $q4=mysqli_real_escape_string($connDb,$_POST['android-q4']);
            //echo"PR \n";
            $sql="INSERT INTO android(user_id,q1,q2,q3,q4)VALUES('$user_id','$q1','$q2','$q3','$q4')";
            $sentToDb=mysqli_query($connDb,$sql)or die(mysqli_error($connDb));
            mysqli_close($connDb);
        }
        //_____if the selected comnittee from user is python , sent the questions to python table in database
        elseif ($committee=='python'){
            $q1=mysqli_real_escape_string($connDb,$_POST['python-q1']);
            $q2=mysqli_real_escape_string($connDb,$_POST['python-q2']);
            $q3=mysqli_real_escape_string($connDb,$_POST['python-q3']);
            $q4=mysqli_real_escape_string($connDb,$_POST['python-q4']);
            //echo"PR \n";
            $sql="INSERT INTO python(user_id,q1,q2,q3,q4)VALUES('$user_id','$q1','$q2','$q3','$q4')";
            $sentToDb=mysqli_query($connDb,$sql)or die(mysqli_error($connDb));
            mysqli_close($connDb);
        }
        //_____if the selected comnittee from user is web , sent the questions to web table in database
        elseif ($committee=='web'){
            $q1=mysqli_real_escape_string($connDb,$_POST['web-q1']);
            $q2=mysqli_real_escape_string($connDb,$_POST['web-q2']);
            $q3=mysqli_real_escape_string($connDb,$_POST['web-q3']);
            $q4=mysqli_real_escape_string($connDb,$_POST['web-q4']);
            //echo"PR \n";
            $sql="INSERT INTO web(user_id,q1,q2,q3,q4)VALUES('$user_id','$q1','$q2','$q3','$q4')";
            $sentToDb=mysqli_query($connDb,$sql)or die(mysqli_error($connDb));
            mysqli_close($connDb);
        }
    }
}
//clear the previos variable of the $_POST because it make problems
$_POST=array();
//check the input from user about any hack inputs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
