
function mostrar_cuenta(banco)
{
if (banco!="")
{
$.ajax({
    type: "POST",
    url: "ajax/chequesAjax",
    data:{banco:$('#banco').val()},
    success:function(r)
    {('#respuesta').html(r);}
});
}
else
{
    $.ajax({
        type: "POST",
        url: "ajax/chequesAjax",
        data:{banco:""},
        success:function(r)
        {('#respuesta').html(r);}
    });
}

}
//Mostrar o ingresar cuenta
function mostrarBanco(valor)
{
if (valor=="0")
{
var d= document.getElementById("lstbanco");
d.style= "display:none";
var t= document.getElementById("txtbanco");
t.style="display:flex";
$(document).ready(function(){
        
    $//('input:radio[name=optcuenta]:nth(0)').attr('checked',true);
    $('input:radio[name=optcuenta]')[0].checked = true;
    $('input:radio[name=optcheq]')[0].checked=true;
});

var cl= document.getElementById("lstcuenta");
cl.style= "display:none";
var ct= document.getElementById("txtcuenta");
ct.style="display:flex";

var chl= document.getElementById("lstcheq");
chl.style= "display:none";
var cht= document.getElementById("txtcheq");
cht.style="display:flex";


}
else if(valor=="1")
{
    var d= document.getElementById("lstcheq");
    d.style= "display:flex";
    var t= document.getElementById("txtcheq");
    t.style="display:none";
}
else
{}

}

//Mostrar o ingresar cuenta
function mostrarCuenta(valor)
{
    if (valor=="0")
{
var d= document.getElementById("lstcuenta");
d.style= "display:none";
var t= document.getElementById("txtcuenta");
t.style="display:flex";
}
else if(valor=="1")
{
    var d= document.getElementById("lstcuenta");
    d.style= "display:flex";
    var t= document.getElementById("txtcuenta");
    t.style="display:none";
}
else
{}
}

//Mostrar o ingresar chequera
function mostrarChequera(valor)
{
    if (valor=="0")
{
var d= document.getElementById("lstcheq");
d.style= "display:none";
var t= document.getElementById("txtcheq");
t.style="display:flex";
}
else if(valor=="1")
{
    var d= document.getElementById("lstcheq");
    d.style= "display:flex";
    var t= document.getElementById("txtcheq");
    t.style="display:none";
}
else
{}
}



//------------------------------------------------


function habilitar(value1,value2,value3,value4){
   
    if (value1!="0" && value2!="0" && value3!="0" && value4!="0")
    {
        document.getElementById("save").disabled=false;
        if (value1!="0" && value2!="0")
        {
           recargarlista();
        }
        else
        {
        }
    }

    else
    {
        document.getElementById("save").disabled=true;
    }

}
$(document).ready(function(){
        $('#ingresarcali').on('clik',function (e){
            e.preventDefault();
                
        })
})


function asginacursocat()
{$.ajax({
    type:"POST",
    url: "ajax/cursoAjax.php",
    data:{carrera:  $('#carrera').val(),grado:  $('#grado').val(),cate: $('#.cat').val(),cur: $('#cur').val()},
    success:function(r){

        ('#respuesta').html(r);
    }

});
}

function  mostrar_grad(usu){
    
 busca_grad(usu);

}

function mostrar_curso(usu){
    
buscar_cur(usu);
}

function  alumnos(usu){
    var curso;
    var grado;
    var carrera
    carrera=$('#carrerac').val();
    grado=$('#gradoc').val();
    curso=$('#cursos').val();
    
    if (grado!=0 && carrera!=0 && curso!=0)
    {
    buscar_alu(usu);
    }
    else{
       
    }
}


//Muestra los cursos de las carreras en la asignacion
function recargarlista(){
    $.ajax({
    type:"POST",
    url: "ajax/cursoajax.php",
    data:{carrera:  $('#carrera').val(),grado:  $('#grado').val()},
    success: function(r){

        $('#curso').html(r);
    }
    });
}
//busca los grados asignadoa al catedratico
function busca_grad(usu){

    $.ajax({
        type:"POST",
        url: "ajax/cursoajax.php",
        data:{carr: $('#carrerac').val(),usuario:usu},
        success: function(a){
            $('#mgrado').html(a);
        }
    });
}

//Busca los cursos asignados al catedraticos



function buscar_cur(usu){
        
    $.ajax({
        type:"POST",
        url:"ajax/cursoajax.php",
        data:{carre:$('#carrerac').val(),grado:$('#gradoc').val(),usuario:usu},
        success:function(h){
         
$('#mostracurso').html(h);

        }
       });
}

function buscar_alu(usu){
    $.ajax({
        type:"POST",
        url:"ajax/cursoajax.php",
        data:{car:$('#carrerac').val(),grad:$('#gradoc').val(),cur:$('#cursos').val(),usuario:usu,},
        success: function(r){
            
            $('#alumn').html(r);
            $('.estado').on('clik',function (e){
                e.preventDefault();
                    alert('hola pues')});
        }
    });
}
//envia datos hacia asigan ajax para ser asignados
function asignacur(cat,cur)
{
$.ajax({
type:"POST",
url:"ajax/asignacionAjax.php",
data:{cate:cat,cur:cur},
success: function(l){
    
    $('#respuesta').html(l);
    $('.save').on('click',function(e){
        e.preventDefault();
        alert(cat);
    });
}

})
}






