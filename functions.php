<?php
session_start();
/*
This Work is Licensed under a Creative Commons Attribution-NonCommercial 4.0 International License.
You are free to:
Share — copy and redistribute the material in any medium or format
Adapt — remix, transform, and build upon the material
The licensor cannot revoke these freedoms as long as you follow the license terms.
Under the following terms:
Attribution — You must give appropriate credit, provide a link to the license, and indicate if changes were made. You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.
NonCommercial — You may not use the material for commercial purposes.
No additional restrictions — You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.

Notices:
You do not have to comply with the license for elements of the material in the public domain or where your use is permitted by an applicable exception or limitation.
No warranties are given. The license may not give you all of the permissions necessary for your intended use. For example, other rights such as publicity, privacy, or moral rights may limit how you use the material.

Author: Muhammed Salman Shamsi

Created On: 
 */
$link=null;

function queryMysql($query)
{
    connectdB();
    global $link;
    $result=  mysqli_query($link,$query);
    if(!$result)
    {   echo $query;
        echo'<div class="alert alert-danger">Failed to execute query<br>Mysql Error: '.mysqli_error($link).'</div>';
        die();
    }
    mysqli_close($link);
    return $result;
}

function queryMysqlReturnId($query)
{
    connectdB();
    global $link;
    $result=  mysqli_query($link,$query);
    if(!$result)
    {   echo $query;
        echo'<div class="alert alert-danger">Failed to execute query<br>Mysql Error: '.mysqli_error($link).'</div>';
        die();
    }
    $result=mysqli_insert_id($link);
    mysqli_close($link);
    return $result;
}

function connectdB(){

    $db_host="localhost";

    $db_user="root";

    $db_password="2549root";

    $db_name="urbanmumbra";

    $appname="Urban Mumbra";

    $colname="Anjuman-I-Islam's Kalsekar Technical Campus";

    $coladdress="PLOT NO 2 &AMP; 3, NEAR THANA NAKA, SEC-16, KHANDAGAON NEW PANVEL-410206.";

    global $link;
    $link=mysqli_connect($db_host,$db_user,$db_password) or die(mysql_error());

    mysqli_select_db($link,$db_name) or die(mysql_error());
}

function destroySession()
{
    $_SESSION=  array();
    if(session_id()!=""||isset($_COOKIE[session_name()]))
        setcookie (session_name (), '', time()-259200, '/');
    session_destroy();
}

function sanitizeString($var)
{
    connectdB();
    global $link;
    $var =  strip_tags($var);
    $var=  htmlentities($var);
    $var= stripcslashes($var);
    return mysqli_real_escape_string($link,$var);
}

function loadUserId()
{
    
    $sql_query = "select userid from `Access` order by userid";

    $result= queryMysql($sql_query);

    if(mysqli_num_rows($result)==0){
        echo '<option value="">No Records!</option>';
    }
    echo "<option value=''>------</option>";
    while($row = mysqli_fetch_array($result)){
        echo "<option value='".$row['userid']."'>".$row['userid']."</option>";
    }    
}

function loadUsers()
{
    
    $sql_query = "select idUser,name,mobileno from `User` order by name";

    $result= queryMysql($sql_query);

    if(mysqli_num_rows($result)==0){
        echo '<option value="">No Records!</option>';
    }
    echo "<option value=''>------</option>";
    while($row = mysqli_fetch_array($result)){
        echo "<option value='".$row['idUser']."'>".$row['name'].'-'.$row['mobileno']."</option>";
    }    
}

function loadZones()
{
    
    $sql_query = "select id,name from `Zones` order by name";

    $result= queryMysql($sql_query);

    if(mysqli_num_rows($result)==0){
        echo '<option value="">No Records!</option>';
    }
    echo "<option value=''>------</option>";
    while($row = mysqli_fetch_array($result)){
        echo "<option value='".$row['id']."'>".$row['name'].' ('.$row['id'].")</option>";
    }    
}

