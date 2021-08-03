
document.addEventListener('DOMContentLoaded', async function () {
    /*const copyTextBtn = document.getElementById('copy-text-btn')
    const copyImgBtn = document.getElementById('copy-img-btn')
    const canWriteEl = document.getElementById('can-write')
    const textarea = document.querySelector('textarea')
    const img = document.querySelector('img')
    const errorEl = document.getElementById('errorMsg')*/
    const img = document.querySelector('img')
    const copyImgBtn = document.getElementById('copy-img-btn')

    console.log("kopiowanie111");
    async function askWritePermission() {
        console.log("kopiowanie222");
        try {
            const { state } = await navigator.permissions.query({ name: 'clipboard-write', allowWithoutGesture: false })
            return state === 'granted'
        } catch (error) {
            errorEl.textContent = `Compatibility error (ONLY CHROME > V66): ${error.message}`
            console.log(error)
            return false
        }


        const setToClipboard = blob => {
            const data = [new ClipboardItem({ [blob.type]: blob })]
            return navigator.clipboard.write(data)
        }

        /*function kopiujObrazekDoSchowka() {
            console.log("kopiowanie222");
        }*/

        copyImgBtn.addEventListener('click', async () => {
            console.log("kopiowanie444");
            try {
                const response = await fetch(img.src)
                const blob = await response.blob()
                await setToClipboard(blob)
            } catch (error) {
                console.error('Something wrong happened')
                console.error(error)
            }
        })


    }})


/*var komunikat  = document.getElementById("komunikatKopiowanie");
function kopiujObrazekDoSchowka() {
    console.log("kopiowanie");
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
}*/


function wyczyscKomunikat() {
    komunikat.style.display = "none";
    komunikat.innerHTML = '';

}

function pobierzObrazek() {

    console.log("pobieranie");
}


