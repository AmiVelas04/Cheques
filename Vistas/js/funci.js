
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
    
if (valor==0)
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
var w= document.getElementById("lbldirec");
    w.style="display:flex";

}
else if(valor==1)
{
    console.log('Mostras listas');
    var d= document.getElementById("lstcheq");
    d.style= "display:flex";
    var cl= document.getElementById("lstbanco");
cl.style= "display:flex";
    var t= document.getElementById("txtcheq");
    t.style="display:none";
    var r= document.getElementById("txtbanco");
    r.style="display:none";
    var q= document.getElementById("txtdirec");
    q.style="display:none";
    var w= document.getElementById("lbldirec");
    w.style="display:none";
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
var u= document.getElementById("txtsaldo");
u.style="display:flex";
var v= document.getElementById("txttipo");
v.style="display:flex";
var w= document.getElementById("lblsaldo");
w.style="display:flex";
var x= document.getElementById("lbltipo");
x.style="display:flex";


}
else if(valor=="1")
{
    var d= document.getElementById("lstcuenta");
    d.style= "display:flex";
    var t= document.getElementById("txtcuenta");
    t.style="display:none";
  
var u= document.getElementById("txtsaldo");
u.style="display:none";
var v= document.getElementById("txttipo");
v.style="display:none";
var w= document.getElementById("lblsaldo");
w.style="display:none";
var x= document.getElementById("lbltipo");
x.style="display:none";
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


function MostrarDatosB(idcheq)
{
    var chequenum= idcheq;
    
    //Mostrar los datos del banco
          $.ajax({
    type: "POST",
    url: "ajax/chequesAjax.php",
    data:{cheque:chequenum,dato:"1"},
    success:function(datos1)
    { //alert(datos1);
        $('#datosB').html(datos1)
    },
    error:function()
    {$('datosB').html("No se encontraron bancos")}
});


    //Mostrar los datos de la cuenta
    $.ajax({
        type: "POST",
        url: "ajax/chequesAjax.php",
        data:{cheque:chequenum,dato:"2"},
        success:function(datos2)
        { //alert(datos2);
            $('#datosC').html(datos2)
        },
        error:function()
        {$('#datosC').html("No se encontraron cuentas")}
    });

        //Mostrar los datos de la chequera
        $.ajax({
            type: "POST",
            url: "ajax/chequesAjax.php",
            data:{cheque:chequenum,dato:"3"},
            success:function(datos3)
            { //alert(r);
                $('#datosCh').html(datos3)
            },
            error:function()
            {$('#datosCh').html("No se encontraron chequeras")}
        });

            //Mostrar los datos del monto
       $.ajax({
        type: "POST",
        url: "ajax/chequesAjax.php",
        data:{cheque:chequenum,dato:"4"},
        success:function(datos4)
        { //alert(r);
            $('#datosM').html(datos4)
        },
        error:function()
        {$('#datosM').html("No se encontraron monto")}
    });

    //Mostrar los datos del beneficiario
    $.ajax({
        type: "POST",
        url: "ajax/chequesAjax.php",
        data:{cheque:chequenum,dato:"5"},
        success:function(datos5)
        { //alert(r);
            $('#datosBe').html(datos5)
        },
        error:function()
        {$('#datosBe').html("No se encontraron beneficiarios")}
    });
}
function mostrardatosC(idbanco)
{
    $.ajax({
        type: "POST",
        url: "ajax/chequesAjax.php",
        data:{banco:idbanco},
        success:function(datos2)
        { //alert(datos2);
            $('#lstcuenta').html(datos2)
        },
        error:function()
        {$('#lstcuenta').html("No se encontraron cuentas")}
    });
}

function mostrardatosCu(idcuenta)
{
    $.ajax({
        type: "POST",
        url: "ajax/chequesAjax.php",
        data:{cuenta:idcuenta},
        success:function(datos3)
        { //alert(r);
            $('#lstcheq').html(datos3)
        },
        error:function()
        {$('#lstcheq').html("No se encontraron chequeras")}
    });
}

$(document).on('change', '#lstcuenta', function(event) {
    $('#chequeimp').val($("#lstcuenta option:selected").text());
});


   
//------------------------------------------------

