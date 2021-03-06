<?php
    $noW = $typeW = $rankW = $muscle = $exercise = $noseries = $noreps = $weight = "";
    $viewCard = $titleCard = $textCard = $buttonCard = $link = "";
    $tab = array();

 
    // Add workout on DB
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ( !empty($_POST['muscle']) )
        {
            $id = $_GET['id'];
            $muscle = $_POST['muscle'];
            $rank = $_POST['rank'];
            $date = date("Y-m-d");
            $reps = '';
            
            for ($i = 1; $_POST["serie".($i+1)]; $i++)
            {
                $reps .= $_POST["serie$i"].":";
            }
            $reps .= $_POST["serie$i"];
            $weight = $_POST['weight'];
            $request = "
            INSERT INTO public.stats VALUES ($id,'$date','$reps','$weight','$muscle',$rank);
            ";
            requestDB($request,$connect);
        }
    }
    


    // Beging workout
    if ($_GET['state'] == -1)
    {
           // Recover data from table allworkout
        $request = "SELECT * FROM public.allworkout";
        $allworkoutSQL = requestDB($request,$connect);
        // Searching from $allworkoutSQL id and type of workout 
        while ( $dataAllWorkout = pg_fetch_assoc($allworkoutSQL) )
        {
            if ($dataAllWorkout['id'] == $_GET['id'])
            {
                $noW = $dataAllWorkout['id'];
                $typeW = $dataAllWorkout['type'];
                $rankW = $_GET['rankW'];
                break;
            }
        }
        $request = "SELECT count(*) FROM public.workout WHERE id=".$noW.";";
        $stateF = requestDB($request,$connect);
        $stateF = pg_fetch_assoc($stateF)['count'];
        $link = 'index.php?page=addstats&id='.$noW.'&rankW='.$rankW.'&typeW='.$typeW.'&stateF='.$stateF.'&state=0';
        header("Location: $link");
        exit();
    }
    // Finish workout
    else if ( $_GET['state'] == $_GET['stateF'])
    {
        header('Location: index.php');
        exit();
    }
    // During workout
    else
    {   
        $noW = $_GET['id'];
        $typeW = $_GET['typeW'];
        $rankW = $_GET['rankW'];
        $tab = getExercise($noW,$_GET['state'],$connect);
        $muscle = $tab[0];
        $exercise = $tab[1];
        $noseries = $tab[2];
        $noreps = $tab[3];
        $weight = $tab[4];
        $time = $tab[5];
        $link = 'index.php?page=addstats&id='.$noW.'&rankW='.$rankW.'&typeW='.$typeW.'
        &stateF='.$_GET['stateF'].'&state='.($_GET['state']+1);

        $titleCard = '<form method="POST" id="formAdd" enctype="multipart/form-data" action="'.$link.'">
            <input style="display:none;" name="weight" value="'.$weight.'">
            <input style="display:none;" name="rank" value="'.($_GET['state']+1).'">
            <input style="display:none;" name="muscle" value="'.$muscle.'">
            <h5 class="card-title text-start">#'.($_GET['state']+1).' - '.$muscle.'<br>
            '.$exercise.' - '.$noseries.'x'.$noreps.'<br>
            '.$weight.'kg - '.$time.'min</h5>';
        $textCard = '<p class="card-text"><div class="row">';
        for ($i = 1; $i <= $noseries; $i++)
        {
            $textCard = $textCard.' <div class="col">
            <input class="border border-dark container" name="serie'.$i.'" id="serie'.$i.'"></div>';
        }
        $textCard = $textCard.'</div></p>';
        $buttonCard = '<button type="button" class="btn btn-success" onclick="sumbitFormAdd();">Sumbit</button></form>';
        $viewCard = $titleCard.$textCard.$buttonCard;
 
    }

    // Tab with data of exercise
    function getExercise($noW,$noEx,$connect)
    {
        $tab = array();
        $request = "SELECT * FROM public.workout WHERE id=".$noW." ORDER BY rank;";
        if ( !pg_connection_busy($connect) ) pg_send_query($connect,$request);
        else echo "Error controller/controllerAdd.php -> pg_connection_busy(...)";

        $infoSQL = pg_get_result($connect);
        if ( !$infoSQL ) echo 'Error controller/controllerAdd.php -> pg_get_result(...)';
        $infoSQL = pg_fetch_assoc($infoSQL,$noEx);

        $tab[0] = $infoSQL['muscle'];
        $tab[1] = $infoSQL['exercise'];
        $tab[2] = $infoSQL['series'];
        $tab[3] = $infoSQL['repetitions'];
        $tab[4] = $infoSQL['weight'];
        $tab[5] = $infoSQL['time'];
        return $tab;
    }



?>