<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class UsuariosDataController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for usuarios_data
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "UsuariosData", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "idusuarios_data";

        $usuarios_data = UsuariosData::find($parameters);
        if (count($usuarios_data) == 0) {
            $this->flash->notice("The search did not find any usuarios_data");

            return $this->dispatcher->forward(array(
                "controller" => "usuarios_data",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $usuarios_data,
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
     * Edits a usuarios_data
     *
     * @param string $idusuarios_data
     */
    public function editAction($idusuarios_data)
    {

        if (!$this->request->isPost()) {

            $usuarios_data = UsuariosData::findFirstByidusuarios_data($idusuarios_data);
            if (!$usuarios_data) {
                $this->flash->error("usuarios_data was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "usuarios_data",
                    "action" => "index"
                ));
            }

            $this->view->idusuarios_data = $usuarios_data->idusuarios_data;

            $this->tag->setDefault("idusuarios_data", $usuarios_data->getIdusuariosData());
            $this->tag->setDefault("id_usuarios", $usuarios_data->getIdUsuarios());
            $this->tag->setDefault("nombres", $usuarios_data->getNombres());
            $this->tag->setDefault("apellidos", $usuarios_data->getApellidos());
            $this->tag->setDefault("pais", $usuarios_data->getPais());
            $this->tag->setDefault("ciudad", $usuarios_data->getCiudad());
            $this->tag->setDefault("telefono", $usuarios_data->getTelefono());
            $this->tag->setDefault("fecha_nacimiento", $usuarios_data->getFechaNacimiento());
            
        }
    }

    /**
     * Creates a new usuarios_data
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "usuarios_data",
                "action" => "index"
            ));
        }

        $usuarios_data = new UsuariosData();

        $usuarios_data->setIdUsuarios($this->request->getPost("id_usuarios"));
        $usuarios_data->setNombres($this->request->getPost("nombres"));
        $usuarios_data->setApellidos($this->request->getPost("apellidos"));
        $usuarios_data->setPais($this->request->getPost("pais"));
        $usuarios_data->setCiudad($this->request->getPost("ciudad"));
        $usuarios_data->setTelefono($this->request->getPost("telefono"));
        $usuarios_data->setFechaNacimiento($this->request->getPost("fecha_nacimiento"));
        

        if (!$usuarios_data->save()) {
            foreach ($usuarios_data->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "usuarios_data",
                "action" => "new"
            ));
        }

        $this->flash->success("usuarios_data was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "usuarios_data",
            "action" => "index"
        ));

    }

    /**
     * Saves a usuarios_data edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "usuarios_data",
                "action" => "index"
            ));
        }

        $idusuarios_data = $this->request->getPost("idusuarios_data");

        $usuarios_data = UsuariosData::findFirstByidusuarios_data($idusuarios_data);
        if (!$usuarios_data) {
            $this->flash->error("usuarios_data does not exist " . $idusuarios_data);

            return $this->dispatcher->forward(array(
                "controller" => "usuarios_data",
                "action" => "index"
            ));
        }

        $usuarios_data->setIdUsuarios($this->request->getPost("id_usuarios"));
        $usuarios_data->setNombres($this->request->getPost("nombres"));
        $usuarios_data->setApellidos($this->request->getPost("apellidos"));
        $usuarios_data->setPais($this->request->getPost("pais"));
        $usuarios_data->setCiudad($this->request->getPost("ciudad"));
        $usuarios_data->setTelefono($this->request->getPost("telefono"));
        $usuarios_data->setFechaNacimiento($this->request->getPost("fecha_nacimiento"));
        

        if (!$usuarios_data->save()) {

            foreach ($usuarios_data->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "usuarios_data",
                "action" => "edit",
                "params" => array($usuarios_data->idusuarios_data)
            ));
        }

        $this->flash->success("usuarios_data was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "usuarios_data",
            "action" => "index"
        ));

    }

    /**
     * Deletes a usuarios_data
     *
     * @param string $idusuarios_data
     */
    public function deleteAction($idusuarios_data)
    {

        $usuarios_data = UsuariosData::findFirstByidusuarios_data($idusuarios_data);
        if (!$usuarios_data) {
            $this->flash->error("usuarios_data was not found");

            return $this->dispatcher->forward(array(
                "controller" => "usuarios_data",
                "action" => "index"
            ));
        }

        if (!$usuarios_data->delete()) {

            foreach ($usuarios_data->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "usuarios_data",
                "action" => "search"
            ));
        }

        $this->flash->success("usuarios_data was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "usuarios_data",
            "action" => "index"
        ));
    }

}
