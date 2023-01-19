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


// New Modal
// Get the modal
const newmodal = document.getElementById("newModal");

// Get the button that opens the modal
const newBtn = document.getElementById("newBtn");


// When the user clicks the button, open the modal 
newBtn.onclick = function() {
    newmodal.style.display = "block";
}



//Edit Modal

// Get the modal
const editModal = document.querySelector(".editModal");

// Get the button that opens the modal
const editBtn = document.querySelectorAll(".editBtn");

const cancelBtn = document.querySelectorAll(".cancel");
cancelBtn.forEach(item => {
    item.addEventListener("click", cancel);
    
})

function cancel(e) {
    editModal.style.display = "none"; 


}

// When the user clicks the button, open the modal 
editBtn.forEach(item => {
    item.addEventListener("click", changeName);
    
})

// Edit

function changeName (event) {
    editModal.style.display = "block";
    const actualPathFile = document.getElementById("actualPathFile");
    const inputHref = event.currentTarget.getAttribute("actualPath");
    // console.log(inputHref);
    actualPathFile.value=inputHref;

}

//Delete

// Get the modal
const deleteModal = document.querySelector(".deleteModal");

// Get the button that opens the modal
const deleteBtn = document.querySelectorAll(".delete-button");

cancelBtn.forEach(item => {
    item.addEventListener("click", cancel);
    
})

function cancel(e) {
    editModal.style.display = "none"; 
    deleteModal.style.display = "none"; 


}

deleteBtn.forEach(item => {
    item.addEventListener("click", deleteFile);
    
})

function deleteFile(e){
    deleteModal.style.display = "block";
    if(e.target.matches("#btnDelete")){
        inputHrefD = e.target.getAttribute("deletePath");
            fetch("delete.php",{
            method: 'DELETE',
        })
            .then(res => res.json()) 
            .then(res => console.log(res))
        }
}

// document.querySelectorAll('.delete-button').forEach(function(button) {
//     button.addEventListener('click', function(event) {
//         event.preventDefault();
//         var file = event.target.value;
//         var folder = "<?php echo $folder ?>";
//         var data = { file: file, folder: folder };
//         fetch('delete.php', {
//             method: 'DELETE',
//             body: JSON.stringify(data),
//             headers: {
//                 'Content-Type': 'application/json'
//             }
//         })
//         .then(function(response) {
//             return response.text();
//         }).then(function(data) {
// console.log(data);
// // Aquí puedes actualizar la página o mostrar un mensaje de éxito/error al usuario
// })
// .catch(function(error) {
// console.error(error);
// });
// });
// });



