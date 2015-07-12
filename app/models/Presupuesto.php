<?php

class Presupuesto extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_presupuesto;

    /**
     *
     * @var integer
     */
    protected $id_usuar;

    /**
     *
     * @var string
     */
    protected $nombre;

    /**
     *
     * @var string
     */
    protected $fecha_inicial;

    /**
     *
     * @var string
     */
    protected $fecha_final;

    /**
     *
     * @var integer
     */
    protected $estado;

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
     * Method to set the value of field id_usuar
     *
     * @param integer $id_usuar
     * @return $this
     */
    public function setIdUsuar($id_usuar)
    {
        $this->id_usuar = $id_usuar;

        return $this;
    }

    /**
     * Method to set the value of field nombre
     *
     * @param string $nombre
     * @return $this
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Method to set the value of field fecha_inicial
     *
     * @param string $fecha_inicial
     * @return $this
     */
    public function setFechaInicial($fecha_inicial)
    {
        $this->fecha_inicial = $fecha_inicial;

        return $this;
    }

    /**
     * Method to set the value of field fecha_final
     *
     * @param string $fecha_final
     * @return $this
     */
    public function setFechaFinal($fecha_final)
    {
        $this->fecha_final = $fecha_final;

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
     * Returns the value of field id_presupuesto
     *
     * @return integer
     */
    public function getIdPresupuesto()
    {
        return $this->id_presupuesto;
    }

    /**
     * Returns the value of field id_usuar
     *
     * @return integer
     */
    public function getIdUsuar()
    {
        return $this->id_usuar;
    }

    /**
     * Returns the value of field nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Returns the value of field fecha_inicial
     *
     * @return string
     */
    public function getFechaInicial()
    {
        return $this->fecha_inicial;
    }

    /**
     * Returns the value of field fecha_final
     *
     * @return string
     */
    public function getFechaFinal()
    {
        return $this->fecha_final;
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
        $this->hasMany('id_presupuesto', 'DetallePresupuesto', 'id_presupuesto', array('alias' => 'DetallePresupuesto'));
        $this->belongsTo('id_usuar', 'Usuarios', 'idusuarios', array('alias' => 'Usuarios'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'presupuesto';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Presupuesto[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Presupuesto
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
