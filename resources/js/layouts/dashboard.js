// Toggle the side navigation
function sidebarToggle() {
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
}

function logoutSubmit() {
    const actionLogout = document.getElementById("actionLogout");
    const formLogout = document.getElementById("formLogout");

    actionLogout.addEventListener("click", (event) => {
        event.preventDefault();
        formLogout.submit();
    });
}

window.addEventListener("DOMContentLoaded", () => {
    sidebarToggle();
    logoutSubmit();
});
