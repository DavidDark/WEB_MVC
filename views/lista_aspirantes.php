<!-- VISTA LISTA ASPIRANTES-->
<!-- TODO: Sacar las funciones en un archvio controlador aparte-->
<!DOCTYPE html>
<html>
<head>
    <?php

    include_once "dependencias/inclusiones/meta_tags.php"; ?>
    <title>Catálogo de Cursos</title>
    <?php

    include_once "dependencias/inclusiones/css_y_favicon.php"; ?>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <?php
        include_once "dependencias/inclusiones/menu_horizontal_superior.php";
        ?>
    </div>
</div>


<!--<div class="container-fluid">  -->
<div class="container-fluid" style="margin-top: 65px !important;">  
<div class="form-group">
<legend class="text-center header"><h2>Lista de aspirantes a cursos de capacitación</h2></legend>
</div>

<?php  
include("../models/class_lista_aspirantes_cursos_dal.php");
$obj_lista_aspirantes_cursos=new lista_aspirantes_cursos_dal;

$result_lista_aspirantes_cursos=$obj_lista_aspirantes_cursos->get_datos_lista_aspirantes_cursos();

    if ($result_lista_aspirantes_cursos==NULL){

            print "<p>No se encontraron resultados de cursos</p>";
        }
        else{
/*
            print '<pre>';
            print_r($result_dato_catalogo_cursos);
            print '</pre>';
            return;
            */
?> 
<!--<table id="lista_cursos" class="table table-striped table-bordered text-center" border="0">-->
<div class="form-group col-md-12">

                    <div align="center">  
                          <button type="button" name="add" id="add" class="btn btn-primary">Agregar Aspirante a Curso</button>  
                     </div> 


<table id="lista_cursos" class="table table-striped table-bordered" border="0">
							<thead class="text-capitalize">
                                            <tr>
                                                <th>RFC</th>
                                                <th>Nombre Aspirante</th>
                                                <th>Paterno Aspirante</th>
                                                <th>Materno Aspirante</th>
                                                <th>Empresa</th>
                                                <th>Telefono</th>
                                                <th>Email</th>
                                                <th>Id Curso</th>
                                                <th>Nombre Curso</th>
                                                <th>Eliminar</th>
                                                <th>Actualizar</th>
                                                <th>Ver</th> 
                                            </tr>
                             </thead>
                            <tbody>
		<?php
    						foreach ($result_lista_aspirantes_cursos as $key => $value) {
		?>
    						<tr>
								<td><?=$value->rfc;?></td>
								<td><?=$value->nombre;?></td>
                <td><?=$value->paterno;?></td>
                <td><?=$value->materno;?></td>
                <td><?=$value->empresa;?></td>
                <td><?=$value->telefono;?></td>
                <td><?=$value->email;?></td>
                <td><?=$value->id_curso;?></td>
                <td><?=$value->nombre_curso;?></td>

<td>
<button class='delete btn btn-danger btn-sm' id='del_<?= $value->rfc ?>' data-rfc='<?= $value->rfc ?>' data-curso='<?= $value->id_curso ?>' >Eliminar</button>
</td>

<td>
<button class='update btn btn-success btn-sm' id='update_<?= $value->rfc ?>' data-rfc='<?= $value->rfc ?>' data-curso='<?= $value->id_curso ?>' >Actualizar</button>
</td>

<td>
<button class='ver btn btn-warning btn-sm' id='ver_<?= $value->rfc ?>' data-rfc='<?= $value->rfc ?>' data-curso='<?= $value->id_curso ?>' >Ver</button></td>



    						</tr>
        <?php
        }//cierre de foreach lista de personas
         ?>
                            </tbody>                             

</table>
</div>


<?php

        }

?>

<?php include_once "dependencias/inclusiones/js_incluidos.php"; ?>

</div><!-- end container -->  

