function triggered(){
    document.querySelector("#prof-image").click();
}

function preview(e){
    if(e.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#prof-display').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);

    }
}
