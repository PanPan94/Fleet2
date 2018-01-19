let menuToggler = document.querySelector('#menu-toggler')
let menu = document.querySelector('#menu')
let menuStatus = false
let global = document.querySelector('#global')
menuToggler.addEventListener('click', () => {
    if(!menuStatus) {
        menu.style.transform = "translateX(0)"
        menuStatus = true
    }
})

global.addEventListener('click', (e) => {
    if(menuStatus) {
        menu.style.transform = "translateX(-100%)"
        menuStatus = false
    }
}, true)
