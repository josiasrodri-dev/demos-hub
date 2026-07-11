let eye = document.getElementById("eye");
let eye2 = document.getElementById("eye2");

let pw = document.getElementById("pass");
let conpass = document.getElementById("conpass");

eye.onclick = () =>{
    eye.classList.toggle("fa-eye")
    eye.classList.toggle("fa-eye-slash")

    if (eye2 != null) {
        eye2.classList.toggle("fa-eye")
        eye2.classList.toggle("fa-eye-slash")
    }
    else{
        eye2 = null
        conpass = pw
    }
    

    if(pw.type == "text" || conpass.type == "text"){
        pw.type = conpass.type = "password"
        console.log(pw.type)
    }
    else{
        pw.type = conpass.type = "text"
        console.log(pw.type)
    }
}

