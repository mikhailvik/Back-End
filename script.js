// Ajax scriptfil

function processLike(ev) {
    // Kolla om knappen funkar
    console.log(ev.target.value);
    let str = ev.target.value;
    // To-Do: Byt ut till en modernare fetch()
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200) {
            console.log("Successfully sent request");
            console.log(this.responseText);
            // To-Do: Databasen uppdaterad, grejt, men drt står fortfarande inte nya mängden likes
            // på front-enden. Vi måste alltså plussa till en like med JS.
            // document.getElementById("txtHint").innerHTML = this.responseText; 


        }
    };
    xmlhttp.open("GET", "model_like.php?username=" + str, true);
    xmlhttp.send();

}

//Event listener för knappen
document.querySelector("#like").addEventListener("click", processLike);