<script>
 $(document).ready(function() {
 

    if ($('#lista_cursos').length) {
        //$('#lista_cursos').DataTable();

$('#lista_cursos').DataTable( {
        
dom: 'Blfrtip',
        buttons: [{
            extend: 'excelHtml5',
                messageTop: 'Direccion De Ecología',
                text:"Exporta Excel",
                title:"Listado de cursos",
        },
        {
            /*'csvHtml5',*/
                extend: 'csvHtml5',
                text:"Exporta csv",
                title:"Listado de cursos",
                messageTop: 'Direccion De Ecología',
              },
                          {
                extend: 'pdfHtml5',
                title: 'Listado de cursos'
            }
        ],
    responsive: true,
    "language": {
    "search": "Filtro de Registros:",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
    "oPaginate": {
        "sPrevious": "Anterior",
        "sNext": "Siguiente"
      }
  }  

    });

    }



$('#add').click(function(){  
           
            window.location.href = 'registro2.php';
      });


      $('#insert_form').on("submit", function(event,table){
          
           event.preventDefault();  
           if($('#inombre').val() == '')  
           {  
                Swal.fire({
           type: 'warning',
           title: 'Error',
           text: 'Error:Nombre del aspirante es requerido'});  
           }  
           else if($('#ipaterno').val() == '')  
           {  
                Swal.fire({
           type: 'warning',
           title: 'Error',
           text: 'Error:Apellido Paterno del aspirante es requerido'});  
           }  
           else if($('#imaterno').val() == '')  
           {  
                Swal.fire({
           type: 'warning',
           title: 'Error',
           text: 'Error:Apellido Materno del aspirante es requerido'});  
           }
           else if($('#iempresa').val() == '')  
           {  
                Swal.fire({
           type: 'warning',
           title: 'Error',
           text: 'Error:Nombre de la Empresa es requerido'});  
           }
           else if($('#itelefono').val() == '' || $('#itelefono').val().length !=10)  
           {  
                Swal.fire({
           type: 'warning',
           title: 'Error',
           text: 'Error:Teléfono completo es requerido'});  
           }
           else if($('#iemail').val() == '' || IsEmail($('#iemail').val())==false)  
           {  
                Swal.fire({
           type: 'warning',
           title: 'Error',
           text: 'Error:Correo es requerido o esta mal formado'});  
           }
           else if($('#scurso').val() == "0")  
           {  
                Swal.fire({
           type: 'warning',
           title: 'Error',
           text: 'Error:Debe seleccionar un curso'});  
           }
           else  
           {  
                $.ajax({  
                     url:"../controllers/lista_aspirantes/inserta_actualiza_aspirantes_cursos.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){ 
                            if($('#curso_id').val() == ''){ 
                              $('#insert').val("Insertando");
                            }
                            else{
                              $('#insert').val("Actualizando");
                            }  
                     },     
                     success:function(data){ 
                            //alert(data);
                            //$('#debug').append(data); 
                          if (data=='ok'){
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');
                          
                          //bootbox.alert('correcto!');
                          Swal.fire({
                          title: "Actualización de aspirantes con Cursos Asignados",
                          text: "¡Aspirante Actualizado Correctamente!",
                          type: "success"
                          }).then(function() {
                            window.location = "lista_aspirantes.php";
                          });
                      }
                         else if (data=='ok2'){
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');
                          
                          //bootbox.alert('correcto!');
                          Swal.fire({
                          title: "Actualización de Curso del Aspirante",
                          text: "¡Curso Actualizado Correctamente!",
                          type: "success"
                          }).then(function() {
                            window.location = "lista_aspirantes.php";
                          });
                      }                      
                         else if (data=='ok3'){
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');
                          
                          //bootbox.alert('correcto!');
                          Swal.fire({
                          title: "Actualización de Aspirante y Curso",
                          text: "¡Aspirante y Curso Actualizado Correctamente!",
                          type: "success"
                          }).then(function() {
                            window.location = "lista_aspirantes.php";
                          });
                      }
                          else{
                            Swal.fire({
                                    type: 'error',
                                    title: 'No se reflejaron cambios no se actualizó la información, corrija o vuelva a intentar.',
                        });
                          }  
                     }  
                });  
           }  
      })
 

    $('#lista_cursos tbody').on('click', '.delete', function() {
       
    var el = this;
  
    // Delete id
    var rfc = $(this).data('rfc');
    var id_curso = $(this).data('curso');
    //alert(rfc+' --- '+id_curso);
 
 
    // Confirm box
    bootbox.confirm("¿Deseas realmente borrar el registro?", function(result) {
 
       if(result){
         // AJAX Request
         $.ajax({
           url: '../controllers/lista_aspirantes/delete_registro_cursos.php',
           type: 'POST',
           data: { rfc:rfc,id_curso:id_curso},
           success: function(response){
              //alert(response);
             // remueve el registro tambien del datatable
             if(response == 1){
                $(el).closest('tr').css('background','tomato');
                $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
        });
         }else{
                bootbox.alert('Registro No Fue Eliminado.');
         }
           }
         });
       }
 
    });
});


$('#lista_cursos tbody').on('click', '.ver', function() {
         $("h4.modal-title").text("Detalle de Aspirante - Curso");
    // ver id
    var rfc = $(this).data('rfc');
    var id_curso = $(this).data('curso');
    //alert(curso_id);
    
          if(id_curso != '')  
           {  
                $.ajax({  
                     url:'../controllers/lista_aspirantes/select_aspirantes_cursos.php',  
                     method:'POST',  
                     data:{rfc:rfc,id_curso:id_curso},  
                     success:function(response){
                            //alert(response);  
                          $('#aspirante_curso_detail').html(response);  
                          $('#dataModal').modal('show');  
                     },
                    error : function(request, status, error) {

                            var val = request.responseText;
                            alert("error"+val);
                    }  
                });  
           }                  

});


