const form = document.querySelector('.form-login');
const popup = document.querySelector('.btn');
let isScrollDisabled = false;

popup.addEventListener('click', () => {
    form.classList.toggle('active-popup');
    
    // Add event listeners for clicks outside the popup and scrolling
    if (form.classList.contains('active-popup')) {
        // Prevent clicks outside the popup
        document.addEventListener('click', clickOutsidePopup);
        // Disable scrolling
        disableScroll();    
        isScrollDisabled = true;
    } else {
        // Remove event listeners and enable scrolling
        document.removeEventListener('click', clickOutsidePopup);
        if (isScrollDisabled) {
            enableScroll();
            isScrollDisabled = false;
        }
    }
});

function clickOutsidePopup(event) {
    if (!form.contains(event.target) && event.target !== popup) {
        // Mengosongkan input ketika klik di luar popup
        document.getElementById("username").value = "";
        document.getElementById("password").value = "";
        
        form.classList.remove('active-popup');
        document.removeEventListener('click', clickOutsidePopup);
        enableScroll();
        isScrollDisabled = false;
    }
}

function disableScroll() {
    // Disable scrolling by setting overflow to hidden
    document.body.style.overflow = 'hidden';
}

function enableScroll() {
    // Re-enable scrolling by restoring overflow to its original value
    document.body.style.overflow = '';
}