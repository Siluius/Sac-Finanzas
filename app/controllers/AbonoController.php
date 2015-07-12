<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class AbonoController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for abono
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Abono", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_abono";

        $abono = Abono::find($parameters);
        if (count($abono) == 0) {
            $this->flash->notice("The search did not find any abono");

            return $this->dispatcher->forward(array(
                "controller" => "abono",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $abono,
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
     * Edits a abono
     *
     * @param string $id_abono
     */
    public function editAction($id_abono)
    {

        if (!$this->request->isPost()) {

            $abono = Abono::findFirstByid_abono($id_abono);
            if (!$abono) {
                $this->flash->error("abono was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "abono",
                    "action" => "index"
                ));
            }

            $this->view->id_abono = $abono->id_abono;

            $this->tag->setDefault("id_abono", $abono->getIdAbono());
            $this->tag->setDefault("id_deuda", $abono->getIdDeuda());
            $this->tag->setDefault("monto", $abono->getMonto());
            $this->tag->setDefault("fecha", $abono->getFecha());
            $this->tag->setDefault("estado", $abono->getEstado());
            
        }
    }

    /**
     * Creates a new abono
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "abono",
                "action" => "index"
            ));
        }

        $abono = new Abono();

        $abono->setIdDeuda($this->request->getPost("id_deuda"));
        $abono->setMonto($this->request->getPost("monto"));
        $abono->setFecha($this->request->getPost("fecha"));
        $abono->setEstado($this->request->getPost("estado"));
        

        if (!$abono->save()) {
            foreach ($abono->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "abono",
                "action" => "new"
            ));
        }

        $this->flash->success("abono was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "abono",
            "action" => "index"
        ));

    }

    /**
     * Saves a abono edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "abono",
                "action" => "index"
            ));
        }

        $id_abono = $this->request->getPost("id_abono");

        $abono = Abono::findFirstByid_abono($id_abono);
        if (!$abono) {
            $this->flash->error("abono does not exist " . $id_abono);

            return $this->dispatcher->forward(array(
                "controller" => "abono",
                "action" => "index"
            ));
        }

        $abono->setIdDeuda($this->request->getPost("id_deuda"));
        $abono->setMonto($this->request->getPost("monto"));
        $abono->setFecha($this->request->getPost("fecha"));
        $abono->setEstado($this->request->getPost("estado"));
        

        if (!$abono->save()) {

            foreach ($abono->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "abono",
                "action" => "edit",
                "params" => array($abono->id_abono)
            ));
        }

        $this->flash->success("abono was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "abono",
            "action" => "index"
        ));

    }

    /**
     * Deletes a abono
     *
     * @param string $id_abono
     */
    public function deleteAction($id_abono)
    {

        $abono = Abono::findFirstByid_abono($id_abono);
        if (!$abono) {
            $this->flash->error("abono was not found");

            return $this->dispatcher->forward(array(
                "controller" => "abono",
                "action" => "index"
            ));
        }

        if (!$abono->delete()) {

            foreach ($abono->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "abono",
                "action" => "search"
            ));
        }

        $this->flash->success("abono was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "abono",
            "action" => "index"
        ));
    }

}
