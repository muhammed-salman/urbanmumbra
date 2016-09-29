<?php session_start()?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
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
            insertSurvey();
        }
    ?>            
         <form role="form" method="post" action="index.php">
             <h1>Urban Planning Survey Sheet B</h1> 
            <fieldset class="form-group">
                <label for="zone">Zone: </label>
                <select class="form-control" id="zone" name="zone" required="required">
                    <?php if($_POST){
                            echo '<option value="'.$_POST[zone].'">'.$_POST[zone].'</option>';
                    }
                    else{
                        loadZones();
                    }?>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="building">Building: </label>
                <input class="form-control" type="text" id="building" name="building" 
                       <?php  if($_POST){
                                echo 'value="'.$_POST[building].'"';
                                }?>
                required="required"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="wing">Wing: </label>
                <input class="form-control" type="text" id="wing" name="wing" 
                       <?php  if($_POST){
                                echo 'value="'.$_POST[wing].'"';
                                }
                        ?>
                       required="required"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="flat">Flat No: </label>
                <input class="form-control" type="number" id="flat" name="flat" min="1" required="required"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="male">Male: </label>
                <input class="form-control" type="number" id="male" name="male" min="0" required="required"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="female">Female: </label>
                <input class="form-control" type="number" id="female" name="female" min="0" required="required"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="kids">Children's: </label>
                <input class="form-control" type="number" id="kids" name="kids" min="0" required="required"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="working">Working Members: </label>
                <input class="form-control" type="number" id="working" name="working" min="0"  required="required"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="nonworking">Non Working Members: </label>
                <input class="form-control" type="number" id="nonworking" name="nonworking" min="0" required="required"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="occupation">Occupation: </label>
                <input class="form-control" type="text" id="occupation" name="occupation" required="required"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="twowheel">Two Wheeler's: </label>
                <input class="form-control" type="number" id="twowheel" name="twowheel" min="0" required="required"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="threewheel">Three Wheeler's: </label>
                <input class="form-control" type="number" id="threewheel" name="threewheel" min="0" required="required"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="fourwheel">Four Wheeler's: </label>
                <input class="form-control" type="number" id="fourwheel" name="fourwheel" min="0" required="required"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="caste">Religion: </label>
                <select class="form-control" id="caste" name="caste" required="required">
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
                <input class="form-control" type="number" id="area" name="area" min="0" required="required"/>
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button> 
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
