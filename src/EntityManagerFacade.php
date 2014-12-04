<?php namespace Mingorance\LaraDoc; 

use Illuminate\Support\Facades\Facade;

class EntityManagerFacade extends Facade
{
    /**
     * Obtem o nome do componente registrado.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Doctrine\ORM\EntityManager';
    }
} 
