// console.log("Tag usunięty!");
// Kopiowanie całości lub fragmentów zagadnień/haseł
var komunikat  = document.getElementById("komunikatKopiowanie");
var twiterZaznaczone = document.getElementById("tw_zazn");

function kopiujCalaTresc() {

    var tresc    = document.getElementById("tresc");
    var dodaj = document.getElementById("dodaj");
    komunikat.style.display = "block";
    // var komunikat  = document.getElementById("kopiowanie_komunikat");
    let range = new Range();

    //range.setStart(tresc.firstChild, 0);
    //range.setEnd(tresc.firstChild, tresc.firstChild.length);
    range.selectNodeContents(tresc);

    /* działa tylko w firexie*/
    /*let rangeLink = new Range();
    rangeLink.setStart(dodaj.firstChild, 0);
    rangeLink.setEnd(dodaj.firstChild, dodaj.firstChild.length);*/
    document.getSelection().removeAllRanges();

    document.getSelection().addRange(range);
    //document.getSelection().addRange(rangeLink);

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

    if(dlugosc>10){
       //console.log(dodajURL);
        //komunikat.display = "block";
        document.getElementById("komunikatKopiowanie").style.display = "block";

        document.getElementById("tw_zazn").style.opacity = 100;
        tresc=document.getSelection().toString()+ " " + dodajURL;
        document.getElementsByClassName('twitter-share-button')[0].setAttribute("data-text", tresc);
       // console.log(tresc);
        /*navigator.permissions.query({ name: "clipboard-write" }).then((result) => {
            if (result.state == "granted" || result.state == "prompt") {
               alert("Write access ranted!");
            }

            else {
               // alert("Nieeeeee!");
            }
        });*/


        try {
            var ok = navigator.clipboard.writeText(tresc);
            if (ok) komunikat.innerHTML = 'Skopiowano zaznaczony fragment do schowka!';
            else    komunikat.innerHTML = 'Nieudało się skopiować zaznaczonego fragmentu!';
        } catch (err) {
            komunikat.innerHTML = 'Twoja przeglądarka nie obsługuje funkcji kopiowania!';
        }




        //let rangeLink = new Range();
       // rangeLink.selectNodeContents(dodaj);
       // document.getSelection().removeAllRanges();
        //document.getSelection().addRange(rangeLink);
        // kopiowanie zaznaczonego
        /*try {
            var ok = document.execCommand('copy');
            if (ok) komunikat.innerHTML = 'Skopiowano zaznaczony fragment do schowka!';
            else    komunikat.innerHTML = 'Nieudało się skopiować zaznaczonego fragmentu!';
        } catch (err) {
            komunikat.innerHTML = 'Twoja przeglądarka nie obsługuje funkcji kopiowania!';
        }*/
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