/*updTAE*/
$('#lista_cursos tbody').on('click', '.update', function() {
    $("h4.modal-title").text("Modificación de Aspirante - Curso");

    var rfc = $(this).data('rfc');
    var id_curso = $(this).data('curso');
    //alert(rfc +'-'+ id_curso);

               $.ajax({  
                url:"../controllers/lista_aspirantes/fetch_aspirante_curso.php",  
                method:"POST",  
                data:{rfc:rfc,id_curso:id_curso},  
                dataType:"json",  
                success:function(data){
                //alert(JSON.stringify(data));

                     
                     $('#irfc').val(data.jrfc);  
                     $('#inombre').val(data.jnombre);  
                     $('#ipaterno').val(data.jpaterno);  
                     $('#imaterno').val(data.jmaterno);  
                     $('#iempresa').val(data.jempresa);  
                     $('#itelefono').val(data.jtelefono);  
                     $('#iemail').val(data.jemail);  
                     $('#iid_curso').val(data.jid_curso);  

                     $('#insert').val("Actualizar");  
                     $('#add_data_Modal').modal('show'); 
                     
                      
                },
                    error : function(request, status, error) {

                            var val = request.responseText;
                            alert("error"+val);
                    }    
           });
 
});// end function update

$( "#add_data_Modal" ).on('show.bs.modal', function(){
    //alert("I want this to appear after the modal has opened!");
    //alert($("#scurso").val());
    $("#scurso").val($("#iid_curso").val());
});



$( "#scurso" ).change(function() {
    // ver id
    var rfc = $("#irfc").val();
    var id_curso = $("#scurso").val();
    var iid_curso= $("#iid_curso").val();
    //alert(rfc+' - '+id_curso);
    
          if(id_curso != "0" && id_curso != iid_curso)  
           {  
                $.ajax({  
                     url:'../controllers/lista_aspirantes/verifica_aspirantes_cursos.php',  
                     method:'POST',  
                     data:{rfc:rfc,id_curso:id_curso},  
                     success:function(response){
                            //alert(response);  

                          if (response==1){
                            Swal.fire({
                              type: 'warning',
                              title: 'Error',
                              text: 'El aspirante ya esta registrado en el curso seleccionado, cambie de curso y/o verifique'});
                            }  
                     },
                    error : function(request, status, error) {

                            var val = request.responseText;
                            alert("error"+val);
                    }  
                });  
           }


});



 });//ready function
 </script>
</body>
</html>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog modal-lg">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <legend class="text-center header">
                     <h4 class="modal-title">Detalles de Curso</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </legend>  
                       
                </div>  
                <div class="modal-body" id="aspirante_curso_detail">  
                </div>  
                <div class="modal-footer"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                </div>  
           </div>  
      </div>  
 </div>


<!-- modal para y update -->
  <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">
                <legend class="text-center header">
                     <h4 class="modal-title"></h4>
                     </legend>  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                       
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">
                          <input type="hidden" name="iid_curso" id="iid_curso" readonly="yes" />

                          <label>RFC:</label>
                          <input type="text" name="irfc" id="irfc" class="form-control" readonly="yes"/>  
                          <br />  

                          <label>Nombre:</label>
                          <input type="text" name="inombre" id="inombre" class="form-control" />  
                          <br />                          

                          <label>Apellido Paterno:</label>
                          <input type="text" name="ipaterno" id="ipaterno" class="form-control" />  
                          <br />

                          <label>Apellido Materno:</label>
                          <input type="text" name="imaterno" id="imaterno" class="form-control" />  
                          <br />                          

                          <label>Empresa:</label>
                          <input type="text" name="iempresa" id="iempresa" class="form-control" />  
                          <br />

                          <label>Teléfono:</label>
                          <input type="text" maxlength="10" name="itelefono" id="itelefono" class="form-control" />  
                          <br />

                          <label>Correo Electrónico:</label>
                          <input type="text" name="iemail" id="iemail" class="form-control" />  
                          <br />                                                    

<?php
include("../models/lista_aspirantes/class_catalogo_cursos_dal.php");
$obj_lista_cursos=new catalogo_cursos_dal;
$lista_cursos=$obj_lista_cursos->get_datos_lista_cursos();
/*
echo '<pre>';
print_r($lista_cursos);
echo '</pre>';
*/
if ($lista_cursos==NULL){
        print "<section><h2>No se encontraron resultados de cursos.</h2><h3>No hay cursos registradas</h3></section>";
    }
    else{

?>
  
      
    <select name="scurso" id="scurso" class="form-control">
    <option value="0">Seleccione Curso:</option>
<?php
  foreach ($lista_cursos as $key => $value) {
?>
            <option value="<?=$value->getId_Curso(); ?>"><?=$value->getNombre_Curso(); ?></option>


  <?php
                }
?>  
</select>
  
<?php
}
?>
<br/>



  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />


<div id="debug">
</div>                           
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>