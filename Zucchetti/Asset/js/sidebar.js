function toggleMenuOpen() {
    const sidebar = document.getElementById("sidebar");
    const hid = document.getElementById("hidden");
    hid.style.left = hid.style.left === "0px" ? "-100vw" : "0px"
    sidebar.style.left = sidebar.style.left === "0px" ? "-300px" : "0px";
}
function toggleMenuClose() {
    const sidebar = document.getElementById("sidebar");
    sidebar.style.left = sidebar.style.left === "-300px" ? "-300px" : "-300px";
    const hid = document.getElementById("hidden");
    hid.style.left = hid.style.left === "-100vw" ? "-100vw" : "-100vw"
}
