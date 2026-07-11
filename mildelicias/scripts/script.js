let more = document.querySelectorAll(".more");
let less = document.querySelectorAll(".less");
let quantity = document.querySelectorAll(".quantity");


    for(var i = 0; i < quantity.length; i++){
        const x = i;
        more[x].onclick = function(){
            quantity[x].value = parseInt(quantity[x].value) + 1;  
        }
        less[x].onclick = function(){
            if(parseInt(quantity[x].value) > 1){
                quantity[x].value = parseInt(quantity[x].value) - 1;
            }else if(parseInt(quantity[x].value)<=0){
                quantity[x].value = 1
            }
        }
    }
    
let user = document.getElementById("user");
let content = document.getElementById('usercontent');
user.onclick = function(){
    content.classList.toggle("Show");
}   

let car = document.getElementById("car");
let Modal = document.getElementById("modalcar");
car.onclick = function(){
    Modal.style.display = "block"
}
let Continue = document.getElementById("Continue");
let Trash = document.getElementById("Trash");
let Pay = document.getElementById("Pay");


Continue.onclick = function(){
    Modal.style.display = "none"
}



