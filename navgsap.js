var menu = document.querySelector(".menu");
var close = document.querySelector(".close");


menu.addEventListener('click',function(){

    gsap.to(".nav-links",{
        x:-280,
        duration:0.5,
        opacity:1,
       
    })

})
close.addEventListener('click',function(){

    gsap.to(".nav-links",{
        x:200,
        duration:0.5,
       
    })

})
