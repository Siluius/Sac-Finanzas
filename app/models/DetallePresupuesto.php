<?php

class DetallePresupuesto extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_detalle_presupuesto;

    /**
     *
     * @var integer
     */
    protected $id_presupuesto;

    /**
     *
     * @var integer
     */
    protected $id_categoria_gastos;

    /**
     *
     * @var double
     */
    protected $monto;

    /**
     *
     * @var integer
     */
    protected $estado;

    /**
     * Method to set the value of field id_detalle_presupuesto
     *
     * @param integer $id_detalle_presupuesto
     * @return $this
     */
    public function setIdDetallePresupuesto($id_detalle_presupuesto)
    {
        $this->id_detalle_presupuesto = $id_detalle_presupuesto;

        return $this;
    }

    /**
     * Method to set the value of field id_presupuesto
     *
     * @param integer $id_presupuesto
     * @return $this
     */
    public function setIdPresupuesto($id_presupuesto)
    {
        $this->id_presupuesto = $id_presupuesto;

        return $this;
    }

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
     * Returns the value of field id_detalle_presupuesto
     *
     * @return integer
     */
    public function getIdDetallePresupuesto()
    {
        return $this->id_detalle_presupuesto;
    }

    /**
     * Returns the value of field id_presupuesto
     *
     * @return integer
     */
    public function getIdPresupuesto()
    {
        return $this->id_presupuesto;
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
     * Returns the value of field monto
     *
     * @return double
     */
    public function getMonto()
    {
        return $this->monto;
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
        $this->belongsTo('id_categoria_gastos', 'CategoriaGastos', 'id_categoria_gastos', array('alias' => 'CategoriaGastos'));
        $this->belongsTo('id_presupuesto', 'Presupuesto', 'id_presupuesto', array('alias' => 'Presupuesto'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'detalle_presupuesto';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DetallePresupuesto[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DetallePresupuesto
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
