<?php
 
namespace TransactionManager\Aspect;
 
use PDO;
use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Before;
use Go\Lang\Annotation\After;
use Go\Lang\Annotation\AfterThrowing;
use TransactionManager\Container\Container;
 
class TransactionManagerAspect implements Aspect
{

    protected $conn;

    public function __construct(\PDO $conn) {
        $this->conn = $conn;
    }

    /**
     *
     * @param MethodInvocation $invocation Invocation
     * @Before("@execution(TransactionManager\Annotations\Transactional)")
     */
    public function beforeMethodExecution(MethodInvocation $invocation)
    {
        $this->conn->beginTransaction();
    }
 
    /**
     *
     * @param MethodInvocation $invocation Invocation
     * @After("@execution(TransactionManager\Annotations\Transactional)")
     */
    public function afterMethodExecution(MethodInvocation $invocation)
    {
		$this->conn->commit();
    }

    /**
     *
     * @param MethodInvocation $invocation Invocation
     * @AfterThrowing("@execution(TransactionManager\Annotations\Transactional)")
     */
    public function afterThrowingException(MethodInvocation $invocation)
    {
		$this->conn->rollBack();
    }    
}
 