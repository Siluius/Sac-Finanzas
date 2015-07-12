<?php

class CategoriaGastos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_categoria_gastos;

    /**
     *
     * @var string
     */
    protected $descripcion;

    /**
     *
     * @var integer
     */
    protected $estado;

    /**
     * Method to set the value of field id_categoria_gastos
     *
     * @param integer $id_categoria_gastos
     * @return $this
     */
    public function setIdCategoriaGastos($id_categoria_gastos)
    {
        $this->id_categoria_gastos = $id_categoria_gastos;

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
     * Returns the value of field id_categoria_gastos
     *
     * @return integer
     */
    public function getIdCategoriaGastos()
    {
        return $this->id_categoria_gastos;
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
        $this->hasMany('id_categoria_gastos', 'DetallePresupuesto', 'id_categoria_gastos', array('alias' => 'DetallePresupuesto'));
        $this->hasMany('id_categoria_gastos', 'Gastos', 'id_categoria_gast', array('alias' => 'Gastos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'categoria_gastos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CategoriaGastos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CategoriaGastos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
