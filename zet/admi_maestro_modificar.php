<?php 
	require_once("zet_seg.php");
	$codigo = $_GET["codigo"];
	$clave = $_GET["clave"];
	$paginaactual = $_GET["paginaactual"];
	$vsql = "call zyz_Man_Maestro ('". $codigo . "','M','". $clave . "','',0)";		
	//echo $vsql;	
	$rs = mysqli_query($cn,	$vsql);	
	$numeroregistros = mysqli_num_rows($rs); 
	
	if ($numeroregistros > 0)
		{
			$row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
			$clave = $row["codigo"];
			$descripcion = $row["descripcion"];
			$activo = $row["activo"];
			$titulo = $row["titulo"];
			mysqli_data_seek($rs,0);
		}	
	$contador = 0;
?>  
<div class="row">
  <div class="block-web">
  <div class="header">
  	<div class="actions"> 
        <a data-atras="SI" href="admi_maestro.php?d=<?php echo $_REQUEST['d']?>&nav=<?php echo $nav?>&codigo=<?php echo $codigo;?>&paginaactual=<?php echo $paginaactual?>"><i class="fa fa-mail-reply"></i>
    	</a>
    </div>
    <h5 class="content-header"><?php echo $titulo;?></h5>
  </div>
  <div class="porlets-content">
    <form  name="form" class="form-horizontal row-border" method="post" id="frmcronmod" action="admi_maestro_grabar.php?d=<?php echo $_GET['d']?>&nav=<?php echo $_GET['nav']?>" onsubmit="grabar(this.id);return false;">
      <div class="form-group">
        <label class="col-sm-3 control-label">C&oacute;digo:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="Disabled Input" disabled="" value="<?php echo $clave; ?>">
        </div>
      </div><!--/form-group--> 
      
      <div class="form-group">
        <label class="col-sm-3 control-label">Descripci&oacute;n:</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" value="<?php echo $descripcion;?>" name="txtDescripcion" id="txtDescripcion" data-requerido="true" data-requerido-texto="Descripcion">
        </div>
      </div><!--/form-group--> 

	  <div class="form-group">
        <label class="col-sm-3 control-label">Activo:</label>
        <div class="col-sm-9">
        	<div class="checkbox">
            	<label>
                <input name="chkActivo" type="checkbox" id="chkActivo" onclick="this.value=gEsCasillaActiva(this.id);" value="<?php echo $activo?>" <?php if ($activo==1) {echo "checked";} ?>>
                <span class="custom-checkbox"></span>
                </label>
            </div>  
        </div>
      </div><!--/form-group--> 

      <div class="bottom">
        	<input name="hidCodigo" type="hidden" value="<?php echo $codigo;?>">
            <input name="hidClave" type="hidden" value="<?php echo $clave;?>">
            <input name="hidPaginaActual" type="hidden" value="<?php echo $paginaactual;?>">
            <input name="txtTipo" type="hidden" value="A">
            <input name="cmdGrabar" type="submit" value="Grabar" class="btn btn-primary">
      </div><!--/form-group-->
    </form>
  </div><!--/porlets-content-->
  </div>
</div>

<script>
function gEsCasillaActiva(idCasilla) {
    if (!document.getElementById(idCasilla)) {
        alert("El objeto no existe.\ngVerificaCasilla()");
    }
    return document.getElementById(idCasilla).checked ? "1" : "0";
}
</script>