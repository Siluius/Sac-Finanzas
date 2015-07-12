<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class IngresosController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for ingresos
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Ingresos", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "idingresos";

        $ingresos = Ingresos::find($parameters);
        if (count($ingresos) == 0) {
            $this->flash->notice("The search did not find any ingresos");

            return $this->dispatcher->forward(array(
                "controller" => "ingresos",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $ingresos,
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
     * Edits a ingreso
     *
     * @param string $idingresos
     */
    public function editAction($idingresos)
    {

        if (!$this->request->isPost()) {

            $ingreso = Ingresos::findFirstByidingresos($idingresos);
            if (!$ingreso) {
                $this->flash->error("ingreso was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "ingresos",
                    "action" => "index"
                ));
            }

            $this->view->idingresos = $ingreso->idingresos;

            $this->tag->setDefault("idingresos", $ingreso->getIdingresos());
            $this->tag->setDefault("id_categoria", $ingreso->getIdCategoria());
            $this->tag->setDefault("monto", $ingreso->getMonto());
            $this->tag->setDefault("descripcion", $ingreso->getDescripcion());
            $this->tag->setDefault("fecha_transaccion", $ingreso->getFechaTransaccion());
            $this->tag->setDefault("estado", $ingreso->getEstado());
            $this->tag->setDefault("id_user", $ingreso->getIdUser());
            
        }
    }

    /**
     * Creates a new ingreso
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "ingresos",
                "action" => "index"
            ));
        }

        $ingreso = new Ingresos();

        $ingreso->setIdCategoria($this->request->getPost("id_categoria"));
        $ingreso->setMonto($this->request->getPost("monto"));
        $ingreso->setDescripcion($this->request->getPost("descripcion"));
        $ingreso->setFechaTransaccion($this->request->getPost("fecha_transaccion"));
        $ingreso->setEstado($this->request->getPost("estado"));
        $ingreso->setIdUser($this->request->getPost("id_user"));
        

        if (!$ingreso->save()) {
            foreach ($ingreso->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "ingresos",
                "action" => "new"
            ));
        }

        $this->flash->success("ingreso was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "ingresos",
            "action" => "index"
        ));

    }

    /**
     * Saves a ingreso edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "ingresos",
                "action" => "index"
            ));
        }

        $idingresos = $this->request->getPost("idingresos");

        $ingreso = Ingresos::findFirstByidingresos($idingresos);
        if (!$ingreso) {
            $this->flash->error("ingreso does not exist " . $idingresos);

            return $this->dispatcher->forward(array(
                "controller" => "ingresos",
                "action" => "index"
            ));
        }

        $ingreso->setIdCategoria($this->request->getPost("id_categoria"));
        $ingreso->setMonto($this->request->getPost("monto"));
        $ingreso->setDescripcion($this->request->getPost("descripcion"));
        $ingreso->setFechaTransaccion($this->request->getPost("fecha_transaccion"));
        $ingreso->setEstado($this->request->getPost("estado"));
        $ingreso->setIdUser($this->request->getPost("id_user"));
        

        if (!$ingreso->save()) {

            foreach ($ingreso->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "ingresos",
                "action" => "edit",
                "params" => array($ingreso->idingresos)
            ));
        }

        $this->flash->success("ingreso was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "ingresos",
            "action" => "index"
        ));

    }

    /**
     * Deletes a ingreso
     *
     * @param string $idingresos
     */
    public function deleteAction($idingresos)
    {

        $ingreso = Ingresos::findFirstByidingresos($idingresos);
        if (!$ingreso) {
            $this->flash->error("ingreso was not found");

            return $this->dispatcher->forward(array(
                "controller" => "ingresos",
                "action" => "index"
            ));
        }

        if (!$ingreso->delete()) {

            foreach ($ingreso->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "ingresos",
                "action" => "search"
            ));
        }

        $this->flash->success("ingreso was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "ingresos",
            "action" => "index"
        ));
    }

}
