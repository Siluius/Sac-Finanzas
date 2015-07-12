<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class UsuariosController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for usuarios
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Usuarios", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "idusuarios";

        $usuarios = Usuarios::find($parameters);
        if (count($usuarios) == 0) {
            $this->flash->notice("The search did not find any usuarios");

            return $this->dispatcher->forward(array(
                "controller" => "usuarios",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $usuarios,
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
     * Edits a usuario
     *
     * @param string $idusuarios
     */
    public function editAction($idusuarios)
    {

        if (!$this->request->isPost()) {

            $usuario = Usuarios::findFirstByidusuarios($idusuarios);
            if (!$usuario) {
                $this->flash->error("usuario was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "usuarios",
                    "action" => "index"
                ));
            }

            $this->view->idusuarios = $usuario->idusuarios;

            $this->tag->setDefault("idusuarios", $usuario->getIdusuarios());
            $this->tag->setDefault("login", $usuario->getLogin());
            $this->tag->setDefault("password", $usuario->getPassword());
            $this->tag->setDefault("nickname", $usuario->getNickname());
            $this->tag->setDefault("email", $usuario->getEmail());
            $this->tag->setDefault("facebook_id", $usuario->getFacebookId());
            $this->tag->setDefault("google_id", $usuario->getGoogleId());
            $this->tag->setDefault("estado", $usuario->getEstado());
            $this->tag->setDefault("fecha_ingreso", $usuario->getFechaIngreso());
            
        }
    }

    /**
     * Creates a new usuario
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "usuarios",
                "action" => "index"
            ));
        }

        $usuario = new Usuarios();

        $usuario->setLogin($this->request->getPost("login"));
        $usuario->setPassword($this->request->getPost("password"));
        $usuario->setNickname($this->request->getPost("nickname"));
        $usuario->setEmail($this->request->getPost("email", "email"));
        $usuario->setFacebookId($this->request->getPost("facebook_id"));
        $usuario->setGoogleId($this->request->getPost("google_id"));
        $usuario->setEstado($this->request->getPost("estado"));
        $usuario->setFechaIngreso($this->request->getPost("fecha_ingreso"));
        

        if (!$usuario->save()) {
            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "usuarios",
                "action" => "new"
            ));
        }

        $this->flash->success("usuario was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "usuarios",
            "action" => "index"
        ));

    }

    /**
     * Saves a usuario edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "usuarios",
                "action" => "index"
            ));
        }

        $idusuarios = $this->request->getPost("idusuarios");

        $usuario = Usuarios::findFirstByidusuarios($idusuarios);
        if (!$usuario) {
            $this->flash->error("usuario does not exist " . $idusuarios);

            return $this->dispatcher->forward(array(
                "controller" => "usuarios",
                "action" => "index"
            ));
        }

        $usuario->setLogin($this->request->getPost("login"));
        $usuario->setPassword($this->request->getPost("password"));
        $usuario->setNickname($this->request->getPost("nickname"));
        $usuario->setEmail($this->request->getPost("email", "email"));
        $usuario->setFacebookId($this->request->getPost("facebook_id"));
        $usuario->setGoogleId($this->request->getPost("google_id"));
        $usuario->setEstado($this->request->getPost("estado"));
        $usuario->setFechaIngreso($this->request->getPost("fecha_ingreso"));
        

        if (!$usuario->save()) {

            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "usuarios",
                "action" => "edit",
                "params" => array($usuario->idusuarios)
            ));
        }

        $this->flash->success("usuario was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "usuarios",
            "action" => "index"
        ));

    }

    /**
     * Deletes a usuario
     *
     * @param string $idusuarios
     */
    public function deleteAction($idusuarios)
    {

        $usuario = Usuarios::findFirstByidusuarios($idusuarios);
        if (!$usuario) {
            $this->flash->error("usuario was not found");

            return $this->dispatcher->forward(array(
                "controller" => "usuarios",
                "action" => "index"
            ));
        }

        if (!$usuario->delete()) {

            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "usuarios",
                "action" => "search"
            ));
        }

        $this->flash->success("usuario was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "usuarios",
            "action" => "index"
        ));
    }

}
