<script>
$(document).ready(function() {
var id, opcion;
opcion = 4;
    
tablaCelulares = $('#tablaCelulares').DataTable({
    language: {
                url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
            },
            

    
    "ajax":{            
        "url": "Servidor/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga una CONSULTA
        "dataSrc":""
    },
    "columns":[
        {"data": "id"},
        {"data": "marca"},
        {"data": "modelo"},
        {"data": "capacidad"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     

//para limpiar los campos antes de dar de Alta una Persona
$("#Insertar").click(function(){
    opcion = 1; //insertar       		            
    marca = $("#marca").val();
    modelo = $("#modelo").val();
    capacidad =  $("#capacidad").val();	       
	var respuesta = confirm("¿Está seguro de insertar el registro?");                
    if (respuesta) {            
        $.ajax({
          url: "Servidor/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion,marca:marca,modelo:modelo,capacidad:capacidad},    
          success: function() {
            dataReload();
            alerta("Registro insertado con exito","success");                  
           }
        });	
    }    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    fila = $(this).closest("tr");	        
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    marca = fila.find('td:eq(1)').text();
    modelo = fila.find('td:eq(2)').text();
    capacidad = fila.find('td:eq(3)').text();
    $("#id").val(id);
    $("#marca").val(marca);
    $("#modelo").val(modelo);
    $("#capacidad").val(capacidad);	   
});
$("#Modificar").click(function(){
    opcion = 2; //Modificacion           
    id = $("#id").val(); //capturo el ID		            
    marca = $("#marca").val();
    modelo = $("#modelo").val();
    capacidad =  $("#capacidad").val();	       
	var respuesta = confirm("¿Está seguro de modificar el registro "+id+"?");                
    if (respuesta) {            
        $.ajax({
          url: "Servidor/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id:id,marca:marca,modelo:modelo,capacidad:capacidad},    
          success: function() {
            dataReload();
            alerta("Registro modificado con exito","success");                  
           }
        });	
    }
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+id+"?");                
    if (respuesta) {            
        $.ajax({
          url: "Servidor/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id:id},    
          success: function() {
              tablaCelulares.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });
 function alerta(mensaje,status){
            if(status == 'success'){
                swal.fire({
                    title: "Excelente!",
                    text: mensaje,
                    type: "Success" 
                });
            }else{
                if(status == "error"){
                swal.fire({
                    title: "Ups tenemos un problema:",
                    text: mensaje,
                    type: "Error" 
                });
                }
            }
        }
 //Recargar datos de la tabla
 function dataReload(){
    $('#tablaCelulares').DataTable().clear();
    $('#tablaCelulares').DataTable().ajax.reload();
 }
});  


</script>