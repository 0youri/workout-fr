function AfficherCollapse(element)
{
    if ( document.getElementById(`${element}`).style.display === "none" )
        document.getElementById(`${element}`).style.display = "block";
    else document.getElementById(`${element}`).style.display = "none";
}

function sumbitFormAdd()
{
    let compteur = 0; let i = 1;
    while ( document.getElementById(`serie${i}`) )
    {
        if ( document.getElementById(`serie${i}`) && document.getElementById(`serie${i}`).value == "" )
        {
            document.getElementById(`serie${i}`).classList.remove("border-dark");
            document.getElementById(`serie${i}`).classList.add("border-danger");
            document.getElementById(`serie${i}`).classList.add("border-2");
            compteur++;
        }
        else
        {
            document.getElementById(`serie${i}`).classList.add("border-dark");
            document.getElementById(`serie${i}`).classList.remove("border-danger");
            document.getElementById(`serie${i}`).classList.remove("border-2");
        }
        i++;
    }

    if ( compteur === 0 ) sumbitForm("formAdd");

}

function sumbitForm(id)
{
    document.getElementById(id).submit();
}


// Filter by section

function filterbysection()
{
    sumbitForm('formSection');
    /*
    const value = document.getElementById('select-section-allworkout').value;
    for ( let rank = 1; document.getElementById(`workout-${rank}`); rank++)
    {
        const section = document.getElementById(`section-${rank}`).value;
        if ( value == section || value == "-1" ) document.getElementById(`workout-${rank}`).style.display = "block";
        else document.getElementById(`workout-${rank}`).style.display = "none";
    }
    */
}



// Edit Exercise

function initFormEditExercise(id)
{
    //const typeW = document.getElementById(`span-workout-type-${id}`).innerHTML;
    //const rankW = document.getElementById(`span-workout-rank-${id}`).innerHTML;

    document.getElementById('input-formeditexercise-id').value = id;
    // Entete du formulaire
    //document.getElementById('h5-formeditexercise-workout-name').innerHTML = 
    //`Edit exercise #${rankW} ${typeW}`;
    
    // Input/Options select Muscle du formulaire
    let rank = 1;
    document.getElementById('select-formeditexercise-choose').innerHTML = 
    '<option value="-1" selected disabled>Choose</option>';
    while ( document.getElementById(`td-rank-${id}-${rank}`) )
    {
        const muscle = document.getElementById(`td-muscle-${id}-${rank}`).innerHTML;
        const exercise = document.getElementById(`td-exercise-${id}-${rank}`).innerHTML;
        document.getElementById('select-formeditexercise-choose').innerHTML +=
        `<option value="${rank}-${muscle}">#${rank} - ${muscle} - ${exercise}</option>`;
        rank++;
    }
    document.getElementById(`select-formeditexercise-choose`).
    setAttribute('onchange',`changeFormEditExerciseSelect('${id}');`);
}

function changeFormEditExerciseSelect(id)
{
    const rank = document.getElementById('select-formeditexercise-choose').value
    .split("-")[0]; 
    // Pointeur sur input
    let inputMuscle = document.getElementById('input-formeditexercise-muscle');
    let inputExercise = document.getElementById('input-formeditexercise-exercise');
    let inputSeries = document.getElementById('input-formeditexercise-series');
    let inputReps = document.getElementById('input-formeditexercise-repetitions');
    let inputWeight = document.getElementById('input-formeditexercise-weight');
    let inputRank = document.getElementById('input-formeditexercise-rank');
    let inputTime = document.getElementById('input-formeditexercise-time');
    let checkboxDS = document.getElementById('checkbox-formeditexercise-delete-stats');
    let checkboxDE = document.getElementById('checkbox-formeditexercise-delete-exercise');
    // Recup infos
    let tdMuscle = document.getElementById(`td-muscle-${id}-${rank}`).innerHTML;
    let tdExercise = document.getElementById(`td-exercise-${id}-${rank}`).innerHTML;
    let tdNo = document.getElementById(`td-no-${id}-${rank}`).innerHTML;
    let tdWeight = document.getElementById(`td-weight-${id}-${rank}`).innerHTML;
    let tdTime = document.getElementById(`td-time-${id}-${rank}`).innerHTML;
    // S??paration s??ries et r??p??titions ( [0] = s??ries [1] = r??p??titions )
    tdNo = tdNo.split("x"); 
    inputMuscle.disabled = inputExercise.disabled = inputSeries.disabled = inputReps.disabled 
    = inputWeight.disabled = inputRank.disabled = inputTime.disabled =
    checkboxDE.disabled = checkboxDS.disabled = checkboxDE.checked = checkboxDS.checked = false;

    inputMuscle.value = tdMuscle;
    inputExercise.value = tdExercise;
    inputSeries.value = tdNo[0];
    inputReps.value = tdNo[1];
    inputWeight.value = tdWeight;
    inputRank.value = rank;
    inputTime.value = tdTime;
}

