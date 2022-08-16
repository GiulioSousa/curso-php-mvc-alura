<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $repositorioUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_var(
            $request->getParsedBody()['email'],
            FILTER_VALIDATE_EMAIL
        );

        $response = new Response(302, ['location' => '/login']);
        if (is_null($email) || $email === false) {
            $this->definirMensagem('danger', 'O e-mail digitado não é um e-mail válido');
            return $response;
        }

        $senha = strip_tags($_POST['senha']);

        $usuario = $this->repositorioUsuarios->findOneBy(['email' => $email]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $this->definirMensagem('danger', "E-mail ou senha inválidos");
            return $response;
        }

        $_SESSION['logado'] = true;
        
        return new Response(302, ['location' => '/listar-cursos']);
    }
}