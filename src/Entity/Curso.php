<?php

namespace Alura\Cursos\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;


#[Entity, Table(name: 'cursos')]
class Curso /* implements \JsonSerializable */
{
    
    #[Id, GeneratedValue, Column(type: Types::INTEGER)]
    private $id;
    
    #[Column(type: Types::STRING)]
    private $descricao;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'descricao' => $this->descricao
        ];
    }
}
