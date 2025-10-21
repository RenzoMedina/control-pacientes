 setTimeout(()=>{
    window.history.replaceState({}, document.title, window.location.pathname);
    },7000)
const url = new URLSearchParams(window.location.search)
const colorClasses = {
  green: {
    text: 'text-green-400',
    ring: 'focus:ring-green-400'
  },
  red: {
    text: 'text-red-400',
    ring: 'focus:ring-red-400'
  },
  yellow: {
    text: 'text-yellow-400',
    ring: 'focus:ring-yellow-400'
  }
}

const showAlert = (color, message) => {
  const alertBox = document.getElementById('alert-1')
  const textAlert = document.getElementById('text-alert')
  const btnAlert = document.getElementById('btn-alert')

  const classes = colorClasses[color] || colorClasses.green

  alertBox.classList.add(classes.text)
  alertBox.classList.remove('opacity-0')
  alertBox.classList.add('opacity-100')

  textAlert.classList.add(classes.text)
  btnAlert.classList.add(classes.ring)

  textAlert.innerHTML = message

  setTimeout(() => {
    alertBox.classList.remove('flex')
    alertBox.classList.add('hidden')
    alertBox.classList.remove('opacity-100')
    alertBox.classList.add('opacity-0')
  }, 7000)
}

if(url.has('success-user')){
    showAlert("green","El usuario ha sido ingreso correctamente")
}
if(url.has('success-client')){
    showAlert("green","El paciente ha sido ingreso correctamente")
}
if(url.has('report-success')){
    showAlert("green","Reporte diario finalizado y enviado correctamente!!!")
}
