<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'app/autoload.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = $this->getDoctrine()->getManager();

return ConsoleRunner::createHelperSet($entityManager);