<?php

require_once("vendor/autoload.php");

use TransactionManager\Aspect\ApplicationAspectKernel;
use TransactionManager\Aspect\TransactionManagerAspect;
use TransactionManager\Repository\PDO\PDOCustomerRepository;
use TransactionManager\Repository\PDO\PDOAddressRepository;
use TransactionManager\Controller\CustomerController;

$conn = new \PDO("sqlite:data/db.sq3");
$transactionManager = new TransactionManagerAspect($conn);

$aspectKernel = TransactionManager\Aspect\ApplicationAspectKernel::getInstance();
$aspectKernel->registerAspect($transactionManager);
$aspectKernel->init(array(
        'cacheDir' => __DIR__ . '/tmp/',
        'includePaths' => array(
            __DIR__ . '/src/'
        ),
        'debug' => true
));

$customerRepository = new PDOCustomerRepository($conn);
$addressRepository = new PDOAddressRepository($conn);
$controller = new CustomerController($customerRepository, $addressRepository);
$controller->post();