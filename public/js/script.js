// modal.js

document.addEventListener("DOMContentLoaded", function () {
    // Get modal and modal background elements
    const modalLogin = document.getElementById("modal-login");
    const modalLoginBg = document.getElementById("modal-login-bg");

    // Get modal open and close buttons
    const modalLoginOpen = document.querySelectorAll(
        '[data-target="#modal-login"]'
    );
    const modalLoginClose = document.getElementById("modal-login-close");

    // Function to open modal
    function openModalLogin() {
        modalLogin.classList.remove("hidden");
        modalLoginBg.classList.remove("hidden");
    }

    // Function to close modal
    function closeModalLogin() {
        modalLogin.classList.add("hidden");
        modalLoginBg.classList.add("hidden");
    }

    // Add event listeners to open and close modal
    modalLoginOpen.forEach(function (btn) {
        btn.addEventListener("click", openModalLogin);
    });
    modalLoginClose.addEventListener("click", closeModalLogin);
    modalLoginBg.addEventListener("click", closeModalLogin); // Close modal when clicking outside modal content
});
