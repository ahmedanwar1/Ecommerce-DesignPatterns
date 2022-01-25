
/*=========================== Start product img ===========================*/

/* change the main image when hovering */

let btnLeftThumb  = document.getElementById("btn-left-thumb"),
    btnRightThumb = document.getElementById("btn-right-thumb"),
    mainImage     = document.querySelector(".main-img img"),
    thumbImages   = document.querySelectorAll(".product-thumbs .img-thumb img"),
    sliderThumb   = document.querySelector(".product-thumbs");

let currentImg = 0; //main photo's index



let changeMainImg = (element,index) => {
    thumbImages.forEach(e => {e.classList.remove("active");}); //remove all active class

    element.classList.add("active"); //add active class to the element when clicking
    mainImage.setAttribute("src", element.getAttribute("src")); //change the src to the clicked img 
    
    currentImg = index; //current main photo

    sliderThumb.scrollLeft = element.offsetLeft - 18; //to bring the selected img to the viewable area

}

thumbImages.forEach((element,index) => {
    element.addEventListener("click", () => {

        changeMainImg(element, index); //send the clicked img and its index
    } );
} );

/* buttons onclick */

btnRightThumb.onclick = () => {

    if(currentImg >= thumbImages.length-1) { 
        currentImg = -1; //back to square one :) //-1 because when it will be incremented by one  
    }

    changeMainImg(thumbImages[currentImg+1], currentImg+1);
}

btnLeftThumb.onclick = () => {
    if(currentImg == 0) {
        currentImg = thumbImages.length; 
    }

    changeMainImg(thumbImages[currentImg-1], currentImg-1);
}

/*=========================== End product img ===========================*/



/*=========================== Start product details ===========================*/

let descriptionBtn = document.getElementById("description"),
    specificationsBtn = document.getElementById("specifications"),
    reviewsBtn = document.getElementById("reviews"),

    descriptionContent = document.querySelector(".content .description"),
    specificationsContent = document.querySelector(".content .specifications"),
    reviewsContent = document.querySelector(".content .reviews");

    descriptionBtn.onclick = () => {
        descriptionBtn.classList.add("active");

        specificationsBtn.classList.remove("active");
        reviewsBtn.classList.remove("active");

        descriptionContent.classList.remove("d-none");
        specificationsContent.classList.add("d-none");
        reviewsContent.classList.add("d-none");
    }

    specificationsBtn.onclick = () => {
        specificationsBtn.classList.add("active");

        descriptionBtn.classList.remove("active");
        reviewsBtn.classList.remove("active");

        specificationsContent.classList.remove("d-none");
        descriptionContent.classList.add("d-none");
        reviewsContent.classList.add("d-none");
    }

    reviewsBtn.onclick = () => {
        reviewsBtn.classList.add("active");

        specificationsBtn.classList.remove("active");
        descriptionBtn.classList.remove("active");

        reviewsContent.classList.remove("d-none");
        specificationsContent.classList.add("d-none");
        descriptionContent.classList.add("d-none");
    }


/*=========================== End product details ===========================*/






/* Start making slider for items*/

let leftButtonRelated = document.querySelector(".related-items .nav-left"), //recommend-items buttons
    rightButtonRelated = document.querySelector(".related-items .nav-right");

//give the functinality to buttons
rightButtonRelated.onclick = () => navRight(".related-items"); //this function exists in index.js
leftButtonRelated.onclick  = () => navLeft(".related-items");  //this function exists in index.js


/* End making slider for items */



