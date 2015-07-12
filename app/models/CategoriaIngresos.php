<?php

class CategoriaIngresos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_categoria_ingresos;

    /**
     *
     * @var string
     */
    protected $descripcion;

    /**
     * Method to set the value of field id_categoria_ingresos
     *
     * @param integer $id_categoria_ingresos
     * @return $this
     */
    public function setIdCategoriaIngresos($id_categoria_ingresos)
    {
        $this->id_categoria_ingresos = $id_categoria_ingresos;

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
     * Returns the value of field id_categoria_ingresos
     *
     * @return integer
     */
    public function getIdCategoriaIngresos()
    {
        return $this->id_categoria_ingresos;
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
        $this->hasMany('id_categoria_ingresos', 'Ingresos', 'id_categoria', array('alias' => 'Ingresos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'categoria_ingresos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CategoriaIngresos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CategoriaIngresos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
