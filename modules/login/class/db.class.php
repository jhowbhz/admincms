<?php

class db {
    private $host = 'mysql796.umbler.com:41890',
    $usuario = 'rooot1',
    $senha = '987987AABBaac',
    $db = 'site_principal';
    ///////////////////////////////////////////

    private $con;

    function __construct() {
        $this->con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->db);
        if (!$this->con)
            die("Erro ao conectar ao banco de dados");
    }

    public function query($sql) {
        $query = mysqli_query($this->con, $sql);
        return $query;
    }

    public function fetch($sql) {
        $res = array();
        $query = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($query) > 0) {
            while($q = mysqli_fetch_assoc($query))    
             $res[] = $q;
         return $res;
     } else
     null;
 }

 public function preparar_login($query,$data){
  $result = $this->con->prepare($query);
  $field = '';
  $email = $data[0];
  $senha = $data[1];

  $result->bind_param('ss', $email, $senha);

  $result->execute();

  $results = $result->get_result();
  $retorno = $results->fetch_assoc();

  return $retorno;
}

}

?>
