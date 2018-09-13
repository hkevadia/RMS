<?php
error_reporting(E_ALL);
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);
require "database.php";
//if(isset($_POST['btnadd']))
//{
?>
<tr>
    <td>
        <?php
        $desqry = mysqli_query($con, "select * from tbl_designation");
        if ($desqry) {
            echo "<select name='seldes[]' onchange='seldes()' class='textbox'>";
            while ($rdes = mysqli_fetch_array($desqry)) {
                echo "<option value='$rdes[vchdesignation_id]'>" . $rdes['vchdesignation_name'] . "</option>";
            }
            echo "</select>";
        } else {
            echo mysqli_error($con);
        }
        ?>
    </td>

    <td><input type="textbox" name="txtno[]" class="textbox"  value="<?php
        if (isset($_POST['txtno'])) {
            echo $_POST['txtno'];
        } else {
            echo '';
        }
        ?>"></td>
    <td><input type="textbox" name="perallo[]" class="textbox"  value="<?php
        if (isset($_POST['perallo'])) {
            echo $_POST['perallo'];
        } else {
            echo '';
        }
        ?>"></td>


  <td>
      <input type="textbox" name="txtbill[]" class="textbox" value="<?php if (isset($_POST['txtbill'])) {
            echo $_POST['txtbill'];
        }
        ?>">
    </td>
 
    <td>
       <select name="selnonbill[]" class='textbox'>
        <option value="">Select</option>
        <option value="ANBC">ANBC</option>
        <option value="ANBI">ANBI</option>
        <option value="NONBILL">Non-Billable</option>
       </select>
        
   </td>

  
    <td>
        <input name="startdate[]" type="text" class="textbox" id="dpxyz"
               value="<?php
               if (isset($_POST['startdate'])) {
                   echo $_POST['startdate'];
               }
               ?>" required>
    <td>
        <input name="enddate[]" type="text" class="textbox" id="dpxyz1"
               value="<?php
               if (isset($_POST['enddate'])) {
                   echo $_POST['enddate'];
               }
               ?>" required> 
    </td>
</tr>
<?php
//}
?>