function sumbitFormEditExercise()
{
    let inputMuscle = document.getElementById('input-formeditexercise-muscle');
    let inputExercise = document.getElementById('input-formeditexercise-exercise');
    let inputSeries = document.getElementById('input-formeditexercise-series');
    let inputReps = document.getElementById('input-formeditexercise-repetitions');
    let inputWeight = document.getElementById('input-formeditexercise-weight');
    let inputRank = document.getElementById('input-formeditexercise-rank');
    let inputTime = document.getElementById('input-formeditexercise-time');

    let id = document.getElementById('input-formeditexercise-id').value;
    let rank = 0;
    while ( document.getElementById(`td-rank-${id}-${rank+1}`) )
    {
        rank++;
    }

    if ( inputMuscle.value != "" && inputExercise.value != "" && inputWeight.value != "" && inputTime.value != "" &&
    Number(inputSeries.value) > 0  && Number(inputReps.value) > 0 && 
    ( Number(inputRank.value) > 0 && inputRank.value <= rank ) )
        sumbitForm('formEditExercise');
    else
    {
        // Verif input Muscle
        if ( inputMuscle.value == "" )
        {
            inputMuscle.classList.add("border-danger");
            inputMuscle.classList.add("border-2");
        }
        else
        {
            inputMuscle.classList.remove("border-danger");
            inputMuscle.classList.remove("border-2");
        }

        // Verif input Exercise
        if ( inputExercise.value == "" )
        {
            inputExercise.classList.add("border-danger");
            inputExercise.classList.add("border-2");
        }
        else
        {
            inputExercise.classList.remove("border-danger");
            inputExercise.classList.remove("border-2");
        }

        // Verif input Weight
        if ( inputWeight.value == "" )
        {
            inputWeight.classList.add("border-danger");
            inputWeight.classList.add("border-2");
        }
        else
        {
            inputWeight.classList.remove("border-danger");
            inputWeight.classList.remove("border-2");
        }
 
        // Verif input Rest period
        if ( inputTime.value == "" )
        {
            inputTime.classList.add("border-danger");
            inputTime.classList.add("border-2");
        }
        else
        {
            inputTime.classList.remove("border-danger");
            inputTime.classList.remove("border-2");
        }

        // Verif input Rank
        if ( Number(inputRank.value) <= 0 || inputRank.value > rank )
        {
            inputRank.classList.add("border-danger");
            inputRank.classList.add("border-2");
        }
        else
        {
            inputRank.classList.remove("border-danger");
            inputRank.classList.remove("border-2");
        }

        // Verif input Series
        if ( Number(inputSeries.value)  <= 0 )
        {
            inputSeries.classList.add("border-danger");
            inputSeries.classList.add("border-2");
        }
        else
        {
            inputSeries.classList.remove("border-danger");
            inputSeries.classList.remove("border-2");
        }

        // Verif input Repetitions
        if ( Number(inputReps.value) <= 0  )
        {
            inputReps.classList.add("border-danger");
            inputReps.classList.add("border-2");
        }
        else
        {
            inputReps.classList.remove("border-danger");
            inputReps.classList.remove("border-2");
        }
    }
}

