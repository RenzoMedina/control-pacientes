 setTimeout(()=>{
    window.history.replaceState({}, document.title, window.location.pathname);
    },7000)
const url = new URLSearchParams(window.location.search)

const showAlert = (color, message) =>{
    const alertBox = document.getElementById('alert-1')
    const textAlert = document.getElementById('text-alert')
    const btnAlert = document.getElementById('btn-alert')
    alertBox.classList.remove('hidden')
    alertBox.classList.add('flex',`text-${color}-400`)
    btnAlert.classList.add(`text-${color}-400`)
    btnAlert.classList.add(`focus:ring-${color}-400`)
    textAlert.innerHTML=message

    setTimeout(()=>{
        alertBox.classList.remove('flex')
        alertBox.classList.add('hidden')    
    },7000)
}
if(url.has('success-user')){
    showAlert("green","El usuario ha sido ingreso correctamente")
}
if(url.has('success-client')){
     showAlert("green","El paciente ha sido ingreso correctamente")
}
