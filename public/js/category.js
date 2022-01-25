/*=========================== filter btn ===========================*/

/* Start filter btn */

let openButtonFilter = document.getElementById("open-btn-filter"),
    closeButtonFilter = document.getElementById("close-btn-filter"),
    filter    = document.querySelector(".filter");

openButtonFilter.onclick = function () {
    filter.classList.remove("d-none");
} 

closeButtonFilter.onclick = function () {
    filter.classList.add("d-none");
} 

/* End filter btn */

/*=========================== DropDown ===========================*/
