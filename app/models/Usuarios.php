<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class Usuarios extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idusuarios;

    /**
     *
     * @var string
     */
    protected $login;

    /**
     *
     * @var string
     */
    protected $password;

    /**
     *
     * @var string
     */
    protected $nickname;

    /**
     *
     * @var string
     */
    protected $email;

    /**
     *
     * @var string
     */
    protected $facebook_id;

    /**
     *
     * @var string
     */
    protected $google_id;

    /**
     *
     * @var integer
     */
    protected $estado;

    /**
     *
     * @var string
     */
    protected $fecha_ingreso;

    /**
     * Method to set the value of field idusuarios
     *
     * @param integer $idusuarios
     * @return $this
     */
    public function setIdusuarios($idusuarios)
    {
        $this->idusuarios = $idusuarios;

        return $this;
    }

    /**
     * Method to set the value of field login
     *
     * @param string $login
     * @return $this
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Method to set the value of field nickname
     *
     * @param string $nickname
     * @return $this
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field facebook_id
     *
     * @param string $facebook_id
     * @return $this
     */
    public function setFacebookId($facebook_id)
    {
        $this->facebook_id = $facebook_id;

        return $this;
    }

    /**
     * Method to set the value of field google_id
     *
     * @param string $google_id
     * @return $this
     */
    public function setGoogleId($google_id)
    {
        $this->google_id = $google_id;

        return $this;
    }

    /**
     * Method to set the value of field estado
     *
     * @param integer $estado
     * @return $this
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Method to set the value of field fecha_ingreso
     *
     * @param string $fecha_ingreso
     * @return $this
     */
    public function setFechaIngreso($fecha_ingreso)
    {
        $this->fecha_ingreso = $fecha_ingreso;

        return $this;
    }

    /**
     * Returns the value of field idusuarios
     *
     * @return integer
     */
    public function getIdusuarios()
    {
        return $this->idusuarios;
    }

    /**
     * Returns the value of field login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field facebook_id
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    /**
     * Returns the value of field google_id
     *
     * @return string
     */
    public function getGoogleId()
    {
        return $this->google_id;
    }

    /**
     * Returns the value of field estado
     *
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Returns the value of field fecha_ingreso
     *
     * @return string
     */
    public function getFechaIngreso()
    {
        return $this->fecha_ingreso;
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );

        if ($this->validationHasFailed() == true) {
            return false;
        }

        return true;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('idusuarios', 'Ahorro', 'id_userr', array('alias' => 'Ahorro'));
        $this->hasMany('idusuarios', 'Deudas', 'id_usario', array('alias' => 'Deudas'));
        $this->hasMany('idusuarios', 'Gastos', 'id_usuari', array('alias' => 'Gastos'));
        $this->hasMany('idusuarios', 'Ingresos', 'id_user', array('alias' => 'Ingresos'));
        $this->hasMany('idusuarios', 'Metas', 'id_usuarioo', array('alias' => 'Metas'));
        $this->hasMany('idusuarios', 'Presupuesto', 'id_usuar', array('alias' => 'Presupuesto'));
        $this->hasMany('idusuarios', 'UsuariosData', 'id_usuarios', array('alias' => 'UsuariosData'));
        $this->hasMany('idusuarios', 'UsuariosLog', 'id_usuarios', array('alias' => 'UsuariosLog'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuarios';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuarios[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuarios
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
