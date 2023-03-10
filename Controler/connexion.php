<?php
require '../Model/database.php';

if(isset($_POST['login']) && isset($_POST['password'])){
   $login = $_POST['login'];
   $pass = $_POST['password'];
} 

### TEST DATABASE
$aUsersList= getUsers($login, $pass);?>
<?php foreach($aUsersList as $user) : ?>
   <?php if($user['branche'] === 'hotline')
       echo "<h5> &emsp;  " . $user['Log_name'] . " &emsp;  " . $user['password'] . " &emsp;  " . $user['branche'] . "</h5>"; ?>
<?php endforeach; ?>

