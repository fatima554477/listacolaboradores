<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
//select.php  CONTRASENA_DE1
//select.php  CONTRASENA_DE1
echo $identioficador = isset($_POST["personal_id"])?$_POST["personal_id"]:'';
if($identioficador != '')
{
 $output = '';
	require "../colaboradores/controlador.php";
	$conexion = NEW colaboradores();

$queryVISTAPREV = $conexion->Listado_colaborador1($identioficador);
$ide =$conexion->revisar_01empresapertenece2($identioficador);

$ROWlistado1 = $conexion->variablesusuario($identioficador);
$DEPARTAMENTO = isset($ROWlistado1["DEPARTAMENTO"])?$ROWlistado1["DEPARTAMENTO"]:"";

$PUESTO = isset($ROWlistado1["PUESTO"])?$ROWlistado1["PUESTO"]:"";
$STATUS_CARGA_INFORMACION = isset($ROWlistado1["STATUS_CARGA_INFORMACION"])?$ROWlistado1["STATUS_CARGA_INFORMACION"]:"";
$PERMISOS = isset($ROWlistado1["PERMISOS"])?$ROWlistado1["PERMISOS"]:"";
$idrow = isset($ROWlistado1["id1"])?$ROWlistado1["id1"]:"";

 $output .= '<div id="respuestaser"></div>
 <form  id="listadocolaboradoresform"> 
      <div class="table-responsive">  
           <table class="table table-bordered" style="font-size:14px;">';
    while($row = mysqli_fetch_array($queryVISTAPREV))
    {
        $querySTATUS = $conexion->desplegables07('LISTADO_COLABORADORES','PUESTO');
        $opcionesstatus = '';
        $fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
        $num = 0;
        
        while($rowSTATUS = mysqli_fetch_array($querySTATUS)) {
            $selected = ($row["PUESTO"] == $rowSTATUS['nombre_campo']) ? 'selected' : '';
            $color = $fondos[$num % count($fondos)];
            $opcionesstatus .= '<option style="background: #'.$color.'" '.$selected.' value="'.$rowSTATUS['nombre_campo'].'">'.strtoupper($rowSTATUS['nombre_campo']).'</option>';
            $num++;
        }
		
		
		
		        $querySTATUSDEPA = $conexion->desplegables07('LISTADO_COLABORADORES','DEPARTAMENTO');
        $opcionesstatusDEPA = '';
        $fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
        $num = 0;
        
        while($rowSTATUSDEPA = mysqli_fetch_array($querySTATUSDEPA)) {
            $selected = ($row["DEPARTAMENTO"] == $rowSTATUSDEPA['nombre_campo']) ? 'selected' : '';
            $color = $fondos[$num % count($fondos)];
            $opcionesstatusDEPA .= '<option style="background: #'.$color.'" '.$selected.' value="'.$rowSTATUSDEPA['nombre_campo'].'">'.strtoupper($rowSTATUSDEPA['nombre_campo']).'</option>';
            $num++;
        }

	$encabezado1a = '';$option1a='';
	$queryper = $conexion->lista_empresacolaborador();
	$encabezado1a = '<select class="form-select mb-3" aria-label="Default select example" id="id_empresa" required="" name="id_empresa">
	<option value="">SELECCIONA UNA OPCIÓN</option>';
	/*linea para multiples colores*/
	$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
	$num = 0;
	/*linea para multiples colores*/	
	while($row1 = mysqli_fetch_array($queryper))
	{
	/*linea para multiples colores*/
	if($num==8){$num=0;}else{$num++;}
	/*linea para multiples colores*/		
	$select='';
	if($ide==$row1['id']){$select = "selected";};

	$option1a .= '<option style="background: #'./*linea para multiples colores*/$fondos[$num]./*linea para multiples colores*/'" '.$select.' value="'.$row1['id'].'">'.$row1['NFE_INFORMACION'].'</option>';
	}
	$encabezado1a.$option1a.'</select>';
/**//**//**//**//**//**//**//**//**//**//**//**/


 $var=' <select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" required="" name="DEPARTAMENTO">
	<option selected="">SELECCIONA UNA OPCIÓN</option>
	<option style="background: #c9e8e8"';
	if($DEPARTAMENTO=="DIRECCION"){$var .= " selected";} 
	$var .=  ' value="DIRECCION">DIRECCIÓN</option>
	<option style="background: #a3e4d7"';
	if($DEPARTAMENTO=="VENTAS"){ $var .= " selected";} 
	$var .=  ' value="VENTAS">VENTAS</option>
	<option style="background: #e8f6f3"';
	if($DEPARTAMENTO=="OPERACIONES"){$var .= " selected";} 
	$var .=  ' value="OPERACIONES">OPERACIONES</option>
	<option style="background: #fdf2e9"';
	if($DEPARTAMENTO=="DISENO"){$var .= " selected";} 
	$var .=  ' value="DISENO">DISEÑO</option>
	<option style="background: #eaeded"';
	if($DEPARTAMENTO=="VUELOS"){$var .= " selected";} 
	$var .=  ' value="VUELOS">VUELOS</option>
	<option style="background: #fdebd0"';
	if($DEPARTAMENTO=="SISTEMAS"){$var .= " selected";} 
	$var .=  ' value="SISTEMAS">SISTEMAS</option>
	<option style="background: #ebdef0"';
	if($DEPARTAMENTO=="BACK_STAGE"){$var .= " selected";} 
	$var .=  ' value="BACK_STAGE">BACK STAGE</option>
	<option style="background: #d6eaf8"';
	if($DEPARTAMENTO=="ADMINISTRACION"){$var .= " selected";}
	$var .=  ' value="ADMINISTRACION">ADMINISTRACION</option>
	<option style="background: #fef5e7"';
	if($DEPARTAMENTO=="AUDITORIA"){$var .= " selected";}
	$var .=  ' value="AUDITORIA">AUDITORIA</option>
	<option style="background: #ebedef"';
	if($DEPARTAMENTO=="CONTABILIDAD"){$var .= " selected";} 
	$var .=  ' value="CONTABILIDAD">CONTABILIDAD</option>
	<option style="background: #fbeee6"';
	if($DEPARTAMENTO=="CAPITAL_HUMANO"){$var .= " selected";}
	$var .=  ' value="CAPITAL_HUMAN">CAPITAL HUMANO</option>
	<option style="background: #e8f6f3"';
	if($DEPARTAMENTO=="RECEPCION"){$var .= " selected";}
	$var .=  ' value="RECEPCION">RECEPCIÓN</option>
	<option style="background: #c9e8e8"';
	if($DEPARTAMENTO=="LIMPIEZA"){$var .= " selected";}
	$var .=  ' value="LIMPIEZA">LIMPIEZA</option>
	</select>';




/**//**//**//**//**//**//**//**//**//**//**//**/




 $var_puesto =' <select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" required="" name="PUESTO"> 
<option selected="">SELECCIONA UNA OPCIÓN</option>
<option style="background: #c9e8e8"';
if($PUESTO=='TSA_TRAVEL_SERVICES_AUDIT'){$var_puesto .=" selected ";} 
$var_puesto .= 'value="TSA_TRAVEL_SERVICES_AUDIT">TSA-TRAVEL SERVICES AUDIT</option>	  
<option style="background: #a3e4d7"';
if($PUESTO=='BRA_BUDGET_RISK_AUDIT'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="BRA_BUDGET_RISK_AUDIT">BRA-BUDGET, RISK & AUDIT</option>						  
<option style="background: #e8f6f3"';
if($PUESTO=='AM_AUDIT_MANAGER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="AM_AUDIT_MANAGER">AM-AUDIT MANAGER </option>						  
<option style="background: #eaeded"';
if($PUESTO=='HK_HOUSE_KEEPING'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="HK_HOUSE_KEEPING">HK-HOUSE KEEPING </option>						  
<option style="background: #fdebd0"';
if($PUESTO=='ES_EXECUTIVE_SERVICES'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="ES_EXECUTIVE_SERVICES">ES-EXECUTIVE SERVICES </option>					  
<option style="background: #ebdef0"';
if($PUESTO=='TCM_TALENT_AND_CULTURE_MANAGER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="TCM_TALENT_AND_CULTURE_MANAGER">TCM-TALENT AND CULTURE MANAGER</option>
<option style="background: #d6eaf8"';
if($PUESTO=='IPM_IT_PROJECT_MANAGER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="IPM_IT_PROJECT_MANAGER">IPM-IT PROJECT MANAGER </option>					  
<option style="background: #fef5e7"';
if($PUESTO=='BANKING_MANAGER' ){$var_puesto .=" selected ";}
 $var_puesto .= 'value="BANKING_MANAGER">CBM-CORPORATE BANKING MANAGER </option>					  
<option style="background: #ebedef"';
if($PUESTO=='FINANCIAL_PLANNING'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="FINANCIAL_PLANNING">FP-FINANCIAL PLANNING </option>					  
<option style="background: #fbeee6"';
if($PUESTO=='FAM_FINANCE_ACCOUTING'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="ACCOUTING_MANAGER FAM_FINANCE_ACCOUTING">FAM-FINANCE & ACCOUTING MANAGER </option>
<option style="background: #e8f6f3"';
if($PUESTO=='CFO_CHIEF_FINANCIAL OFFICER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="CFO_CHIEF_FINANCIAL">CFO-CHIEF FINANCIAL OFFICER </option>				  
<option style="background: #c9e8e8"';
if($PUESTO=='BSS_BACK_STAGE_STAFF'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="BSS_BACK_STAGE_STAFF">BSS-BACK STAGE STAFF </option>					  
<option style="background: #c9e8e8"';
if($PUESTO=='BSC_BACK_STAGE_COORDINATOR'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="BSC_BACK_STAGE_COORDINATOR">BSC-BACK STAGE COORDINATOR </option>					  
<option style="background: #a3e4d7"';
if($PUESTO=='BSM_BACK_STAGE_MANAGER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="BSM_BACK_STAGE_MANAGER">BSM-BACK STAGE MANAGER </option>					  
<option style="background: #e8f6f3"';
if($PUESTO=='OSEC_ON_SITE_EVENT_COORDINATOR'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="OSEC_ON_SITE_EVENT_COORDINATOR">OSEC-ON SITE EVENT COORDINATOR</option>					  
<option style="background: #fdf2e9"';
if($PUESTO=='CM_CREATIVE_MANAGER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="CM_CREATIVE_MANAGER">CM-CREATIVE MANAGER </option>					  
<option style="background: #eaeded"';
if($PUESTO=='CCL_CALL_CENTER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="CCL_CALL_CENTER">CCL-CALL CENTER</option>					  
<option style="background: #fdebd0"';
if($PUESTO=='JPM_JUNIOR_PROJECT_MANAGER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="JPM_JUNIOR_PROJECT_MANAGER"> JPM-JUNIOR PROJECT MANAGER </option>					  
<option style="background: #c9e8e8"';
if($PUESTO=='PM_PROJECT_MANAGER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="PM_PROJECT_MANAGER">PM-PROJECT MANAGER  </option>					  
<option style="background: #a3e4d7"';
if($PUESTO=='KAPM_KEY_ACCOUNTS_PROJECT_MANAGER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="KAPM_KEY_ACCOUNTS_PROJECT_MANAGER">KAPM-KEY ACCOUNTS PROJECT MANAGER </option>				  
<option style="background: #e8f6f3"';
if($PUESTO=='SPM_SENIOR_PROJECT_MANAGER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="SPM_SENIOR_PROJECT_MANAGER">SPM-SENIOR PROJECT MANAGER </option>				  
<option style="background: #fdf2e9"';
if($PUESTO=='CM_COMMERRCIAL_MANAGER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="CM_COMMERRCIAL_MANAGER">CM-COMMERRCIAL MANAGER </option>				  
<option style="background: #eaeded"';
if($PUESTO=='CBDO_CHIEF_BUSINESS_CCO_CHIEF'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="CBDO_CHIEF_BUSINESS_CCO_CHIEF">CBDO-CHIEF BUSINESS & CCO-CHIEF COMMERCIAL OFFICER </option>					  
<option style="background: #fdebd0"';
if($PUESTO=='CO_FOUNDER_CEO'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="CO_FOUNDER_CEO">CO-FOUNDER & CEO </option>					  
<option style="background: #fdebd0"';
if($PUESTO=='CEO_CHIEF_EXECUTIVE_OFFICER'){$var_puesto .=" selected ";}
 $var_puesto .= 'value="CEO_CHIEF_EXECUTIVE_OFFICER">CEO-CHIEF EXECUTIVE OFFICER</option>
</select>';



/**//**//**//**//**//**//**//**//**//**//**//**/


$var_CARGA_INFORMACION = '<select class="form-select" name="STATUS_CARGA_INFORMACION" id="inputGroupSelect04" required="">
<option ></option>
<option ';
if($STATUS_CARGA_INFORMACION=='ANIMADOR_COORDINADOR'){  $var_CARGA_INFORMACION .= " selected "; }
$var_CARGA_INFORMACION .= 'value="ANIMADOR_COORDINADOR">ANIMADOR/COORDINADOR</option>
<option ';
if($STATUS_CARGA_INFORMACION=='COLABORADOR'){   $var_CARGA_INFORMACION .=  " selected "; }
  $var_CARGA_INFORMACION .= 'value="COLABORADOR">COLABORADOR</option>
</select>';



/**//**//**//**//**//**//**//**//**//**//**//**/




	$encabezado = '';$option2 = '';
	$queryper = $conexion->lista_plantillas2();
	$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="PERMISOS" required="" name="PERMISOS">
	<option value="">SELECCIONA UNA OPCIÓN</option>';

	/*linea para multiples colores*/
	$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
	$num = 0;
	/*linea para multiples colores*/
	
	while($row1 = mysqli_fetch_array($queryper))
	{

		/*linea para multiples colores*/
	if($num==8){$num=0;}else{$num++;}
	/*linea para multiples colores*/		
		
	$select='';
	if($PERMISOS==$row1['nombreplantilla']){$select = "selected";};

	$option2 .= '<option style="background: #'./*linea para multiples colores*/$fondos[$num]./*linea para multiples colores*/'" '.$select.' value="'.$row1['nombreplantilla'].'">'.$row1['nombreplantilla'].'</option>';
	}
	$encabezado.$option2.'</select>';		
	
	
/**//**//**//**//**//**//**//**//**//**//**//**/

	
	
	
     $output .= '
	 
	 <tr>
	 <td width="30%"><strong><label style="color:red;">USUARIO</label></strong></td>
	 <td width="70%">
	 <input type="text" value="'.$row["USUARIO_CRM"].'" disabled>
	 <input type="hidden" name="USUARIO_CRM" value="'.$row["USUARIO_CRM"].'">
	 </td>
	 </tr> 

	 <tr>
	 <td width="30%"><strong><label style="color:red;">CONTRASEÑA</label></strong></td>
	 <td width="70%"><input type="text" name="CONTRASENIA_CRM" value="'.$row["CONTRASENIA_CRM"].'"></td>
	 </tr> 
	 
	 <tr>
	 <td width="30%"><strong><label>EMPRESA A LA QUE PERTENECE:</label></strong></td>
	 <td width="70%">
	'.$encabezado1a.$option1a.'</select>
	 </td>
	 </tr> 
	 
	 <tr>
      <tr>
            <th><strong><label>DEPARTAMENTO:</label></strong></th>
            <td>
                <select  style="background:#daddf5" name="DEPARTAMENTO" required>
                    <option value="">SELECCIONA UNA OPCIÓN</option>
                    '.$opcionesstatusDEPA.'
                </select>
            </td>
        </tr>
	 
      <tr>
            <th><strong><label>PUESTO:</label></strong></th>
            <td>
                <select  style="background:#daddf5" name="PUESTO" required>
                    <option value="">SELECCIONA UNA OPCIÓN</option>
                    '.$opcionesstatus.'
                </select>
            </td>
        </tr>
			 <tr>
	 <td width="30%"><strong><label style="color:red;">CORREO PERSONAL:</label></strong></td>
	 <td width="70%"><input type="text" name="CORREO_1" value="'.$row["CORREO_1"].'"></td>
	 </tr>
	 
	 <tr>
	 <td width="30%"><strong><label >CORREO LABORAL:</label></strong></td>
	 <td width="70%"><input type="text" name="CORREO_4" value="'.$row["CORREO_4"].'"></td>
	 </tr>
	 
	 <tr>
	 <td width="30%"><strong style="color:red;"><label>NOMBRE 1</label></strong></td>
	 <td width="70%"><input type="text" name="NOMBRE_1" value="'.$row["NOMBRE_1"].'"></td>
	 </tr>
	 
	 <tr>
	 <td width="30%"><strong><label>NOMBRE 2</label></strong></td>
	 <td width="70%"><input type="text" name="NOMBRE_2" value="'.$row["NOMBRE_2"].'"></td>
	 </tr>
	 
	 <tr>
	 <td width="30%"><strong><label>APELLIDO PATERNO</label></strong></td>
	 <td width="70%"><input type="text" name="APELLIDO_PATERNO" value="'.$row["APELLIDO_PATERNO"].'"></td>
	 </tr>
	 
	 <tr>
	 <td width="30%"><strong><label>APELLIDO MATERNO</label></strong></td>
	 <td width="70%"><input type="text" name="APELLIDO_MATERNO" value="'.$row["APELLIDO_MATERNO"].'"></td>
	 </tr> 
	 
	 
	 <tr>
	 <td width="30%"><strong><label style="color:red;">STATUS DE CARGA INFORMACIÓN</label></strong></td>
	 <td width="70%">
	 '.$var_CARGA_INFORMACION.'
	 </td>
	 </tr> 


	 <tr>
	 <td width="30%"><strong><label>PERMISO DE</label></strong></td>
	 <td width="70%">
	 '.$encabezado.$option2.'</select>
	 </td>
	 </tr> 
	 



	 <tr>  
            <td width="30%"><strong><label>GUARDAR</label></strong></td>  
            <td width="70%">
			
			<input type="hidden" name="listado" value="listado">
	 <input type="hidden" name="idrow" value="'.$idrow.'">
	 
<button class="btn btn-sm btn-outline-success px-5"  type="button" id="enviarLISTADO2">GUARDAR</button>
			<!--enviarLISTADO-->
			<input type="hidden" value="enviarcolaboradoresG"  name="enviarcolaboradoresG"/>
			</td>  
        </tr>

	 <tr>  
            <td width="30%"><strong><label>GUARDAR Y ENVIAR CORREO</label></strong></td>  
            <td width="70%"><button class="btn btn-sm btn-outline-success px-5"  type="button" id="enviarLISTADOCorreo2">GUARDAR Y ENVIAR</button>
			<!--enviarLISTADOCorreo-->
			<input type="hidden" value="enviarcolaboradoresGE"  name="enviarcolaboradoresGE"/>
			</td>  
        </tr>



     ';
    }
    $output .= '</table></div><div id="respuestacargando"></div></form>';
    echo $output;
}
//
?>


<script>
$(document).ready(function(){
    // Función común para manejar el envío AJAX
    function enviarFormulario(mandarCorreo) {
        var formulario = $("#listadocolaboradoresform").serializeArray();
        formulario.push({ name: "mandacorreo", value: mandarCorreo });
        
        $.ajax({
            type: "POST",
            url: "colaboradores/controlador.php",
            data: formulario,
            beforeSend: function() {
                $("#respuestacargando").html('CARGANDO...');
            },
        }).done(function(respuesta){
            if (respuesta.includes("id='ERROR'")) {
                $("#respuestacargando").html(respuesta);
            } else {
                // ACTUALIZA EL CONTENIDO DEL MODAL CON LA RESPUESTA
                $("#personal_detalles").html(respuesta);
                
                // Recarga solo la tabla externa (fuera del modal)
                $("#reset").load(location.href + " #reset");
                
                // Actualiza el mensaje principal SIN cerrar el modal
                $("#mensajeLISTADO").html("Datos actualizados correctamente");
            }
        });
    }

    // Delegación de eventos para los botones dentro del modal
    $(document).on('click', '#enviarLISTADO2', function(){
        enviarFormulario('no');
    });

    $(document).on('click', '#enviarLISTADOCorreo2', function(){
        enviarFormulario('si');
    });
    
    // Botón para cerrar manualmente el modal
    $(document).on('click', '#btnCerrarManual', function(){
        $('#dataModal').modal('hide');
    });
});
</script>