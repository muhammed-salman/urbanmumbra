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

Created On: 03 Aug, 2016 04:02:21 PM
 */
-->
<html>
    <head>
        <?php require_once 'header.php' ?>
        <title>Urban Mumbra</title>
    </head>
    <body>
        <?php require_once 'navigationbar.php'?>
        <div class="container">
<?php if($loggedin){ 
        if($_POST){
            updateBuilding();
        }
    ?>            
         <form role="form" method="post" action="buildingedit.php">
             <h1>Urban Planning Survey Sheet A (Edit)</h1> 
            <fieldset class="form-group">
                <label for="bzone">Zone: </label>
                <select class="form-control" id="bezone" name="zone" required="required" readonly>
                    <?php loadBuildingZones();?>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="building">Building: </label>
                <select class="form-control" id="bebuilding" name="bebuilding" required="required" readonly>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="wing">Wing: </label>
                <select class="form-control" id="bewing" name="bewing" required="required" readonly>
                </select>
            </fieldset>
             <fieldset class="form-group">
                <label for="building">Building (Edit): </label>
                <input type="text" class="form-control" id="bebuildingedit" name="building" required="required" disabled="true" />
            </fieldset>
            <fieldset class="form-group">
                <label for="wing">Wing (Edit): </label>
                <input type="text" class="form-control" id="bewingedit" name="wing" required="required" disabled="true" />
            </fieldset>
         <div id="buildingdata">
            <fieldset class="form-group">
                <label for="storey">Storey: </label>
                <input class="form-control" type="number" id="storey" name="storey" min="0" required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="shops">No. of Shops: </label>
                <input class="form-control" type="number" id="shops" name="shops" min="0" required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="tower">Mobile Tower: </label>
                <select class="form-control" id="tower" name="tower" required="required" disabled="true">
                    <option value="">------</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="parking">Parking Place: </label>
                <select class="form-control" id="parking" name="parking" required="required" disabled="true">
                    <option value="">------</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="wall">Compound Wall: </label>
                <select class="form-control" id="wall" name="wall" required="required" disabled="true">
                    <option value="">------</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="registration">Registration: </label>
                <select class="form-control" id="registration" name="registration" required="required" disabled="true">
                    <option value="">------</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
            </fieldset>
             <fieldset class="form-group">
                <label for="age">Age of Structure: </label>
                <input class="form-control" type="number" id="age" name="age" min="0" required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="condition">Condition of Structure: </label>
                <select class="form-control" id="condition" name="condition" required="required" disabled="true">
                    <option value="">------</option>
                    <option value="WORST">WORST</option>
                    <option value="BAD">BAD</option>
                    <option value="AVERAGE">AVERAGE</option>
                    <option value="GOOD">GOOD</option>
                    <option value="VERY GOOD">VERY GOOD</option>
                </select>
            </fieldset>
             <fieldset class="form-group">
                <label for="chairman">Chairman: </label>
                <input class="form-control" type="text" id="chairman" name="chairman" required="required" disabled="true"/>
            </fieldset> 
              <fieldset class="form-group">
                <label for="cellphone">Mobile Number: </label>
                <input class="form-control" type="number" id="cellphone" name="cellphone" min="0" max="9999999999" maxlength="10" required="required" disabled="true"/>
            </fieldset>
         </div>   
            <button type="submit" id="beedit" class="btn btn-primary" disabled="true">Update</button> 
         </form>
            <br><br>
<?php 
        }
else{ 
    echo '<div class="alert alert-danger">Please LogIn to use System</div>';
    header("Refresh: 2; url=login.php");
}?>            
            <br><br>
<?php require_once 'footer.php';?>

