<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CategoriaGastosController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for categoria_gastos
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "CategoriaGastos", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_categoria_gastos";

        $categoria_gastos = CategoriaGastos::find($parameters);
        if (count($categoria_gastos) == 0) {
            $this->flash->notice("The search did not find any categoria_gastos");

            return $this->dispatcher->forward(array(
                "controller" => "categoria_gastos",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $categoria_gastos,
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
     * Edits a categoria_gasto
     *
     * @param string $id_categoria_gastos
     */
    public function editAction($id_categoria_gastos)
    {

        if (!$this->request->isPost()) {

            $categoria_gasto = CategoriaGastos::findFirstByid_categoria_gastos($id_categoria_gastos);
            if (!$categoria_gasto) {
                $this->flash->error("categoria_gasto was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "categoria_gastos",
                    "action" => "index"
                ));
            }

            $this->view->id_categoria_gastos = $categoria_gasto->id_categoria_gastos;

            $this->tag->setDefault("id_categoria_gastos", $categoria_gasto->getIdCategoriaGastos());
            $this->tag->setDefault("descripcion", $categoria_gasto->getDescripcion());
            $this->tag->setDefault("estado", $categoria_gasto->getEstado());
            
        }
    }

    /**
     * Creates a new categoria_gasto
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "categoria_gastos",
                "action" => "index"
            ));
        }

        $categoria_gasto = new CategoriaGastos();

        $categoria_gasto->setDescripcion($this->request->getPost("descripcion"));
        $categoria_gasto->setEstado($this->request->getPost("estado"));
        

        if (!$categoria_gasto->save()) {
            foreach ($categoria_gasto->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "categoria_gastos",
                "action" => "new"
            ));
        }

        $this->flash->success("categoria_gasto was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "categoria_gastos",
            "action" => "index"
        ));

    }

    /**
     * Saves a categoria_gasto edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "categoria_gastos",
                "action" => "index"
            ));
        }

        $id_categoria_gastos = $this->request->getPost("id_categoria_gastos");

        $categoria_gasto = CategoriaGastos::findFirstByid_categoria_gastos($id_categoria_gastos);
        if (!$categoria_gasto) {
            $this->flash->error("categoria_gasto does not exist " . $id_categoria_gastos);

            return $this->dispatcher->forward(array(
                "controller" => "categoria_gastos",
                "action" => "index"
            ));
        }

        $categoria_gasto->setDescripcion($this->request->getPost("descripcion"));
        $categoria_gasto->setEstado($this->request->getPost("estado"));
        

        if (!$categoria_gasto->save()) {

            foreach ($categoria_gasto->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "categoria_gastos",
                "action" => "edit",
                "params" => array($categoria_gasto->id_categoria_gastos)
            ));
        }

        $this->flash->success("categoria_gasto was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "categoria_gastos",
            "action" => "index"
        ));

    }

    /**
     * Deletes a categoria_gasto
     *
     * @param string $id_categoria_gastos
     */
    public function deleteAction($id_categoria_gastos)
    {

        $categoria_gasto = CategoriaGastos::findFirstByid_categoria_gastos($id_categoria_gastos);
        if (!$categoria_gasto) {
            $this->flash->error("categoria_gasto was not found");

            return $this->dispatcher->forward(array(
                "controller" => "categoria_gastos",
                "action" => "index"
            ));
        }

        if (!$categoria_gasto->delete()) {

            foreach ($categoria_gasto->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "categoria_gastos",
                "action" => "search"
            ));
        }

        $this->flash->success("categoria_gasto was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "categoria_gastos",
            "action" => "index"
        ));
    }

}
