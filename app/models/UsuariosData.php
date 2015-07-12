<?php

class UsuariosData extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idusuarios_data;

    /**
     *
     * @var integer
     */
    protected $id_usuarios;

    /**
     *
     * @var string
     */
    protected $nombres;

    /**
     *
     * @var string
     */
    protected $apellidos;

    /**
     *
     * @var string
     */
    protected $pais;

    /**
     *
     * @var string
     */
    protected $ciudad;

    /**
     *
     * @var string
     */
    protected $telefono;

    /**
     *
     * @var string
     */
    protected $fecha_nacimiento;

    /**
     * Method to set the value of field idusuarios_data
     *
     * @param integer $idusuarios_data
     * @return $this
     */
    public function setIdusuariosData($idusuarios_data)
    {
        $this->idusuarios_data = $idusuarios_data;

        return $this;
    }

    /**
     * Method to set the value of field id_usuarios
     *
     * @param integer $id_usuarios
     * @return $this
     */
    public function setIdUsuarios($id_usuarios)
    {
        $this->id_usuarios = $id_usuarios;

        return $this;
    }

    /**
     * Method to set the value of field nombres
     *
     * @param string $nombres
     * @return $this
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Method to set the value of field apellidos
     *
     * @param string $apellidos
     * @return $this
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Method to set the value of field pais
     *
     * @param string $pais
     * @return $this
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Method to set the value of field ciudad
     *
     * @param string $ciudad
     * @return $this
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Method to set the value of field telefono
     *
     * @param string $telefono
     * @return $this
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Method to set the value of field fecha_nacimiento
     *
     * @param string $fecha_nacimiento
     * @return $this
     */
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    /**
     * Returns the value of field idusuarios_data
     *
     * @return integer
     */
    public function getIdusuariosData()
    {
        return $this->idusuarios_data;
    }

    /**
     * Returns the value of field id_usuarios
     *
     * @return integer
     */
    public function getIdUsuarios()
    {
        return $this->id_usuarios;
    }

    /**
     * Returns the value of field nombres
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Returns the value of field apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Returns the value of field pais
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Returns the value of field ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Returns the value of field telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Returns the value of field fecha_nacimiento
     *
     * @return string
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_usuarios', 'Usuarios', 'idusuarios', array('alias' => 'Usuarios'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuarios_data';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsuariosData[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsuariosData
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
