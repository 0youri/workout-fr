<?php
    $lunchHTML = $dinnerHTML = $totalHTML = "";
    $request = "SELECT * FROM public.food WHERE type='lunch' ORDER BY rank;";
    $lunchSQL = requestDB($request,$connect);
    
    $fatsAll = $carbsAll = $proteinAll = $kcalAll = 
    $lunchKcal = $lunchfats = $lunchcarbs = $lunchprotein = 0;
    
    while ( $dataLunch = pg_fetch_assoc($lunchSQL) )
    {
        $aliment = $dataLunch['food'];
        $quantite = $dataLunch['amount'];
        $kcal = ( $quantite * $dataLunch['kcal'] ) / 100;
        $fats = ( $quantite * $dataLunch['fats'] ) / 100;
        $carbs = ( $quantite * $dataLunch['carbs'] ) / 100;
        $prot = ( $quantite * $dataLunch['protein'] ) / 100;
        $lunchHTML = $lunchHTML.
        "<tr>
            <td>".$aliment."</td>
            <td>".$kcal."</td><td>".$fats."</td><td>".$carbs."</td><td>".$protein."</td>
        </tr>";
        $kcalAll = $kcalAll + $kcal;
        $fatsAll = $fatsAll + $fats;
        $carbsAll = $carbsAll + $carbs;
        $proteinAll = $proteinAll + $protein;
    }
    $lunchKcal = $kcalAll;
    $lunchfats = $fatsAll;
    $lunchcarbs = $carbsAll;
    $lunchprotein = $proteinAll;

    $lunchHTML = $lunchHTML.
    "<tr class='table-light'>
        <td><strong>Total lunch</strong></td>
        <td><strong>".$lunchKcal."</strong></td>
        <td><strong>".$lunchfats."</strong></td>
        <td><strong>".$lunchcarbs."</strong></td>
        <td><strong>".$lunchprotein."</strong></td>
    </tr>";

    $request = "SELECT * FROM public.food WHERE type='dinner' ORDER BY rank;";
    $dinnerSQL = requestDB($request,$connect);
    
    while ( $dataDinner = pg_fetch_assoc($dinnerSQL) )
    {
        $aliment = $dataDinner['aliment'];
        $quantite = $dataDinner['quantite'];
        $kcal = ( $quantite * $dataDinner['kcal'] ) / 100;
        $fats = ( $quantite * $dataDinner['fats'] ) / 100;
        $carbs = ( $quantite * $dataDinner['carbs'] ) / 100;
        $prot = ( $quantite * $dataDinner['protein'] ) / 100;
        $dinnerHTML = $dinnerHTML.
        "<tr>
            <td>".$aliment."</td>
            <td>".$kcal."</td><td>".$fats."</td><td>".$carbs."</td><td>".$prot."</td>
        </tr>";
        $kcalAll = $kcalAll + $kcal;
        $fatsAll = $fatsAll + $fats;
        $carbsAll = $carbsAll + $carbs;
        $protAll = $protAll + $prot;
    }
    $dinnerHTML = $dinnerHTML.
    "<tr class='table-light'>
        <td><strong>Total dinner</strong></td>
        <td><strong>".($kcalAll-$lunchKcal)."</strong></td>
        <td><strong>".($fatsAll-$lunchfats)."</strong></td>
        <td><strong>".($carbsAll-$lunchcarbs)."</strong></td>
        <td><strong>".($proteinAll-$lunchprotein)."</strong></td>
    </tr>";

    $totalHTML = "<tr> <td>~".$kcalAll."</td> <td>~".$fatsAll."</td>
    <td>~".$carbsAll."</td> <td>~".$proteinAll."</td> </tr>";
?>