<?php
    $nbW = $typeW = $muscle = $exercice = $nbseries = $nbrep = $poids = "";
    $viewCard = $titleCard = $textCard = $boutonCard = $lien = "";
    $tab = array();

 
    // Add workout on DB
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ( !empty($_POST['muscle']) )
        {
            $id = $_GET['w'];
            $muscle = $_POST['muscle'];
            $rank = $_POST['rank'];
            $today = date("d/m/Y");   
            $serie1 = $_POST['serie1'];
            $serie2 = $_POST['serie2'];
            $serie3 = $_POST['serie3'];
            $serie4 = $_POST['serie4'];
            $poids = $_POST['poids'];
            $values = "'".$today."',".$serie1.",".$serie2.",".$serie3.",".$serie4.",'".$poids."','".$muscle."',".$rank."";
            addTableDataDB($id,$values,$connect);
        }
    }
    


    // Beging workout
    if ($_GET['etat'] == -1)
    {
           // Recover data from table allworkout
        $request = "SELECT * FROM public.allworkout";
        $allworkoutSQL = requestDB($request,$connect);
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
        $request = "SELECT count(*) FROM public.workout WHERE id=".$nbW.";";
        $etatF = requestDB($request,$connect);
        $etatF = pg_fetch_assoc($etatF)['count'];
        $viewCard = '
                <a href="index.php?page=addstats&w='.$nbW.'&typeW='.$typeW.'&etatF='.$etatF.'&etat=0" 
                class="btn btn-dark">Commencer entrainement</a>';
    }
    // Finish workout
    else if ( $_GET['etat'] == $_GET['etatF'])
    {
        $viewCard = '<h5 class="card-title">Entrainement terminé</h5>
        <a href="index.php?page=workout" class="btn btn-danger">Terminer</a>';
    }
    // During workout
    else
    {   
        $nbW = $_GET['w'];
        $typeW = $_GET['typeW'];
        $tab = getExercice($nbW,$_GET['etat'],$connect);
        $muscle = $tab[0];
        $exercice = $tab[1];
        $nbseries = $tab[2];
        $nbrep = $tab[3];
        $poids = $tab[4];
        $lien = 'index.php?page=addstats&w='.$nbW.'&typeW='.$typeW.'&etatF='.$_GET['etatF'].'&etat='.($_GET['etat']+1);

        $titleCard = '<form method="POST" id="formAdd" enctype="multipart/form-data" action="'.$lien.'">
            <input style="display:none;" name="poids" value="'.$poids.'">
            <input style="display:none;" name="rank" value="'.($_GET['etat']+1).'">
            <input style="display:none;" name="muscle" value="'.$muscle.'">
            <h5 class="card-title">#'.($_GET['etat']+1).' ['.$muscle.'] '.$exercice.' | '.$nbseries.'x'.$nbrep.' | '.$poids.'kg</h5>';
        $textCard = '<p class="card-text"><div class="row">';
        for ($i = 1; $i <= $nbseries; $i++)
        {
            $textCard = $textCard.' <div class="col">
            <input class="border border-dark container" name="serie'.$i.'" id="serie'.$i.'"></div>';
        }
        $textCard = $textCard.'</div></p>';
        $boutonCard = '<button type="button" class="btn btn-success" onclick="sumbitFormAdd();">Valider</bouton></form>';
        $viewCard = $titleCard.$textCard.$boutonCard;
 
    }

    // Tab with data of exercise
    function getExercice($nbW,$nbEx,$connect)
    {
        $tab = array();
        $request = "SELECT * FROM public.workout WHERE id=".$nbW." ORDER BY rank;";
        if ( !pg_connection_busy($connect) ) pg_send_query($connect,$request);
        else echo "Error controller/controllerAdd.php -> pg_connection_busy(...)";

        $infoSQL = pg_get_result($connect);
        if ( !$infoSQL ) echo 'Error controller/controllerAdd.php -> pg_get_result(...)';
        $infoSQL = pg_fetch_assoc($infoSQL,$nbEx);

        $tab[0] = $infoSQL['muscle'];
        $tab[1] = $infoSQL['exercice'];
        $tab[2] = $infoSQL['series'];
        $tab[3] = $infoSQL['repetitions'];
        $tab[4] = $infoSQL['poids'];
        return $tab;
    }



?>