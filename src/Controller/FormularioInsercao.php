<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizarHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInsercao implements RequestHandlerInterface
{
    use RenderizarHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizarHtml('cursos/formulario.php', ['titulo' => 'Novo curso']);
        return new Response(200, [], $html);
    }
}