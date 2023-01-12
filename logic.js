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

document.getElementById("your-id").addEventListener("click", function () {
  form.submit();
});


//Open Folder


// containerMenu = document.getElementById("container-menu");
// containerMenu.addEventListener("click", openFolder);

// function openFolder(event) {
//     let folder = event.target;

//     if (folder.classList.contains("folderBtn")) {
//         let filePath = folderBtn.dataset.path;
//         console.log(filePath);

//     fetch("openFolder.php" + "?" + "path=" + filePath, {
//         method: "GET",
//     })
//         .then((response) => response.json())
//         .then((data) => {
//         console.log(data);
//         renderFileInfo(data);
//         })
//         .catch((err) => console.log("Request failed: ", err));
//     }
// }
