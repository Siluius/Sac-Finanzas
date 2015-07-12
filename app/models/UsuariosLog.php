<?php

class UsuariosLog extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idusuarios_log;

    /**
     *
     * @var integer
     */
    protected $id_usuarios;

    /**
     *
     * @var string
     */
    protected $fecha_proceso;

    /**
     *
     * @var string
     */
    protected $ip;

    /**
     *
     * @var string
     */
    protected $descripcion;

    /**
     * Method to set the value of field idusuarios_log
     *
     * @param integer $idusuarios_log
     * @return $this
     */
    public function setIdusuariosLog($idusuarios_log)
    {
        $this->idusuarios_log = $idusuarios_log;

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
     * Method to set the value of field fecha_proceso
     *
     * @param string $fecha_proceso
     * @return $this
     */
    public function setFechaProceso($fecha_proceso)
    {
        $this->fecha_proceso = $fecha_proceso;

        return $this;
    }

    /**
     * Method to set the value of field ip
     *
     * @param string $ip
     * @return $this
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Method to set the value of field descripcion
     *
     * @param string $descripcion
     * @return $this
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Returns the value of field idusuarios_log
     *
     * @return integer
     */
    public function getIdusuariosLog()
    {
        return $this->idusuarios_log;
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
     * Returns the value of field fecha_proceso
     *
     * @return string
     */
    public function getFechaProceso()
    {
        return $this->fecha_proceso;
    }

    /**
     * Returns the value of field ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Returns the value of field descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
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
        return 'usuarios_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsuariosLog[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsuariosLog
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
