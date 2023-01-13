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
var newmodal = document.getElementById("newModal");

// Get the button that opens the modal
var newBtn = document.getElementById("newBtn");

// Get the <span> element that closes the modal
var spanN = document.getElementsByClassName("closeNew")[0];

// When the user clicks the button, open the modal 
newBtn.onclick = function() {
  newModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanN.onclick = function() {
    newModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    newModal.style.display = "none";
  }
}

//Edit

// Get the modal
var editModal = document.getElementById("editModal");

// Get the button that opens the modal
var editBtn = document.getElementById("editBtn");

// Get the <span> element that closes the modal
var spanE = document.getElementsByClassName("closeEdit")[0];

// When the user clicks the button, open the modal 
editBtn.onclick = function() {
    editModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanE.onclick = function() {
    editModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    editModal.style.display = "none";
  }
}

// Edit

$('#editFileModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('old')
    var oldpath = button.data('path')
    var modal = $(this);
    $("#fileName").attr("placeholder", recipient);
    console.log("This is the recipient ", recipient);
    modal.find('.modal-body form #oldName').val(recipient);
    modal.find('.modal-body form #oldPath').val(oldpath);
});
