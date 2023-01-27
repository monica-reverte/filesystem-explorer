const button = document.getElementById("menu-button");
const searchBtn = document.getElementById('searchBtn')
const menu = document.getElementById("menu");
const submitDeleteBtn = document.getElementById('submitDelete');
const searchInput = document.getElementById('search-input');
const fileToUpload = document.getElementById('fileToUpload');
const submitUploadBtn = document.getElementById('submitUploadBtn')

let currentFolder = 'root'

button.addEventListener("click", function() {
    menu.style.display = menu.style.display === "block" ? "none" : "block";
});


const folders = document.querySelectorAll(".folder");
folders.forEach(folder => {
    folder.addEventListener("click", function(e) {
        const submenu = this.querySelector("ul");
        submenu.style.display = submenu.style.display === "block" ? "none" : "block";

        currentFolder = e.target.getAttribute('path');  
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

submitDeleteBtn.addEventListener('click', submitDeleteFile)


let inputHrefD=''

function deleteFile(e){
    deleteModal.style.display = "block";
    inputHrefD = e.target.getAttribute("deletePath");       
}

function submitDeleteFile(){
            fetch(`delete.php?file=${inputHrefD}`)
            .then(res => res.json()) 
            .then(data => {
                let parentElement = document.getElementById('menu')
                let elementToDelete = document.getElementById(data.file);
                parentElement.removeChild(elementToDelete);
                deleteModal.style.display = "none";
                })
}

searchBtn.addEventListener('click', search)

function search(){
    let searchValue = searchInput.value
        fetch(`search.php?search_term=${searchValue}`)
            .then(res => res.json()) 
            .then(data => {
                console.log(data)
                menu.innerHTML = ''
                data.folders.forEach((folder)=>{
                    let li = document.createElement('li')
                    li.classList.add('list-group-item')
                    li.classList.add('folder')
                    folderNameArr = folder.split('/')
                    folderName = folderNameArr[folderNameArr.length - 1]
                    li.innerText = folderName
                    menu.appendChild(li)
                })

                data.files.forEach((file)=>{
                    let li = document.createElement('li')
                    li.setAttribute('id', file)
                    li.classList.add('list-group-item')
                    li.classList.add('file')

                    fileNameArr = file.split('/')
                    fileName = fileNameArr[fileNameArr.length - 1]

                    li.innerHTML= `
                        <a class='dropdown-item input-name' href=${file}> ${fileName} </a>
                        <button actualPath=${file} class='btn m-1 btn-dark editBtn'>Edit</button>
                        <button deletePath=${file} class='btn btn-dark delete-button'>Delete</button>
                    `
                    menu.appendChild(li)
                })
                })

}

fileToUpload.addEventListener("change", Upload)
submitUploadBtn.addEventListener('click', submitUpload)

let file = ''

function Upload(e){
    file = e.target.files[0]
}

function submitUpload(){
    const form_data = new FormData();
        form_data.append("file", file);
        form_data.append("currentFolder", currentFolder)

    fetch(`back.php`, {
        method: "POST",
        body: form_data,
    })
    .then(res => res.json()) 
    .then(data => {
        console.log(data)
        window.location.href = 'index.php'
    })
}