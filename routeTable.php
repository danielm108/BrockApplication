<?php

$serverName = "sndalit22\sql2014"; //serverName\instanceName
$connectionInfo = array( "Database"=>"brock", "UID"=>"sa", "PWD"=>'$canChart+^^');
$conn = sqlsrv_connect( $serverName, $connectionInfo);


// $value = $_POST['val'];
// $params = array($value);
// $value = $_POST['val'];
// $params = array($value);
$result = sqlsrv_query( $conn, "SELECT 
      [Company]
      ,[Location]
      ,[ContractorFirstName]
      ,[ContractorLastName]
      ,[Email]
  FROM [Brock].[dbo].[Sites]");
             

echo "<table id='table' class='table table-hover table-condensed' style='width:auto'>
      <thead><tr>
      <th><input type='checkbox' id='mastercheck' name='checked' value='checked'></th>
      <th>Company</th>
      <th>Location</th>
      <th>First Name</th>
      <th>LastName</th>
      <th>Email</th>     
    </tr></thead><tbody>";

while($row = sqlsrv_fetch_array($result))
{

    echo '<tr><td scope="row">';
    echo '<input type="checkbox" id="checked" class="checkbox" name="checked" value="checked">';
    echo("</td><td>");
    echo($row['Company']);
    echo '</td><td>';
    echo($row['Location']);
    echo '</td><td>';
    echo($row['ContractorFirstName']);
    echo '</td><td>';
    echo($row['ContractorLastName']);
    echo '</td><td>';
    echo($row['Email']);
    echo '</td></tr>';
}
echo '</tbody></table><br/>';

?>