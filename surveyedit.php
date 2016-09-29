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

Created On: 03 Aug, 2016 04:10:22 PM
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
            updateSurvey();
        }
    ?>            
         <form role="form" method="post" action="surveyedit.php">
             <h1>Urban Planning Survey Sheet B (Edit)</h1> 
            <fieldset class="form-group">
                <label for="bzone">Zone: </label>
                <select class="form-control" id="bzone" name="zone" required="required" readonly>
                    <?php loadZones();?>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="building">Building: </label>
                <select class="form-control" id="bbuilding" name="bbuilding" required="required" readonly>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="wing">Wing: </label>
                <select class="form-control" id="wing" name="bwing" required="required" readonly>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="flat">Flat No: </label>
                <select class="form-control" id="seflat" name="bflat" required="required" readonly>
                </select>
            </fieldset>
             
            <fieldset class="form-group">
                <label for="building">Building (Edit): </label>
                <input class="form-control" id="sebuilding" name="building" required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="wing">Wing (Edit): </label>
                <input class="form-control" id="sewing" name="wing" required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="flat">Flat No (Edit): </label>
                <input class="form-control" id="seflatedit" name="flat" required="required" disabled="true">
            </fieldset>
         <div id="surveydata">
            <fieldset class="form-group">
                <label for="male">Male: </label>
                <input class="form-control" type="number" id="male" name="male" min="0" required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="female">Female: </label>
                <input class="form-control" type="number" id="female" name="female" min="0" required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="kids">Children's: </label>
                <input class="form-control" type="number" id="kids" name="kids" min="0" required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="working">Working Members: </label>
                <input class="form-control" type="number" id="working" name="working" min="0"  required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="nonworking">Non Working Members: </label>
                <input class="form-control" type="number" id="nonworking" name="nonworking" min="0" required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="occupation">Occupation: </label>
                <input class="form-control" type="text" id="occupation" name="occupation" required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="twowheel">Two Wheeler's: </label>
                <input class="form-control" type="number" id="twowheel" name="twowheel" min="0" required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="threewheel">Three Wheeler's: </label>
                <input class="form-control" type="number" id="threewheel" name="threewheel" min="0" required="required" disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="fourwheel">Four Wheeler's: </label>
                <input class="form-control" type="number" id="fourwheel" name="fourwheel" min="0" required="required"disabled="true"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="caste">Religion: </label>
                <select class="form-control" id="caste" name="caste" required="required" disabled="true">
                    <option value="">------</option>
                    <option value="Muslim">Muslim</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddhist">Buddhist</option>
                    <option value="Christian">Christian</option>
                    <option value="Jain">Jain</option>
                    <option value="Other">Other</option>
                </select>
            </fieldset>
             <fieldset class="form-group">
                <label for="area">Area (in Sq ft): </label>
                <input class="form-control" type="number" id="area" name="area" min="0" required="required" disabled="true"/>
            </fieldset>
         </div>
            <button type="submit" id="seedit" class="btn btn-primary" disabled="true">Update</button> 
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
