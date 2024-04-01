    // BUTTON TAMBAH
const formTambah = document.querySelector('.wrapperTambah');
const tambahButtons = document.querySelector('.btnTambah');

// BUTTON EDIT
const form2 = document.querySelector('.wrapperEdit');
const editButtons = document.querySelectorAll('.btnEdit');
let isScrollDisabled = false;


// FUNGSI BUTTON TAMBAH
tambahButtons.addEventListener('click', () => {
    formTambah.classList.toggle('active1');

    if (formTambah.classList.contains('active1')) {
        document.addEventListener('click', clickOutsidePopup);
        disableScroll();
        isScrollDisabled = true;
    } else {
        document.removeEventListener('click', clickOutsidePopup);
        if (isScrollDisabled) {
            enableScroll();
            isScrollDisabled = false;
        }
    }
});

// tambahButtons.addEventListener('click', toggleForm);
// function toggleForm() {

//     formTambah.classList.toggle('active1');
    
//     if (formTambah.classList.contains('active1')) {
//         document.addEventListener('click', clickOutsidePopup);
//         disableScroll();
//         isScrollDisabled = true;
//     } else {
//         document.removeEventListener('click', clickOutsidePopup);
//         if (isScrollDisabled) {
//             enableScroll();
//             isScrollDisabled = false;
//         }
//     }
// }

function clickOutsidePopup(event) {
    if (!formTambah.contains(event.target) && event.target !== tambahButtons) {
        // Mengosongkan input ketika klik di luar popup
        document.getElementById('Nama').value = "";
        document.getElementById('Alamat').value = "";
        document.getElementById('ID_donatur').value = "";
        document.getElementById('Zakat_diterima').value = "";
        document.getElementById('Jumlah_diterima').value = "";
        document.getElementById('Jumlah_jiwa').value = "";

        formTambah.classList.remove('active1');
        document.removeEventListener('click', clickOutsidePopup);
        enableScroll();
        isScrollDisabled = false;
    }
}

// // Add event listeners for each edit button
// editButtons.forEach(function(button) {
//     button.addEventListener('click', toggleForm2)
// });

// function toggleForm2() {
//     form2.classList.toggle('active2');

//     if (form2.classList.contains('active2')) {
//         document.addEventListener('click', clickOutsideeditButtons);
//         disableScroll();
//         isScrollDisabled = true;
//     } else {
//         document.removeEventListener('click', clickOutsideeditButtons);
//         if (isScrollDisabled) {
//             enableScroll();
//             isScrollDisabled = false;
//         }
//     }
// }



