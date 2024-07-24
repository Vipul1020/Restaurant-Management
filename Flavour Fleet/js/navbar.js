document.addEventListener("DOMContentLoaded", function() {
    // Get the current URL path
    const path = window.location.pathname;
    const page = path.split("/").pop().split(".")[0]; // Extract page name without extension

    // Log the current path and extracted page name for debugging
    console.log("Current path:", path);
    console.log("Extracted page name:", page);

    // List of nav item IDs corresponding to page names
    const pages = {
        "index": "home",
        "about": "about",
        "chef": "chef",
        "menu": "menu",
        "reservation": "reservation",
        "blog": "blog",
        "contact": "contact",
        "cart": "cart"
    };

    // Remove 'active' class from all nav items
    const navItems = document.querySelectorAll(".nav-item");
    navItems.forEach(item => item.classList.remove("active"));

    // Add 'active' class to the current page's nav item
    const currentNavItem = document.getElementById(pages[page]);
    if (currentNavItem) {
        console.log("Current nav item found:", currentNavItem);
        currentNavItem.classList.add("active");
    } else {
        console.error("No nav item found for page:", page);
    }
});
