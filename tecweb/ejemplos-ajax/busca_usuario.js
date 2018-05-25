var usuario=document.getElementById('usuario');
usuario.addEventListener("input",buscaUsario);

var xhr=new XMLHttpRequest();
xhr.addEventListener("load",respuesta);

var mensaje=document.getElementById('mensaje');

function buscaUsario(){
    xhr.open("GET","checa_usr.php?usuario="+usuario.value);
    xhr.send();
}

function respuesta(){
    if(this.responseText==1){
        mensaje.innerText="El usuario ya existe";
    }
    else{
        mensaje.innerText="";
    }
}