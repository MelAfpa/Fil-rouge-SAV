
<?= " DEBUG SESSION:  $_SESSION[userName]"; ?>
<?= "<br> DEBUG SESSION:  $_SESSION[userPass]"; ?>
<?= "<br> DEBUG SESSION:  $_SESSION[userBranche]"; ?>

<?php ob_start(); ?>


<h3>Element(s) trouves:<br><br><br></h3>

<?php $content= 'DEBUG view: all-users <br><br>'; ?>


<?php foreach($users as $user) : ?>
   <li> <?= " " . $user['Log_name']. " " . $user['branche']; ?> </li>
<?php endforeach ?>

<?php if(count($users) === 1) : ?>
   
  <!--BUTTON  DELETE--> 
  <form action="../index.php" method="POST">
    <input type="hidden"  name="action" value="getFormDelete">
    <input type="submit" value="supprimer ce Technicien">
  </form>
<?php endif ?>




<?php  $content.= ob_get_clean(); ?>
   
<?php  $content.= "<br><br> <strong> Welcome: ". $_SESSION['userName'] . " from " . $_SESSION['userBranche'] . "<strong>"; ?>

<?php require_once('template.php'); ?>