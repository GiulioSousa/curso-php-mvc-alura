<?php

namespace Alura\Cursos\Helper;

trait FlashMessageTrait
{
    public function definirMensagem(string $tipo, string $mensagem): void
    {
        $_SESSION['tipoMensagem'] = $tipo;
        $_SESSION['mensagem'] = $mensagem;
    }
}