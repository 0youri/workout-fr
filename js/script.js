function AfficherCollapse(element)
{
    if ( document.getElementById(`${element}`).style.display === "none" )
        document.getElementById(`${element}`).style.display = "block";
    else document.getElementById(`${element}`).style.display = "none";
}

function sumbitFormAdd()
{
    let nbSeries;
    if ( document.getElementById(`serie4`) ) nbSeries = 4;
    else nbSeries = 3;
    let compteur = 0;
    for (let i = 1; i <= nbSeries; i++)
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
    }

    if ( compteur === 0 ) sumbitForm("formAdd");

}

function sumbitForm(id)
{
    document.getElementById(id).submit();
}

function resetForm(id,muscle)
{
    let td_poids = document.getElementById(`td-poids${id}`);
    let td_poids_boutons = document.getElementById(`td-poids-boutons${id}`); 

    const value = document.getElementById(`editP`).value;

    td_poids.innerHTML = `${value}`;
    td_poids_boutons.innerHTML = `
    <button class='btn btn-dark bi bi-gear-fill' type='button' 
    onclick="editWorkout('${id}','${muscle}');"></button>
    `;
}

function editWorkout(id, muscle)
{
    let td_poids = document.getElementById(`td-poids${id}`);
    let td_poids_boutons = document.getElementById(`td-poids-boutons${id}`);
    const value = td_poids.innerHTML;
    td_poids.innerHTML = 
    `
        <form method="POST" id="formEdit" action="index.php?page=workout&w=${id}&muscle=${muscle}">
        <input name="editP" class="form-control" size="4" id="editP" width="10px" class="border border-dark" value="${value}">
        </form>
    `;
    td_poids_boutons.innerHTML = `
    <button type="button" class="btn btn-success bi bi-check-circle-fill" onclick="sumbitForm('formEdit');"></button>
    <br><br>
    <button type="button" class="btn btn-danger bi bi-x-circle-fill" onclick="resetForm('${id}','${muscle}');"></button>
    `;
}