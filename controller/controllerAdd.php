<?php
    $nbW = $typeW = $muscle = $exercice = $nbseries = $nbrep = $poids = "";
    $viewCard = $titleCard = $textCard = $boutonCard = $lien = "";
    $tab = array();

    // Recover data from table allworkout
    $allworkoutSQL = recoverTableDataDB("allworkout",$connect);
    // Searching from $allworkoutSQL id and type of workout 
    while ( $dataAllWorkout = pg_fetch_assoc($allworkoutSQL) )
    {
        if ($dataAllWorkout['id'] == $_GET['w'])
        {
            $nbW = $dataAllWorkout['id'];
            $typeW = $dataAllWorkout['type'];
            break;
        }
    }

    // Add workout on DB
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ( !empty($_GET['muscle']) )
        {
            $today = date("d/m/y");                       
            $values = "'".$today."',".
            $_POST['serie1'].",".$_POST['serie2'].",".$_POST['serie3'].",".$_POST['serie4']
            .",'".$_GET['poids']."'";
            addTableDataDB($_GET['w'],$_GET['muscle'],$values,$connect);
        }
    }
    


    
    if ($_GET['etat'] == -1)
    {
        $viewCard = '
                <a href="index.php?page=add&w='.$nbW.'&etat=0&muscle" 
                class="btn btn-primary">Commencer entrainement</a>';
    }
    else if ( $_GET['etat'] == 6)
    {
        $viewCard = '<h5 class="card-title">Entrainement terminé</h5>
        <a href="index.php?page=accueil" 
                class="btn btn-danger">Terminer</a>';
    }
    else
    {   
        $tab = getExercice($nbW,$_GET['etat'],$connect);
        $muscle = $tab[0];
        $exercice = $tab[1];
        $nbseries = $tab[2];
        $nbrep = $tab[3];
        $poids = $tab[4];
        $lien = 'index.php?page=add&w='.$nbW.'&etat='.($_GET['etat']+1).'&muscle='.$muscle.'&nbseries='.$nbseries.'&poids='.$poids;
      

        $titleCard = '<form method="POST" id="formAdd" enctype="multipart/form-data" action="'.$lien.'">
            <h5 class="card-title">['.$muscle.'] '.$exercice.' | '.$nbseries.'x'.$nbrep.' | '.$poids.'kg</h5>';
        $textCard = '<p class="card-text"><div class="row">';
        for ($i = 0; $i < $nbseries; $i++)
        {
            $textCard = $textCard.' <div class="col">
            <input class="border border-dark container" name="serie'.($i+1).'" id="serie'.($i+1).'"></div>';
        }
        $textCard = $textCard.'</div></p>';
        $boutonCard = '<button type="button" class="btn btn-dark" onclick="sumbitForm();">Valider</bouton></form>';
        $viewCard = $titleCard.$textCard.$boutonCard;
 
    }

    function getExercice($nbW,$nbEx,$connect)
    {
        $tab = array();
        $request = "SELECT * FROM public.w".$nbW." WHERE id=".$nbEx.";";
        if ( !pg_connection_busy($connect) ) pg_send_query($connect,$request);
        $infoSQL = pg_get_result($connect);
        if ( !$infoSQL ) printf('Error $exSQL');
        $infoSQL = pg_fetch_assoc($infoSQL);
        $tab[0] = $infoSQL['muscle'];
        $tab[1] = $infoSQL['exerice'];
        $tab[2] = $infoSQL['series'];
        $tab[3] = $infoSQL['repetitions'];
        $tab[4] = $infoSQL['poids'];
        echo "here";
        return $tab;
    }



?>