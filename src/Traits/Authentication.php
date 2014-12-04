<?php namespace Mingorance\LaraDoc\Traits;

use Doctrine\ORM\Mapping AS ORM;

trait Authentication
{
    use RememberToken;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Obtem o identificador do usuario.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getId();
    }

    /**
     * Obtem o password do usuario.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->getPassword();
    }
} 
