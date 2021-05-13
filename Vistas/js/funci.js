
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

$(document).on('change', '#lstcuenta', function(event) {
    $('#chequeimp').val($("#lstcuenta option:selected").text());
});

// funciones de reportes
function MostrarDatos(IdReporte)
{
    var reporte=IdReporte;
    
if (reporte==1)
{
 //Mostrar datos por fecha y cuenta

 $.ajax({
    type: "POST",
    url: "ajax/reportesAjax.php",
    data:{rep:reporte},
    success:function(datos1)
    { 
        $('#mostrar1').html(datos1);
        addfechas();
    },
    error:function()
    {$('datosB').html("")}
});


}
else if(reporte==2)
{
 //Mostrar datos por usuarios 
 var d= document.getElementById("fechas");
d.style.visibility="visible";
 $.ajax({
    type: "POST",
    url: "ajax/reportesAjax.php",
    data:{rep:reporte},
    success:function(datos1)
    { 
        $('#mostrar1').html(datos1)
        addfechas();
    },
    error:function()
    {$('datosB').html("")}
});

}
else if(reporte==3)
{
    addfechas();
   //no mostrar por ser para bitacora
  /* $(function() {
	$("#modi").prop("disabled",true);
	$("#operar").css('visibility', 'hidden'); 
});*/
}
else if(reporte==4)
{
     //Mostrar moviemientos de cuentas
     var d= document.getElementById("fechas");
d.style.visibility="visible";
 $.ajax({
    type: "POST",
    url: "ajax/reportesAjax.php",
    data:{rep:reporte},
    success:function(datos1)
    { 
        addfechas();
        $('#mostrar1').html(datos1)

    },
    error:function()
    {$('datosB').html("")}
});
}
else if(reporte==5)
{
     //Mostrar datos por rangos y cuentas
    /* var d= document.getElementById("fechas");
d.style.visibility="hidden";*/
var div = document.getElementById('fechas');
while (div.firstChild) {
    div.removeChild(div.firstChild);
}

 $.ajax({
    type: "POST",
    url: "ajax/reportesAjax.php",
    data:{rep:reporte},
    success:function(datos1)
    { 
        $('#mostrar1').html(datos1)
    },
    error:function()
    {$('datosB').html("")}
});
}}

function addfechas()
{
    var contenido="<div class='col-xs-12 col-sm-6' id ='fecha1'> "+
                  "<div class='form-group label-floating'>"+
                  "<label class='control-label'>Fecha desde*</label>"+
                  "<?php $fcha = date('Y-m-d'); ?>"+
				  "<input  class='form-control' type='date' id='fechaini' name='fechaini-reg' required='' value='<?php echo $fcha; ?>' min='2021-01-01' max='2030-12-31'> "+
				  "</div>"+
				  "</div>"+
				  "<div class='col-xs-12 col-sm-6' id ='fecha2'>"+
				  "<div class='form-group label-floating'>"+
				  "<label class='control-label'>Fecha hasta*</label>"+
				  "<?php $fcha = date('Y-m-d'); ?>"+
                  "<input  class='form-control' type='date' id='fechafin' name='fechafin-reg' required='' value='<?php echo $fcha; ?>' min='2021-01-01' max='2030-12-31'> "+
				  "</div>"+
				  "</div>";
    $(function() {
     $('#fechas').html(contenido);
      });

}
   
//------------------------------------------------

