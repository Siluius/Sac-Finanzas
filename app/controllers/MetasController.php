<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class MetasController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for metas
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Metas", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_metas";

        $metas = Metas::find($parameters);
        if (count($metas) == 0) {
            $this->flash->notice("The search did not find any metas");

            return $this->dispatcher->forward(array(
                "controller" => "metas",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $metas,
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
     * Edits a meta
     *
     * @param string $id_metas
     */
    public function editAction($id_metas)
    {

        if (!$this->request->isPost()) {

            $meta = Metas::findFirstByid_metas($id_metas);
            if (!$meta) {
                $this->flash->error("meta was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "metas",
                    "action" => "index"
                ));
            }

            $this->view->id_metas = $meta->id_metas;

            $this->tag->setDefault("id_metas", $meta->getIdMetas());
            $this->tag->setDefault("meta", $meta->getMeta());
            $this->tag->setDefault("monto", $meta->getMonto());
            $this->tag->setDefault("estado", $meta->getEstado());
            $this->tag->setDefault("id_usuarioo", $meta->getIdUsuarioo());
            
        }
    }

    /**
     * Creates a new meta
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "metas",
                "action" => "index"
            ));
        }

        $meta = new Metas();

        $meta->setMeta($this->request->getPost("meta"));
        $meta->setMonto($this->request->getPost("monto"));
        $meta->setEstado($this->request->getPost("estado"));
        $meta->setIdUsuarioo($this->request->getPost("id_usuarioo"));
        

        if (!$meta->save()) {
            foreach ($meta->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "metas",
                "action" => "new"
            ));
        }

        $this->flash->success("meta was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "metas",
            "action" => "index"
        ));

    }

    /**
     * Saves a meta edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "metas",
                "action" => "index"
            ));
        }

        $id_metas = $this->request->getPost("id_metas");

        $meta = Metas::findFirstByid_metas($id_metas);
        if (!$meta) {
            $this->flash->error("meta does not exist " . $id_metas);

            return $this->dispatcher->forward(array(
                "controller" => "metas",
                "action" => "index"
            ));
        }

        $meta->setMeta($this->request->getPost("meta"));
        $meta->setMonto($this->request->getPost("monto"));
        $meta->setEstado($this->request->getPost("estado"));
        $meta->setIdUsuarioo($this->request->getPost("id_usuarioo"));
        

        if (!$meta->save()) {

            foreach ($meta->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "metas",
                "action" => "edit",
                "params" => array($meta->id_metas)
            ));
        }

        $this->flash->success("meta was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "metas",
            "action" => "index"
        ));

    }

    /**
     * Deletes a meta
     *
     * @param string $id_metas
     */
    public function deleteAction($id_metas)
    {

        $meta = Metas::findFirstByid_metas($id_metas);
        if (!$meta) {
            $this->flash->error("meta was not found");

            return $this->dispatcher->forward(array(
                "controller" => "metas",
                "action" => "index"
            ));
        }

        if (!$meta->delete()) {

            foreach ($meta->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "metas",
                "action" => "search"
            ));
        }

        $this->flash->success("meta was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "metas",
            "action" => "index"
        ));
    }

}
