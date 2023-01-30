const nombre = document.getElementById("nombre");
const asunto = document.getElementById("asunto");
const telefono = document.getElementById("telefono");
const email = document.getElementById("email");
const tipoUsuario = document.getElementById("tipoUsuario");
const mensaje = document.getElementById("mensaje");
const form = document.getElementById("form");
const parrafo = document.getElementById("warnings");

form.addEventListener("submit", e=>{
    e.preventDefault();
    let warnings = "";
    let entrar = false;
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    parrafo.innerHTML = ""; 

    if(nombre.value.length <2){
       warnings += "El nombre no es valido <br>";
       entrar = true;
    }

    if(asunto.value.length <4){
        warnings += "El asunto no es valido <br>";
        entrar = true;
    }

    if(telefono.value.length <10){
        warnings += "El telefono no es valido <br>";
        entrar = true;
    }
    
    if(!regexEmail.test(email.value)){
        warnings += "El email no es valido <br>"
        entrar = true;
    }
    
    if(mensaje.value.length <25){
        warnings += "El mensaje no es valido <br>";
        entrar = true;
    }
    
    if(entrar){
        parrafo.innerHTML = warnings;
    }  else{

    var datos = new FormData(form);
    console.log(datos.get('nombre'));


     fetch('enviar.php',{
        method: 'POST',
        body: datos
     })
        .then( res => res.json())
        .then( data => {
            console.log(data)
     }) 

     parrafo.innerHTML = "Enviado"; 

/*
    $.post('enviar.php', {nombre:nombre, asunto:asunto}, function (data){
        if(data != null){
            parrafo.innerHTML = "Enviadoooo"; 
        }else{
          alert("no se encontraron datos")
        }
    })  */
    } 
});