<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class DeudasController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for deudas
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Deudas", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_deudas";

        $deudas = Deudas::find($parameters);
        if (count($deudas) == 0) {
            $this->flash->notice("The search did not find any deudas");

            return $this->dispatcher->forward(array(
                "controller" => "deudas",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $deudas,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a deuda
     *
     * @param string $id_deudas
     */
    public function editAction($id_deudas)
    {

        if (!$this->request->isPost()) {

            $deuda = Deudas::findFirstByid_deudas($id_deudas);
            if (!$deuda) {
                $this->flash->error("deuda was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "deudas",
                    "action" => "index"
                ));
            }

            $this->view->id_deudas = $deuda->id_deudas;

            $this->tag->setDefault("id_deudas", $deuda->getIdDeudas());
            $this->tag->setDefault("id_usario", $deuda->getIdUsario());
            $this->tag->setDefault("descripcion", $deuda->getDescripcion());
            $this->tag->setDefault("monto_total", $deuda->getMontoTotal());
            $this->tag->setDefault("cantidad_abonos", $deuda->getCantidadAbonos());
            $this->tag->setDefault("duracion_deuda", $deuda->getDuracionDeuda());
            $this->tag->setDefault("fecha_primer_acono", $deuda->getFechaPrimerAcono());
            $this->tag->setDefault("fecha_ultimo_abono", $deuda->getFechaUltimoAbono());
            $this->tag->setDefault("estado", $deuda->getEstado());
            
        }
    }

    /**
     * Creates a new deuda
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "deudas",
                "action" => "index"
            ));
        }

        $deuda = new Deudas();

        $deuda->setIdDeudas($this->request->getPost("id_deudas"));
        $deuda->setIdUsario($this->request->getPost("id_usario"));
        $deuda->setDescripcion($this->request->getPost("descripcion"));
        $deuda->setMontoTotal($this->request->getPost("monto_total"));
        $deuda->setCantidadAbonos($this->request->getPost("cantidad_abonos"));
        $deuda->setDuracionDeuda($this->request->getPost("duracion_deuda"));
        $deuda->setFechaPrimerAcono($this->request->getPost("fecha_primer_acono"));
        $deuda->setFechaUltimoAbono($this->request->getPost("fecha_ultimo_abono"));
        $deuda->setEstado($this->request->getPost("estado"));
        

        if (!$deuda->save()) {
            foreach ($deuda->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "deudas",
                "action" => "new"
            ));
        }

        $this->flash->success("deuda was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "deudas",
            "action" => "index"
        ));

    }

    /**
     * Saves a deuda edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "deudas",
                "action" => "index"
            ));
        }

        $id_deudas = $this->request->getPost("id_deudas");

        $deuda = Deudas::findFirstByid_deudas($id_deudas);
        if (!$deuda) {
            $this->flash->error("deuda does not exist " . $id_deudas);

            return $this->dispatcher->forward(array(
                "controller" => "deudas",
                "action" => "index"
            ));
        }

        $deuda->setIdDeudas($this->request->getPost("id_deudas"));
        $deuda->setIdUsario($this->request->getPost("id_usario"));
        $deuda->setDescripcion($this->request->getPost("descripcion"));
        $deuda->setMontoTotal($this->request->getPost("monto_total"));
        $deuda->setCantidadAbonos($this->request->getPost("cantidad_abonos"));
        $deuda->setDuracionDeuda($this->request->getPost("duracion_deuda"));
        $deuda->setFechaPrimerAcono($this->request->getPost("fecha_primer_acono"));
        $deuda->setFechaUltimoAbono($this->request->getPost("fecha_ultimo_abono"));
        $deuda->setEstado($this->request->getPost("estado"));
        

        if (!$deuda->save()) {

            foreach ($deuda->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "deudas",
                "action" => "edit",
                "params" => array($deuda->id_deudas)
            ));
        }

        $this->flash->success("deuda was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "deudas",
            "action" => "index"
        ));

    }

    /**
     * Deletes a deuda
     *
     * @param string $id_deudas
     */
    public function deleteAction($id_deudas)
    {

        $deuda = Deudas::findFirstByid_deudas($id_deudas);
        if (!$deuda) {
            $this->flash->error("deuda was not found");

            return $this->dispatcher->forward(array(
                "controller" => "deudas",
                "action" => "index"
            ));
        }

        if (!$deuda->delete()) {

            foreach ($deuda->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "deudas",
                "action" => "search"
            ));
        }

        $this->flash->success("deuda was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "deudas",
            "action" => "index"
        ));
    }

}
