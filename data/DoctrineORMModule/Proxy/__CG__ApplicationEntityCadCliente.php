<?php

namespace DoctrineORMModule\Proxy\__CG__\Application\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class CadCliente extends \Application\Entity\CadCliente implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'PK_cliente', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'FK_usuario', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'xNome', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'xFant', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'CNPJ_CPF', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'xLgr', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'fone', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'nro', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'xBairro', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'cMun', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'UF', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'dhAniversario', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'CEP', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'IE');
        }

        return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'PK_cliente', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'FK_usuario', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'xNome', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'xFant', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'CNPJ_CPF', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'xLgr', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'fone', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'nro', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'xBairro', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'cMun', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'UF', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'dhAniversario', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'CEP', '' . "\0" . 'Application\\Entity\\CadCliente' . "\0" . 'IE');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (CadCliente $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getPK_cliente()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPK_cliente', array());

        return parent::getPK_cliente();
    }

    /**
     * {@inheritDoc}
     */
    public function getFK_usuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFK_usuario', array());

        return parent::getFK_usuario();
    }

    /**
     * {@inheritDoc}
     */
    public function getXNome()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getXNome', array());

        return parent::getXNome();
    }

    /**
     * {@inheritDoc}
     */
    public function getXFant()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getXFant', array());

        return parent::getXFant();
    }

    /**
     * {@inheritDoc}
     */
    public function getCNPJ_CPF()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCNPJ_CPF', array());

        return parent::getCNPJ_CPF();
    }

    /**
     * {@inheritDoc}
     */
    public function getXLgr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getXLgr', array());

        return parent::getXLgr();
    }

    /**
     * {@inheritDoc}
     */
    public function getFone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFone', array());

        return parent::getFone();
    }

    /**
     * {@inheritDoc}
     */
    public function getNro()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNro', array());

        return parent::getNro();
    }

    /**
     * {@inheritDoc}
     */
    public function getXBairro()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getXBairro', array());

        return parent::getXBairro();
    }

    /**
     * {@inheritDoc}
     */
    public function getCMun()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCMun', array());

        return parent::getCMun();
    }

    /**
     * {@inheritDoc}
     */
    public function getUF()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUF', array());

        return parent::getUF();
    }

    /**
     * {@inheritDoc}
     */
    public function getCEP()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCEP', array());

        return parent::getCEP();
    }

    /**
     * {@inheritDoc}
     */
    public function getIE()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIE', array());

        return parent::getIE();
    }

    /**
     * {@inheritDoc}
     */
    public function setPK_cliente($PK_cliente)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPK_cliente', array($PK_cliente));

        return parent::setPK_cliente($PK_cliente);
    }

    /**
     * {@inheritDoc}
     */
    public function setFK_usuario($FK_usuario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFK_usuario', array($FK_usuario));

        return parent::setFK_usuario($FK_usuario);
    }

    /**
     * {@inheritDoc}
     */
    public function setXNome($xNome)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setXNome', array($xNome));

        return parent::setXNome($xNome);
    }

    /**
     * {@inheritDoc}
     */
    public function setXFant($xFant)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setXFant', array($xFant));

        return parent::setXFant($xFant);
    }

    /**
     * {@inheritDoc}
     */
    public function setCNPJ_CPF($CNPJ_CPF)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCNPJ_CPF', array($CNPJ_CPF));

        return parent::setCNPJ_CPF($CNPJ_CPF);
    }

    /**
     * {@inheritDoc}
     */
    public function setXLgr($xLgr)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setXLgr', array($xLgr));

        return parent::setXLgr($xLgr);
    }

    /**
     * {@inheritDoc}
     */
    public function setFone($fone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFone', array($fone));

        return parent::setFone($fone);
    }

    /**
     * {@inheritDoc}
     */
    public function setNro($nro)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNro', array($nro));

        return parent::setNro($nro);
    }

    /**
     * {@inheritDoc}
     */
    public function setXBairro($xBairro)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setXBairro', array($xBairro));

        return parent::setXBairro($xBairro);
    }

    /**
     * {@inheritDoc}
     */
    public function setCMun($cMun)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCMun', array($cMun));

        return parent::setCMun($cMun);
    }

    /**
     * {@inheritDoc}
     */
    public function setUF($UF)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUF', array($UF));

        return parent::setUF($UF);
    }

    /**
     * {@inheritDoc}
     */
    public function setCEP($CEP)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCEP', array($CEP));

        return parent::setCEP($CEP);
    }

    /**
     * {@inheritDoc}
     */
    public function setIE($IE)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIE', array($IE));

        return parent::setIE($IE);
    }

    /**
     * {@inheritDoc}
     */
    public function getDhAniversario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDhAniversario', array());

        return parent::getDhAniversario();
    }

    /**
     * {@inheritDoc}
     */
    public function setDhAniversario($dhAniversario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDhAniversario', array($dhAniversario));

        return parent::setDhAniversario($dhAniversario);
    }

}
