<?php 
	require_once("zet_seg.php");
	$cn_zet = conectar();
	mysqli_query($cn,"SET CHARACTER SET utf8");
	mysqli_query($cn,"SET NAMES utf8");
	$vsql = "call zyz_Man_Usuario ('','','','','',0,'','','','',0,'1900-01-01','','','','','','','','','','C')";
	#echo $vsql;
	$rs = mysqli_query($cn_zet,	$vsql);			
	$contador = 0;
?>
<table class="table table-striped"> 
	<thead>
    <tr>
        <th width="4%" style="text-align: center">
            <strong>Nro.</strong>
        </th>
        <th style="text-align: center">
            <strong>Nombre completo</strong>
        </th>
        <th width="13%" style="text-align: center">
            <strong>Usuario</strong>
        </th>
        <th width="22%" style="text-align: center">
            <strong>Perfil</strong>
        </th>
        <th width="6%" style="text-align: center">
            <strong>Activo</strong>
        </th>											
        <th width="10%" style="text-align: center">
            <a class="btn btn-default" href="admi_usuario_nuevo.php?code=<?php echo md5(md5($usuario))?>&d=<?php echo $_REQUEST['d']?>&nav=<?php echo base64_encode(base64_decode($_REQUEST['nav']).',Nuevo')?>"><i class="fa fa-file-o"></i></a>
        </th>
    </tr>
    </thead>
    <?php				
    while ($rsjk=mysqli_fetch_row($rs))
        {
            $contador = $contador + 1;
            echo '<tr>';
                echo '<td align="center">';
                    echo $contador;
                echo '</td>';
                echo '<td align="left">';
					echo $rsjk[4];
                echo '</td>';						
                echo '<td align="center">';
                    echo $rsjk[5];
                echo '</td>';
                echo '<td align="center">';
                    echo $rsjk[7];
                echo '</td>';	
                echo '<td align="center">';
                    if ($rsjk[8]==1){
                        echo '<span class="blue_bg bg_space">';
                        echo 'Activo';
                        echo '</span>';
                    }
                    else
                    {
                        echo '<span class="red_bg bg_space">';
                        echo 'Inactivo';
                        echo '</span>';
                    }
                echo '</td>';													
                echo '<td align="center">';	
					$code = base64_encode(base64_encode($rsjk[0].$rsjk[1]));
					echo '<a class="btn btn-default" href="admi_usuario_modificar.php?d='. $_REQUEST['d'].'&nav='.base64_encode(base64_decode($_REQUEST['nav']).',Modificar').'&codigo='.$code.'"><i class="fa fa-edit"></i></a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-default" rel="nolink" href="admi_usuario_eliminar.php?d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'&codigo='.$code.'" data-mensaje="Esta seguro de eliminar el registro?"><i class="fa fa-ban"></i></a>';																				
                echo '</td>';																																													
            echo '</tr>';
        }
        mysqli_close($cn_zet);
    ?>										
</table>								
</form>