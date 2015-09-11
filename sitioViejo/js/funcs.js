function submitDepositar()
{

	var form = $(".formFinalCarrito");
	var url = form.attr("action");
	var post_data = form.serialize();
	if(validarEnvioCarrito())
            {
	$.ajax({
		async: false,
		type: "POST",
		url: url,
                dataType: "json",
		data: post_data,
                success: function(data){
			$("#loading").text(data.texto);
                        if($.trim(data.texto) == "Mensaje enviado correctamente.")
                        {
                            window.open(PATH_PHP+"ponerCeroCarrito.php","_self");
                        }
		}
	});
            }
   
}


function submitPagarBanco()
{

	var form = $(".formFinalCarrito");
	var url = form.attr("action");
	var post_data = form.serialize();
	
    if(validarEnvioCarrito())
    {
	$.ajax({
		async: false,
		type: "POST",
		url: url,
                dataType: "json",
		data: post_data,
		success: function(data){
                    var ok;
			$("#loading").text(data.texto);
                        if($.trim(data.texto) == "Mensaje enviado correctamente.")
                            {
                                $("#checkout").show();
                                $("#checkout").attr("src",data.url);
                                $("#checkout").dialog({
                                    closeText: "Cerrar",
                                    modal: true
                                });
                                // fondo transparente
                                // creamos un div nuevo, con dos atributos
                                var bgdiv = $('<div>').attr({
                                                        className: 'bgtransparent',
                                                        id: 'bgtransparent'
                                                        });

                                // agregamos nuevo div a la pagina
                                $('body').append(bgdiv);
                                
                                $(".ui-button").click(function(){
                                    if(confirm("Si cierra la ventana no se efectuará la acción en MercadoPago."))
                                    {
                                        $('#bgtransparent').remove();
                                        $("#checkout").close();                                       
                                    }
                                    else
                                        {
                                            $("#checkout").dialog();
                                        }
                                            
                                    });
                                //window.open(data.url, "_self");
                                //window.open(PATH_PHP+"ponerCeroCarrito.php","_self");
                            }
                        
		}
	});
    }

}
function validarEnvioCarrito()
{
    var nombreComprador = $("#nombreComprador").val();
    var telefonoComprador = $("#telefonoComprador").val();
    var mailComprador = $("#mailComprador").val();
    var direccionComprador = $("#direccionComprador").val();
    
    if(nombreComprador != "")
    {
        if(telefonoComprador != "")
        {
            if(mailComprador != "")
            {
                if(validar_email(mailComprador))
                {
                    if(direccionComprador != "")
                    {
                        return true;
                    }
                    else
                    {
                        $("#loading").text("Se olvidó de cargar la dirección.");
                        $("#direccionComprador").focus();
                    }
                }
                else
                {
                    $("#loading").text("El mail que usted ingresó parece ser incorrecto.");
                    $("#mailComprador").focus();
                }
            }
            else
            {
                $("#loading").text("Se olvidó de cargar el mail.");
                $("#mailComprador").focus();
            }
        }
        else
        {
            $("#loading").text("Se olvidó de cargar el teléfono.");
            $("#telefonoComprador").focus();
        }
    }
    else
    {
        $("#loading").text("Se olvidó de cargar el nombre.");
        $("#nombreComprador").focus();
    }
    return false;
    
}
function validar_email(valor)
{
    // creamos nuestra regla con expresiones regulares.
    var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    // utilizamos test para comprobar si el parametro valor cumple la regla
    if(filter.test(valor))
        return true;
    else
        return false;
}
/*
funcion para cargar el form vacio
*/
function cargarFormVacio(id)
{
        $("#formularioArticulos").load(PATH_ADMIN + "formularioVacio.php?idM=" + id);
}

function fotosCargadas(formulario, iM){

		var post_url = 'modificarFoto.php';
		var post_data = formulario.serialize();
		$.ajax({
			type: 'POST',
			url: post_url,
			data: post_data,
			success: function(msg){
				alert(msg);
				$("#formularioFotos").load(PATH_ADMIN + "formularioFotos.php?idM=" + iM, function () {
				   $(document).scrollTop(scrollPosition);
				});
			}
		});

}
/*
funcion para cargar el form de fotos cargadas
*/
function cargarFotosCargadas(id)
{
        $("#fotosCargadas").load(PATH_ADMIN + "fotosCargadas.php?idM=" + id);
}


