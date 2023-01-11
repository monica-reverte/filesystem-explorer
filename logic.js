
const data = {nombre: 'valor'};

fetch('index.php', {
  method: 'POST',
  body: JSON.stringify(data),
  headers: {
    'Content-Type': 'application/json'
  }
})
.then(response => response.text())
.then(data => {
    // manejar la respuesta del servidor
})
.catch(error => console.error(error));

//New Folder

newButton = document.querySelector(".newButton");
newButton.addEventListener("click", newFile);

function newFile() {
    const filename = prompt("Enter name");

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