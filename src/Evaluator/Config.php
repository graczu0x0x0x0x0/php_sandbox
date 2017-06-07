<?php
namespace PhpSandbox\Evaluator;

/**
 * Class Config
 */
class Config
{
    /**
     * @var array
     */
    private $items = [];

    /**
     * Config constructor.
     * @param string $filename
     */
    public function __construct($filename)
    {
        if (file_exists($filename)) {
            $this->items = include($filename);
        }
    }

    /**
     * Searches the $items array and returns the item
     *
     * @param string $key
     * @return mixed
     */
    public function read($key)
    {
        return (!empty($this->items[$key])) ? $this->items[$key] : null;
    }

    /**
     * Add / Replace config key
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function write(string $key, $value)
    {
        $this->items[$key] = $value;
        return $this;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return !empty($this->items[$key]);
    }
}