	<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles2">

   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   </div>
  </div>
 </div>
</div>



<div id="dataModal" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles">
    
   </div>
   <div class="modal-footer">
   
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>
	

<!--NUEVO CODIGO BORRAR-->
<div id="dataModal3" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles3">
    ¿ESTÁS SEGURO DE BORRAR ESTE REGISTRO?
   </div>
   <div class="modal-footer">
          <span id="btnYes" class="btn confirm">SI BORRAR</span>	  
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>




<script type="text/javascript">


function genPass() {
    // define result variable 
    var Password = "";
    // define allowed characters
    var characters = "0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    // define length of password character
    var long = "8";
    for (var i = 0; i < long; i++) {
        // generate password
        gen = characters.charAt(Math.floor(Math.random() * characters.length));
        Password += gen;
    }
    // send the output to the input
    document.getElementById('CONTRASENIA_CRM').value = Password;
}
// Copy password button




function pasara1_persona45(pasara1_personal2_id){
	var checkBox = document.getElementById("pasarapersona45"+pasara1_personal2_id);
	var pasapersonal2_text = "";
	if (checkBox.checked == true){
		pasapersonal2_text = "si";
	}else{
		pasapersonal2_text = "no";
	}
	$.ajax({
		url:'colaboradores/controlador.php',
		method:'POST',
		data:{pasara1_personal2_id:pasara1_personal2_id,pasapersonal2_text:pasapersonal2_text},
		beforeSend:function(){
			$('#mensajeLISTADO').html('cargando');
		},
		success:function(data){
			$('#pasarapersona67'+pasara1_personal2_id).html(data);			
		}
	});
}




	$(document).ready(function(){

		
$("#enviarLISTADO").click(function () {
	var formulario = $("#LISTADOform").serializeArray();

	formulario.push({ name: "mandacorreo", value: 'no' });

	var mandacorreo = "no";
	$.ajax({
		type: "POST",
		url: "colaboradores/controlador.php",
		data: formulario,
	}).done(function (respuesta) {
		$('#LISTADOform')[0].reset();
		
		$("#mensajeLISTADO").html(respuesta).show(); // mostrar el mensaje

		// Ocultar después de 5 segundos
		setTimeout(function () {
			$("#mensajeLISTADO").fadeOut("slow");
		}, 2000);

		$('#target9').hide("linear");
		$("#reset").load(location.href + " #reset");
		$("#actualizalogo").load(location.href + " #actualizalogo");
	});
});


		$("#enviarLISTADOCorreo").click(function(){
		var formulario = $("#LISTADOform").serializeArray();
		
		formulario.push(
			{ name: "mandacorreo", value: 'si' }
		);
		
			$.ajax({
			type: "POST",
			url: "colaboradores/controlador.php",
			data: formulario,
		}).done(function(respuesta){
			$('#LISTADOform')[0].reset();
			if($.trim(respuesta) == 'Ingresado'){
		$("#mensajeLISTADO").html(respuesta).show(); // mostrar el mensaje

		// Ocultar después de 5 segundos
		setTimeout(function () {
			$("#mensajeLISTADO").fadeOut("slow");
		}, 2000);
		$('#target9').hide("linear");
		$("#reset").load(location.href + " #reset");
		$("#actualizalogo").load(location.href + " #actualizalogo");
			}else{
		$("#mensajeLISTADO").html(respuesta);
		$("#reset").load(location.href + " #reset");
		$("#actualizalogo").load(location.href + " #actualizalogo");
			}
			});
	});			

//NOMBRE DEL BOTÓN
$(document).on('click', '.view_datacolaboradoresmodifica', function() {
    var personal_id = $(this).attr('id');
    $.ajax({
        url: 'listacolaboradores/vistaprevia_colaboradores.php',
        method: 'POST',
        data: { personal_id: personal_id },
        beforeSend: function() {
            $('#mensajeLISTADO').html('cargando');
        },
        success: function(data) {
            $('#personal_detalles').html(data);
            $('#dataModal').modal('show');
            
            // Prevenir el cierre del modal al enviar formularios dentro de él
            $('#personal_detalles').on('submit', 'form', function(e) {
                e.preventDefault(); // Detiene el envío normal del formulario
                
                // Envía el formulario via AJAX
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: form.serialize(),
                    success: function(response) {
                        // Actualiza solo el contenido del modal
                        $('#personal_detalles').html(response);
                    }
                });
            });
        }
    });
});



$(document).on('click', '.view_datacolaborBORRAR', function(){
var borra_id = $(this).attr('id');
var borraCOLABORADOR = 'borraCOLABORADOR';
$('#personal_detalles3').html();
$('#dataModal3').modal('show');
$('#btnYes').click(function() {
$.ajax({
	url:"colaboradores/controlador.php",
method:'POST',
data:{borra_id:borra_id,borraCOLABORADOR:borraCOLABORADOR},
beforeSend:function(){
$('#mensajeLISTADO').html('cargando');
},
success:function(data){
$('#dataModal3').modal('hide');
$('#mensajeLISTADO').html("<span id='ACTUALIZADO' >"+data+"</span>");
  $('#reset').load(location.href + ' #reset');

}
});
});
});
			
<?php if($_GET['id']==true){ ?>
			$('#target9').show("linear");

<?php }else{ ?>
			$('#target9').hide("linear");

<?php } ?>

			$("#mostrar9").click(function(){
				$('#target9').show("swing");
		 	});
			$("#ocultar9").click(function(){
				$('#target9').hide("linear");
			});





		});
	</script>