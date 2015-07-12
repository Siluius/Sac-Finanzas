<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class PresupuestoController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for presupuesto
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Presupuesto", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_presupuesto";

        $presupuesto = Presupuesto::find($parameters);
        if (count($presupuesto) == 0) {
            $this->flash->notice("The search did not find any presupuesto");

            return $this->dispatcher->forward(array(
                "controller" => "presupuesto",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $presupuesto,
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
     * Edits a presupuesto
     *
     * @param string $id_presupuesto
     */
    public function editAction($id_presupuesto)
    {

        if (!$this->request->isPost()) {

            $presupuesto = Presupuesto::findFirstByid_presupuesto($id_presupuesto);
            if (!$presupuesto) {
                $this->flash->error("presupuesto was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "presupuesto",
                    "action" => "index"
                ));
            }

            $this->view->id_presupuesto = $presupuesto->id_presupuesto;

            $this->tag->setDefault("id_presupuesto", $presupuesto->getIdPresupuesto());
            $this->tag->setDefault("id_usuar", $presupuesto->getIdUsuar());
            $this->tag->setDefault("nombre", $presupuesto->getNombre());
            $this->tag->setDefault("fecha_inicial", $presupuesto->getFechaInicial());
            $this->tag->setDefault("fecha_final", $presupuesto->getFechaFinal());
            $this->tag->setDefault("estado", $presupuesto->getEstado());
            
        }
    }

    /**
     * Creates a new presupuesto
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "presupuesto",
                "action" => "index"
            ));
        }

        $presupuesto = new Presupuesto();

        $presupuesto->setIdUsuar($this->request->getPost("id_usuar"));
        $presupuesto->setNombre($this->request->getPost("nombre"));
        $presupuesto->setFechaInicial($this->request->getPost("fecha_inicial"));
        $presupuesto->setFechaFinal($this->request->getPost("fecha_final"));
        $presupuesto->setEstado($this->request->getPost("estado"));
        

        if (!$presupuesto->save()) {
            foreach ($presupuesto->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "presupuesto",
                "action" => "new"
            ));
        }

        $this->flash->success("presupuesto was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "presupuesto",
            "action" => "index"
        ));

    }

    /**
     * Saves a presupuesto edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "presupuesto",
                "action" => "index"
            ));
        }

        $id_presupuesto = $this->request->getPost("id_presupuesto");

        $presupuesto = Presupuesto::findFirstByid_presupuesto($id_presupuesto);
        if (!$presupuesto) {
            $this->flash->error("presupuesto does not exist " . $id_presupuesto);

            return $this->dispatcher->forward(array(
                "controller" => "presupuesto",
                "action" => "index"
            ));
        }

        $presupuesto->setIdUsuar($this->request->getPost("id_usuar"));
        $presupuesto->setNombre($this->request->getPost("nombre"));
        $presupuesto->setFechaInicial($this->request->getPost("fecha_inicial"));
        $presupuesto->setFechaFinal($this->request->getPost("fecha_final"));
        $presupuesto->setEstado($this->request->getPost("estado"));
        

        if (!$presupuesto->save()) {

            foreach ($presupuesto->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "presupuesto",
                "action" => "edit",
                "params" => array($presupuesto->id_presupuesto)
            ));
        }

        $this->flash->success("presupuesto was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "presupuesto",
            "action" => "index"
        ));

    }

    /**
     * Deletes a presupuesto
     *
     * @param string $id_presupuesto
     */
    public function deleteAction($id_presupuesto)
    {

        $presupuesto = Presupuesto::findFirstByid_presupuesto($id_presupuesto);
        if (!$presupuesto) {
            $this->flash->error("presupuesto was not found");

            return $this->dispatcher->forward(array(
                "controller" => "presupuesto",
                "action" => "index"
            ));
        }

        if (!$presupuesto->delete()) {

            foreach ($presupuesto->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "presupuesto",
                "action" => "search"
            ));
        }

        $this->flash->success("presupuesto was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "presupuesto",
            "action" => "index"
        ));
    }

}
