document
    .getElementById("sidebar-overlay")
    .addEventListener("click", function () {
        document.getElementById("sidebar").classList.add("-translate-x-full");
        this.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    });

document
    .querySelector(".sidebar-toggle")
    .addEventListener("click", function () {
        document
            .getElementById("sidebar")
            .classList.toggle("-translate-x-full");
        document.getElementById("sidebar-overlay").classList.toggle("hidden");
        document.body.classList.toggle("overflow-hidden");

        if (
            document
                .getElementById("sidebar")
                .classList.contains("-translate-x-full")
        ) {
            document.getElementById("sidebar-overlay").classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
        }
    });

document.querySelectorAll(".sidebar-dropdown-toggle").forEach(function (item) {
    item.addEventListener("click", function (e) {
        e.preventDefault();
        const parent = item.closest(".group");
        const isOpen = parent.classList.contains("selected");

        document.querySelectorAll(".group").forEach(function (group) {
            group.classList.remove("selected");
        });

        if (!isOpen) {
            parent.classList.add("selected");
        }
    });
});
