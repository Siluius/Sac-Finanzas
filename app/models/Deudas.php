<?php

class Deudas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_deudas;

    /**
     *
     * @var integer
     */
    protected $id_usario;

    /**
     *
     * @var string
     */
    protected $descripcion;

    /**
     *
     * @var double
     */
    protected $monto_total;

    /**
     *
     * @var integer
     */
    protected $cantidad_abonos;

    /**
     *
     * @var string
     */
    protected $duracion_deuda;

    /**
     *
     * @var string
     */
    protected $fecha_primer_acono;

    /**
     *
     * @var string
     */
    protected $fecha_ultimo_abono;

    /**
     *
     * @var integer
     */
    protected $estado;

    /**
     * Method to set the value of field id_deudas
     *
     * @param integer $id_deudas
     * @return $this
     */
    public function setIdDeudas($id_deudas)
    {
        $this->id_deudas = $id_deudas;

        return $this;
    }

    /**
     * Method to set the value of field id_usario
     *
     * @param integer $id_usario
     * @return $this
     */
    public function setIdUsario($id_usario)
    {
        $this->id_usario = $id_usario;

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
     * Method to set the value of field monto_total
     *
     * @param double $monto_total
     * @return $this
     */
    public function setMontoTotal($monto_total)
    {
        $this->monto_total = $monto_total;

        return $this;
    }

    /**
     * Method to set the value of field cantidad_abonos
     *
     * @param integer $cantidad_abonos
     * @return $this
     */
    public function setCantidadAbonos($cantidad_abonos)
    {
        $this->cantidad_abonos = $cantidad_abonos;

        return $this;
    }

    /**
     * Method to set the value of field duracion_deuda
     *
     * @param string $duracion_deuda
     * @return $this
     */
    public function setDuracionDeuda($duracion_deuda)
    {
        $this->duracion_deuda = $duracion_deuda;

        return $this;
    }

    /**
     * Method to set the value of field fecha_primer_acono
     *
     * @param string $fecha_primer_acono
     * @return $this
     */
    public function setFechaPrimerAcono($fecha_primer_acono)
    {
        $this->fecha_primer_acono = $fecha_primer_acono;

        return $this;
    }

    /**
     * Method to set the value of field fecha_ultimo_abono
     *
     * @param string $fecha_ultimo_abono
     * @return $this
     */
    public function setFechaUltimoAbono($fecha_ultimo_abono)
    {
        $this->fecha_ultimo_abono = $fecha_ultimo_abono;

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
     * Returns the value of field id_deudas
     *
     * @return integer
     */
    public function getIdDeudas()
    {
        return $this->id_deudas;
    }

    /**
     * Returns the value of field id_usario
     *
     * @return integer
     */
    public function getIdUsario()
    {
        return $this->id_usario;
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
     * Returns the value of field monto_total
     *
     * @return double
     */
    public function getMontoTotal()
    {
        return $this->monto_total;
    }

    /**
     * Returns the value of field cantidad_abonos
     *
     * @return integer
     */
    public function getCantidadAbonos()
    {
        return $this->cantidad_abonos;
    }

    /**
     * Returns the value of field duracion_deuda
     *
     * @return string
     */
    public function getDuracionDeuda()
    {
        return $this->duracion_deuda;
    }

    /**
     * Returns the value of field fecha_primer_acono
     *
     * @return string
     */
    public function getFechaPrimerAcono()
    {
        return $this->fecha_primer_acono;
    }

    /**
     * Returns the value of field fecha_ultimo_abono
     *
     * @return string
     */
    public function getFechaUltimoAbono()
    {
        return $this->fecha_ultimo_abono;
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
        $this->hasMany('id_deudas', 'Abono', 'id_deuda', array('alias' => 'Abono'));
        $this->belongsTo('id_usario', 'Usuarios', 'idusuarios', array('alias' => 'Usuarios'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'deudas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Deudas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Deudas
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