function editar(id)
{
	$("#formularioArticulos").load(PATH_ADMIN + "formularioArticulosModificar.php?idArticulo=" + id);
	return false;
}

/*
funcion para eliminar
*/
function eliminarArticulo(id)
{

	$.ajaxSetup({
		  async: false
	});
	if (id != null)
	{
		if (confirm("¿Está seguro que desea eliminar el artículo?")) {
			$(this).load( PATH_ADMIN+'borrarArticulo.php?idArticulo='+id);
		}
	}
	
	var idM = $(".formularioArticulosMini").attr("id");
		$.ajax
		({
			async:false,
			success: function(e)
			{
				$(".formularioArticulosMini").load(PATH_ADMIN + "formularioArticulos.php?idM=" + idM);
			}
		});
	return false;
}

function eliminarMueble(e)
{
    var id = $(e).attr("data");
    var text = "¿Está seguro que desea eliminar el mueble?";
    var post_url = "borrarMueble.php?idMueble="+id;
    if (id != null)
    {
        if (confirm(text)) {
            $.ajax({
                    type: 'GET',
                    url: post_url,
                    success: function(msg){
                        if(msg == 'El mueble se eliminó correctamente.')
                        {
                            window.location.replace(PATH_ADMIN+"modificacion.php");
                        }
                        else
                        {
                            alert(msg);
                        }
                    }
            });
        }
    }
}

/*
funcion para eliminar genericamente

hay que probarla!!

se le pasa el id a eliminar
loadUrl es el archivo que realiza la baja y debe incluir el parametro ej "borrarArticulo.php?idArticulo="
reloadClass es la div donde se recarga el listado despues de eliminar ej $("#listado")
reloadUrl es el archivo que recarga el listado ej "formularioArticulos.php?idM="
*/
function eliminarGenerico(id, loadUrl, reloadClass, reloadUrl, text)
{

	$.ajaxSetup({
		  async: false
	});
	if (id != null)
	{
		if (confirm(text)) {
			$(this).load( PATH_ADMIN+ loadUrl +id);
		}
	}
	
		$.ajax
		({
			async:false,
			success: function(e)
			{
				$(reloadClass).load(PATH_ADMIN + reloadUrl);
			}
		});
	return false;
}


/*
funcion para submitear cualquier cosa sin recargar pagina
*/
function submitVacio()
{
	$.ajaxSetup({
		  async: false
	});
	serialized = $("#formArticulo").serialize();
        if(!isNaN($("#precioArt").val()))
        {
            $.ajax
                    ({
                            async:false,
                            success: function(data)
                            {
                    $(".divOculta").show();
                                    $(".divOculta").load(PATH_ADMIN + "agregarArticulo.php?"+ serialized);
                                    setTimeout(function(){
                                            $('.divOculta').fadeOut();
                                    }, 2000);
                            }
                    });
            var idM = $(".formularioArticulosMini").attr("id");
            $(".formularioArticulosMini").load(PATH_ADMIN + "formularioArticulos.php?idM=" + idM);
        }
        else
        {
            alert("El campo admite solo números.");
            $("#precioArt").focus();
        }
	return false;
}

function submitModificarArticulo()
{
    $.ajaxSetup({
		  async: false
	});
	serialized = $(".formArticuloModificar").serialize();
        url = PATH_ADMIN+"modificarArticulo.php";
        if(!isNaN($("#precioArt").val()))
        {
            $.ajax
                    ({
                            async:false,
                            url: url,
                            type: "POST",
                            data: serialized,
                            success: function(msg)
                            {
                                alert(msg);
                            }
                    });
            var idM = $(".formularioArticulosMini").attr("id");
            $(".formularioArticulosMini").load(PATH_ADMIN + "formularioArticulos.php?idM=" + idM);
        }
        else
        {
            alert("El campo admite solo números.");
            $("#precioArt").focus();
        }
	return false;
}

