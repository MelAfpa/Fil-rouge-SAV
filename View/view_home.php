<?php ob_start(); ?>
<?php ?> 
<?php $content= "DEBUG view: $_SESSION[userBranche]<br><br>"; ?>

<?php $content.= $msg?>

<?php if($_SESSION['userBranche'] === 'admin') : ?> 

<!--BUTTON SELECT ALL--> 
  <form action="../index.php" method="POST">
    <input type="hidden"  name="action" value="getFormSelect">
    <input type="submit" value="Voir tout le monde">
  </form>

  <!--BUTTON SELECT ONE--> 
  <form action="../index.php" method="POST">
    <input type="hidden"  name="action" value="getFormSelectOne">
    <input type="submit" value="rechercher un Technicien">
  </form>

  <!--BUTTON ADD ONE--> 
  <form action="../index.php" method="POST">
    <input type="hidden"  name="action" value="getFormAdd">
    <input type="submit" value="ajouter un Technicien">
  </form>


<?php endif ?>
   
   <?= " DEBUG SESSION:  $_SESSION[userName]"; ?>
   <?= " <br> DEBUG SESSION:  $_SESSION[userPass]"; ?>
   <?= "<br> DEBUG SESSION:  $_SESSION[userBranche]"; ?>

<?php $content.= ob_get_clean(); ?>
<?php  $content.= "<br><br> <strong> Welcome: ". $_SESSION['userName'] . " from " . $_SESSION['userBranche'] . "<strong>"; ?>


<?php require_once('template.php'); ?>