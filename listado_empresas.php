<div id="content">     
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar1" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar1" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;DATOS DE LA EMPRESA</p><div  id="mensajeDATOSCORP"><div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $ROWDATOSEMPRESA; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $ROWDATOSEMPRESA; ?>%</div>
								</div></div></strong>
	        <div id="target1" style="display:block;"  class="content2">
        <div class="card">
          <div class="card-body">
	<form class="row g-3 needs-validation was-validated" novalidate="" id="DATOSCORP1form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
 
              <table class="table mb-0 table-striped">

                <tr>
            
                <th style="text-align:center" scope="col">  DATOS DE LA EMPRESA</th>
                 </tr></table>

                            
                            
                 
 
 
           
                              <table><tr>
                               <th style="text-align:center" scope="col"></th>
                               <th style="text-align:center" scope="col">INFORMACIÓN O ARCHIVO</th>
                       
                           
                               </tr>
                
                               <tr>
                    <th style="background:#ebf8fa;width: 500px; text-align:left" scope="col">NOMBRE FISCAL O RAZÓN SOCIAL DE LA EMPRESA:</th>
                    <td  style="background:#ebf8fa;width: 500px"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NFE_INFORMACION; ?>" name="NFE_INFORMACION"></td>
       
                    </tr>

               
                    <tr>
                    <th style="background:#ebf8fa; text-align:left" scope="col">NOMBRE COMERCIAL DE LA EMPRESA:</th>
                    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NCE_INFORMACION; ?>" name="NCE_INFORMACION"></td>

                    </tr>
                    
                    <tr>
                    <th style="background:#ebf8fa; text-align:left" scope="col">INICIALES DE LA EMPRESA:</th>
                    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $NCE_OBSERVACIONES; ?>" name="NCE_OBSERVACIONES"></td>

                    </tr>
                    <tr>
                    <th style="background:#ebf8fa; text-align:left" scope="col">RFC:</th>
                    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $RFC_INFORMACION; ?>" name="RFC_INFORMACION"></td>

                    </tr>
          
                    <tr>
                    <th style="background:#ebf8fa; text-align:left" scope="col">GIRO DE LA EMPRESA:</th>
                    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $GDE_INFORMACION; ?>" name="GDE_INFORMACION"></td>

                    </tr>


    </table>
      <table class="table mb-0 table-striped">
                    <tr style="background:#fefac0;">
                    <th style="text-align:center" scope="col">OBSERVACIONES</th>
                    <td ><textarea style="width:400px;" name="NFE_OBSERVACIONES" class="form-control" aria-label="With textarea"><?php echo $NFE_OBSERVACIONES; ?></textarea></td><br></br>
                               <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>
                               <td style="background:#faebee"> <input type="text" style="width:200px;" class="form-control" id="validationCustom01"  value="<?php echo date('Y-m-d'); ?>" name="NFE_FECHA_ULTIMACARGA"></td>
                               </tr>
                              </table>
    
       <input type="hidden" value="hDatosCorp" name="hDatosCorp"/>
      

        <table>
          <tr>       
       <th>
	                <button class="btn btn-sm btn-outline-success px-5"   type="button" id="guardarDATOSCORP">GUARDAR</button></th></tr>
                   </tr>
                    <tr>
                    </table>
                   <table>
                    <tr>
                
                    <td ><textarea style="width: 800px;px;" name="DCORP_ENVIAR_IMAIL" class="form-control" aria-label="With textarea"><?php echo $DCOP_ENVIAR_IMAIL; ?></textarea></td><br></br>
                      <th> <button class="btn btn-sm btn-outline-success px-5"  type="button" id="enviarimailVACACIONES">ENVIAR POR IMAIL</button></th>   
                 
                  </tr>
                    </table>
					</form>
						 
                          </div>
                     
					                
                         </div>
                       
               </div>
              </div>