<?php namespace Mingorance\LaraDoc\Traits;

use Doctrine\ORM\Mapping AS ORM;

trait RememberToken
{
    /**
     * @ORM\Column(name="remember_token", type="string", nullable=true)
     */
    private $rememberToken;

    /**
     * Obtem o valor do token de uma sessão "remember me".
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->rememberToken;
    }

    /**
     * Seta o valor do token de uma sessão "remember me".
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->rememberToken = $value;
    }

    /**
     * Obtem o nome da coluna do token "remember me".
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * O endereço de email para onde os lembretes de senha são enviados.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }
} 
