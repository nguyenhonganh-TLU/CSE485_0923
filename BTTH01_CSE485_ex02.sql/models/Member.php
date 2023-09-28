<?php
class Member
{
    private $user;
    private $pass;
    private $mail;
    private $activationCode;
    private $activation;
    public function __construct($user, $mail, $pass, $activationCode, $activation){
        $this->user = $user;
        $this->pass = $pass;
        $this->mail = $mail;
        $this->activationCode= $activationCode;
        $this->activation = $activation;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
    public function getPass()
    {
        return $this->pass;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }
    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }
    public function getActivationCode()
    {
        return $this->activationCode;
    }

    public function setActivationCode($activationCode)
    {
        $this->activationCode = $activationCode;

        return $this;
    }
    public function getActivation()
    {
        return $this->activation;
    }
    public function setActivation($activation)
    {
        $this->activation = $activation;
        return $this;
    }
}
?>