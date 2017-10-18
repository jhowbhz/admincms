<?php

class usuario extends db {

    function __construct() {
        parent::__construct();
    }

    public function cadastrar($dados = array()) {
        extract($dados);
        $erro = array();
        // Valida cada campo do formulário usando a classe "valida"
        $erro['nome'] = valida::nome($nome);
        $erro['sobrenome'] = valida::sobrenome($sobrenome);
        $erro['cidade'] = valida::cidade($cidade);
        $erro['estado'] = valida::estado($estado);
        $erro['cep'] = valida::cep($cep);
        $erro['telefone'] = valida::telefone($telefone);
        $erro['email'] = valida::email($email);
        $erro['senha'] = valida::senha($senha);
        //
        // Verifica se houve algum erro com algum dos campos de cadastro
        foreach ($erro as $e) {
            if ($e != false) {
                $erro['sucesso'] = false;
                return $erro;
            }
        }
        //

        $senha = sha1($senha); // Criptografa a senha usando a função sha1()
        $dateTime = date('Y-m-d H:i:s');
        $q = $this->fetch("SELECT * FROM tbl_usuarios WHERE email = '$email'"); // Verifica se o usuário já está cadastado
        if (!$q) {
            $q = $this->query("INSERT INTO tbl_usuarios VALUES('', '$nome', '$sobrenome', '$cidade', '$estado', '$cep', '$telefone', '$email', '$senha', '$dateTime')");
            if ($q) {
                $erro['sucesso'] = true;
                return $erro;
            } else {
                $erro['sucesso'] = false;
                return $erro;
            }
        } else {
            $erro['email'] = "Este email já está cadastrado";
            $erro['sucesso'] = false;
            return $erro;
        }
    }

    public function editar($dados = array()) {
        extract($dados);
        $erro = array();
        // Valida cada campo do formulário usando a classe "valida"
        $erro['nome'] = valida::nome($nome);
        $erro['sobrenome'] = valida::sobrenome($sobrenome);
        $erro['cidade'] = valida::cidade($cidade);
        $erro['estado'] = valida::estado($estado);
        $erro['cep'] = valida::cep($cep);
        $erro['telefone'] = valida::telefone($telefone);
        $erro['email'] = valida::email($email);
        $erro['senha'] = valida::senha($senha);
        //
        // Verifica se houve algum erro com algum dos campos
        foreach ($erro as $e) {
            if ($e != false) {
                $erro['sucesso'] = false;
                return $erro;
            }
        }
        //
        // Somente o administrador pode editar qualquer usuário
        if ($_SESSION['idusuario'] != 1)
            $idusuario = $_SESSION['idusuario'];
        //
        $senha = sha1($senha); // Criptografa a senha usando a função sha1()

        $q = $this->fetch("SELECT * FROM tbl_usuarios WHERE email = '$email' AND idusuario <> $idusuario"); // Verifica se o email já existe
        if (!$q) {
            $q = $this->query("UPDATE tbl_usuarios SET idpermissao = '$idpermissao', status = '$status', nome = '$nome', sobrenome = '$sobrenome', cidade = '$cidade', estado = '$estado', cep = '$cep', telefone = '$telefone', email = '$email', senha = '$senha' WHERE idusuario = $idusuario");
            if ($q) {
                $erro['sucesso'] = true;
                return $erro;
            } else {
                $erro['sucesso'] = false;
                return $erro;
            }
        } else {
            $erro['email'] = "Este email já está sendo usado";
            $erro['sucesso'] = false;
            return $erro;
        }
    }

    public function deletarUsuario($id) {
        $q = $this->query("DELETE FROM tbl_usuarios WHERE idusuario = " . (int) $id);
        if ($q)
            return true;
        else
            return false;
    }

    public function validaLogin($dados = array()) {
        extract($dados);
        $senha = md5($senha);
		$query = "SELECT id_usuario,tp_usuario,st_usuario,nm_usuario FROM tbl_usuario WHERE em_usuario = ? AND sh_usuario = ?";
		$data[] = $email;
		$data[] = $senha;

		$resultado = $this->preparar_login($query,$data);

		if ($resultado) {
            //session_start();
            $_SESSION['id_usuario'] = $resultado['id_usuario'];
			$_SESSION['tp_usuario'] = $resultado['tp_usuario'];
			$_SESSION['st_usuario'] = $resultado['st_usuario'];
			$_SESSION['nm_usuario'] = $resultado['nm_usuario'];
			
			
            $_SESSION['logado'] = true;
            // Se a opção "Manter-me Conectado" for ativa, cria Cookies
            // para manter o usuário logado por 30 dias
            /*if (isset($cookies)) {
                $expire = time() + 60 * 60 * 24 * 30;
                setcookie("email", $email, $expire);
                setcookie("senha", $senha, $expire);
            }*/
            //
            return true;
        } else
            return false;
    }

    public function usuarioInfo($id) {
        $dados = $this->fetch("SELECT * FROM tbl_usuario WHERE id_usuario = " . (int) $id);
        if ($dados)
            return $dados[0];
        else
            return null;
    }

    public function todosUsuariosInfo() {
        $dados = $this->fetch("SELECT * FROM tbl_usuarios");
        if ($dados)
            return $dados;
        else
            return null;
    }

}

?>
