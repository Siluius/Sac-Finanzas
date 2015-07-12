<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class DetallePresupuestoController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for detalle_presupuesto
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "DetallePresupuesto", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_detalle_presupuesto";

        $detalle_presupuesto = DetallePresupuesto::find($parameters);
        if (count($detalle_presupuesto) == 0) {
            $this->flash->notice("The search did not find any detalle_presupuesto");

            return $this->dispatcher->forward(array(
                "controller" => "detalle_presupuesto",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $detalle_presupuesto,
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
     * Edits a detalle_presupuesto
     *
     * @param string $id_detalle_presupuesto
     */
    public function editAction($id_detalle_presupuesto)
    {

        if (!$this->request->isPost()) {

            $detalle_presupuesto = DetallePresupuesto::findFirstByid_detalle_presupuesto($id_detalle_presupuesto);
            if (!$detalle_presupuesto) {
                $this->flash->error("detalle_presupuesto was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "detalle_presupuesto",
                    "action" => "index"
                ));
            }

            $this->view->id_detalle_presupuesto = $detalle_presupuesto->id_detalle_presupuesto;

            $this->tag->setDefault("id_detalle_presupuesto", $detalle_presupuesto->getIdDetallePresupuesto());
            $this->tag->setDefault("id_presupuesto", $detalle_presupuesto->getIdPresupuesto());
            $this->tag->setDefault("id_categoria_gastos", $detalle_presupuesto->getIdCategoriaGastos());
            $this->tag->setDefault("monto", $detalle_presupuesto->getMonto());
            $this->tag->setDefault("estado", $detalle_presupuesto->getEstado());
            
        }
    }

    /**
     * Creates a new detalle_presupuesto
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "detalle_presupuesto",
                "action" => "index"
            ));
        }

        $detalle_presupuesto = new DetallePresupuesto();

        $detalle_presupuesto->setIdPresupuesto($this->request->getPost("id_presupuesto"));
        $detalle_presupuesto->setIdCategoriaGastos($this->request->getPost("id_categoria_gastos"));
        $detalle_presupuesto->setMonto($this->request->getPost("monto"));
        $detalle_presupuesto->setEstado($this->request->getPost("estado"));
        

        if (!$detalle_presupuesto->save()) {
            foreach ($detalle_presupuesto->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "detalle_presupuesto",
                "action" => "new"
            ));
        }

        $this->flash->success("detalle_presupuesto was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "detalle_presupuesto",
            "action" => "index"
        ));

    }

    /**
     * Saves a detalle_presupuesto edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "detalle_presupuesto",
                "action" => "index"
            ));
        }

        $id_detalle_presupuesto = $this->request->getPost("id_detalle_presupuesto");

        $detalle_presupuesto = DetallePresupuesto::findFirstByid_detalle_presupuesto($id_detalle_presupuesto);
        if (!$detalle_presupuesto) {
            $this->flash->error("detalle_presupuesto does not exist " . $id_detalle_presupuesto);

            return $this->dispatcher->forward(array(
                "controller" => "detalle_presupuesto",
                "action" => "index"
            ));
        }

        $detalle_presupuesto->setIdPresupuesto($this->request->getPost("id_presupuesto"));
        $detalle_presupuesto->setIdCategoriaGastos($this->request->getPost("id_categoria_gastos"));
        $detalle_presupuesto->setMonto($this->request->getPost("monto"));
        $detalle_presupuesto->setEstado($this->request->getPost("estado"));
        

        if (!$detalle_presupuesto->save()) {

            foreach ($detalle_presupuesto->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "detalle_presupuesto",
                "action" => "edit",
                "params" => array($detalle_presupuesto->id_detalle_presupuesto)
            ));
        }

        $this->flash->success("detalle_presupuesto was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "detalle_presupuesto",
            "action" => "index"
        ));

    }

    /**
     * Deletes a detalle_presupuesto
     *
     * @param string $id_detalle_presupuesto
     */
    public function deleteAction($id_detalle_presupuesto)
    {

        $detalle_presupuesto = DetallePresupuesto::findFirstByid_detalle_presupuesto($id_detalle_presupuesto);
        if (!$detalle_presupuesto) {
            $this->flash->error("detalle_presupuesto was not found");

            return $this->dispatcher->forward(array(
                "controller" => "detalle_presupuesto",
                "action" => "index"
            ));
        }

        if (!$detalle_presupuesto->delete()) {

            foreach ($detalle_presupuesto->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "detalle_presupuesto",
                "action" => "search"
            ));
        }

        $this->flash->success("detalle_presupuesto was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "detalle_presupuesto",
            "action" => "index"
        ));
    }

}
