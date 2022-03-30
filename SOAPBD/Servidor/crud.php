<?php
$cliente = new SoapClient(null, array('location'=>"http://localhost/SOAPBD/Servidor/servidorWS.php", 'uri'=>"http://localhost/SOAPBD/Servidor/servidorWS.php",'trace'=>1));
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$marca = (isset($_POST['marca'])) ? $_POST['marca'] : '';
$modelo = (isset($_POST['modelo'])) ? $_POST['modelo'] : '';
$capacidad = (isset($_POST['capacidad'])) ? $_POST['capacidad'] : '';
try {
    //echo $resultado=$cliente->__soapCall("Saludar",["Ronny"]);
    switch($opcion){
        case 1:
            echo $resultado=$cliente->__soapcall("InsertarCelular",[$marca,$modelo,$capacidad]);
            break;
        case 2:
            echo $resultado=$cliente->__soapcall("ModificarCelular",[$id,$marca,$modelo,$capacidad]);
            break;
        case 3:
            echo $resultado=$cliente->__soapcall("EliminarCelular",[$id]);
            break;
        case 4:
            echo $result=$cliente->__soapcall("ConsultaCelular",["1000"]);
            break;
    }
} catch(SOAPFault $th) {
    echo 'Error ';
    echo $th->getMessage();
}

?>