document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.getElementById('hamburger-icon');
    const nav = document.querySelector('.nav-container nav');
    const submenuItems = document.querySelectorAll('.main-menu > li > a');

    // Toggle menu for mobile when hamburger is clicked
    hamburger.addEventListener('click', function () {
        nav.classList.toggle('active'); // Toggles the 'active' class to show the menu
        hamburger.classList.toggle('active'); // Toggle the 'active' class for hamburger icon
    });

    // Toggle submenus when the parent is clicked (on mobile only)
    submenuItems.forEach(item => {
        item.addEventListener('click', function (e) {
            const submenu = item.nextElementSibling;
            if (submenu && submenu.classList.contains('sub-menu')) {
                submenu.classList.toggle('active');
                e.preventDefault(); // Prevent default link behavior
            }
        });
    });

    // Close any open submenus when clicking outside the menu
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.main-menu')) {
            document.querySelectorAll('.main-menu li ul.active').forEach(ul => {
                ul.classList.remove('active');
            });
        }
    });
});
