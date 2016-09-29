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
require_once 'functions.php';
    
if($_POST)
{
    if(isset($_POST['zone'])&& isset($_POST['building']))
    {
        $zone=sanitizeString($_POST['zone']);
        $building=sanitizeString($_POST['building']);
        
        $query="select distinct wing from Survey where zoneid='".$zone."' and building='".$building."'";
        
        $result= queryMysql($query);
        
        if(mysqli_num_rows($result)==0){
            echo '<option value="">No Records!</option>';
        }
        else{
            echo "<option value=''>------</option>";
            while($row = mysqli_fetch_array($result)){
                echo "<option value='".$row['wing']."'>".$row['wing']."</option>";
            }
        }
    }
}
?>