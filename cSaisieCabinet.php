<?php
    /**
     * Script de contrôle et d'affichage du cas d'utilisation "Saisir fiche de frais"
     * @package default
     * @todo  RAS
     */
    $repInclude = './include/';
    require($repInclude . "_init.inc.php");

    // page inaccessible si visiteur non connecté
    if (!estVisiteurConnecte()) {
        header("Location: cSeConnecter.php");
    }
    require($repInclude . "_entete.inc.html");
    require($repInclude . "_sommaire.inc.php");

?>
<div id="contenu">
    <h2>Veuillez renseigner les données du cabinet </h2>

    <form action="cSaisieCabinet.php" method="post">
         <p>Nom du cabinet : <input type="text" name="nom" /></p>
         <p>Adresse du cabinet : <input type="text" name="adresse" /></p>
         <p>Ville du cabinet : <input type="text" name="ville" /></p>
         <p>Code Postal : <input type="text" name="cp" /></p>
         <p><input type="submit" value="OK"></p>
    </form>



    <?php
    require($repInclude . "_pied.inc.html");
    require($repInclude . "_fin.inc.php");
    ?>

