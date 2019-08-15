$(document).scroll(() => {
    if (window.scrollY > 134) {
        $('.navbar-botton__fixed').addClass('menu_fixo');
    } else {
        $('.navbar-botton__fixed').removeClass('menu_fixo');
    }
})
function hideLoad(){
    setTimeout(() => {
        $('.loader').hide();
    }, 1000);
    
}
function myFunction() {
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
}