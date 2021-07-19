
var komunikat  = document.getElementById("komunikatKopiowanie");
function kopiujObrazekDoSchowka() {

    //console.log("kopiowanie");

    komunikat.style.display = "block";
    var imageElem = document.querySelector('.kopiowanieObrazka');
    var range = document.createRange();
    range.selectNode(imageElem);
    window.getSelection().addRange(range);
    try {

        var successful = document.execCommand('copy');
        var msg = successful ? 'successful' : 'unsuccessful';

        if (successful) komunikat.innerHTML = 'Skopiowano obrazek do schowka!';
        else    komunikat.innerHTML = 'Nieudało się skopiować obrazka!';

       // console.log('Copy image command was ' + msg);
    } catch(err) {
        komunikat.innerHTML = 'Twoja przeglądarka nie obsługuje funkcji kopiowania!';
       // console.log('Oops, unable to copy');
    }
    window.getSelection().removeAllRanges();

    // czyszczenie komunikatu
    setTimeout(wyczyscKomunikat, 10000);
}


function wyczyscKomunikat() {
    komunikat.style.display = "none";
    komunikat.innerHTML = '';

}

function pobierzObrazek() {

    console.log("pobieranie");
}


