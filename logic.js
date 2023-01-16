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



//Edit

// Get the modal
const editModal = document.querySelector(".editModal");

// Get the button that opens the modal
const editBtn = document.querySelectorAll(".editBtn");


// When the user clicks the button, open the modal 
editBtn.forEach(item => {
    item.addEventListener("click", changeName);
    
})




// Edit

function changeName (event) {
    editModal.style.display = "block";
    const actualPathFile = document.getElementById("actualPathFile");
    const inputHref = event.currentTarget.getAttribute("actualPath");
    console.log(inputHref);
    actualPathFile.value=inputHref;

}






