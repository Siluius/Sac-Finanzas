<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class GastosController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for gastos
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Gastos", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_gastos";

        $gastos = Gastos::find($parameters);
        if (count($gastos) == 0) {
            $this->flash->notice("The search did not find any gastos");

            return $this->dispatcher->forward(array(
                "controller" => "gastos",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $gastos,
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
     * Edits a gasto
     *
     * @param string $id_gastos
     */
    public function editAction($id_gastos)
    {

        if (!$this->request->isPost()) {

            $gasto = Gastos::findFirstByid_gastos($id_gastos);
            if (!$gasto) {
                $this->flash->error("gasto was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "gastos",
                    "action" => "index"
                ));
            }

            $this->view->id_gastos = $gasto->id_gastos;

            $this->tag->setDefault("id_gastos", $gasto->getIdGastos());
            $this->tag->setDefault("id_categoria_gast", $gasto->getIdCategoriaGast());
            $this->tag->setDefault("id_usuari", $gasto->getIdUsuari());
            $this->tag->setDefault("monto", $gasto->getMonto());
            $this->tag->setDefault("descripcion", $gasto->getDescripcion());
            $this->tag->setDefault("fecha", $gasto->getFecha());
            $this->tag->setDefault("estado", $gasto->getEstado());
            
        }
    }

    /**
     * Creates a new gasto
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "gastos",
                "action" => "index"
            ));
        }

        $gasto = new Gastos();

        $gasto->setIdCategoriaGast($this->request->getPost("id_categoria_gast"));
        $gasto->setIdUsuari($this->request->getPost("id_usuari"));
        $gasto->setMonto($this->request->getPost("monto"));
        $gasto->setDescripcion($this->request->getPost("descripcion"));
        $gasto->setFecha($this->request->getPost("fecha"));
        $gasto->setEstado($this->request->getPost("estado"));
        

        if (!$gasto->save()) {
            foreach ($gasto->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "gastos",
                "action" => "new"
            ));
        }

        $this->flash->success("gasto was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "gastos",
            "action" => "index"
        ));

    }

    /**
     * Saves a gasto edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "gastos",
                "action" => "index"
            ));
        }

        $id_gastos = $this->request->getPost("id_gastos");

        $gasto = Gastos::findFirstByid_gastos($id_gastos);
        if (!$gasto) {
            $this->flash->error("gasto does not exist " . $id_gastos);

            return $this->dispatcher->forward(array(
                "controller" => "gastos",
                "action" => "index"
            ));
        }

        $gasto->setIdCategoriaGast($this->request->getPost("id_categoria_gast"));
        $gasto->setIdUsuari($this->request->getPost("id_usuari"));
        $gasto->setMonto($this->request->getPost("monto"));
        $gasto->setDescripcion($this->request->getPost("descripcion"));
        $gasto->setFecha($this->request->getPost("fecha"));
        $gasto->setEstado($this->request->getPost("estado"));
        

        if (!$gasto->save()) {

            foreach ($gasto->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "gastos",
                "action" => "edit",
                "params" => array($gasto->id_gastos)
            ));
        }

        $this->flash->success("gasto was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "gastos",
            "action" => "index"
        ));

    }

    /**
     * Deletes a gasto
     *
     * @param string $id_gastos
     */
    public function deleteAction($id_gastos)
    {

        $gasto = Gastos::findFirstByid_gastos($id_gastos);
        if (!$gasto) {
            $this->flash->error("gasto was not found");

            return $this->dispatcher->forward(array(
                "controller" => "gastos",
                "action" => "index"
            ));
        }

        if (!$gasto->delete()) {

            foreach ($gasto->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "gastos",
                "action" => "search"
            ));
        }

        $this->flash->success("gasto was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "gastos",
            "action" => "index"
        ));
    }

}
