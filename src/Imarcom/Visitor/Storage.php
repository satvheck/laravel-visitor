<?php

namespace Imarcom\Visitor;

interface  Storage {
    
    /**
     * 
     * @param string $key
     * @return boolean Returns whether or not a key-value pair exists
     */
    public function has($key);
    
    /**
     * 
     * @param string $key
     * @return mixed Returns the requested value, NULL if it does not exist
     */
    public function get($key);
    
    /**
     * 
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value);
}
