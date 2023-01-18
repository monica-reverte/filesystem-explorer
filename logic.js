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
    console.log(inputHref);
    actualPathFile.value=inputHref;

}



const searchForm = document.getElementById('search-form');
const searchInput = document.getElementById('search-input');
const searchResult = document.getElementById('search-result');

searchForm.addEventListener('submit', e => {
    e.preventDefault();
    const searchTerm = searchInput.value;

    fetch('search.php', {
        method: 'POST',
        body: JSON.stringify({ search_term: searchTerm }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            let html = '';
            data.data.forEach(result => {
                html += `<div>${result}</div>`;
            });
            searchResult.innerHTML= html;
        } else {
        searchResult.innerHTML = 'No se han encontrado resultados para su búsqueda.';
        }
        })
        .catch(error => console.log(error));
        });





