<?php

namespace Imarcom\Visitor;

use \Request;

class LaravelSessionStorage implements Storage {
    
    public function get($key) {
        return Request::session()->get($key);
    }

    public function has($key) {
        return Request::session()->has($key);
    }

    public function set($key, $value) {
        return Request::session()->set($key, $value);
    }

}
