<?php

namespace Imarcom\Visitor;

use Illuminate\Http\Request;
use Torann\GeoIP\GeoIP;

class Visitor
{
    
    public $language = '';
    public $region = '';
    
    public function __construct(Request $request, GeoIP $geoIP)
    {
        $this->initLanguage($request);
        $this->initRegion($geoIP);
    }
    
    private function initLanguage(Request $request)
    {
        $storage = new SessionStorage(); // TODO use binding
        if (!$storage->has('language')) {
            $storage->set('language', $this->getLanguageUserAgent($request));
        }
        $this->language = $storage->get('language');
    }
    
    private function initRegion(GeoIP $geoIP)
    {
        $storage = new SessionStorage(); // TODO use binding
        if (!$storage->has('region')) {
            $storage->set('region', $this->getRegionByIp($geoIP));
        }
        $this->region = $storage->get('region');
    }
    
    private function getRegionByIp(GeoIP $geoIP)
    {
        return $geoIP->getLocation();
    }
    
    private function getLanguageUserAgent(Request $request)
    {
        return substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
    }
    
}