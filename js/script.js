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

function resetForm(element)
{
    const value = document.getElementById(`editP`).value;
    document.getElementById(element).innerHTML = 
    `${value}kg<button class='btn btn-dark bi bi-gear-fill' type='button' 
    onclick='editWorkout('${element}');'></button>`;
}

function editWorkout(td, poids, muscle)
{
    const value = document.getElementById(poids).innerHTML;
    document.getElementById(td).innerHTML = 
    `
        <form method="POST" id="formEdit" action="index.php?page=workout&w=${nbW}&muscle=${muscle}">
        <input name="editP" id="editP" class="border border-dark" value="${value}">
        <button type="button" class="btn btn-success bi bi-check-circle-fill" onclick="sumbitForm('formEdit');"></bouton>
        <button type="button" class="btn btn-danger bi bi-x-circle-fill" onclick="resetForm('${td}');"></bouton>
        </form>
    `;
}