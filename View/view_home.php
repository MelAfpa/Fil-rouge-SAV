<?php ob_start(); ?>
<?php ?> 
<?php $content= "<br><br> <h2> Welcome: ". $_SESSION['userName'] . " from " . $_SESSION['userBranche'] . "<h2><br>"; ?>

<?php $content.= $msg?>

<?php if($_SESSION['userBranche'] === 'admin') : ?> 

<!--BUTTON SELECT ALL--> 
 <form action="actionControl.php" method="POST">
    <input type="hidden"  name="action" value="select_users">
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

<?php if($_SESSION['userBranche'] === 'sav') : ?> 






  <?= ':) sav' ?>
<?php endif ?>


<?php if($_SESSION['userBranche'] === 'hotline') : ?> 
  <?= ':} hot' ?>
<?php endif ?>
  

<?php $content.= ob_get_clean(); ?>



<?php require_once('template.php'); ?>