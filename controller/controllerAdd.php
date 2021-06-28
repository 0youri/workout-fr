<?php
    $nbW = $typeW = $muscle = $exercice = $nbseries = $nbrep = $poids = "";
    $viewCard = $titleCard = $textCard = $boutonCard = $lien = "";
    $tab = array();

    $allworkout = file("model/allworkout.txt");
    for ($i = 0; $i < count($allworkout); $i++)
    {
        $explore = explode(":",$allworkout[$i]);
        if ($explore[0] == $_GET['w'])
        {
            $nbW = $explore[0];
            $typeW = $explore[1];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ( !empty($_GET['muscle']) )
        {
            $today = date("d/m/y");                       
            $series = $today.":".$_GET['poids'].":";
            for ($i = 0; $i < $_GET['nbseries']; $i++)
            {
                $series = $series.$_POST['serie'.($i+1)].':';
            }
            $fp = fopen("model/w".$_GET['w']."/stats/".( strtolower($_GET['muscle']) ).".txt", "a");
            $savestring = $series."\n";
            fwrite($fp, $savestring);
            fclose($fp);
            //$succes = "ajout";
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
        $tab = getExercice($nbW,$_GET['etat']);
        $muscle = $tab[0];
        $exercice = $tab[1];
        $nbseries = $tab[2];
        $nbrep = $tab[3];
        $poids = $tab[4];
        $lien = 'index.php?page=add&w='.$nbW.'&etat='.($_GET['etat']+1).'&muscle='.$muscle.'&nbseries='.$nbseries.'&poids='.$poids;
      

        $titleCard = '<form method="POST" id="formAdd" enctype="multipart/form-data" action="'.$lien.'">
            <h5 class="card-title">['.$muscle.'] '.$exercice.' - '.$nbseries.'x'.$nbrep.' - '.$poids.'kg</h5>';
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

    function getExercice($nbW,$nbEx)
    {
        $tab = array();
        $info = file("model/w".$nbW."/info.txt");
        $exploreinfo = explode(":",$info[$nbEx]);
        $tab[0] = $exploreinfo[0];
        $tab[1] = $exploreinfo[1];
        $tab[2] = $exploreinfo[2];
        $tab[3] = $exploreinfo[3];
        $tab[4] = $exploreinfo[4];
        return $tab;
    }



?>