function resetFormEditExercise()
{
    let h5 = document.getElementById('h5-formeditexercise-workout-name');
    let selectEdit = document.getElementById('select-formeditexercise-choose');
    let inputMuscle = document.getElementById('input-formeditexercise-muscle');
    let inputExercise = document.getElementById('input-formeditexercise-exercise');
    let inputSeries = document.getElementById('input-formeditexercise-series');
    let inputReps = document.getElementById('input-formeditexercise-repetitions');
    let inputWeight = document.getElementById('input-formeditexercise-weight');
    let inputRank = document.getElementById('input-formeditexercise-rank');
    let inputTime = document.getElementById('input-formeditexercise-time');
    let checkboxDS = document.getElementById('checkbox-formeditexercise-delete-stats');
    let checkboxDE = document.getElementById('checkbox-formeditexercise-delete-exercise');
    h5.innerHTML = selectEdit.innerHTML = inputMuscle.value = inputExercise.value = inputRank.value =
    inputSeries.value = inputReps.value = inputWeight.value = inputTime.value = "";

    inputMuscle.disabled = inputExercise.disabled = inputSeries.disabled = inputReps.disabled = 
    inputWeight.disabled = inputRank.disabled = inputTime.disabled =
    checkboxDS.disabled = checkboxDE.disabled = true;

    checkboxDE.checked = checkboxDS.checked = false;

    // Drop red color and border on input
    inputMuscle.classList.remove("border-danger");
    inputMuscle.classList.remove("border-2");
    inputRank.classList.remove("border-danger");
    inputRank.classList.remove("border-2");
    inputSeries.classList.remove("border-danger");
    inputSeries.classList.remove("border-2");
    inputReps.classList.remove("border-danger");
    inputReps.classList.remove("border-2");
    inputExercise.classList.remove("border-danger");
    inputExercise.classList.remove("border-2");
    inputWeight.classList.remove("border-danger");
    inputWeight.classList.remove("border-2");
    inputTime.classList.remove("border-danger");
    inputTime.classList.remove("border-2");

}


// ---------------------------------------------


// Add Exercise
function sumbitFormAddExercise()
{ 
    let inputSeries = document.getElementById('input-formaddexercise-series');
    let inputReps = document.getElementById('input-formaddexercise-repetitions');
    let inputMuscle = document.getElementById('input-formaddexercise-muscle');
    let inputExercise = document.getElementById('input-formaddexercise-exercise');
    let inputWeight = document.getElementById('input-formaddexercise-weight');
    let inputTime = document.getElementById('input-formaddexercise-time');

    if ( Number(inputSeries.value) > 0 && Number(inputReps.value) > 0
    && inputMuscle.value != "" && inputExercise.value != "" 
    && inputWeight.value != "" && inputTime.value != "" )
        sumbitForm('formAddExercise');
    else
    {
        // Verif input Muscle
        if ( inputMuscle.value == "" )
        {
            inputMuscle.classList.add("border-danger");
            inputMuscle.classList.add("border-2");
        }
        else
        {
            inputMuscle.classList.remove("border-danger");
            inputMuscle.classList.remove("border-2");
        }

        // Verif input Exercise
        if ( inputExercise.value == "" )
        {
            inputExercise.classList.add("border-danger");
            inputExercise.classList.add("border-2");
        }
        else
        {
            inputExercise.classList.remove("border-danger");
            inputExercise.classList.remove("border-2");
        }

        // Verif input Weight
        if ( inputWeight.value == "" )
        {
            inputWeight.classList.add("border-danger");
            inputWeight.classList.add("border-2");
        }
        else
        {
            inputWeight.classList.remove("border-danger");
            inputWeight.classList.remove("border-2");
        }
 
        // Verif input Rest period
        if ( inputTime.value == "" )
        {
            inputTime.classList.add("border-danger");
            inputTime.classList.add("border-2");
        }
        else
        {
            inputTime.classList.remove("border-danger");
            inputTime.classList.remove("border-2");
        }

        // Verif input Series
        if ( Number(inputSeries.value) <= 0 )
        {
            inputSeries.classList.add("border-danger");
            inputSeries.classList.add("border-2");
        }
        else
        {
            inputSeries.classList.remove("border-danger");
            inputSeries.classList.remove("border-2");
        }

        // Verif input Repetitions
        if ( Number(inputReps.value) <= 0  )
        {
            inputReps.classList.add("border-danger");
            inputReps.classList.add("border-2");
        }
        else
        {
            inputReps.classList.remove("border-danger");
            inputReps.classList.remove("border-2");
        }
    }
}

