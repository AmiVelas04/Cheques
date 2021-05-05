
function mostrar_cuenta(bancos)
{
 var id= bancos;
    $.ajax({
    type: "POST",
    url: "ajax/chequesAjax.php",
    data:{banco:id},
    success:function(r)
    { //alert(r);
        $('#cuent').html(r);},
    error:function()
    {$('#cuent').html("No se encontraron cuentas")}
});

}

function mostrar_chequera(cuentas,bancos)
{
var idban= bancos;
var idcuent= cuentas;
//console.log("codigo de la cuenta: " + idcuent);
$.ajax({
    type: "POST",
    url:"ajax/chequesAjax.php",
    data:{banco:idban,cuenta:idcuent},
    success:function (r) 
    {//alert(r);
        $('#chequer').html(r);
      },
      error:function () {
        $('#chequer').html("No se encontraron chequeras")
        }
    }
)

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


function Mostrabanco(id)
{
    var cheque= id;
    var valor = 1;
    $.ajax({
    type: "POST",
    url: "ajax/chequesAjax.php",
    data:{cheq_chequw, retorno:valor},
    success:function(r)
    { //alert(r);
        $('#cuent').html(r);},
    error:function()
    {$('#cuent').html("No se encontraron cuentas")}
});

}




//------------------------------------------------

