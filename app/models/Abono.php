<?php

class Abono extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_abono;

    /**
     *
     * @var integer
     */
    protected $id_deuda;

    /**
     *
     * @var double
     */
    protected $monto;

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
     * Method to set the value of field id_abono
     *
     * @param integer $id_abono
     * @return $this
     */
    public function setIdAbono($id_abono)
    {
        $this->id_abono = $id_abono;

        return $this;
    }

    /**
     * Method to set the value of field id_deuda
     *
     * @param integer $id_deuda
     * @return $this
     */
    public function setIdDeuda($id_deuda)
    {
        $this->id_deuda = $id_deuda;

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
     * Returns the value of field id_abono
     *
     * @return integer
     */
    public function getIdAbono()
    {
        return $this->id_abono;
    }

    /**
     * Returns the value of field id_deuda
     *
     * @return integer
     */
    public function getIdDeuda()
    {
        return $this->id_deuda;
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
        $this->belongsTo('id_deuda', 'Deudas', 'id_deudas', array('alias' => 'Deudas'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'abono';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Abono[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Abono
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
