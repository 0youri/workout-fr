<?php
    $idW = $_GET['w'];
    $statsHTML = "";
    $request = "SELECT * FROM public.workout WHERE id=".$idW." ORDER BY rank;";
    $workoutSQL = requestDB($request,$connect);
    while ( $dataWorkout = pg_fetch_assoc($workoutSQL) )
    {
        $muscle = $dataWorkout['muscle'];
        $exercice = $dataWorkout['exercice'];
        $nbseries = $dataWorkout['series'];
        $nbrep = $dataWorkout['repetitions'];
        $poids = $dataWorkout['poids'];

        $request = "SELECT * FROM public.stats WHERE id=".$idW." AND muscle='".$muscle."' ORDER by date;";
        $statsSQL = requestDB($request,$connect);
        $statsHTML =  $statsHTML.'<div class="badge bg-dark text-wrap">'.$muscle.' - '.$exercice.' - '.$nbseries.'x'.$nbrep.'</div>
        <div class="table-responsive">    
        <table class="table table-bordered">
            <th>Date</th><th>Nb reps</th><th>Poids</th>';
        while ( $dataStats = pg_fetch_assoc($statsSQL) )
        {
            $date = $dataStats['date'];
            $statspoids = $dataStats['poids'];
            $statsnbreptext = $dataStats['serie1'].":".$dataStats['serie2'].":".$dataStats['serie3'].":".$dataStats['serie4'];
            $statsHTML = $statsHTML.'<tr>
            <td>'.$date.'</td>
            <td>'.$statsnbreptext.'</td>
            <td>'.$statspoids.'</td>
            <td>'.$mark.'</td>
            </tr>';
        }
        $statsHTML = $statsHTML. '</table></div>';
    }

?>