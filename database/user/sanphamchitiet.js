var img_main = document.querySelector(".img-main");
console.log(img_main);
var lst_img = document.querySelectorAll(".lst_img-des1");
// console.log(lst_img);
lst_img.forEach(Image => {
    Image.addEventListener('click', e=>{
        img_main.src = e.target.getAttribute('src');
    })
})