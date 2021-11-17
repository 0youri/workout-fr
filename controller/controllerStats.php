<?php
    $idW = $_GET['w'];
    $statsHTML = "";
    $request = "SELECT * FROM public.workout WHERE id=".$idW." ORDER BY rank;";
    $workoutSQL = requestDB($request,$connect);
    while ( $dataWorkout = pg_fetch_assoc($workoutSQL) )
    {
        $muscle = $dataWorkout['muscle'];
        $exercise = $dataWorkout['exercise'];
        $noseries = $dataWorkout['series'];
        $noreps = $dataWorkout['repetitions'];
        $weight = $dataWorkout['weight'];

        $request = "SELECT * FROM public.stats WHERE id=".$idW." AND muscle='".$muscle."' ORDER by date;";
        $statsSQL = requestDB($request,$connect);
        $statsHTML =  $statsHTML.'<div class="badge bg-dark text-wrap">'.$muscle.' - '.$exercise.' - '.$noseries.'x'.$noreps.'</div>
        <div class="table-responsive">    
        <table class="table table-bordered">
            <tr class="bg-light"><th>Date</th><th>No. reps</th><th>Weight</th></tr>';
        while ( $dataStats = pg_fetch_assoc($statsSQL) )
        {
            $date = $dataStats['date'];
            $statsweight = $dataStats['weight'];
            for ( $i = 1; $dataStats["serie$i+1"]; $i++)
            {
                $statsnorepstext .= $dataStats["serie$i"].":";
            }
            $statsnorepstext .= $dataStats["serie$i"];

            $statsHTML = $statsHTML.'
            <tr>
            <td>'.$date.'</td>
            <td>'.$statsnorepstext.'</td>
            <td>'.$statsweight.'</td>
            </tr>';
        }
        $statsHTML = $statsHTML. '</table></div>';
    }

?>