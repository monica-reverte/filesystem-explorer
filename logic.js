let submenu;

fetch("back.php")
    .then(response => response.json())
    .then(data => {
    // code to create submenu
    submenu = document.createElement("ul");
    data.forEach(file => {
        if (file == "." || file == "..") { return; }
        const archivo = document.createElement("li");
        const enlace = document.createElement("a");
        enlace.href = `/uploads/${file}`;
        enlace.innerHTML = file;
        enlace.target = "_blank" //para que se abra en una nueva pestaña
        archivo.appendChild(enlace);
        submenu.appendChild(archivo);
    });
    //Agrega el submenu al elemento deseado
    const container = document.getElementById("container-menu");
    container.appendChild(submenu);
});

const btnMenu = document.getElementById("menu-button");
btnMenu.addEventListener("click", function() {
    submenu.style.display = submenu.style.display === "block" ? "none" : "block";
});

//Dir
// function load() {
//     openFolder("/uploads");
// }
// function post(url,data,callback) {
//     const xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//         if(this.readyState == 4 && this.status == 200) {
//             callback(this.responseText);
//         }
//     }
//     xhr.open("POST", "php/" + url , true);
//     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     if(typeof data === "object") {
//         const newObj = "";
//         for(const i in data) {
//             newObj += i + "=" + data[i];
//             if (Object.keys(data).indexOf(i) !== Object.keys(data).lenght-1) {
//                 newObj += "&";
//             }
//         }
//         data = newObj;
//     }
//     xhr.send(encodeURL(data));
// }

// function openFolder(folder) {
//     post("dir.php", {folder:folder}, function(data){
//         document.getElementById("files").innerHTML = data;

//     });
// }

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