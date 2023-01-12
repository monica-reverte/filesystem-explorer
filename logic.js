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

//Submit

const submit = document.getElementById("form-id");

<<<<<<< HEAD
// newButton = document.querySelector(".newButton");
// newButton.addEventListener("click", newFile);

// function newFile() {
//     const filename = prompt("Enter name");

//     if(filename) {
//         post("create.php", {filename, dir}, function(data) {
//         if(data == true) {
//             openFolder(dir);
//         }
//         else {
//             console.log(data);
//         }
//         closeMenu();
//         });
//     }
// }
=======
document.getElementById("your-id").addEventListener("click", function () {
  form.submit();
});
>>>>>>> a8cc758da59e933d1c22915ad5bb596a758ac5fd
