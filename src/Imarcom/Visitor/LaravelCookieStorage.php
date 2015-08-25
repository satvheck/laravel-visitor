<?php

namespace Imarcom\Visitor;

use \Request;

class LaravelCookieStorage implements Storage {
    
    public function get($key) {
        return Request::cookie($key);
    }

    public function has($key) {
        return is_null(Request::cookie($key));
    }

    public function set($key, $value) {
        Request::queue(Request::cookie()->forever($key, $value));
    }

}
