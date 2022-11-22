const loginform = document.getElementById('form-login')
window.loginform = loginform
var arrayForm = []
var buttonSubmit = null
loginform.addEventListener('submit', function(e) {
  e.preventDefault()
  window.debugevent = e
  arrayForm = []
  for (let i = 0; i < e.target.length; i++) {
    let element = e.target[i]
    if (element.tagName === "INPUT") {
      arrayForm.push(valueForm(element))
    }
    if (element.tagName === "BUTTON") {
      buttonSubmit = element
      window.buttonSubmit = buttonSubmit
    }
  }
  if (buttonSubmit == null) {
    return
  }
    buttonSubmit.classList.remove('bg-blue-600')
    buttonSubmit.classList.add('bg-blue-200')
    let spinner = document.getElementById('spinner')
    spinner.classList.remove('hidden')
    const payload = {
      email: arrayForm.find((data) => data.name == "email").value,
      password: arrayForm.find((data) => data.name == "password").value
    }
    const doneFunc = function(callback) {
      buttonSubmit.classList.remove('bg-blue-200')
      buttonSubmit.classList.add('bg-blue-600')
      spinner.classList.add('hidden')
      callback()
    }
    console.log(payload)
    axios.post('/api/signin', payload)
    .then(function(data) {
      console.log(data)
      doneFunc(function() {
        Cookies.set('jwt', data.data.Token, {expires: 365})
        window.location.href = '/dashboard'
      })
    })
    .catch(function(data) {
      // console.trace(data)
      console.log(data)
      doneFunc(function() {
        
      })
    })
  console.log(arrayForm)
})

function valueForm(element) {
  let name = element.name
  let value = element.value
  return {
    name: name,
    value: value
  }
}
