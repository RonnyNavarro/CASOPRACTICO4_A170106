<!DOCTYPE html>
<html lang="es-mx">
	<head>
		<title>Tabla Celulares</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <!--datables CSS básico-->
        <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
        <!--datables estilo bootstrap 4 CSS-->  
        <link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet"> 
	</HEAD>
    <style>
	  	
	  	.navbar-custom { 
	  		text-align: right;
      		background-color:#2B94BE ; 
      		border-style: solid;
      	}
      	.navbar-custom .navbar-brand, 
        .navbar-custom .navbar-text .nav-item .navbar-nav { 
            color: white; 
        }
        .container, .BODY{
        	background-color:white ;
        }
        
		
  	</style>
    <BODY style="background-color:white;">
        <div class="jumbotron text-center"style="margin-bottom:0;background-color:#000000; color: white">
			<div class="row">
				<div class="col-sm">
                    
				</div>
				<div class="col-sm">
					<h1 style="color: white">Tabla Celulares</h1>
				</div>
				<div class="col-sm">
				<div class="row">
						<div class="col-sm"></div>

						</div>
					</div>
					<div class="row">
						<div class="col-sm"></div>
						<div class="col-sm" style="margin-top: auto; margin-bottom: auto;"><h3></h3></div>
					</div>
					
					
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-lg-4">
                <form id="Send">
                    <div class="form-group">
                        <label for="ID">Identificador</label>
                        <input type="text" class="form-control" id="id" placeholder="Numero Unico">
                    </div>
                    <div class="form-group">
                        <label for="Marca">Marca</label>
                        <input type="text" class="form-control" id="marca" placeholder="Marca">
                    </div>
                    <div class="form-group">
                        <label for="Modelo">Modelo</label>
                        <input type="text" class="form-control" id="modelo" placeholder="Modelo">
                    </div>
                    <div class="form-group">
                        <label for="Capacidad">Capacidad</label>
                        <input type="text" class="form-control" id="capacidad" placeholder="Capacidad en GB">
                    </div>
                </form>
            </div>
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table id="tablaCelulares" class="table table-striped table-bordered table-condensed" style="width:100%" >
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Marca</th>
                                <th>Modelo</th>                                
                                <th>Capacidad</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>                           
                        </tbody>        
                    </table>               
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                
            </div>
            <div class="col-lg-4">
                <button class="btn btn-primary btn-sm" id="Insertar">INSERTAR</button>
                <button class="btn btn-primary btn-sm" id="Modificar">MODIFICAR</button>
                <!--<button class="btn btn-primary btn-sm" id="Eliminar">ELIMINAR</button>-->
            </div>
            <div class="col-lg-4">
                
            </div>
        </div>
    </BODY>
    <!-- Custom Alerts Swal -->                
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>

    <script type="text/javascript">
		link = window.location.href;
		var url = new URL(link);
		var urlParams = new URLSearchParams(url.search);
		var status = urlParams.getAll('m');
		
        
		

	</script>
    <?php include_once "js.php";?>
</HTML>