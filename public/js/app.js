import './bootstrap';

let imageName = document.getElementById('image_name')
let imageFile = document.getElementById('image_file')
alert('sdfsf')
imageFile.addEventListener(('change') , ()=>{
    imageName.innerHTML =  imageFile.files[0]
})
