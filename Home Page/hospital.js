let slide = document.querySelectorAll(".patientReview");
let count = 0;

slide.forEach(function(slides, index){
    slides.style.left=`${index * 100}%`
 })

 function myFun(){
    slide.forEach(function(curVal){
        curVal.style.transform=`translateX(-${count * 100}%)`
    })
 }

 setInterval(function(){
    count++;
    if(count == slide.length){
        count=0;
    }
    myFun()
 }, 2000)