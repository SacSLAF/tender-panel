//sidebar and toggle functionality
document.getElementById("sidebarToggle").addEventListener("click", function () {
    const sidebar = document.getElementById("sidebar");
    const backdrop = document.getElementById("sidebarBackdrop");

    sidebar.classList.toggle("-translate-x-full");
    backdrop.classList.toggle("hidden");
});

document
    .getElementById("sidebarBackdrop")
    .addEventListener("click", function () {
        const sidebar = document.getElementById("sidebar");
        const backdrop = document.getElementById("sidebarBackdrop");

        sidebar.classList.add("-translate-x-full");
        backdrop.classList.add("hidden");
    });

// SweetAlert2 confirmation for delete actions
document.addEventListener("DOMContentLoaded", function () {
    const deleteForms = document.querySelectorAll(".delete-form");
    const logoutForms = document.querySelectorAll(".logout-form");
    deleteForms.forEach((form) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault(); // Prevent form from submitting immediately

            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if confirmed
                }
            });
        });
    });
    logoutForms.forEach((form) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault(); // Prevent form from submitting immediately

            Swal.fire({
                title: "Are you sure?",
                text: "You are going be logged out.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, Logout!",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if confirmed
                }
            });
        });
    });
});
