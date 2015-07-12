<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class AhorroController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for ahorro
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Ahorro", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_ahorro";

        $ahorro = Ahorro::find($parameters);
        if (count($ahorro) == 0) {
            $this->flash->notice("The search did not find any ahorro");

            return $this->dispatcher->forward(array(
                "controller" => "ahorro",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $ahorro,
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
     * Edits a ahorro
     *
     * @param string $id_ahorro
     */
    public function editAction($id_ahorro)
    {

        if (!$this->request->isPost()) {

            $ahorro = Ahorro::findFirstByid_ahorro($id_ahorro);
            if (!$ahorro) {
                $this->flash->error("ahorro was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "ahorro",
                    "action" => "index"
                ));
            }

            $this->view->id_ahorro = $ahorro->id_ahorro;

            $this->tag->setDefault("id_ahorro", $ahorro->getIdAhorro());
            $this->tag->setDefault("id_userr", $ahorro->getIdUserr());
            $this->tag->setDefault("monto", $ahorro->getMonto());
            $this->tag->setDefault("descripcion", $ahorro->getDescripcion());
            $this->tag->setDefault("fecha", $ahorro->getFecha());
            $this->tag->setDefault("estado", $ahorro->getEstado());
            
        }
    }

    /**
     * Creates a new ahorro
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "ahorro",
                "action" => "index"
            ));
        }

        $ahorro = new Ahorro();

        $ahorro->setIdUserr($this->request->getPost("id_userr"));
        $ahorro->setMonto($this->request->getPost("monto"));
        $ahorro->setDescripcion($this->request->getPost("descripcion"));
        $ahorro->setFecha($this->request->getPost("fecha"));
        $ahorro->setEstado($this->request->getPost("estado"));
        

        if (!$ahorro->save()) {
            foreach ($ahorro->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "ahorro",
                "action" => "new"
            ));
        }

        $this->flash->success("ahorro was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "ahorro",
            "action" => "index"
        ));

    }

    /**
     * Saves a ahorro edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "ahorro",
                "action" => "index"
            ));
        }

        $id_ahorro = $this->request->getPost("id_ahorro");

        $ahorro = Ahorro::findFirstByid_ahorro($id_ahorro);
        if (!$ahorro) {
            $this->flash->error("ahorro does not exist " . $id_ahorro);

            return $this->dispatcher->forward(array(
                "controller" => "ahorro",
                "action" => "index"
            ));
        }

        $ahorro->setIdUserr($this->request->getPost("id_userr"));
        $ahorro->setMonto($this->request->getPost("monto"));
        $ahorro->setDescripcion($this->request->getPost("descripcion"));
        $ahorro->setFecha($this->request->getPost("fecha"));
        $ahorro->setEstado($this->request->getPost("estado"));
        

        if (!$ahorro->save()) {

            foreach ($ahorro->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "ahorro",
                "action" => "edit",
                "params" => array($ahorro->id_ahorro)
            ));
        }

        $this->flash->success("ahorro was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "ahorro",
            "action" => "index"
        ));

    }

    /**
     * Deletes a ahorro
     *
     * @param string $id_ahorro
     */
    public function deleteAction($id_ahorro)
    {

        $ahorro = Ahorro::findFirstByid_ahorro($id_ahorro);
        if (!$ahorro) {
            $this->flash->error("ahorro was not found");

            return $this->dispatcher->forward(array(
                "controller" => "ahorro",
                "action" => "index"
            ));
        }

        if (!$ahorro->delete()) {

            foreach ($ahorro->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "ahorro",
                "action" => "search"
            ));
        }

        $this->flash->success("ahorro was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "ahorro",
            "action" => "index"
        ));
    }

}
