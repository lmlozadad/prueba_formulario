<?php

require_once('./config.php');

Class Conexion{
  private $dbh = null;

  public function __construct(){

  }

  private function conectar(){
    global $CFG;

    try{
      // Obtiene datos de la conexion
      $driver = $CFG['driver'];
      $host = $CFG['host'];
      $port = $CFG['port'];
      $db = $CFG['db'];
      $user = $CFG['user'];
      $pass = $CFG['pass'];

      // Arma URL
      $dsn = "$driver:host=$host;port=$port;dbname=$db";

      // Crea la conexion
      $this->dbh = new PDO($dsn, $user, $pass);
      $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);

      return true;
    }catch(PDOException $ex){
      return false;
    }
  }

  private function cerrar() {
    $this->dbh = null;
  }

  public function guardar($nombre, $apellido){
    try{
      $rs = ['error' => false, 'msg' => 'Datos guardados correctamente ['.$nombre.' '.$apellido.'].'];

      // Retorna error si no es posible conectar
      if(!$this->conectar()){
        $rs['error'] = true;
        $rs['msg'] = 'No fue posible conectar con la base de datos.';
      }else{
        // Prepara y ejecuta la sentencia SQL
        $sql = "INSERT INTO personas(nombre, apellido) VALUES (:nombre, :apellido);";
        $params = [':nombre' => $nombre, ':apellido' => $apellido];
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($params);

        $this->cerrar();
      }

      return $rs;
    }catch(PDOException $ex){
      $this->cerrar();
      $rs['error'] = true;
      $rs['msg'] = 'No fue posible guardar los datos.';


      return $rs;
    }
  }
}