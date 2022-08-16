<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require_once __DIR__ . '/vendor/autoload.php';

$entityManager = (new EntityManagerCreator())->getEntityManager();

return ConsoleRunner::run(new SingleManagerProvider($entityManager));
