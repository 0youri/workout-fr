<?php
    $workoutHTML = $id = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ( isset($_POST['editP']) )
        {
            $editP = $_POST['editP'];
            $id = $_POST['w'];
            $rank = $_POST['rank'];
            $muscle = $_POST['muscle'];
            $request = "UPDATE public.workout SET poids='".$editP."' 
            WHERE id=".$id." AND rank=".$rank." AND muscle='".$muscle."';";
            requestDB($request,$connect);
        }
        else
        {
            $id = $_POST['w'];
            $tab = explode("-", $_POST['select-edit-muscle']);
            $rank = $tab[0];
            $muscle = $tab[1];
            $exercice = $_POST['input-edit-exercice'];
            $series = $_POST['input-edit-series'];
            $repetitions = $_POST['input-edit-repetitions'];
            $poids = $_POST['input-edit-poids'];
            $request = "UPDATE public.workout 
            SET exercice='".$exercice."', series=".$series.", repetitions=".$repetitions.", poids='".$poids."'
            WHERE id=".$id." AND rank=".$rank." AND muscle='".$muscle."';";
            requestDB($request,$connect);
            if ( $_POST['checkbox-edit'] == "on" )
            {
                $request = "DELETE FROM public.stats WHERE id=".$id." AND rank=".$rank." AND muscle='".$muscle."';";
                requestDB($request,$connect);
            }
        }
    }

    $request = "SELECT * FROM public.allworkout;";
    $allworkoutSQL = requestDB($request,$connect);
    while ( $dataAllWorkout = pg_fetch_assoc($allworkoutSQL) )
    {
        $id = $dataAllWorkout['id'];
        $type = $dataAllWorkout['type'];
        $workoutHTML = $workoutHTML.'<div id="w'.$id.'">
            <br>
            <div class="card-body bg-light border rounded">
                <div class="position-relative">
                    <div class="text-black fs-5">
                        <strong id="strong-workout-name-'.$id.'"
                        >#'.$id.' - '.$type.'
                        </strong>
                        <span class="position-absolute end-0">
                            <button class="btn btn-dark bi bi-info-circle-fill" 
                            type="button" id="infow'.$id.'" 
                            onclick="AfficherCollapse(`collapsew'.$id.'`);"></button>
                            <a class="btn btn-dark bi bi-bar-chart-fill" id="statsw'.$id.'" 
                            href="index.php?page=stats&w='.$id.'"></a>
                            <a class="btn btn-dark bi bi-plus-circle-fill" id="addw'.$id.'" 
                            href="index.php?page=addstats&w='.$id.'&etat=-1"></a>
                            <button class="btn btn-dark bi bi-gear-fill" type="button" 
                            data-bs-toggle="modal"  data-bs-target="#editModal"
                            onclick="resetWorkout(); editWorkout(`'.$id.'`);">
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div id="collapsew'.$id.'" style="display:none;">
                    <br>
                    <div class="card card-body bg-light">
                        <p><strong>Type:</strong> '.$type.'</p>
                        <p><strong>Exercices:</strong>
                        <div class="table-responsive">
                        <table class="table table-bordered bg-white">
                        <th style="display:none;">Rank</th><th>Muscle</th><th>Exercice</th>
                        <th>Nb séries x Nb reps</th><th>Poids (en kg)</th><th>Settings</th>
        ';
        $request = "SELECT * FROM public.workout WHERE id=".$id." ORDER BY rank;";
        $infoSQL = requestDB($request,$connect);
        while ( $dataInfo = pg_fetch_assoc($infoSQL) )
        {
            $rank = $dataInfo['rank'];
            $muscle = $dataInfo['muscle'];
            $exercice = $dataInfo['exercice'];
            $series = $dataInfo['series'];
            $reps = $dataInfo['repetitions'];
            $workoutHTML = $workoutHTML."<tr>
            <td id='td-rank-".$id."-".$rank."' style='display:none;'>".$rank."</td>
            <td id='td-muscle-".$id."-".$rank."'>".$muscle."</td>
            <td id='td-exercice-".$id."-".$rank."'>".$exercice."</td>
            <td id='td-nb-".$id."-".$rank."'
            >".$series."x".$reps."</td>
            <td id='td-poids-".$id."-".$rank."'
            name='td-poids".$id."'>".$dataInfo['poids']."</td>
            <td id='td-poids-boutons-".$id."-".$rank."'>
                <button class='btn btn-dark bi bi-gear-fill' type='button' 
                onclick='editPoids(".$id.",".$rank.",
                `".$muscle."`);'></button>
            </td>";
        }
    
        $workoutHTML = $workoutHTML.'</table></div></p></div></div></div>';
    }
?>