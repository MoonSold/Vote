<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once dirname(__DIR__)."/vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(dirname(__DIR__)."/Entity"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

// database configuration parameters
$conn = array(
    'dbname' => 'vote',
    'driver' => 'pdo_pgsql',
    'path' => '/db.pgsql',
    'user' => 'admin',
    'password'=>'admin',
    'host'=>'localhost'
);

// obtaining the entity manager
/** @var TYPE_NAME $entityManager */
$entityManager = EntityManager::create($conn, $config);