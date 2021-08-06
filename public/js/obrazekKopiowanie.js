
var src ='';
function ustawienieSciezki(sciezka) {
    src =sciezka;
    //console.log(src);
}

document.addEventListener('DOMContentLoaded', async function () {


       /* const canWriteEl = document.getElementById('can-write')*/
    const kopiujObrazek = document.getElementById('kopiujObrazek')
   // const img = document.querySelector('img')
    const img = document.getElementById('memObrazek')
   // const copyImgBtn = document.getElementById('copy-img-btn')
    //console.log(img.src);
    //console.log(kopiujObrazek);
    async function askWritePermission() {

        try {
            const { state } = await navigator.permissions.query({ name: 'clipboard-write' })
            //console.log(state);
            return state === 'granted'
        } catch (error) {
           /* errorEl.textContent = `Compatibility error (ONLY CHROME > V66): ${error.message}`*/
            //console.log(error)
            return false
        }
    }
    const canWrite = await askWritePermission()
    /*canWriteEl.textContent = canWrite
    canWriteEl.style.color = canWrite ? 'green' : 'red'*/
    console.log(canWrite);

    if(canWrite){
        kopiujObrazek.style.display = "inline";
    }

    else {

        kopiujObrazek.style.display = "none";
    }


    /*copyImgBtn.disabled = copyTextBtn.disabled = !canWrite*/

    const setToClipboard = blob => {
        const data = [new ClipboardItem({ [blob.type]: blob })]
        return navigator.clipboard.write(data)
    }

    /**
     * @param Blob - The ClipboardItem takes an object with the MIME type as key, and the actual blob as the value.
     */

   /* copyTextBtn.addEventListener('click', async () => {
        try {
            const blob = new Blob([textarea.value], { type: 'text/plain' })
            await setToClipboard(blob)
        } catch (error) {
            console.error('Something wrong happened')
        }
    })*/

    kopiujObrazek.addEventListener('click', async () => {
       // console.log('{{$mem->Urlmem}}');
        try {
           // const response = await fetch(img.src)
            const response = await fetch(src)
           // console.log(img.src);
            const blob = await response.blob()
            await setToClipboard(blob)
        } catch (error) {
            console.error('Jakiś błąd...')
            console.error(error)
        }
    })


})

