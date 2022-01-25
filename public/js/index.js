
/* preload animation */
window.onload = () => fadeOutEffect(document.querySelector(".preload"));



function fadeOutEffect(fadeTarget) {
    let fadeEffect = setInterval( () => {
        if (!fadeTarget.style.opacity) {
            fadeTarget.style.opacity = 1;
        }
        if (fadeTarget.style.opacity > 0) {
            fadeTarget.style.opacity -= 0.2;
        } else {
            fadeTarget.style.display = "none";
            clearInterval(fadeEffect);
        }
    }, 200);
}


/*=========================== SideBar ===========================*/

/* Start SideBar */

let openButton  = document.getElementById("open-btn"),
    closeButton = document.getElementById("close-btn"),
    sideBar     = document.querySelector(".side-bar");

openButton.onclick  = () => sideBar.style.width   = "100%"; 
closeButton.onclick = () => sideBar.style.width   = "0";

/* End SideBar */



/*=========================== Product Slider ===========================*/

//set no. of items that are visible in the row (to make it responsive)

let itemsNoInRow = 0;

function getNoItemsRow () {
    if (parseInt(window.innerWidth) < 1298) {
        itemsNoInRow = 4;
    } else if (parseInt(window.innerWidth) >= 1298) {
        itemsNoInRow = 5;
    }
}

getNoItemsRow();

window.onresize = getNoItemsRow; //in case of resizing the page

/* Start making slider for items*/

let leftButtonBS = document.querySelector(".best-seller .nav-left"), //best-seller buttons
    rightButtonBS = document.querySelector(".best-seller .nav-right"),

    leftButtonRI = document.querySelector(".recommend-items .nav-left"), //recommend-items buttons
    rightButtonRI = document.querySelector(".recommend-items .nav-right");


//move items to right
let navRight = (containerProducts) => { //containerProducts is the name of the class that holds the content

    document.querySelector( containerProducts + " .container-items .row").scrollBy((itemsNoInRow * 260) , 0); 
    //260 is a size of one product //times itemsNoInRow to make the slider move a complete row
}

//move items to left
let navLeft = (containerProducts) => { //containerProducts is the name of the class that holds the content

    document.querySelector( containerProducts + " .container-items .row").scrollBy((itemsNoInRow * -260) , 0); 
    //-260 is a size of one product //times itemsNoInRow to make the slider move a complete row
}

//give the functinality to buttons
rightButtonBS.onclick = () => navRight(".best-seller");
leftButtonBS.onclick  = () => navLeft(".best-seller");

rightButtonRI.onclick = () => navRight(".recommend-items");
leftButtonRI.onclick  = () => navLeft(".recommend-items");


/* End making slider for items */





