<?php
    $idW = $_GET['w'];
    $statsHTML = "";
    $request = "SELECT * FROM public.workout WHERE id=".$idW.";";
    $workoutSQL = requestDB($request,$connect);
    while ( $dataWorkout = pg_fetch_assoc($workoutSQL) )
    {
        $muscle = $dataWorkout['muscle'];
        $exercice = $dataWorkout['exercice'];
        $nbseries = $dataWorkout['series'];
        $nbrep = $dataWorkout['repetitions'];
        $poids = $dataWorkout['poids'];

        $request = "SELECT * FROM public.stats WHERE id=".$idW." AND muscle='".$muscle."';";
        $statsSQL = requestDB($request,$connect);
        $statsHTML =  $statsHTML.'<div class="badge bg-dark text-wrap">'.$muscle.' - '.$exercice.' - '.$nbseries.'x'.$nbrep.'</div>
        <div class="table-responsive">    
        <table class="table table-bordered">
            <th>Date</th><th>Nb reps</th><th>Poids</th><th>Niveau</th>';
        while ( $dataStats = pg_fetch_assoc($statsSQL) )
        {
            $date = $dataStats['date'];
            $statspoids = $dataStats['poids'];
            $statsnbrep = $dataStats['serie1'] + $dataStats['serie2'] + $dataStats['serie3'] + $dataStats['serie4'];
            $statsnbreptext = $dataStats['serie1'].":".$dataStats['serie2'].":".$dataStats['serie3'].":".$dataStats['serie4'];
            if ( $statsnbrep < 24)
                $mark = '<i class="bi text-danger bi-exclamation-triangle-fill"></i>';
            else if ( $statsnbrep >= 24 && $statsnbrep < 32)
                $mark = '<i class="bi text-warning bi-exclamation-triangle-fill"></i>';
            else if ( $statsnbrep > 32 && $statsnbrep <= 39)
                $mark = '<i class="bi text-primary bi-bar-chart-fill"></i>';
            else $mark = '<i class="bi text-success bi-check-circle-fill"></i>';
            $statsHTML = $statsHTML.'<tr>
            <td>'.$date.'</td>
            <td>'.$statsnbrep.'<br>('.$statsnbreptext.')</td>
            <td>'.$statspoids.'kg</td>
            <td>'.$mark.'</td>
            </tr>';
        }
        $statsHTML = $statsHTML. '</table></div>';
    }

?>