function resetFormAddExercise(id)
{
    let inputSeries = document.getElementById('input-formaddexercise-series');
    let inputReps = document.getElementById('input-formaddexercise-repetitions');
    let inputMuscle = document.getElementById('input-formaddexercise-muscle');
    let inputExercise = document.getElementById('input-formaddexercise-exercise');
    let inputWeight = document.getElementById('input-formaddexercise-weight');
    let inputTime = document.getElementById('input-formaddexercise-time');
    let inputID = document.getElementById('input-formaddexercise-id');

    // Drop red color and border on input
    inputSeries.classList.remove("border-danger");
    inputSeries.classList.remove("border-2");
    inputReps.classList.remove("border-danger");
    inputReps.classList.remove("border-2");
    inputMuscle.classList.remove("border-danger");
    inputMuscle.classList.remove("border-2");
    inputExercise.classList.remove("border-danger");
    inputExercise.classList.remove("border-2");
    inputWeight.classList.remove("border-danger");
    inputWeight.classList.remove("border-2");
    inputTime.classList.remove("border-danger");
    inputTime.classList.remove("border-2");

    // Drop input value 
    inputSeries.value = inputReps.value = inputMuscle.value = 
    inputExercise.value = inputWeight.value = inputTime.value = "";

    inputID.value = id;
}

// Edit Food

function selectMeal(id)
{

}


// Add Workout
function sumbitFormAddWorkout()
{
    let inputType = document.getElementById('input-formaddworkout-type');
    let inputRank = document.getElementById('input-formaddworkout-rank');

    if ( inputType.value !== "" && Number(inputRank.value) > 0 )
        sumbitForm('formAddWorkout');
    else
    {
        if ( inputType.value == "" )
        {
            inputType.classList.add("border-danger");
            inputType.classList.add("border-2");
        }
        else
        {
            inputType.classList.remove("border-danger");
            inputType.classList.remove("border-2");
        }

        if ( Number(inputRank.value) <= 0  )
        {
            inputRank.classList.add("border-danger");
            inputRank.classList.add("border-2");
        }
        else
        {
            inputRank.classList.remove("border-danger");
            inputRank.classList.remove("border-2");
        }
    }
}

function resetFormAddWorkout()
{
    let inputType = document.getElementById('input-formaddworkout-type');
    let inputRank = document.getElementById('input-formaddworkout-rank');

    inputType.value = inputRank.value = "";

    inputRank.classList.remove("border-danger");
    inputRank.classList.remove("border-2");
    inputType.classList.remove("border-danger");
    inputType.classList.remove("border-2");
}


// Delete Workout

function initFormDeleteWorkout(id)
{
    let strongDW = document.getElementById('strong-delete-workout');
    let inputDW = document.getElementById('input-formdeleteworkout-info');
    let type = document.getElementById(`span-workout-type-${id}`).innerHTML;
    let rank = document.getElementById(`span-workout-rank-${id}`).innerHTML;
    strongDW.innerHTML = `Are you sure you want to delete workout #${rank} ${type} ?`;
    inputDW.value = `${id}-${rank}`;
}

// Selected page 
 
document.addEventListener('DOMContentLoaded', () => 
{
    const url = document.location.href;
    if ( url === "https://workout-fr.herokuapp.com/index.php?page=workout" )
    {
        document.getElementById('nav-workout').classList.add('active');
        document.getElementById('nav-food').classList.remove('active');
    }
    else if ( url === "https://workout-fr.herokuapp.com/index.php?page=food" )
    {
        document.getElementById('nav-food').classList.add('active');
        document.getElementById('nav-workout').classList.remove('active');
    }
}); 



