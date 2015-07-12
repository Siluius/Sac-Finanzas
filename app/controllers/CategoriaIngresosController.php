<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CategoriaIngresosController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for categoria_ingresos
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "CategoriaIngresos", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_categoria_ingresos";

        $categoria_ingresos = CategoriaIngresos::find($parameters);
        if (count($categoria_ingresos) == 0) {
            $this->flash->notice("The search did not find any categoria_ingresos");

            return $this->dispatcher->forward(array(
                "controller" => "categoria_ingresos",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $categoria_ingresos,
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
     * Edits a categoria_ingreso
     *
     * @param string $id_categoria_ingresos
     */
    public function editAction($id_categoria_ingresos)
    {

        if (!$this->request->isPost()) {

            $categoria_ingreso = CategoriaIngresos::findFirstByid_categoria_ingresos($id_categoria_ingresos);
            if (!$categoria_ingreso) {
                $this->flash->error("categoria_ingreso was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "categoria_ingresos",
                    "action" => "index"
                ));
            }

            $this->view->id_categoria_ingresos = $categoria_ingreso->id_categoria_ingresos;

            $this->tag->setDefault("id_categoria_ingresos", $categoria_ingreso->getIdCategoriaIngresos());
            $this->tag->setDefault("descripcion", $categoria_ingreso->getDescripcion());
            
        }
    }

    /**
     * Creates a new categoria_ingreso
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "categoria_ingresos",
                "action" => "index"
            ));
        }

        $categoria_ingreso = new CategoriaIngresos();

        $categoria_ingreso->setDescripcion($this->request->getPost("descripcion"));
        

        if (!$categoria_ingreso->save()) {
            foreach ($categoria_ingreso->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "categoria_ingresos",
                "action" => "new"
            ));
        }

        $this->flash->success("categoria_ingreso was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "categoria_ingresos",
            "action" => "index"
        ));

    }

    /**
     * Saves a categoria_ingreso edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "categoria_ingresos",
                "action" => "index"
            ));
        }

        $id_categoria_ingresos = $this->request->getPost("id_categoria_ingresos");

        $categoria_ingreso = CategoriaIngresos::findFirstByid_categoria_ingresos($id_categoria_ingresos);
        if (!$categoria_ingreso) {
            $this->flash->error("categoria_ingreso does not exist " . $id_categoria_ingresos);

            return $this->dispatcher->forward(array(
                "controller" => "categoria_ingresos",
                "action" => "index"
            ));
        }

        $categoria_ingreso->setDescripcion($this->request->getPost("descripcion"));
        

        if (!$categoria_ingreso->save()) {

            foreach ($categoria_ingreso->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "categoria_ingresos",
                "action" => "edit",
                "params" => array($categoria_ingreso->id_categoria_ingresos)
            ));
        }

        $this->flash->success("categoria_ingreso was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "categoria_ingresos",
            "action" => "index"
        ));

    }

    /**
     * Deletes a categoria_ingreso
     *
     * @param string $id_categoria_ingresos
     */
    public function deleteAction($id_categoria_ingresos)
    {

        $categoria_ingreso = CategoriaIngresos::findFirstByid_categoria_ingresos($id_categoria_ingresos);
        if (!$categoria_ingreso) {
            $this->flash->error("categoria_ingreso was not found");

            return $this->dispatcher->forward(array(
                "controller" => "categoria_ingresos",
                "action" => "index"
            ));
        }

        if (!$categoria_ingreso->delete()) {

            foreach ($categoria_ingreso->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "categoria_ingresos",
                "action" => "search"
            ));
        }

        $this->flash->success("categoria_ingreso was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "categoria_ingresos",
            "action" => "index"
        ));
    }

}
