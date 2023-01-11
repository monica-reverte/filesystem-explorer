const button = document.getElementById("menu-button");
const menu = document.getElementById("menu");
button.addEventListener("click", function() {
    menu.style.display = menu.style.display === "block" ? "none" : "block";
});


const folders = document.querySelectorAll(".folder");
folders.forEach(folder => {
    folder.addEventListener("click", function() {
        const submenu = this.querySelector("ul");
        submenu.style.display = submenu.style.display === "block" ? "none" : "block";
    });
});
//New Folder



newButton = document.querySelector(".newButton");
newButton.addEventListener("click", newFile);

function newFile() {
    const filename = prompt("Enter folder/file name");

    if(filename) {
        post("create.php", {filename, dir}, function(data) {
        if(data == true) {
            openFolder(dir);
        }
        else {
            console.log(data);
        }
        closeMenu();
        });
    }
}