function loadBuildingZones()
{
    
    $sql_query = "select distinct id,name from `Zones` join `Building` on Zones.id=Building.zoneid order by name";

    $result= queryMysql($sql_query);

    if(mysqli_num_rows($result)==0){
        echo '<option value="">No Records!</option>';
    }
    echo "<option value=''>------</option>";
    while($row = mysqli_fetch_array($result)){
        echo "<option value='".$row['id']."'>".$row['name'].' ('.$row['id'].")</option>";
    }    
}
/*
function loadBuilding()
{
    
    $sql_query = "select name from `Zones` order by name";

    $result= queryMysql($sql_query);

    if(mysqli_num_rows($result)==0){
        echo '<option value="">No Records!</option>';
    }
    echo "<option value=''>------</option>";
    while($row = mysqli_fetch_array($result)){
        echo "<option value='".$row['id']."'>".$row['name']."</option>";
    }    
}
*/
function insertUser(){

    if($_POST){
        if(isset($_POST['user'])&& isset($_POST['pass'])&& isset($_POST['cpass'])&& isset($_POST['usertype'])){
            $user= strtolower(sanitizeString(trim($_POST['user'])));
            $email= strtolower(sanitizeString(trim($_POST['email'])));
            $iduser=null;
            $pass=  sanitizeString($_POST['pass']);
            $cpass=  sanitizeString($_POST['cpass']);
            $usertype=  sanitizeString(trim($_POST['usertype']));   
            $creation=date("Y-m-d H:i:s",time());
            $name= strtoupper(sanitizeString(trim($_POST['name'])));
            $mobile= sanitizeString(trim($_POST['mobile']));
            $rollno= strtoupper(sanitizeString(trim($_POST['rollno'])));
            
            if($cpass!=$pass){
                echo '<div  class="alert alert-danger">Passwords does not match</span>';
                die();
            }
            else{
                $s1="su*!#er";
                $s2="ts&a@s#";
                $token = hash('ripemd128', "$s1$pass$s2");
                $query="Insert into User (name,mobileno,email,rollno) values "
                        . "('$name','$mobile','$email','$rollno')";
                $iduser=queryMysqlReturnId($query);
                $query="Insert into Access values('$user','$token','$creation','$usertype','$iduser','NO',NULL)";
                $result=  queryMysql($query);
                if($result){
                    echo '<div class="alert alert-success">Your Account is Successfully Created</div>';
                    echo '<div class="alert alert-info">Please Contact the Administrator for Account Activation.</div>';
                    die();
                }
            }
                     
        }
    }
}

function insertSurvey(){

    if($_POST){
        if(isset($_POST['zone'])&& isset($_POST['building'])&& isset($_POST['wing'])&& isset($_POST['flat'])
                && isset($_POST['male'])&& isset($_POST['female'])&& isset($_POST['kids'])
                && isset($_POST['working'])&& isset($_POST['nonworking'])&& isset($_POST['occupation'])
                && isset($_POST['twowheel'])&& isset($_POST['threewheel'])&& isset($_POST['fourwheel'])
                && isset($_POST['caste'])&& isset($_POST['area'])){
            $zone= sanitizeString(trim($_POST['zone']));
            $building= strtoupper(sanitizeString(trim($_POST['building'])));
            $wing= strtoupper(sanitizeString(trim($_POST['wing'])));
            $flat= sanitizeString(trim($_POST['flat']));
            $male= sanitizeString(trim($_POST['male']));
            $female= sanitizeString(trim($_POST['female']));
            $kids= sanitizeString(trim($_POST['kids']));
            $working= sanitizeString(trim($_POST['working']));
            $nonworking= sanitizeString(trim($_POST['nonworking']));
            $occupation= strtoupper(sanitizeString(trim($_POST['occupation'])));
            $twowheel= sanitizeString(trim($_POST['twowheel']));
            $threewheel= sanitizeString(trim($_POST['threewheel']));
            $fourwheel= sanitizeString(trim($_POST['fourwheel']));
            $caste= strtoupper(sanitizeString(trim($_POST['caste'])));
            $area= sanitizeString(trim($_POST['area']));
            $user=$_SESSION['user'];
            $instime=date('Y-m-d H:i:s');
            $query="Insert into Survey values('$zone','$building','$wing','$flat','$male','$female','$kids','$working'"
                    . ",'$nonworking','$occupation','$twowheel','$threewheel','$fourwheel','$caste','$area','$user','$instime')";
                $result=  queryMysql($query);
                if($result){
                    echo '<div class="alert alert-success"><strong>Success!</strong> Your form has been submitted.</div>';
                    //header("Refresh: 0; url=index.php");
                }
            
        }
    }
}

