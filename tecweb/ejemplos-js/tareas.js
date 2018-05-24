var btnAgregar = document.getElementById('btn-agregar');

btnAgregar.onclick=agregar;

var tarea1 = document.getElementById('tarea1');
var tarea2 = document.getElementById('tarea2');

var btnBorrar=document.getElementById('btn-borrar');

btnBorrar.addEventListener('click',borrarTodo);

tarea1.ondblclick=resaltar;
tarea2.ondblclick=resaltar;

function agregar(){
    var tarea=document.getElementById('tarea').value;
    if(tarea!=""){
    var listaTareas=document.getElementById('lista-tareas');
    // listaTareas.innerHTML+="<li>" + tarea + "</li>";
    var nodoElemento = document.createElement("li");
    nodoElemento.classList.add("list-group-item");
    var nodoTexto = document.createTextNode(tarea);
    nodoElemento.appendChild(nodoTexto);
    listaTareas.appendChild(nodoElemento);
    document.getElementById('tarea').value="";
    var total=document.getElementById('total');
    total.innerText++;
}
}

function borrarTodo(){
    // if(confirm("¿Estas seguro de borrar todo?")){
    //     console.log("Voy a borrar todo...");
    // }else{
    //     console.log("No voy a borrar nada");
    // }
    var listaTareas=document.getElementById('lista-tareas');
    while(listaTareas.firstChild){
        listaTareas.removeChild(listaTareas.firstChild);
    }
    var total=document.getElementById('total');
    total.value="";
}

function resaltar(evento){
    var nodoElemento = evento.target;
    if(nodoElemento.classList.contains('list-group-item-warning')){
        nodoElemento.classList.remove('list-group-item-warning');
    }
    else{
        nodoElemento.classList.add('list-group-item-warning');
    }
}