function submit(serialized, action)
{

	$.ajax
		({

			async:false,
			success: function(data)
			{	
				$(".divOculta").load(PATH_ADMIN + action + serialized);

				if (action == "agregarMueble.php?")
				{
					alert("El mueble ha sido cargado correctamente.");
					
				}
				else
				{
					$(".divOculta").show();
					setTimeout(function(){
						$('.divOculta').fadeOut();
					}, 2000);
				}
			}
		});
	return false;
}

function submitZonasEnvio(form)
{
    
    
    return false;
}

function guardarDatos()
{
    if(!(typeof($("input[name='zonaEnvio2']:checked").val()) === "undefined"))
    {
        sessionStorage['envio'] = $("input[name='zonaEnvio2']:checked").val(); 
    }
    if(!(typeof($("#nombreComprador").val()) === "undefined"))
    {
        sessionStorage['nomyape'] = $("#nombreComprador").val();
    }
    if(!(typeof($("#telefonoComprador").val()) === "undefined"))
    {
        sessionStorage['telefono'] = $("#telefonoComprador").val();
    }
    if(!(typeof($("#mailComprador").val()) === "undefined"))
    {
        sessionStorage['mail'] = $("#mailComprador").val();
    }
    if(!(typeof($("#direccionComprador").val()) === "undefined"))
    {
        sessionStorage['dir'] = $("#direccionComprador").val();
    }
    if(!(typeof($("#comentariosComprador").val()) === "undefined"))
    {
        sessionStorage['comentarios'] = $("#comentariosComprador").val();
    }
    if(!(typeof($("input[name='montoAPagar']:checked").val()) === "undefined"))
    {
        sessionStorage['pago'] = $("input[name='montoAPagar']:checked").val();
    }
}


////////////DOCUMENT READY//////////////////////////////

