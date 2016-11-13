<?php
// src/ApplicationAspectKernel.php
 
namespace TransactionManager\Aspect;

use PDO;
use Go\Aop\Aspect;
use Go\Core\AspectKernel;
use Go\Core\AspectContainer;
use TransactionManager\Container\Container;

class ApplicationAspectKernel extends AspectKernel
{

    protected $aspects = array();

    public function registerAspect(Aspect $aspect) {
        $this->aspects[] = $aspect;
    }

    /**
     *
     * @param AspectContainer $container
     * @return void
     */
    protected function configureAop(AspectContainer $container)
    {
    	foreach($this->aspects as $aspect) {
            $container->registerAspect($aspect);
        }
    }

}