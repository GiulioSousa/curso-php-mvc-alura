<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Helper\RenderizarHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicao implements RequestHandlerInterface
{
    use RenderizarHtmlTrait, FlashMessageTrait;
    
    private $repositorioCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioCursos = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $response = new Response(302, ['location' => '/listar-cursos']);
        if(is_null($id) || $id === false) {
            $this->definirMensagem('danger', 'ID de curso inválido');
            return $response;
        }

        $curso = $this->repositorioCursos->find($id);
        $html = $this->renderizarHtml('cursos/formulario.php', [
            'curso' => $curso,
            'titulo' => "Editar Curso: {$curso->getDescricao()}"
        ]);

        return new Response(200, [], $html);
    }
}