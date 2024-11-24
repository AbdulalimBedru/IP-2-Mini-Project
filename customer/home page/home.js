var menu = document.querySelector("#menu");
var menuVisible = false;

menu.addEventListener("click", function(event) {
    event.stopPropagation(); 

    if (!menuVisible) {
        menu.nextElementSibling.style.display = "flex"; 
        menuVisible = true; 
    } else {
        menu.nextElementSibling.style.display = "none";
        menuVisible = false; 
    }
});
document.addEventListener("click", function(event) {
    if (menuVisible && !menu.nextElementSibling.contains(event.target)) {
        menu.nextElementSibling.style.display = "none"; 
        menuVisible = false; 
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const buyButtons = document.querySelectorAll('.btn');

    buyButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const userConfirmed = confirm('Do You Want to Buy?');
            if (userConfirmed) {
                window.location.href = this.href;
            }
        });
    });
});