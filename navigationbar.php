<?php

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
echo <<<_END
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Urban Mumbra</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sheets
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="building.php">Sheet A</a></li>
              <li><a href="index.php">Sheet B</a></li>
            </ul>
        </li>
        
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Edit
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="buildingedit.php">Sheet A</a></li>
              <li><a href="surveyedit.php">Sheet B</a></li>
            </ul>
        </li>
      
        <li><a href="changepass.php">Password</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="#">About</a></li>
        <li><a href="showsheeta.php">Sheet A Data</a></li>';
        <li><a href="showsheetb.php">Sheet B Data</a></li>';
_END;

if($loggedin){
        echo '<li><a href="logout.php">Logout</a></li>';
}else{
        echo '<li><a href="login.php">LogIn</a></li>';
}
echo <<<_END
      </ul>
    </div>
  </div>
</nav>
_END;
?>