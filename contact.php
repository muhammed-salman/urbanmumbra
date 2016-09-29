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

Created On: 
 */-->
<html>
    <head>
        <?php require_once 'header.php' ?>
        <title>Urban Mumbra: Contact Us</title>
        <?php require_once 'navigationbar.php'?>
    </head>
    <body>
        
        <div class="container">
        <?php if($loggedin){  ?>   
        <address>
        <h1 class="text-center">Contact Us</h1><br>
        <strong>Feel free to contact us for any suggestion, criticism or feedback</strong><br>
      
        <h3>Civil Engineering</h3>
        <strong>Resource Person: Prof. Mohammed Junaid Siddiqui</strong><br>
        <strong>Mobile No:</strong> +91-9773561819<br>
        Civil Engineering Department<br>
        Civil Admin Loungue, First Floor.<br>
        <strong>AIKTC, New Panvel</strong></address>
       
       
        <h3>Computer Engineering</h3>
        <strong>Technical Support: Prof Muhammed Salman Shamsi</strong><br>
        <strong>Mail:</strong><a title="aiktc.shamsi@gmail.com" href="mailto:aiktc.shamsi@gmail.com">aiktc.shamsi@gmail.com</a>
        <br>Computer Engineering Department<br>
        <strong>AIKTC, New Panvel</strong></address>
               
            
<?php 
        }
        else{
            echo '<div class="alert alert-danger">Please LogIn to use System</div>';
        }
require_once 'footer.php';?>