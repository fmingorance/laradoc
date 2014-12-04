<?php namespace Mingorance\LaraDoc\Cache;

interface Provider
{
    public function make($config = null);
    public function isAppropriate($provider);
} 
