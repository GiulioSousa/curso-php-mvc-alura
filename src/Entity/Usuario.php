<?php
namespace Alura\Cursos\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table(name: 'usuarios')]
class Usuario
{
    #[Id, GeneratedValue, Column(type: Types::INTEGER)]
    private $id;
    
    #[Column(type: Types::STRING)]
    private $email;
    
    #[Column(type: Types::STRING)]
    private $senha;

    public function senhaEstaCorreta(string $senhaPura): bool
    {
        return password_verify($senhaPura, $this->senha);
    }
}
