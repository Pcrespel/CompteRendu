<!doctype html>
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

<!-- Choix praticien -->
<h3>Praticien à sélectionner : </h3>
<form action="cAssocierCabinet.php" method="post">
    <div class="corpsForm">

        <p>
            <label for="IdentifCli">Praticien : </label>
            <select id="IdentifCli" name="IdentifCli" title="Sélectionnez le praticien souhaité pour le cabinet à associer">
                <?php
                $reqListePraticien="SELECT nom, prenom FROM praticien ;";
                $ListePraticien = mysqli_query($idConnexion,$reqListePraticien);
                $ListePraticien2 = mysqli_fetch_row($ListePraticien);
                $result = $idConnexion->query($reqListePraticien);

                if ( $result->num_rows>0){
                    while($ListePraticien2=$result->fetch_assoc()){

                        $NomListedelaPraticien = $ListePraticien2["nom"];
                        $PrenomListedelaPraticien = $ListePraticien2["prenom"];
                        ?>
                        <option value="<?php echo $IDListedelaVisiteur ?>"><?php echo $NomListedelaPraticien. " " . $PrenomListedelaPraticien; ?> </option>
                        <?php
                    }
                }
                ?>
            </select>
        </p>
    </div>
    <div class="piedForm">
        <p>
            <input type="hidden" name="etape" value="ChoixPraticien" />
    </div>

    <!-- Choix cabinet -->
    <h3>Cabinet à sélectionner : </h3>
    <form action="cAssocierCabinet.php" method="post">
        <div class="corpsForm">

            <p>
                <label for="IdentifCli">Cabinet : </label>
                <select id="IdentifCli" name="IdentifCli" title="Sélectionnez le cabinet souhaité ">
                    <?php
                    $reqListeCabinet="SELECT nom, ville FROM cabinet ;";
                    $ListeCabinet = mysqli_query($idConnexion,$reqListeCabinet);
                    $ListeCabinet2 = mysqli_fetch_row($ListeCabinet);
                    $result = $idConnexion->query($reqListeCabinet);

                    if ( $result->num_rows>0){
                        while($ListeCabinet2=$result->fetch_assoc()){

                            $NomListedelaCabinet = $ListeCabinet2["nom"];
                            $VilleListedelaCabinet = $ListeCabinet2["ville"];
                            ?>
                            <option value="<?php echo $IDListedelaCabinet ?>"><?php echo $NomListedelaCabinet. " - " . $VilleListedelaCabinet; ?> </option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </p>
        </div>
        <div class="piedForm">
            <p>
                <input type="hidden" name="etape" value="ChoixCabinet" />
                <input id="ok" type="submit" value="Valider" size="20"
                       title="Sélectionner ce cabinet" />
            </p>


    </form>


    <?php
    require($repInclude . "_pied.inc.html");
    require($repInclude . "_fin.inc.php");
    ?>