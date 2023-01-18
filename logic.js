const folders = document.querySelectorAll(".folder");
folders.forEach(folder => {
    folder.addEventListener("click", function() {
        const submenu = this.querySelector("ul");
        submenu.style.display = submenu.style.display === "flex" ? "none" : "flex";
    });
});


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






        $('select').each(function(){
            var $this = $(this), numberOfOptions = $(this).children('option').length;
          
            $this.addClass('select-hidden'); 
            $this.wrap('<div class="select"></div>');
            $this.after('<div class="select-styled"></div>');
        
            var $styledSelect = $this.next('div.select-styled');
            $styledSelect.text($this.children('option').eq(0).text());
          
            var $list = $('<ul />', {
                'class': 'select-options'
            }).insertAfter($styledSelect);
          
            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
                //if ($this.children('option').eq(i).is(':selected')){
                //  $('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected')
                //}
            }
          
            var $listItems = $list.children('li');
          
            $styledSelect.click(function(e) {
                e.stopPropagation();
                $('div.select-styled.active').not(this).each(function(){
                    $(this).removeClass('active').next('ul.select-options').hide();
                });
                $(this).toggleClass('active').next('ul.select-options').toggle();
            });
          
            $listItems.click(function(e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
                $list.hide();
                //console.log($this.val());
            });
          
            $(document).click(function() {
                $styledSelect.removeClass('active');
                $list.hide();
            });
        
        });



$(function () {
    $(".menu-link").click(function () {
     $(".menu-link").removeClass("is-active");
     $(this).addClass("is-active");
    });
   });
   
   $(function () {
    $(".main-header-link").click(function () {
     $(".main-header-link").removeClass("is-active");
     $(this).addClass("is-active");
    });
   });
   
   const dropdowns = document.querySelectorAll(".dropdown");
   dropdowns.forEach((dropdown) => {
    dropdown.addEventListener("click", (e) => {
     e.stopPropagation();
     dropdowns.forEach((c) => c.classList.remove("is-active"));
     dropdown.classList.add("is-active");
    });
   });
   
   $(".search-bar input")
    .focus(function () {
     $(".header").addClass("wide");
    })
    .blur(function () {
     $(".header").removeClass("wide");
    });
   
   $(document).click(function (e) {
    var container = $(".status-button");
    var dd = $(".dropdown");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
     dd.removeClass("is-active");
    }
   });
   
   $(function () {
    $(".dropdown").on("click", function (e) {
     $(".content-wrapper").addClass("overlay");
     e.stopPropagation();
    });
    $(document).on("click", function (e) {
     if ($(e.target).is(".dropdown") === false) {
      $(".content-wrapper").removeClass("overlay");
     }
    });
   });
   
   $(function () {
    $(".status-button:not(.open)").on("click", function (e) {
     $(".overlay-app").addClass("is-active");
    });
    $(".pop-up .close").click(function () {
     $(".overlay-app").removeClass("is-active");
    });
   });
   
   $(".status-button:not(.open)").click(function () {
    $(".pop-up").addClass("visible");
   });
   
   $(".pop-up .close").click(function () {
    $(".pop-up").removeClass("visible");
   });
   
   const toggleButton = document.querySelector('.dark-light');
   
   toggleButton.addEventListener('click', () => {
     document.body.classList.toggle('light-mode');
   });

// Submit

// const submit = document.getElementById("form-id");

// document.getElementById("your-id").addEventListener("click", function () {
//   form.submit();
// });



// New Modal
// Get the modal
// const newmodal = document.getElementById("newModal");

// Get the button that opens the modal
// const newBtn = document.getElementById("newBtn");


// When the user clicks the button, open the modal 

// newBtn.onclick = function() {
//     newmodal.style.display = "block";
// }



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
    const actualPathFile = document.getElementById("actualPathFile");
    const inputHref = event.currentTarget.getAttribute("actualPath");
    console.log(inputHref);
    actualPathFile.value=inputHref;

}