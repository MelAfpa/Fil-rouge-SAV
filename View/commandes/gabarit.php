<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='style/template.css'>
    <link rel='stylesheet' type='text/css' href='style/ticket.css'>
    <link rel='stylesheet' type='text/css' href='style/commande.css'>

    <title>Commandes</title>
</head>

<body>

    <header>
        <img src="images/Menuiz Man.png" alt="logo">
        <nav>
            <ul>
                <!-- <li><a href="index.php">Log out</a></li>
                <li><a href="expedition.php">Expedition</a></li> -->
                <li><a href="Controler/log_out.php">Log out</a></li>
                <li><a href="indexTickets.php?action=accueil">Home</a></li>
                <li><a href="diagnostic.php">Diagnostic</a></li>
                <li><a href="finalises.php">Finalises</a></li>
            </ul>
        </nav>
    </header>

    <h1 class=<?php echo $classeTitre; ?>>
        <?php echo $titre; ?>
    </h1>

    <nav></nav>

    <div class=<?php echo $classeCont; ?>>
        <?php echo $contenu; ?>
    </div>



    <script src='View/commandes/click.js'></script>
</body>

</html>