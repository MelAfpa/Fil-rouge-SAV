
<?php ob_start(); ?>

<h3>Element(s) trouves:<br><br><br></h3>

<?php $content= 'DEBUG view: all-users <br><br>'; ?>


<?php foreach($users as $user) : ?>
   <li> <?= "  ". $user['Log_name']. " " . $user['branche']; ?> </li>
<?php endforeach ?>

<?php if(count($users) === 1) : ?>
   <?= $user['Id_user']?>

  <!--BUTTON  DELETE--> 
  <form action="actionControl.php" method="GET">
    <input type="hidden"  name="action" value="getFormConfirm">
    <input type="hidden"  name="del_id" value="<?= $user['Id_user']?>">
    <input type="hidden"  name="del_dept" value="<?= $user['branche']?>">
    <input type="submit" value="supprimer ce Technicien">
  </form>

  <!--BUTTON  UPDATE--> 
  <form action="actionControl.php" method="GET">
      <input type="hidden"  name="action" value="getFormUpdate">
      <input type="hidden"  name="upd_id" value="<?= $user['Id_user']?>">
      <input type="hidden"  name="upd_log" value="<?= $user['Log_name']?>">
      <input type="submit" value="modifier ce Technicien">
  </form>

<?php endif ?>


<?php  $content.= ob_get_clean(); ?>
   
<?php  $content.= "<br><br> <strong> Welcome: ". $_SESSION['userName'] . " from " . $_SESSION['userBranche'] . "<strong>"; ?>

<?php require_once('template.php'); ?>