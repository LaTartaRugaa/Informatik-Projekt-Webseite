let selectImageButton = document.getElementById
    ('image');

let chosenImage = document.getElementById
    ('chosen-image');

/* imported code: get source of chosen image and insert it */

selectImageButton.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(selectImageButton.files[0]);
    console.log(selectImageButton.files[0]);
    reader.onload = () => {
        chosenImage.setAttribute("src",reader.result);
    }
}

/* ------------------------- */