function updateSurvey(){

    if($_POST){
        if(isset($_POST['zone'])&& isset($_POST['building'])&& isset($_POST['wing'])&& isset($_POST['flat'])
                && isset($_POST['male'])&& isset($_POST['female'])&& isset($_POST['kids'])
                && isset($_POST['working'])&& isset($_POST['nonworking'])&& isset($_POST['occupation'])
                && isset($_POST['twowheel'])&& isset($_POST['threewheel'])&& isset($_POST['fourwheel'])
                && isset($_POST['caste'])&& isset($_POST['area'])){
            $zone= sanitizeString(trim($_POST['zone']));
            $building= strtoupper(sanitizeString(trim($_POST['building'])));
            $wing= strtoupper(sanitizeString(trim($_POST['wing'])));
            $flat= sanitizeString(trim($_POST['flat']));
            $bbuilding= strtoupper(sanitizeString(trim($_POST['bbuilding'])));
            $bwing= strtoupper(sanitizeString(trim($_POST['bwing'])));
            $bflat= sanitizeString(trim($_POST['bflat']));
            $male= sanitizeString(trim($_POST['male']));
            $female= sanitizeString(trim($_POST['female']));
            $kids= sanitizeString(trim($_POST['kids']));
            $working= sanitizeString(trim($_POST['working']));
            $nonworking= sanitizeString(trim($_POST['nonworking']));
            $occupation= strtoupper(sanitizeString(trim($_POST['occupation'])));
            $twowheel= sanitizeString(trim($_POST['twowheel']));
            $threewheel= sanitizeString(trim($_POST['threewheel']));
            $fourwheel= sanitizeString(trim($_POST['fourwheel']));
            $caste= strtoupper(sanitizeString(trim($_POST['caste'])));
            $area= sanitizeString(trim($_POST['area']));
            $user=$_SESSION['user'];
            $instime=date('Y-m-d H:i:s');
            $query="update Survey set building='$building', wing='$wing', flatno='$flat', male='$male', "
                    . "female='$female', children='$kids', working='$working'"
                    . ", nonworking='$nonworking', occupation='$occupation', twowheel='$twowheel', threewheel='$threewheel',"
                    . " fourwheel='$fourwheel', religion='$caste', area='$area', userid='$user', timestamp='$instime' "
                    . " where zoneid='$zone' and  building='$bbuilding' and  wing='$bwing' and  flatno='$bflat'";
          
            $result=  queryMysql($query);
                if($result){
                    echo '<div class="alert alert-success"><strong>Success!</strong> Your data has been updated!.</div>';
                    //header("Refresh: 0; url=index.php");
                }
            
        }
    }
}

function insertBuilding(){

    if($_POST){
        if(isset($_POST['zone'])&& isset($_POST['building'])&& isset($_POST['wing'])&& isset($_POST['storey'])
                && isset($_POST['shops'])&& isset($_POST['tower'])&& isset($_POST['parking'])
                && isset($_POST['wall'])&& isset($_POST['registration'])&& isset($_POST['chairman'])
                && isset($_POST['age'])&& isset($_POST['condition'])&& isset($_POST['cellphone'])){
            $zone= sanitizeString(trim($_POST['zone']));
            $building= strtoupper(sanitizeString(trim($_POST['building'])));
            $wing= strtoupper(sanitizeString(trim($_POST['wing'])));
            $storey= sanitizeString(trim($_POST['storey']));
            $shops= sanitizeString(trim($_POST['shops']));
            $tower= sanitizeString(trim($_POST['tower']));
            $parking= sanitizeString(trim($_POST['parking']));
            $wall= sanitizeString(trim($_POST['wall']));
            $registration= sanitizeString(trim($_POST['registration']));
            $chairman= strtoupper(sanitizeString(trim($_POST['chairman'])));
            $age= sanitizeString(trim($_POST['age']));
            $condition= sanitizeString(trim($_POST['condition']));
            $cellphone= sanitizeString(trim($_POST['cellphone']));
            $user=$_SESSION['user'];
            $instime=date('Y-m-d H:i:s');
            $query="Insert into Building values('$zone','$building','$wing','$storey','$shops','$tower','$parking','$wall'"
                    . ",'$registration','$age','$condition','$chairman','$cellphone','$user','$instime')";
                $result=  queryMysql($query);
                if($result){
                    echo '<div class="alert alert-success"><strong>Success!</strong> Your form has been submitted.</div>';
                    //header("Refresh: 0; url=index.php");
                }
            
        }
    }
}

