<?php

class Metas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_metas;

    /**
     *
     * @var string
     */
    protected $meta;

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
     *
     * @var integer
     */
    protected $id_usuarioo;

    /**
     * Method to set the value of field id_metas
     *
     * @param integer $id_metas
     * @return $this
     */
    public function setIdMetas($id_metas)
    {
        $this->id_metas = $id_metas;

        return $this;
    }

    /**
     * Method to set the value of field meta
     *
     * @param string $meta
     * @return $this
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;

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
     * Method to set the value of field id_usuarioo
     *
     * @param integer $id_usuarioo
     * @return $this
     */
    public function setIdUsuarioo($id_usuarioo)
    {
        $this->id_usuarioo = $id_usuarioo;

        return $this;
    }

    /**
     * Returns the value of field id_metas
     *
     * @return integer
     */
    public function getIdMetas()
    {
        return $this->id_metas;
    }

    /**
     * Returns the value of field meta
     *
     * @return string
     */
    public function getMeta()
    {
        return $this->meta;
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
     * Returns the value of field id_usuarioo
     *
     * @return integer
     */
    public function getIdUsuarioo()
    {
        return $this->id_usuarioo;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_usuarioo', 'Usuarios', 'idusuarios', array('alias' => 'Usuarios'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'metas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Metas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Metas
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
