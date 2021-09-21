<?php
    $workoutHTML = $id = "";

    if ( $_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Form Add Workout
        if ( isset($_POST['input-add-workout-type']) )
        {

        }
        /*
        if ( isset($_POST['editP']) )
        {
            $editP = $_POST['editP'];
            $id = $_POST['w'];
            $rank = $_POST['rank'];
            $muscle = $_POST['muscle'];
            $request = "UPDATE public.workout 
            SET weight='".$editP."' 
            WHERE id=".$id." AND rank=".$rank." AND muscle='".$muscle."';";
            requestDB($request,$connect);
        }
        */

        else if ( isset($_POST['input-edit-workout-id']) )
        {
            $id = $_POST['w'];
            $tab = explode("-", $_POST['select-edit-muscle']);
            $rank = $tab[0];
            $muscle = $tab[1];
            $exercise = $_POST['input-edit-exercise'];
            $series = $_POST['input-edit-series'];
            $repetitions = $_POST['input-edit-repetitions'];
            $weight = $_POST['input-edit-weight'];
            $newrank = $_POST['input-edit-rank'];
            $request = "
            UPDATE public.workout
            SET rank=".$rank." WHERE id=".$id." AND rank=".$newrank.";
            UPDATE public.workout 
            SET exercise='".$exercise."', series=".$series.", repetitions=".$repetitions.", 
            weight='".$weight."', rank='".$newrank."'
            WHERE id=".$id." AND rank=".$rank." AND muscle='".$muscle."';
            ";
            requestDB($request,$connect);
            if ( $_POST['checkbox-edit'] == "on" )
            {
                $request = "DELETE FROM public.stats 
                WHERE id=".$id." AND rank=".$rank." AND muscle='".$muscle."';";
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
                        <strong>#'.$id.' - <span id="span-workout-type-'.$id.'">'.$type.'</span>
                        </strong>
                        <span class="position-absolute end-0">
                            <button class="btn btn-dark bi bi-info-circle-fill" 
                            type="button" id="infow'.$id.'" 
                            onclick="AfficherCollapse(`collapsew'.$id.'`);"></button>
                            <a class="btn btn-dark bi bi-bar-chart-fill" id="statsw'.$id.'" 
                            href="index.php?page=stats&w='.$id.'"></a>
                            <a class="btn btn-dark bi bi-plus-circle-fill" id="addw'.$id.'" 
                            href="index.php?page=addstats&w='.$id.'&state=-1"></a>
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
                        <p><strong>Exercises:</strong>
                        <div class="table-responsive">
                        <table class="table table-bordered bg-white">
                        <th style="display:none;">Rank</th><th>Muscle</th><th>Exercise</th>
                        <th>No. series x No. reps</th><th>Weight (kg)</th><th>Rest period</th>
        ';
        $request = "SELECT * FROM public.workout WHERE id=".$id." ORDER BY rank;";
        $infoSQL = requestDB($request,$connect);
        while ( $dataInfo = pg_fetch_assoc($infoSQL) )
        {
            $rank = $dataInfo['rank'];
            $muscle = $dataInfo['muscle'];
            $exercice = $dataInfo['exercise'];
            $series = $dataInfo['series'];
            $reps = $dataInfo['repetitions'];
            $weight = $dataInfo['weight'];
            $time = $dataInfo['time'];
            $workoutHTML = $workoutHTML."<tr>
            <td id='td-rank-".$id."-".$rank."' style='display:none;'>".$rank."</td>
            <td id='td-muscle-".$id."-".$rank."'>".$muscle."</td>
            <td id='td-exercise-".$id."-".$rank."'>".$exercice."</td>
            <td id='td-no-".$id."-".$rank."'
            >".$series."x".$reps."</td>
            <td id='td-weight-".$id."-".$rank."'>".$weight."</td>
            <td id='td-time-".$id."-".$rank."'>".$time."</td>";
        }
    
        $workoutHTML = $workoutHTML.'</table>
        <div class="container card-body bg-dark border rounded" style="text-align: center"
        data-bs-toggle="modal" data-bs-target="#modalAddExercise" onclick="">
            <a class="btn-dark bi bi-plus-circle-fill" href="#"></a>
        </div>
        </div></p></div></div></div>';
    }
?>