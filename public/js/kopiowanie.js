
//console.log("sdg");


function twitterDynamiczny(tresc) {
    var twZaznacz= document.getElementById("twZaznacz");
    twZaznacz.innerHTML = "";
       // console.log(twZaznacz);
    var urlAktulany = window.location.href;
//console.log(urlAktulany);
    //var tresc = "Avirov vnifjdv ijvfidjv";
    twttr.widgets.createShareButton(
        urlAktulany,
        document.getElementById("twZaznacz"),
        {
            size: "large",
            text: tresc,
            hashtags: "",
            via: "",
            related: ""
        }
    );
}

if(navigator.userAgent.match(/firefox|fxios/i)) {
}
// tylko dla NIE firefoxa
else {

    //console.log("Nie Firefox");
// console.log("Tag usunięty!");
// Kopiowanie całości lub fragmentów zagadnień/haseł


var komunikat  = document.getElementById("komunikatKopiowanie");
    document.getElementById("komunikatKopiowanie").style.display = "none";
var twKontener  = document.getElementById("twKontener");
    document.getElementById("twKontener").style.display = "none";
//var twiterZaznaczone = document.getElementById("tw_zazn");

function kopiujCalaTresc() {



    var tresc    = document.getElementById("tresc");
    var dodaj = document.getElementById("dodaj");
    komunikat.style.display = "block";
    // var komunikat  = document.getElementById("kopiowanie_komunikat");
    let range = new Range();
    range.selectNodeContents(tresc);
    document.getSelection().removeAllRanges();
    document.getSelection().addRange(range);

    try {
        var ok = document.execCommand('copy');
        if (ok) komunikat.innerHTML = 'Skopiowano treść do schowka!';
        else    komunikat.innerHTML = 'Nieudało się skopiować!';
    } catch (err) {
        komunikat.innerHTML = 'Twoja przeglądarka nie obsługuje funkcji kopiowania!';
    }

    //odznaczamy zaznaczenie
    document.getSelection().removeAllRanges();

    // czyszczenie komunikatu
    setTimeout(wyczyscKomunikat, 10000);
}


    document.onselectionchange = function() {

// sprawdzeni, czy przeglądarka może zapisywac do schowka
        navigator.permissions.query({ name: "clipboard-write" }).then((result) => {
            if (result.state == "granted" || result.state == "prompt") {
                let selection = document.getSelection();
                // var dodaj = document.getElementById("dodaj");
                var dodajURL = document.getElementById("dodaj").innerHTML.toString();
                dlugosc =  document.getSelection().toString().length

                if(dlugosc>20){
                   // console.log("sdg")
                    document.getElementById("komunikatKopiowanie").style.display = "block";
                    komunikat.style.display = "block";
                    tresc1=document.getSelection().toString();
                    tresc=tresc1+ " " + dodajURL;
                    // console.log(tresc);
                    try {
                        var ok = navigator.clipboard.writeText(tresc);
                        if (ok) komunikat.innerHTML = 'Skopiowano zaznaczony fragment do schowka!';
                        else    komunikat.innerHTML = 'Nieudało się skopiować zaznaczonego fragmentu!';
                    } catch (err) {
                        komunikat.innerHTML = 'Twoja przeglądarka nie obsługuje funkcji kopiowania!';
                    }
                    document.getElementById("twKontener").style.display = "block";
                    twitterDynamiczny(tresc1);
                }


                setTimeout(wyczyscKomunikat, 10000);

            }
        });







    };

function wyczyscKomunikat() {
    komunikat.style.display = "none";
    komunikat.innerHTML = '';
    //twiterZaznaczone.style.opacity = 0;



}
/*
* // Kopiowanie całości lub fragmentów zagadnień/haseł
var komunikat  = document.getElementById("komunikatKopiowanie");

function kopiujCalaTresc() {
    var tresc    = document.getElementById("tresc");
    komunikat.style.display = "block";
    // var komunikat  = document.getElementById("kopiowanie_komunikat");
    let range = new Range();
    range.setStart(tresc.firstChild, 0);
    range.setEnd(tresc.firstChild, tresc.firstChild.length);
    document.getSelection().removeAllRanges();
    document.getSelection().addRange(range);

    try {
        var ok = document.execCommand('copy');
        if (ok) komunikat.innerHTML = 'Skopiowano treść do schowka!';
        else    komunikat.innerHTML = 'Nieudało się skopiować!';
    } catch (err) {
        komunikat.innerHTML = 'Twoja przeglądarka nie obsługuje funkcji kopiowania!';
    }
    //odznaczamy zaznaczenie
    document.getSelection().removeAllRanges();
}
*
*
* */


}
