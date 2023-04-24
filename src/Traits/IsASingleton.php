<?php declare(strict_types=1);

namespace AshleyHardy\Utilities\Traits;

use RuntimeException;

trait IsASingleton
{
    private static $instance;

    /**
     * A Singleton class must not define it's own constructor.
     */
    final public function __construct() {}

    /**
     * Get an instance of the Singleton class.
     *
     * @return self
     */
    final public static function instance(): static
    {
        if(static::$instance === null) static::$instance = new static();
        return static::$instance;
    }

    final public function __clone() 
    {
        $this->mustNot("cloned");
    }

    final public function __sleep() 
    {
        $this->mustNot("slept");
    }

    final public function __wakeup() 
    {
        $this->mustNot("woken up");
    }

    private function mustNot(string $actionName): never
    {
        throw new RuntimeException("Class " . get_class($this) . " must not be $actionName");
    }
}