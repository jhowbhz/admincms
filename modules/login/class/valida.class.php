<?php

// Esta classe valida os dados inseridos no formuário de cadastro.
// Retorna "false" para dados válidos ou para dados inválidos uma string 
// contendo a descrição do erro.

class valida {

    public static function nome($nome) {
        if (empty($nome))
            return "Insira um nome";
        if (preg_match('/^[a-zA-Záéíóúâêô ]+$/', $nome))
            return false;
        else
            return "Somente Letras";
    }

    public static function sobrenome($sobrenome) {
        if (empty($sobrenome))
            return "Insira um sobrenome";
        if (preg_match('/^[a-zA-Záéíóúâêô ]+$/', $sobrenome))
            return false;
        else
            return "Somente Letras";
    }

    public static function telefone($telefone) {
        if (empty($telefone))
            return "Insira um telefone";
        if (preg_match('/^[0-9]+$/', $telefone))
            return false;
        else
            return "Somente Letras";
    }

    public static function cidade($cidade) {
        if (empty($cidade))
            return "Insira uma cidade";
        if (preg_match('/^[a-zA-Záéíóúâêô ]+$/', $cidade))
            return false;
        else
            return "Somente Letras";
    }

    public static function estado($estado) {
        $estados = array('ac', 'al', 'am', 'ap', 'ba', 'ce', 'df', 'es', 'go'
            , 'ma', 'mg', 'ms', 'mt', 'pa', 'pb', 'pe', 'pi', 'pr', 'rj', 'rn'
            , 'ro', 'rr', 'rs', 'sc', 'se', 'sp', 'to');
        if (in_array($estado, $estados))
            return false;
        else
            return "Selecione um Estado";
    }

    public static function cep($cep) {
        if (empty($cep))
            return "Insira um CEP";
        if (preg_match('/^[0-9]+$/', $cep))
            return false;
        else
            return "Somente Números";
    }

    public static function email($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
            return false;
        else
            return "Email inválido";
    }

    public static function senha($senha) {
        if (!preg_match('/^[a-zA-Z0-9 ]+$/', $senha))
            return "Somente caracteres alfanumericos";
        if (strlen($senha) >= 5 && strlen($senha) <= 20)
            return false;
        else
            return "Mínimo 5 e Máximo 20 caracteres";
    }
}
?>