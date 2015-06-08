<?php

namespace Usuario\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * @ORM\Entity
 * @ORM\Table(name="Usuarios")
 *
 * @author Edson Correa Junior, 1º Sgt BM
 */
class Usuario {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="user_id")
     * @ORM\GeneratedValue
     *
     * @var int $idusuario
     */
    protected $idusuario;

    /**
     * @ORM\Column(type="string", name="user_cpf",length=14,  unique=true)
     * @var string $cpf
     */
    protected $cpf;

    /**
     * @ORM\Column(type="string", name="user_login", length=10)
     * @var string $login
     */
    protected $login;

    /**
     * @ORM\Column(type="string", name="user_senha", length=100)
     * @var string $senha
     */
    protected $senha;

    /**
     * @ORM\Column(type="string", name="user_email", length=100)
     * @var string $email
     */
    protected $email;

    /**
     * @ORM\Column(type="smallint", name="user_nivel", columnDefinition="TINYINT DEFAULT '6'")
     * @var int $userNivel
     */
    protected $userNivel;

    /**
     * @ORM\Column(type="smallint", name="user_nivel_mat", columnDefinition="TINYINT DEFAULT '6'")
     * @var int $nivelMat
     */
    protected $nivelMat;

    /**
     * @ORM\Column(type="smallint", name="user_nivel_cursos",  columnDefinition="TINYINT DEFAULT '6'")
     * @var int $nivelCursos
     */
    protected $nivelCursos;

    /**
     * @ORM\Column(type="smallint", name="user_nivel_sysbmccb", columnDefinition="TINYINT DEFAULT '60'")
     * @var int $nivelSysbm
     */
    protected $nivelSysbm;

    /**
     * @ORM\Column(type="smallint", name="user_permissao_sysbmccb", columnDefinition="TINYINT DEFAULT '3'")
     * @var int $permissaoSysbm
     */
    protected $permissaoSysbm;

    /**
     * @ORM\Column(type="smallint", name="user_active", columnDefinition="TINYINT DEFAULT '1'")
     * @var int $active
     */
    protected $active;

    /**
     * @ORM\Column(type="string", name="user_random_key", length=40)
     * @var string $randomKey
     */
    protected $randomKey;

    /**
     * @ORM\Column(type="datetime", name="user_regtime", nullable=false)
     *
     * @var $regtime /Datetim
     */
    protected $regtime;

    /**
     * @ORM\Column(type="string", name="user_salt")
     * @var string $salt
     */
    protected $salt;

    /**
     * @ORM\Column(type="string", name="user_token")
     * @var string $token
     */
    protected $token;

    public function __construct() {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), TRUE)), 16, 36);
        $this->token = base_convert(sha1(uniqid(mt_rand(), TRUE)), 16, 36);
        $this->activationKey = md5($this->email.$this->salt);
        $this->setRegtime(new \DateTime("now"));
        $this->userNivel = 6;
        $this->nivelCursos = 6;
        $this->nivelMat = 6;
        $this->nivelSysbm = 60;
        $this->permissaoSysbm = 3;
        $this->randomKey = md5($this->email.$this->salt);
        $this->setActive(true);

    }

    /**
     *
     * @return int idusuario
     */
    public function getIdusuario() {
        return $this->idusuario;
    }

    /**
     *
     * @return string cpf
     */
    public function getCpf() {
        return $this->cpf;
    }

    /**
     *
     * @return string login
     */
    public function getLogin() {
        return $this->login;
    }

    /**
     *
     * @return string senha
     */
    public function getSenha() {
        return $this->senha;
    }

    /**
     *
     * @return string email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     *
     * @return int userNivel
     */
    public function getUserNivel() {
        return $this->userNivel;
    }

    /**
     *
     * @return int nivelMat
     */
    public function getNivelMat() {
        return $this->nivelMat;
    }

    /**
     *
     * @return int nivelCursos
     */
    public function getNivelCursos() {
        return $this->nivelCursos;
    }

    /**
     *
     * @return int active
     */
    public function getActive() {
        return $this->active;
    }

    /**
     *
     * @return string randomKey
     */
    public function getRandomKey() {
        return $this->randomKey;
    }

    /**
     *
     * @return datetime regtime
     */
    public function getRegtime() {
        return $this->regtime;
    }

    /**
     *
     * @param int $idUsuario
     * @return self
     */
    public function setIdusuario($idUsuario) {
        $this->idusuario = $idUsuario;
        return $this;
    }

    /**
     *
     * @param string $cpf
     * @return self
     */
    public function setCpf($cpf) {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     *
     * @param string $login
     * @return self
     */
    public function setLogin($login) {
        $this->login = $login;
        return $this;
    }

    /**
     *
     * @param string $senha
     * @return self
     */
    public function setSenha($senha) {
        $this->senha = md5($senha);
        return $this;
    }

    /**
     *
     * @param string $email
     * @return self
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     *
     * @param int $userNivel
     * @return self
     */
    public function setUserNivel($userNivel) {
        $this->userNivel = $userNivel;
        return $this;
    }

    /**
     *
     * @param int $nivelMat
     * @return self
     */
    public function setNivelMat($nivelMat) {
        $this->nivelMat = $nivelMat;
        return $this;
    }

    /**
     *
     * @param int $nivelCursos
     * @return self
     */
    public function setNivelCursos($nivelCursos) {
        $this->nivelCursos = $nivelCursos;
        return $this;
    }

    /**
     *
     * @param int $active
     * @return self
     */
    public function setActive($active) {
        $this->active = $active;
        return $this;
    }

    /**
     *
     * @param string $randomKey
     * @return self
     */
    public function setRandomKey($randomKey) {
        $this->randomKey = $randomKey;
        return $this;
    }

    /**
     *
     * @param datetime $regtime
     * @return self
     */
    public function setRegtime(\DateTime $regtime) {
        $this->regtime = $regtime;
        return $this;
    }

    /**
     *
     * @return string salt
     */
    public function getSalt() {
        return $this->salt;
    }

    /**
     *
     * @return string token
     */
    public function getToken() {
        return $this->token;
    }

    /**
     *
     * @param string $salt
     * @return self
     */
    public function setSalt($salt) {
        $this->salt = $salt;
        return $this;
    }

    /**
     *
     * @param string $token
     * @return self
     */
    public function setToken($token) {
        $this->token = $token;
        return $this;
    }

    /**
     *
     * @return int nivelSysbm
     */
    public function getNivelSysbm() {
        return $this->nivelSysbm;
    }

    /**
     *
     * @return int permissaoSysbm
     */
    public function getPermissaoSysbm() {
        return $this->permissaoSysbm;
    }

    /**
     *
     * @param int $nivelSysbm
     * @return self
     */
    public function setNivelSysbm($nivelSysbm) {
        $this->nivelSysbm = $nivelSysbm;
        return $this;
    }

    /**
     *
     * @param int $permissaoSysbm
     * @return self
     */
    public function setPermissaoSysbm($permissaoSysbm) {
        $this->permissaoSysbm = $permissaoSysbm;
        return $this;
    }
    
    /**
     * 
     * @return array
     */
    public function toArray()
    {
        return (new ClassMethods)->extract($this);
        
    }

}
