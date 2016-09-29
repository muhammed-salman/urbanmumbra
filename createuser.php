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

Created On: 13 June, 2016.
 */-->

<html>
    <head>
        <?php require_once 'header.php' ?>
        <?php require_once 'functions.php' ?>
        <title>Urban Mumbra: Account Registration</title>
    </head>
<body>
<?php 
        if($_POST) 
            insertUser();
            
    
?>
<div class="container">
    <br>
    <img class="profile-img" src="img/mumbra.jpg" alt="UrbanMumbra"/>
    
    <form role="form" method="post" action="createuser.php">
        <h1> Create Account</h1>
            <fieldset class="form-group">
                <label for="name">Your Full Name</label>
                <input class="form-control" type="text" maxlenght="50" id="name" name="name" required>
            </fieldset>
            <fieldset class="form-group">
                <label for="mobile">Mobile Number</label>
                <input class="form-control" type="number" maxlenght="10" id="mobile" name="mobile" required>
            </fieldset>
            <fieldset class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" maxlenght="50" required>
            </fieldset>
            <fieldset class="form-group">
                <label for="rollno">Roll No(if applicable)</label>
                <input class="form-control" type="text" id="rollno" name="rollno" maxlenght="8">
            </fieldset>
            <fieldset class="form-group">
                <label for="user">Enter Username</label>
                <input class="form-control" type="text" placeholder="Min 5 characters" maxlength="25" id="user" name="user" required><br>
                <span id="usererr"></span>
            </fieldset>
            <fieldset class="form-group">
                <label for="pass">Enter Password</label>
                <input class="form-control" type="password" placeholder="Min 8 char, 1 Lowercase,1 Uppercase, 1 Special Charcter" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="pass" name="pass" required>
            </fieldset>
            <fieldset class="form-group">
                <label for="cpass">Confirm Password</label>
                <input class="form-control" type="password" id="cpass" placeholder="Repeat Password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="cpass" required><br><span id="cpasserr"></span>
            </fieldset>
              
            <input type="hidden" name="usertype" id="usertype" value="1" required>
              
            <input type="submit" class="btn btn-primary" value="Create Account">
    </form><br><br>
<?php require_once 'footer.php';?>

