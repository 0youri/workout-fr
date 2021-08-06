<?php
    $lunchHTML = $dinnerHTML = $totalHTML = "";
    $request = "SELECT * FROM public.food WHERE type='lunch' ORDER BY rank;";
    $lunchSQL = requestDB($request,$connect);
    
    $fatsAll = $carbsAll = $proteinAll = $kcalAll = 
    $kcalLunch = $fatsLunch = $carbsLunch = $proteinLunch = 0;
    
    while ( $dataLunch = pg_fetch_assoc($lunchSQL) )
    {
        $food = $dataLunch['food'];
        $amount = $dataLunch['amount'];
        $kcal = ( $amount * $dataLunch['kcal'] ) / 100;
        $fats = ( $amount * $dataLunch['fats'] ) / 100;
        $carbs = ( $amount * $dataLunch['carbs'] ) / 100;
        $protein = ( $amount * $dataLunch['protein'] ) / 100;
        $lunchHTML = $lunchHTML.
        "<tr>
            <td>".$food."</td>
            <td>".$kcal."</td><td>".$fats."</td><td>".$carbs."</td><td>".$protein."</td>
            <td>".$amount."</td>
        </tr>";
        $kcalAll = $kcalAll + $kcal;
        $fatsAll = $fatsAll + $fats;
        $carbsAll = $carbsAll + $carbs;
        $proteinAll = $proteinAll + $protein;
    }
    $kcalLunch = $kcalAll;
    $fatsLunch = $fatsAll;
    $carbsLunch = $carbsAll;
    $proteinLunch = $proteinAll;

    $lunchHTML = $lunchHTML.
    "<tr class='table-light'>
        <td><strong>Total lunch</strong></td>
        <td><strong>".$kcalLunch."</strong></td>
        <td><strong>".$fatsLunch."</strong></td>
        <td><strong>".$carbsLunch."</strong></td>
        <td><strong>".$proteinLunch."</strong></td>
        <td></td>
    </tr>";

    $request = "SELECT * FROM public.food WHERE type='dinner' ORDER BY rank;";
    $dinnerSQL = requestDB($request,$connect);
    
    while ( $dataDinner = pg_fetch_assoc($dinnerSQL) )
    {
        $food = $dataDinner['food'];
        $amount = $dataDinner['amount'];
        $kcal = ( $amount * $dataDinner['kcal'] ) / 100;
        $fats = ( $amount * $dataDinner['fats'] ) / 100;
        $carbs = ( $amount * $dataDinner['carbs'] ) / 100;
        $protein = ( $amount * $dataDinner['protein'] ) / 100;
        $dinnerHTML = $dinnerHTML.
        "<tr>
            <td>".$food."</td>
            <td>".$kcal."</td><td>".$fats."</td><td>".$carbs."</td><td>".$protein."</td>
            <td>".$amount."</td>
        </tr>";
        $kcalAll = $kcalAll + $kcal;
        $fatsAll = $fatsAll + $fats;
        $carbsAll = $carbsAll + $carbs;
        $proteinAll = $proteinAll + $protein;
    }
    $dinnerHTML = $dinnerHTML.
    "<tr class='table-light'>
        <td><strong>Total dinner</strong></td>
        <td><strong>".($kcalAll-$kcalLunch)."</strong></td>
        <td><strong>".($fatsAll-$fatsLunch)."</strong></td>
        <td><strong>".($carbsAll-$carbsLunch)."</strong></td>
        <td><strong>".($proteinAll-$proteinLunch)."</strong></td>
        <td></td>
    </tr>";

    $totalHTML = "<tr> <td>~".$kcalAll."</td> <td>~".$fatsAll."</td>
    <td>~".$carbsAll."</td> <td>~".$proteinAll."</td> </tr>";
?>