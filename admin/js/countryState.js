var config = {
    cUrl: 'https://api.countrystatecity.in/v1/countries',
    ckey: 'NFhBR0k3Q3BXOENVVG1TTWVsNFhDVlFab2lhZWxFNXNvV0doUGlmcQ=='
}

var countrySelect = document.querySelector('.country'),
    countryState = document.querySelector('.state'),
    countryCity = document.querySelector('.city')

function loadCountries() {

    stateSelect.disabled = true
    citySelect.disabled = true
    stateSelect.style.pointerEvents = 'none'
    citySelect.style.pointerEvents = 'none'

    let apiEndPoint = config.cUrl
    fetch(apiEndPoint, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(Repsonse => Response.json())
    .then(data => {
        data.forEach(country => {
            const option = document.createElement('option')
            option.value = country.iso2
            option.textContent = country.name
            countrySelect.appendChild(option)
        })
    })
    .catch(error => console.error('Error Loading countries:', error))
}

function loadStates() {

    stateSelect.disabled = false
    citySelect.disabled = true
    stateSelect.style.pointerEvents = 'auto'
    citySelect.style.pointerEvents = 'none'

    const selectedCountryCode = countrySelect.value
    stateSelect.innerHTML = '<option value="">Select State</option>'
    fetch('${config.cUrl}/${selectedCountryCode}/states', {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(Response => Response.json())
    .then(data => {
        data.forEach(state => {
            const option = document.createElement('option')
            option.value = state.iso2
            option.textContent = state.name
            stateSelect.appendChild(option)
        })
    })
    .catch(error => console.error('Error Loading countries:', error))
}

function loadCities() {

    citySelect.disabled = true
    citySelect.style.pointerEvents = 'auto'

    const SelectedCountryCode = countrySelect.value
    const selectedStateCode = stateSelect.value

    citySelect.innerHTML = '<option> value="">Select City</option>'
    fetch('${config.cUrl}/${selectedCountryCode}/states/${selectedStateCode}/cities', {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(Response => Response.json())
    .then(data => {
        const option = document.createElement('option')
            option.value = city.iso2
            option.textContent = city.name
            citySelect.appendChild(option)
    })
    .catch(error => console.error('Error Loading countries:', error))
}

window.onload = loadCountries