function updateBuilding(){

    if($_POST){
        if(isset($_POST['zone'])&& isset($_POST['building'])&& isset($_POST['wing'])&& isset($_POST['storey'])
                && isset($_POST['shops'])&& isset($_POST['tower'])&& isset($_POST['parking'])
                && isset($_POST['wall'])&& isset($_POST['registration'])&& isset($_POST['chairman'])
                && isset($_POST['age'])&& isset($_POST['condition'])&& isset($_POST['cellphone'])){
            $zone= sanitizeString(trim($_POST['zone']));
            $building= strtoupper(sanitizeString(trim($_POST['building'])));
            $wing= strtoupper(sanitizeString(trim($_POST['wing'])));
            $bebuilding= strtoupper(sanitizeString(trim($_POST['bebuilding'])));
            $bewing= strtoupper(sanitizeString(trim($_POST['bewing'])));
            $storey= sanitizeString(trim($_POST['storey']));
            $shops= sanitizeString(trim($_POST['shops']));
            $tower= sanitizeString(trim($_POST['tower']));
            $parking= sanitizeString(trim($_POST['parking']));
            $wall= sanitizeString(trim($_POST['wall']));
            $registration= sanitizeString(trim($_POST['registration']));
            $chairman= strtoupper(sanitizeString(trim($_POST['chairman'])));
            $age= sanitizeString(trim($_POST['age']));
            $condition= sanitizeString(trim($_POST['condition']));
            $cellphone= sanitizeString(trim($_POST['cellphone']));
            $user=$_SESSION['user'];
            $instime=date('Y-m-d H:i:s');
            $query="update Building set building='$building', wing='$wing', storey='$storey', "
                    . " shops='$shops', mobile_tower='$tower', parking='$parking', wall='$wall'"
                    . ", registration='$registration', age='$age', `condition`='$condition', chairman='$chairman',"
                    . " cellphone='$cellphone', userid='$user', timestamp='$instime' where "
                    . " zoneid='$zone' and building='$bebuilding' and wing='$bewing'";
                $result=  queryMysql($query);
                if($result){
                    echo '<div class="alert alert-success"><strong>Success!</strong> Your data has been updated.</div>';
                    //header("Refresh: 0; url=index.php");
                }
            
        }
    }
}

function changePass(){

if($_POST){
    if(isset($_POST['user'])&& isset($_POST['pass'])&& isset($_POST['cpass'])){
        $user= strtolower(sanitizeString(trim($_POST['user'])));
        $pass=  sanitizeString(trim($_POST['pass']));
        $cpass=  sanitizeString(trim($_POST['cpass']));
        
        if($cpass!=$pass){
            echo '<div class="alert alert-danger">Passwords does not match</div>';
            die();
        }
        else
        {
            $s1="su*!#er";
            $s2="ts&a@s#";
            $token= hash('ripemd128', "$s1$pass$s2");
            $query="update Access set pass='".$token."' where userid='".$user."'";
            $result=  queryMysql($query);
            if($result)
            {
                echo '<div class="alert alert-success">Password Successfully Changed</div>';
                if($_SESSION['grid']!=='3'){
                    echo '<script language="javascript">';
                    echo 'alert("Password Successfully Changed!\n'.
                    'Please Login Again.")';
                    echo '</script>';
                    header("Refresh: 0; url=logout.php");
                }
                
                
            }
            
        }
                     
    }
  }

}

function auto_copy_year($year='auto')
{
    if(intval($year) == 'auto'){$year=date('Y');}
    if(intval($year) == date('Y')){echo intval($year);}
    if(intval($year) < date('Y')){echo intval($year).'-'.date('Y');}
    if(intval($year) > date('Y')){echo date('Y');}
}

