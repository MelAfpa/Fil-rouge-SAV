<?php $name= $_GET['n']?>
<?php $branche= $_GET['b']?>

<?php ob_start(); ?>
<?php $content= 'DEBBUG users:<br><br>'; ?>
<?php $content.= ob_get_clean(); ?>
<?php $content.= "<br><br> <strong> Welcome: ".$name . " from " . $branche . "<strong>"; ?>

<?php require_once('template.php'); ?>


