<!DOCTYPE html>
<!--
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

Created On: 18 June, 2016 10:12:12 AM
 */-->
<html>
    <head>
        <?php require_once 'header.php' ?>
        <title>Urban Mumbra: Sheet A Data</title>
        <style>
            .table td,.table th{
                text-align:center;
            }
        </style>
    </head>
    <body>
        <?php require_once 'navigationbar.php'?>
        <div class="container">
<?php if($loggedin){ 
        if($_SESSION[grid]==3){
            $result=  queryMysql("Select * from Building join Zones on Building.zoneid=Zones.id order by Zones.id,building,wing");
        }
        else{
            $result=  queryMysql("Select * from Building join Zones on Building.zoneid=Zones.id where userid='"
                    .$_SESSION['user']."' order by Zones.id,building,wing");
        }    
?>
            <h2 class="text-center">Sheet A</h2>
            <table class="table table-bordered table-hover table-condensed table-responsive">
                <tr>
                    <th>Zone ID</th>
                    <th>Zone Name</th>
                    <th>Building</th>
                    <th>Wing</th>
                    <th>Storey</th>
                    <th>Shops</th>
                    <th>Mobile Tower</th>
                    <th>Parking</th>
                    <th>Wall</th>
                    <th>Registration</th>
                    <th>Age</th>
                    <th>Condition</th>
                    <th>Chairman</th>
                    <th>CellPhone</th>
                    <th>UserId</th>
                    <th>Time</th>
                </tr>
<?php
 while($row=mysqli_fetch_array($result)){

echo        "
                <tr>
                    <td>".$row['zoneid']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['building']."</td>
                    <td>".$row['wing']."</td>
                    <td>".$row['storey']."</td>
                    <td>".$row['shops']."</td>
                    <td>".$row['mobile_tower']."</td>
                    <td>".$row['parking']."</td>
                    <td>".$row['wall']."</td>
                    <td>".$row['registration']."</td>
                    <td>".$row['age']."</td>
                    <td>".$row['condition']."</td>
                    <td>".$row['chairman']."</td>
                    <td>".$row['cellphone']."</td>
                    <td>".$row['userid']."</td>
                    <td>".$row['timestamp']."</td>
                </tr>";

 }        
 echo '</table>';                  
}
else{ 
    echo '<div class="alert alert-danger">Please LogIn to use System</div>';
    header("Refresh: 2; url=login.php");
}            
    echo '<br><br>';
require_once 'footer.php';
