<?php

class Ingresos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idingresos;

    /**
     *
     * @var integer
     */
    protected $id_categoria;

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
    protected $fecha_transaccion;

    /**
     *
     * @var integer
     */
    protected $estado;

    /**
     *
     * @var integer
     */
    protected $id_user;

    /**
     * Method to set the value of field idingresos
     *
     * @param integer $idingresos
     * @return $this
     */
    public function setIdingresos($idingresos)
    {
        $this->idingresos = $idingresos;

        return $this;
    }

    /**
     * Method to set the value of field id_categoria
     *
     * @param integer $id_categoria
     * @return $this
     */
    public function setIdCategoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

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
     * Method to set the value of field fecha_transaccion
     *
     * @param string $fecha_transaccion
     * @return $this
     */
    public function setFechaTransaccion($fecha_transaccion)
    {
        $this->fecha_transaccion = $fecha_transaccion;

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
     * Method to set the value of field id_user
     *
     * @param integer $id_user
     * @return $this
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Returns the value of field idingresos
     *
     * @return integer
     */
    public function getIdingresos()
    {
        return $this->idingresos;
    }

    /**
     * Returns the value of field id_categoria
     *
     * @return integer
     */
    public function getIdCategoria()
    {
        return $this->id_categoria;
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
     * Returns the value of field fecha_transaccion
     *
     * @return string
     */
    public function getFechaTransaccion()
    {
        return $this->fecha_transaccion;
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
     * Returns the value of field id_user
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_categoria', 'CategoriaIngresos', 'id_categoria_ingresos', array('alias' => 'CategoriaIngresos'));
        $this->belongsTo('id_user', 'Usuarios', 'idusuarios', array('alias' => 'Usuarios'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ingresos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ingresos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ingresos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
