<?php
    $workoutHTML = $id = "";

    // After sumbit of POST form
    if ( $_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Add Workout
        if ( isset($_POST['input-formaddworkout-type']) )
        {
            $type = $_POST['input-formaddworkout-type'];
            $rank = $_POST['input-formaddworkout-rank'];
            $request = "
            UPDATE public.allworkout SET rank=rank+1 WHERE rank >= ".$rank.";
            INSERT INTO public.allworkout (type,rank) VALUES ('".$type."',".$rank.");
            ";
            requestDB($request,$connect);
        }
        // Delete Workout
        else if ( isset($_POST['input-formdeleteworkout-info']) )
        {
            $info = explode("-", $_POST['input-formdeleteworkout-info']);
            $id = $info[0];
            $rank = $info[1];
            $request = "
            DELETE FROM public.stats WHERE id=".$id.";
            DELETE FROM public.workout WHERE id=".$id.";
            DELETE FROM public.allworkout WHERE id=".$id.";
            UPDATE public.allworkout SET rank=rank-1 WHERE rank>".$rank.";
            ";
            requestDB($request,$connect);
        }

        // Add Exercise
        else if ( isset($_POST['input-formaddexercise-id']) )
        {
            $id = $_POST['input-formaddexercise-id'];
            $muscle = $_POST['input-formaddexercise-muscle'];
            $exercise = $_POST['input-formaddexercise-exercise'];
            $series = $_POST['input-formaddexercise-series'];
            $reps = $_POST['input-formaddexercise-repetitions'];
            $weight = $_POST['input-formaddexercise-weight'];
            $time = $_POST['input-formaddexercise-time'];
            $request = "INSERT INTO public.workout (id,muscle,exercise,series,repetitions,weight,rank,time)
            VALUES (".$id.",'".$muscle."','".$exercise."',".$series.",".$reps.",'".$weight."',
            (select count(rank) from public.workout where id=".$id.")+1,'".$time."');
            ";
            requestDB($request,$connect);
        }
        // Edit Exercise
        else if ( isset($_POST['input-formeditexercise-id']) )
        {
            $id = $_POST['input-formeditexercise-id'];
            $tab = explode("-", $_POST['select-formeditexercise-muscle']);
            $rank = $tab[0];
            $muscle = $tab[1];
            $exercise = $_POST['input-formeditexercise-exercise'];
            $series = $_POST['input-formeditexercise-series'];
            $repetitions = $_POST['input-formeditexercise-repetitions'];
            $weight = $_POST['input-formeditexercise-weight'];
            $newrank = $_POST['input-formeditexercise-rank'];

            // Delete Exercise
            if ( $_POST['checkbox-formeditexercise-delete-exercise'] == "on" )
            {
                $request = "
                DELETE FROM public.stats 
                WHERE id=".$id." AND rank=".$rank." AND muscle='".$muscle."';

                DELETE FROM public.workout 
                WHERE id=".$id." AND rank=".$rank." AND muscle='".$muscle."';

                UPDATE public.workout
                SET rank=rank-1
                WHERE id=".$id." AND rank>".$rank.";
                ";
                requestDB($request,$connect);
            }
            // Edit Exercise if not delete
            else
            {
                if ( $newrank > $rank )
                {
                    $request = "
                    UPDATE public.workout SET rank=rank-1 
                    WHERE id=".$id." AND rank > ".$rank." AND rank <= ".$newrank.";
                    UPDATE public.workout 
                    SET exercise='".$exercise."', series=".$series.", repetitions=".$repetitions.", 
                    weight='".$weight."', rank='".$newrank."'
                    WHERE id=".$id." AND rank=".$rank." AND muscle='".$muscle."';
                    ";
                }
                else if ( $newrank < $rank )
                {
                    $request = "
                    UPDATE public.workout SET rank=rank+1 
                    WHERE id=".$id." AND rank < ".$rank." AND rank >= ".$newrank.";
                    UPDATE public.workout 
                    SET exercise='".$exercise."', series=".$series.", repetitions=".$repetitions.", 
                    weight='".$weight."', rank='".$newrank."'
                    WHERE id=".$id." AND rank=".$rank." AND muscle='".$muscle."';
                    ";
                }
                /*
                echo "here";
                else if ( $newrank == $rank )
                {
                    $request = "
                    UPDATE public.workout 
                    SET exercise='".$exercise."', series=".$series.", repetitions=".$repetitions.", 
                    weight='".$weight."', rank='".$rank."'
                    WHERE id=".$id." AND rank=".$rank." AND muscle='".$muscle."';
                    ";
                }
                */

                if ( $_POST['checkbox-formeditexercise-delete-stats'] == "on" )
                {
                    $request += "
                    DELETE FROM public.stats 
                    WHERE id=".$id." AND rank=".$rank." AND muscle='".$muscle."';
                    ";
                }

                if ( $request != "" )
                    requestDB($request,$connect);
            }
        }
    }



    $request = "SELECT * FROM public.allworkout ORDER BY rank;";
    $allworkoutSQL = requestDB($request,$connect);

    // Display all workout
    while ( $dataAllWorkout = pg_fetch_assoc($allworkoutSQL) )
    {
        $id = $dataAllWorkout['id'];
        $rankW = $dataAllWorkout['rank'];
        $type = $dataAllWorkout['type'];
        $workoutHTML = $workoutHTML.'<div id="w'.$id.'">
            <br>
            <div class="card-body bg-light border rounded">
                <div class="position-relative">
                    <div class="text-black fs-5">
                        <strong>#<span id="span-workout-rank-'.$id.'">'.$rankW.'</span>
                         <span id="span-workout-type-'.$id.'">'.$type.'</span>
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
                            data-bs-toggle="modal"  data-bs-target="#"
                            onclick="">
                            </button>
                            <button class="btn btn-dark bi bi-x-circle-fill" type="button" 
                            data-bs-toggle="modal"  data-bs-target="#modalDeleteWorkout"
                            onclick="initFormDeleteWorkout(`'.$id.'`);">
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
        // Display exercise by workout
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
        <div class="row">
            <div class="col">
                <div class="container card-body bg-dark border rounded" style="text-align: center"
                data-bs-toggle="modal" data-bs-target="#modalAddExercise" onclick="resetFormAddExercise(`'.$id.'`);">
                    <a class="btn-dark bi bi-plus-circle-fill" href="#"></a>
                </div>
            </div>
            <div class="col">
                <div class="container card-body bg-dark border rounded" style="text-align: center"
                data-bs-toggle="modal"  data-bs-target="#modalEditExercise" onclick="resetFormEditExercise(); initFormEditExercise(`'.$id.'`);">
                    <a class="btn-dark bi bi-gear-fill" href="#"></a>
                </div>
            </div>
        </div>



        </div></p></div></div></div>';
    }
?>