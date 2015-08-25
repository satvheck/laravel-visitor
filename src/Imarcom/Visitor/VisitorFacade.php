<?php

namespace Imarcom\Visitor;

use Illuminate\Support\Facades\Facade;

class VisitorFacade extends Facade {
    
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'visitor';
    }
    
}