$(document).ready(function(){

	var refresh = setInterval(guardarDatos, 3000);
        $.ajaxSetup({ cache: false });


    
    $("#nombreComprador").val(sessionStorage['nomyape']);
    $("#telefonoComprador").val(sessionStorage['telefono']);
    $("#mailComprador").val(sessionStorage['mail']);
    $("#direccionComprador").val(sessionStorage['dir']);
    $("#comentariosComprador").val(sessionStorage['comentarios']);
    $("input[name='montoAPagar'][value="+sessionStorage['pago']+"]").click();


	$(document).scroll( function() {
        isScrolling = true;
        scrollPosition = this.scrollTop;
    });
	
	//$("#listaArticulos").disableSelection(); no permite seleccionar texto
		
	suma = 0;
	$(".importe").each( function(){
		suma += Number( $(this).text());
	});
	$(".totalproductos").text("$"+suma);
        var presupuestoTope = Number($(".selectCarrito input:selected").attr("data"));
        if(suma<presupuestoTope)
            {
                $(".envios").text("$"+$(this).val());
                var envio = Number($(".selectCarrito").val());
            }
            else
            {
                $(".envios").text("$"+0);
                var envio = 0;
            }
	//var envio = Number($(".selectCarrito").val());
	total = Number(suma + envio) ;
        
	$(".pasta").text("$"+total);
	var porcentaje = Math.round(total / 100 * PAGO_ADELANTADO);

	$(".senia").text("$"+porcentaje);
	var porcentage = Number($(".tipoDePago:checked").attr("data"));
		if (isNaN (porcentage))
		{
			porcentage = 1;
		}
	$(".aPagar").text("Usted deberá pagar $"+Math.round(total* porcentage));
	
	
	$(".selectCarrito").click( function(e){
            var tot = $(".totalproductos:first").text().substring(1,$(".totalproductos:first").text().length);
            var presupuestoTope = Number($(".selectCarrito:checked").attr("data"));
			var id = $(this).attr("id");
			$("#zonaOculta").val(id);

            if(tot<presupuestoTope)
            {
                $(".envios").text("$"+$(this).val());
                var envio = Number($(this).val());
            }
            else
            {
                $(".envios").text("$"+0);
                var envio = 0;
            }
		
		/*var suma = 0;
		$(".importe").each( function(){
			suma += Number( $(this).text());
		});*/
		total = Number(suma + envio) ;
		$(".pasta").text("$"+total);
		var porcentaje = Math.round(total / 100 * PAGO_ADELANTADO);
		$(".senia").text("$"+porcentaje);
		var porcentage = Number($(".tipoDePago:checked").attr("data"));
		if (isNaN (porcentage))
		{
			porcentage = 1;
		}
		$(".aPagar").text("Usted deberá pagar $"+Math.round(total* porcentage));
	});
	
	
	
	$(".inputCantidad").keyup( function(e){
		var cantidad = $(this).val();
		if (!isNaN(cantidad) && (cantidad.length<4) && cantidad != 0)
		{
			var importe = Math.abs(($(this).parent().next("td").attr("class")) * cantidad);
			$(this).parent().next("td").children().html(importe);
			suma = 0;
			$(".importe").each( function(){
				suma += Number( $(this).text());
			});
                        var presupuestoTope = Number($(".selectCarrito:checked").attr("data"));
                        if(suma<presupuestoTope)
                        {
                            $(".envios").text("$"+$(".selectCarrito:checked").val());
                            var envio = Number($(".selectCarrito:checked").val());
                        }
                        else
                        {
                            $(".envios").text("$"+0);
                            var envio = 0;
                        }
            
                   	$(".totalproductos").text("$"+suma);
			//var envio = Number($(".selectCarrito").val());
			total = suma + envio ;
			$(".pasta").text("$"+total);
			var porcentage = Number($(".tipoDePago:checked").attr("data"));
			if (isNaN (porcentage))
			{
				porcentage = 1;
			}
			$(".aPagar").text("Usted deberá pagar $"+Math.round(total* porcentage));
			var porcentaje = Math.round(total / 100 * PAGO_ADELANTADO);
			$(".senia").text("$"+porcentaje);
			
		}
	});
	
	$(".inputCantidad").change( function(e){
                e.preventDefault();
		var value = $(this).val();
                var idArt = $(this).attr("data");
		$("#actualizarCarrito").load(PATH_PHP+"actualizarCarrito.php?idArt="+idArt+"&cant="+value);
	});
	
	$("#pagoTotal").click( function(e){
		$(".aPagar").text(" Usted deberá pagar $"+ total);
	});
	
	$("#pagoSenia").click( function(e){
		$(".aPagar").text("Usted deberá pagar $"+ Math.round(total / 100 * PAGO_ADELANTADO) );
	});
	
	$(".mueblesDetalle").submit(function(e){
                e.preventDefault();
		$('.error').fadeOut();
		var validacion = false;
		$(".selection").each( function(){
				if ($(this).prop("checked"))
				{
					validacion = true;
				}
				
		});
		if (validacion == false)
		{
                    
                    $(this).find(".error").fadeIn();
                    return false;
                }
                else
                    {
                        var form = $(this);
                        var post_url = PATH_PHP + "agregarAlCarrito.php";
                        var post_data = form.serialize();
                        if(post_data != "")
                        {
                            $.ajax({
                                type: 'POST',
                                url: post_url,
                                data: post_data,
                                success: function(msg)
                                {
                                    window.location.replace(PATH_HOME + "carrito");
                                }
                            });
                        }
                    }
	});
		
	
	
	/*
        $(".mueblesDetalle").submit(function(e){
            e.preventDefault();
            var form = $(this);
            var post_url = "agregarAlCarrito.php";
            var post_data = form.serialize();
            if(post_data != "")
            {
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    data: post_data,
                    success: function(msg)
                    {
                        window.location.replace(PATH_PHP + "carrito.php");
                    }
                });
            }
        });
        */
        $(".formArticuloModificar").submit(function(e){
            e.preventDefault();
            var form = $(this);
            var iM = form.attr('data');
            var post_url = 'modificarArticulo.php';
            var post_data = form.serialize();
            $.ajax({
                    type: 'POST',
                    url: post_url,
                    data: post_data,
                    success: function(msg){
                            alert(msg);
                            $(".formularioArticulosMini").load(PATH_ADMIN + "formularioArticulos.php?idM=" + iM);
                    }
            });
			return false;
        });
        
        $(".formAdmin").submit(function(e){
			e.preventDefault();
			var form = $(this);
			var post_url = form.attr("action");
			var post_data = form.serialize();
					$.ajax({
						type: 'POST',
						url: post_url,
						data: post_data,
						success: function(msg){
										if(msg == '9okey')
										{
											window.location.replace(PATH_ADMIN+"listaArticulos.php");
										}
										else
										{
											alert(msg);
										}
						}
					});
			return false
		});
        
        $("#formZonasEnvio").submit(function(e){
            e.preventDefault();
            var form = $(this);
            var url = PATH_ADMIN + "modificarEnviosProcesar.php";
            var post_data = form.serialize();
            $.ajax({
                async: false,
                type: "POST",
                url: url,
                data: post_data,
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });
        });
	/*
	modulo para seleccionar checkbox arrastrando
	*/
	/*
	var mouseIsDown;
	
	$(document).bind('mousedown', function() {    
		mouseIsDown = true;
	});

	$(document).bind('mouseup', function() {
		mouseIsDown = false;
	});

	$('td').bind('mouseenter', function() {
		//console.log(mouseIsDown);
		
		if(mouseIsDown) {
			var check = $(this).find('input[type=checkbox]');
			if (check.prop('checked') == false)
			{
				check.prop('checked', true);
			}
			else
			{
				check.prop('checked', false)
			}
		}
	});
	*/
	///////////////

	/*
	seleccionar todos clickeando el select de arriba
	*/
	$("#seleccionarTodos").mouseup( function(e){
		if ($(this).prop("checked"))
		{
			$(".seleccion").each( function(){
				$(this).prop("checked", false);
			});
		}
		else
		{
			$(".seleccion").each( function(){
				$(this).prop("checked", true);	
			});
		}
	});
	//////
	

	
	/*
	calcular porcentajes
	*/
	$("#calcular").click( function(e){
		e.preventDefault();
		var porcentaje = parseFloat($(".porcentaje").val());
		if( isNaN(porcentaje))
		{
			alert("El campo calcular está vacío");
		}
		else
		{
			$(".precio").each( function(){
				var val = $(this).attr("id");
				var precio = val.substring(1, val.length)
				var op = Number((precio/100) *  porcentaje);
				var op1 = Math.round(op);
				$(this).val("$"+op1);
			});
		}
	});
	///////////////////////

	
	
	$(".precio").click( function(){
		$(this).parent().parent().find("td .seleccion").prop("checked", true);
	});
	/*
	reemplaza input select stock por imagenes
	*/
	$(".stock").click( function(e){
		$(this).parent().find("td .seleccion").prop("checked", true);
	
		var value = $(this).find("input").attr("value");
		switch(value)
		{
		case "D":
		  $(this).find("img").attr("src", PATH_IMAGES + "tildeVerde.png");
		  $(this).find("input").attr("value", "S");
		  break;
		case "S":
		  $(this).find("img").attr("src", PATH_IMAGES + "tildeAmarillo.png");
		  $(this).find("input").attr("value", "M");
		  break;
		case "M":
		  $(this).find("img").attr("src", PATH_IMAGES + "tildeNaranja.png");
		  $(this).find("input").attr("value", "C");
		  break;
		case "C":
		  $(this).find("img").attr("src", PATH_IMAGES + "consulte.png");
		  $(this).find("input").attr("value", "D");
		  break;
	
		default:
		  alert ("error");
		}
		return false;
	});
	//////////////

	$("#listaArticulos").submit( function(e){
		e.preventDefault();
		$(".stock").attr("type", "hidden");
		var serialized = $(this).serialize(); 
		submit(serialized, "listadoArticulosProcesar.php?");
		return false;
	});
        
        
	
	$("#formAlta").submit( function(e){
		e.preventDefault();
		var serialized = $(this).serialize();
		submit(serialized, "agregarMueble.php?");
		return false;
	});
	
	$(".formArticulo").submit( function(e){
		$.ajaxSetup({
		  async: false
		});
		e.preventDefault();
		var serialized = $(this).serialize();
		submit(serialized, "agregarArticulo.php?");
		var idM = $(".formularioArticulosMini").attr("id");
		$(".formularioArticulosMini").load(PATH_ADMIN + "formularioArticulos.php?idM=" + idM);
		return false;
	});
        
    $("#formConsulta").submit( function(e){
		e.preventDefault();
		serialized = $(this).serialize();
		$.ajax
			({
				async:false,
				success: function(data)
				{
					
					$(".divOculta").load(PATH_HTML + "envia-consulta.php?"+ serialized);
					
				}
			});
	});


/*
 * ESTA PARTE ES PARA EL FORMULARIO DEL CARRITO FINAL..
 */

$("#pagarBanco").click(function(){
	$("#loading").html('<img src="'+ PATH_IMAGES +'loading.gif" /> <br>Espere un momento por favor...');
	$("#loading").show( function()
	{
		$(".formFinalCarrito").attr("action",PATH_PHP+"controladorCarrito.php?f=w%w");
		submitPagarBanco();
	});
	setTimeout(function(){
					$("#loading").hide();
				}, 4000);
	


});
$("#depositar").click(function(){
	$("#loading").show( function(){
		 $(".formFinalCarrito").attr("action",PATH_PHP+"controladorCarrito.php?f=k%k");
		submitDepositar();
	});
	setTimeout(function(){
					$("#loading").hide();
				}, 4000);
   

});
	
	
	$(".botonRadio").change(function() {
		
		var id = $(this).attr("id");
		$(".seleccionaMueble").empty();
		$(".seleccionaMueble").load(PATH_ADMIN + "mueblesDinamicos.php?id=" + id);
		$("#formularioFotos").empty();
		return false;
	});
	
	$(".seleccionaMueble").change(function() {
		var id = $(this).val();
                $.ajax
			({
				success: function()
				{
					$("#formularioFotos").load(PATH_ADMIN + "formularioFotos.php?idM=" + id);
				}
			});
		return false;
	});
	
	//convierte en acordeon la tabla de cada producto
	$( ".acordeon" ).accordion({
		header: ".category",
		active: false,
		collapsible: true
    });
	
	
	

	//el boton eliminar llama dinamicamente a la funcion eliminar
	$(".eliminar").click( function(e){
		e.preventDefault();
		var id = $(this).attr("id");
		eliminar(id);
		return false;
	});
        
        $(".eliminarMueble").one('click',function(e){
            e.preventDefault();
            var id = $(this).attr("data");
            var text = "¿Está seguro que desea eliminar el mueble?";
            var post_url = "borrarMueble.php?idMueble="+id;
            if (id != null)
            {
                if (confirm(text)) {
                    $.ajax({
                            type: 'GET',
                            url: post_url,
                            success: function(msg){
                                if(msg == 'El mueble se eliminó correctamente.')
                                {
                                    window.location.replace(PATH_ADMIN+"modificacion.php");
                                }
                                else
                                {
                                    alert(msg);
                                }
                            }
                    });
                }
            }

                    
        });
	
        $(".eliminarCarrito").click(function(e){
            e.preventDefault();
            var idArt = $(this).attr("data");
            var url = PATH_PHP+"borrarDelCarrito.php?idArt="+idArt;
            $.ajax({
                url: url,
                success: function(){
                    window.location.replace(PATH_HOME+"carrito");
                }
            });
        });
        
        $(".btnAgregarProd").click(function(e){
            e.preventDefault();
           var url = $(this).attr("data");
           window.location.replace(url);
        });
        
	$('#fotoChica').previewInputFileImage();
	$('#fotoMediana').previewInputFileImage();
	$('#fotoGrande').previewInputFileImage();
	
	/////////////////////////////////////////////////////////////////EUGE//////////////////////////////
	
	/* activa carrousel de la home */
	$('.sliderHome').bxSlider({
		slideWidth: 0,
		minSlides: 2,
		maxSlides: 3,
		slideMargin: 3
	});

	/* activa carrousel de catálogo */ 
	$('.sliderCatalogo').bxSlider({ 
		slideWidth: 0,
		minSlides: 2,
		maxSlides: 3,
		slideMargin: 3
	});

	/* abre lightbox de catálogo */
	$(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
	
	/* abre lightbox de consulta */
	$("a#inline").fancybox({ 
			'hideOnContentClick': true
	});
	
}); //CIERRA EL DOCUMENT READY