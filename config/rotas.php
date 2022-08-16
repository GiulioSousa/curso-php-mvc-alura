<?php

use Alura\Cursos\Controller\{
    BuscarCursosXml,
    CursosEmJson,
    Exclusao,
    FormularioEdicao,
    FormularioInsercao,
    FormularioLogin,
    ListarCursos,
    Persistencia,
    RealizarLogin
};

return [
    '/login' => FormularioLogin::class,
    '/realizar-login' => RealizarLogin::class,
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/editar-curso' => FormularioEdicao::class,
    '/excluir-curso' => Exclusao::class,
    '/buscar-cursos-json' => CursosEmJson::class,
    '/buscar-cursos-xml' => BuscarCursosXml::class
];

/* $rotas = [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class
];

return $rotas; */