<?php

class Ahorro extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_ahorro;

    /**
     *
     * @var integer
     */
    protected $id_userr;

    /**
     *
     * @var double
     */
    protected $monto;

    /**
     *
     * @var string
     */
    protected $descripcion;

    /**
     *
     * @var string
     */
    protected $fecha;

    /**
     *
     * @var integer
     */
    protected $estado;

    /**
     * Method to set the value of field id_ahorro
     *
     * @param integer $id_ahorro
     * @return $this
     */
    public function setIdAhorro($id_ahorro)
    {
        $this->id_ahorro = $id_ahorro;

        return $this;
    }

    /**
     * Method to set the value of field id_userr
     *
     * @param integer $id_userr
     * @return $this
     */
    public function setIdUserr($id_userr)
    {
        $this->id_userr = $id_userr;

        return $this;
    }

    /**
     * Method to set the value of field monto
     *
     * @param double $monto
     * @return $this
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

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
     * Method to set the value of field fecha
     *
     * @param string $fecha
     * @return $this
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

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
     * Returns the value of field id_ahorro
     *
     * @return integer
     */
    public function getIdAhorro()
    {
        return $this->id_ahorro;
    }

    /**
     * Returns the value of field id_userr
     *
     * @return integer
     */
    public function getIdUserr()
    {
        return $this->id_userr;
    }

    /**
     * Returns the value of field monto
     *
     * @return double
     */
    public function getMonto()
    {
        return $this->monto;
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
     * Returns the value of field fecha
     *
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_userr', 'Usuarios', 'idusuarios', array('alias' => 'Usuarios'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ahorro';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ahorro[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ahorro
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
