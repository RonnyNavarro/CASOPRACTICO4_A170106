<?php
class celulares{
    public function Saludar($nombre){
        return "Hola " .$nombre;
    }
    public function ConsultaCelular($limit){
        include 'conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("SELECT * FROM celulares where 1 limit $limit");
        $consulta->execute();
        return json_encode($consulta->fetchAll(PDO::FETCH_ASSOC),JSON_UNESCAPED_UNICODE);
    }
    public function InsertarCelular($marca,$modelo,$capacidad){
        include 'conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("INSERT INTO celulares(marca,modelo,capacidad) VALUES (:marca,:modelo,:capacidad)");
        $consulta->bindParam(":marca",$marca,PDO::PARAM_STR);
        $consulta->bindParam(":modelo",$modelo,PDO::PARAM_STR);
        $consulta->bindParam(":capacidad",$capacidad,PDO::PARAM_STR);
        $consulta->execute();
        return 1;
    }
    public function ModificarCelular($id,$marca,$modelo,$capacidad){
        include 'conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("UPDATE celulares SET marca=:marca, modelo=:modelo, capacidad=:capacidad WHERE id=:id");
        $consulta->bindParam(":id",$id,PDO::PARAM_STR);
        $consulta->bindParam(":marca",$marca,PDO::PARAM_STR);
        $consulta->bindParam(":modelo",$modelo,PDO::PARAM_STR);
        $consulta->bindParam(":capacidad",$capacidad,PDO::PARAM_STR);
        $consulta->execute();
        return 1;
    }
    public function EliminarCelular($id){
        include 'conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("DELETE FROM celulares where id=:id");
        $consulta->bindParam(":id",$id,PDO::PARAM_STR);
        $consulta->execute();
        return 1;
    }
}

try{
    $server=new SoapServer(
        null,
        [
            'uri'=>'http://localhost/SOAPBD/Servidor/servidorWS.php'
        ]
    );
    $server->SetClass('celulares');
    $server->handle();
} catch (SOAPFault $th){
    print $th->faultstring;

}

?>