<?php

if(!isset($_SESSION)){
  session_start();
}
?>

<!DOCTYPE html>
<html>
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />

<head>
  <meta charset="UTF-8">

  <title>Surgical Notes Manager - Login Form</title>

    <link rel="stylesheet" href="css1/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="stylesheet.css" media="screen" type="text/css" />

</head>

<body>

<?php 

$ip = $_SERVER['REMOTE_ADDR'];
$client = gethostbyaddr($_SERVER['REMOTE_ADDR']);

if (isset($_POST['submit']))
{


  

$username = $_POST['text'];
$password = $_POST['password'];


$serverName = "sndalit22\sql2014"; //serverName\instanceName
$connectionInfo = array( "Database"=>"ITManager", "UID"=>"snotes", "PWD"=>"Tex@sN0tes");
$conn = sqlsrv_connect($serverName, $connectionInfo);
$query = "select username, FirstName, LastName from users where username = ? ";
$query2 = "insert into [Audit] (Account, Item, ItemAction, CreateDate, CreatedBy, client, clientname) values ('IT Manager','Website','Login Attempt', Cast(SWITCHOFFSET(SYSDATETIMEOFFSET(), '-05:00') as datetime),?, ?,?)";
$params = array($username, $ip, $client);
$result2 = sqlsrv_query($conn, $query2, $params);
$result = sqlsrv_query($conn, $query, $params);


$count = sqlsrv_has_rows($result);
while($rowCount = sqlsrv_fetch_array($result))  
{
$username = $rowCount['username'];
$FirstName = $rowCount['FirstName'];
$LastName = $rowCount['LastName'];

}
// $user = $_POST['text'];
// $domain = "hq\\";
$ldap = ldap_connect("sn-dc2.hq.surgicalnotes.com");
if (@ldap_bind($ldap, "hq\\".$_POST['text'], $_POST['password'])) 
{
                  if ($count)
                  {
                    $query2 = "insert into [Audit] (Account, Item, ItemAction, CreateDate, CreatedBy, client, clientname) values ('BrockApp','Website','Login Successful', Cast(SWITCHOFFSET(SYSDATETIMEOFFSET(), '-05:00') as datetime),?,?,?)";
        $params = array($username, $ip, $client);
        $result2 = sqlsrv_query($conn, $query2, $params);
                        $_SESSION['name']=$FirstName;
                        $_SESSION['lastname']=$LastName;
                        $_SESSION['username']=$username;
                          header("Location: http://sndalit22:3000/BrockApp/main.php");  
                          exit();
                  }
                else{

                  echo '<p id="credentials">Incorrect Login: Try Again</p>';
                  $query2 = "insert into [Audit] (Account, Item, ItemAction, CreateDate, CreatedBy) values ('IT Manager','Website','Login Failed', Cast(SWITCHOFFSET(SYSDATETIMEOFFSET(), '-05:00') as datetime),?)";
        $params = array($username);
        $result2 = sqlsrv_query($conn, $query2, $params);
                }
} 

else {
  echo '<p id="credentials">Incorrect Login: Try Again</p>';
  $query2 = "insert into [Audit] (Account, Item, ItemAction, CreateDate, CreatedBy) values ('IT Manager','Website','Login Failed', Cast(SWITCHOFFSET(SYSDATETIMEOFFSET(), '-05:00') as datetime),?)";
        $params = array($username);
        $result2 = sqlsrv_query($conn, $query2, $params);
}

// $count = sqlsrv_has_rows($result);

// if ($count)
//   {
//     $_SESSION['name']=$username;
//     header("Location: http://sndalit22:3000/Manager/main.php");  
//     exit();
//   }
// else
//   { 
//     echo '<p id="credentials">Incorrect Login: Try Again</p>';
// //     echo '<p>'.$username.'</p>';
// // echo '<p>'.$password.'</p>';
  //}
}

?>

 

<div id="login">
  <div></div>
  <h1>Brock Environmental Services Log in</h1>
  <form action="index.php" method="post">
    <input id = 'username' name= 'text' type="text" placeholder="Username" value=""/>
    <input id='password' type="password" name = "password" placeholder="Password" />

    <br><br>
    <input name='submit' type="submit" value="Log in" />
  </form>
</div>

  <!-- <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script> -->

  <script src="js1/index.js"></script>

</body>

</html>