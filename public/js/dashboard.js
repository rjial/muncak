function getGunungs() {
    let gunung_shimmer = document.querySelectorAll('#shimmer-card')
    let gunung_container = document.getElementById('gunung-container')
    gunung_shimmer.forEach((shimmer) => shimmer.classList.remove('hidden'))
    const jwt = Cookies.get('jwt')
    axios.get('/api/gunung', { headers: { Authorization: `Bearer ${jwt}` } })
        .then((data) => {
            let gunung_clone = gunung_container.querySelector('#gunung-card-template.hidden').cloneNode(true)
            gunung_clone.setAttribute('id', 'gunung-card')
            let card = gunung_container.querySelectorAll('#gunung-card')
            card.forEach((item) => {
                gunung_container.removeChild(item)
            })
            gunung_shimmer.forEach((shimmer) => shimmer.classList.add('hidden'))
            window.debugChild = gunung_container.childNodes[1]
            
            data.data.forEach((item) => {
                console.log(item)
                let gunung_title = gunung_clone.querySelector('#gunung-title')
                let gunung_desc = gunung_clone.querySelector('#gunung-desc')
                let gunung_button_detail = gunung_clone.querySelector('#button-detail')
                let gunung_book_available = gunung_clone.querySelector('#book-available')
                gunung_title.textContent = item.nama
                gunung_desc.textContent = item.deskripsi
                gunung_clone.classList.remove('hidden')
                if (item.book_available > 0) {
                    gunung_button_detail.classList.add('bg-blue-500')
                    gunung_button_detail.href = "/dashboard/detailgunung"
                } else {
                    gunung_button_detail.classList.add('bg-blue-100')
                    gunung_button_detail.disabled = true
                    gunung_button_detail.href = "#"
                }
                gunung_book_available.textContent = `${item.book_available} People`
                gunung_container.appendChild( gunung_clone)
            })
        })
        .catch((err) => console.error(err))

    // console.log(jwt)
}
const old_onload = window.onload
window.onload = (event) => {
    old_onload(event)
    getGunungs()
}