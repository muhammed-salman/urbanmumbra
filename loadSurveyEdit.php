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

Created On: 9 Aug, 2016 11:09:13 AM
 */
require_once 'functions.php';
    
if($_POST)
{
    if(isset($_POST['zone'])&& isset($_POST['wing'])&& isset($_POST['building'])&& isset($_POST['flat']))
    {
        $zone=sanitizeString($_POST['zone']);
        $building=sanitizeString($_POST['building']);
        $wing=sanitizeString($_POST['wing']);
        $flat=sanitizeString($_POST['flat']);
        $user=$_SESSION['user'];
        
        $query="select * from Survey where zoneid='".$zone."' and building='".$building."' and "
                . "wing='".$wing."' and flatno='".$flat."' and userid='".$user."'";
        
        $result= queryMysql($query);
        
        if(mysqli_num_rows($result)==0){
            echo '<br><div class="alert alert-danger">No Records Found!</div></br>';
        }
        else{
            while($row = mysqli_fetch_array($result)){
             
echo <<<_END
<fieldset class="form-group">
                <label for="male">Male: </label>
                <input class="form-control" type="number" id="male" name="male" min="0" required="required" 
_END;
echo "value='".$row['male']."'";
echo <<<_END
                >
            </fieldset>
            <fieldset class="form-group">
                <label for="female">Female: </label>
                <input class="form-control" type="number" id="female" name="female" min="0" required="required" 
_END;
echo "value='".$row['female']."'";

echo <<<_END
                />
            </fieldset>
            <fieldset class="form-group">
                <label for="kids">Children's: </label>
                <input class="form-control" type="number" id="kids" name="kids" min="0" required="required" 
_END;
echo "value='".$row['children']."'";

echo <<<_END

                />
            </fieldset>
            <fieldset class="form-group">
                <label for="working">Working Members: </label>
                <input class="form-control" type="number" id="working" name="working" min="0"  required="required" 
_END;
echo "value='".$row['working']."'";

echo <<<_END
                />
            </fieldset>
            <fieldset class="form-group">
                <label for="nonworking">Non Working Members: </label>
                <input class="form-control" type="number" id="nonworking" name="nonworking" min="0" required="required" 
_END;
echo "value='".$row['nonworking']."'";

echo <<<_END
                />
            </fieldset>
            <fieldset class="form-group">
                <label for="occupation">Occupation: </label>
                <input class="form-control" type="text" id="occupation" name="occupation" required="required" 
_END;
echo "value='".$row['occupation']."'";

echo <<<_END
                />
            </fieldset>
            <fieldset class="form-group">
                <label for="twowheel">Two Wheeler's: </label>
                <input class="form-control" type="number" id="twowheel" name="twowheel" min="0" required="required" 
_END;
echo "value='".$row['twowheel']."'";

echo <<<_END

                />
            </fieldset>
            <fieldset class="form-group">
                <label for="threewheel">Three Wheeler's: </label>
                <input class="form-control" type="number" id="threewheel" name="threewheel" min="0" required="required" 
_END;
echo "value='".$row['threewheel']."'";

echo <<<_END

                />
            </fieldset>
            <fieldset class="form-group">
                <label for="fourwheel">Four Wheeler's: </label>
                <input class="form-control" type="number" id="fourwheel" name="fourwheel" min="0" required="required"
_END;
echo "value='".$row['fourwheel']."'";

echo <<<_END
                />
            </fieldset>
            <fieldset class="form-group">
                <label for="caste">Religion: </label>
                <select class="form-control" id="caste" name="caste" required="required">
_END;
echo   '<option value="'.$row["religion"].'">'.$row["religion"].'</option>';
echo <<<_END

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
                <input class="form-control" type="number" id="area" name="area" min="0" required="required" 
_END;
echo "value='".$row['area']."'";

echo <<<_END
                />
            </fieldset>
_END;
          }
        }
    }
}
?>