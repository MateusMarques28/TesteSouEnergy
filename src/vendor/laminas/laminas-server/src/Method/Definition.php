<?php

/**
 * @see       https://github.com/laminas/laminas-server for the canonical source repository
 */

namespace Laminas\Server\Method;

use Laminas\Server;
use Laminas\Server\Method\Callback;
use Laminas\Server\Method\Prototype;

use function is_array;
use function is_object;
use function method_exists;
use function sprintf;
use function ucfirst;

/**
 * Method definition metadata
 */
class Definition
{
    /** @var Callback */
    protected $callback;

    /** @var array */
    protected $invokeArguments = [];

    /** @var string */
    protected $methodHelp = '';

    /** @var string */
    protected $name;

    /** @var null|object */
    protected $object;

    /** @var array Array of \Laminas\Server\Method\Prototype objects */
    protected $prototypes = [];

    /**
     * Constructor
     *
     * @param  null|array $options
     */
    public function __construct($options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    /**
     * Set object state from options
     *
     * @return Definition
     */
    public function setOptions(array $options)
    {
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    /**
     * Set method name
     *
     * @param  string $name
     * @return Definition
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get method name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set method callback
     *
     * @param array|Callback $callback
     * @throws Server\Exception\InvalidArgumentException
     * @return Definition
     */
    public function setCallback($callback)
    {
        if (is_array($callback)) {
            $callback = new Callback($callback);
        } elseif (! $callback instanceof Callback) {
            throw new Server\Exception\InvalidArgumentException('Invalid method callback provided');
        }
        $this->callback = $callback;
        return $this;
    }

    /**
     * Get method callback
     *
     * @return Callback
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * Add prototype to method definition
     *
     * @param array|Prototype $prototype
     * @throws Server\Exception\InvalidArgumentException
     * @return Definition
     */
    public function addPrototype($prototype)
    {
        if (is_array($prototype)) {
            $prototype = new Prototype($prototype);
        } elseif (! $prototype instanceof Prototype) {
            throw new Server\Exception\InvalidArgumentException('Invalid method prototype provided');
        }
        $this->prototypes[] = $prototype;
        return $this;
    }

    /**
     * Add multiple prototypes at once
     *
     * @param  array $prototypes Array of \Laminas\Server\Method\Prototype objects or arrays
     * @return Definition
     */
    public function addPrototypes(array $prototypes)
    {
        foreach ($prototypes as $prototype) {
            $this->addPrototype($prototype);
        }
        return $this;
    }

    /**
     * Set all prototypes at once (overwrites)
     *
     * @param  array $prototypes Array of \Laminas\Server\Method\Prototype objects or arrays
     * @return Definition
     */
    public function setPrototypes(array $prototypes)
    {
        $this->prototypes = [];
        $this->addPrototypes($prototypes);
        return $this;
    }

    /**
     * Get all prototypes
     *
     * @return array $prototypes Array of \Laminas\Server\Method\Prototype objects or arrays
     */
    public function getPrototypes()
    {
        return $this->prototypes;
    }

    /**
     * Set method help
     *
     * @param  string $methodHelp
     * @return Definition
     */
    public function setMethodHelp($methodHelp)
    {
        $this->methodHelp = $methodHelp;
        return $this;
    }

    /**
     * Get method help
     *
     * @return string
     */
    public function getMethodHelp()
    {
        return $this->methodHelp;
    }

    /**
     * Set object to use with method calls
     *
     * @param  object $object
     * @throws Server\Exception\InvalidArgumentException
     * @return Definition
     */
    public function setObject($object)
    {
        if (! is_object($object) && (null !== $object)) {
            throw new Server\Exception\InvalidArgumentException(sprintf(
                'Invalid object passed to %s',
                __METHOD__
            ));
        }
        $this->object = $object;
        return $this;
    }

    /**
     * Get object to use with method calls
     *
     * @return null|object
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set invoke arguments
     *
     * @return Definition
     */
    public function setInvokeArguments(array $invokeArguments)
    {
        $this->invokeArguments = $invokeArguments;
        return $this;
    }

    /**
     * Retrieve invoke arguments
     *
     * @return array
     */
    public function getInvokeArguments()
    {
        return $this->invokeArguments;
    }

    /**
     * Serialize to array
     *
     * @return array
     */
    public function toArray()
    {
        $prototypes = $this->getPrototypes();
        $signatures = [];
        foreach ($prototypes as $prototype) {
            $signatures[] = $prototype->toArray();
        }

        return [
            'name'            => $this->getName(),
            'callback'        => $this->getCallback()->toArray(),
            'prototypes'      => $signatures,
            'methodHelp'      => $this->getMethodHelp(),
            'invokeArguments' => $this->getInvokeArguments(),
            'object'          => $this->getObject(),
        ];
    }
}
