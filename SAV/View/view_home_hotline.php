<?php ob_start(); ?>
<?php $content= 'DEBUG view: HOTLINE<br><br>'; ?>
<?php $content.= ob_get_clean(); ?>
<?php $content.= "<br><br> <strong> Welcome: ".$user['Log_name'] . " from " . $user['branche'] . "<strong>"; ?>

<?php require_once('template.php'); ?>