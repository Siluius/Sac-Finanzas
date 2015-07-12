<?php

class Gastos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_gastos;

    /**
     *
     * @var integer
     */
    protected $id_categoria_gast;

    /**
     *
     * @var integer
     */
    protected $id_usuari;

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
     * Method to set the value of field id_gastos
     *
     * @param integer $id_gastos
     * @return $this
     */
    public function setIdGastos($id_gastos)
    {
        $this->id_gastos = $id_gastos;

        return $this;
    }

    /**
     * Method to set the value of field id_categoria_gast
     *
     * @param integer $id_categoria_gast
     * @return $this
     */
    public function setIdCategoriaGast($id_categoria_gast)
    {
        $this->id_categoria_gast = $id_categoria_gast;

        return $this;
    }

    /**
     * Method to set the value of field id_usuari
     *
     * @param integer $id_usuari
     * @return $this
     */
    public function setIdUsuari($id_usuari)
    {
        $this->id_usuari = $id_usuari;

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
     * Returns the value of field id_gastos
     *
     * @return integer
     */
    public function getIdGastos()
    {
        return $this->id_gastos;
    }

    /**
     * Returns the value of field id_categoria_gast
     *
     * @return integer
     */
    public function getIdCategoriaGast()
    {
        return $this->id_categoria_gast;
    }

    /**
     * Returns the value of field id_usuari
     *
     * @return integer
     */
    public function getIdUsuari()
    {
        return $this->id_usuari;
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
        $this->belongsTo('id_categoria_gast', 'CategoriaGastos', 'id_categoria_gastos', array('alias' => 'CategoriaGastos'));
        $this->belongsTo('id_usuari', 'Usuarios', 'idusuarios', array('alias' => 'Usuarios'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'gastos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Gastos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Gastos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
