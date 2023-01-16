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

// Get the <span> element that closes the modal
const spanN = document.getElementsByClassName("closeNew")[0];

// When the user clicks the button, open the modal 
newBtn.onclick = function() {
    newmodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanN.onclick = function() {
    newmodal.style.display = "none";
}


//Edit

// Get the modal
const editModal = document.getElementById("editModal");

// Get the button that opens the modal
const editBtn = document.getElementById("editBtn");

// Get the <span> element that closes the modal
const spanE = document.getElementsByClassName("closeEdit")[0];

// When the user clicks the button, open the modal 
editBtn.onclick = function() {
    editModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanE.onclick = function() {
    editModal.style.display = "none";
}


// Edit

    //Create Input

    // let divMenu = document.querySelector(".aside");

    editBtn.addEventListener("click", createInput);
    // divName.addEventListener("click", edit);

function createInput(e){
    let inputName = document.querySelector(".input-name");
    let input = inputName.innerHTML;
    let inputPath = inputName.href;
    // console.log(inputPath);
    // console.log(input);

  if(e.target.matches(".input-name")){
    console.log(e.target.matches(".input-name"));

  }
    
  }

    

    

    

    
    

    
    

    







// function edit(e){
//     e.preventDefault();


//     fetch("edit.php" + "?" + "name=" + oldName + "&" + "newName=" + newName,
//     {
//         method: "GET",
//     }
//     )
//     .then((response) => response.json())
//     .then((data) => {
//         console.log(data);
//     })

// }








