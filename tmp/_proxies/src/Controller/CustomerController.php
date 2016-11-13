<?php
namespace TransactionManager\Controller;

use TransactionManager\Model\Customer as Customer;
use TransactionManager\Model\Address as Address;
use TransactionManager\Repository\CustomerRepository as CustomerRepository;
use TransactionManager\Repository\AddressRepository as AddressRepository;
use TransactionManager\Annotations\Transactional as Transactional;

class CustomerController extends CustomerController__AopProxied implements \Go\Aop\Proxy
{

    /**
     * Property was created automatically, do not change it manually
     */
    private static $__joinPoints = [];
    
    /**
     * @Transactional
     */
    public function post()
    {
        return self::$__joinPoints['method:post']->__invoke($this);
    }
    
}
\Go\Proxy\ClassProxy::injectJoinPoints('TransactionManager\Controller\CustomerController',array (
  'method' => 
  array (
    'post' => 
    array (
      0 => 'advisor.TransactionManager\\Aspect\\TransactionManagerAspect->beforeMethodExecution',
      1 => 'advisor.TransactionManager\\Aspect\\TransactionManagerAspect->afterMethodExecution',
      2 => 'advisor.TransactionManager\\Aspect\\TransactionManagerAspect->afterThrowingException',
    ),
  ),
));