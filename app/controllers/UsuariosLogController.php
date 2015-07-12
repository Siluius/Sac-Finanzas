<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class UsuariosLogController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for usuarios_log
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "UsuariosLog", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "idusuarios_log";

        $usuarios_log = UsuariosLog::find($parameters);
        if (count($usuarios_log) == 0) {
            $this->flash->notice("The search did not find any usuarios_log");

            return $this->dispatcher->forward(array(
                "controller" => "usuarios_log",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $usuarios_log,
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
     * Edits a usuarios_log
     *
     * @param string $idusuarios_log
     */
    public function editAction($idusuarios_log)
    {

        if (!$this->request->isPost()) {

            $usuarios_log = UsuariosLog::findFirstByidusuarios_log($idusuarios_log);
            if (!$usuarios_log) {
                $this->flash->error("usuarios_log was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "usuarios_log",
                    "action" => "index"
                ));
            }

            $this->view->idusuarios_log = $usuarios_log->idusuarios_log;

            $this->tag->setDefault("idusuarios_log", $usuarios_log->getIdusuariosLog());
            $this->tag->setDefault("id_usuarios", $usuarios_log->getIdUsuarios());
            $this->tag->setDefault("fecha_proceso", $usuarios_log->getFechaProceso());
            $this->tag->setDefault("ip", $usuarios_log->getIp());
            $this->tag->setDefault("descripcion", $usuarios_log->getDescripcion());
            
        }
    }

    /**
     * Creates a new usuarios_log
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "usuarios_log",
                "action" => "index"
            ));
        }

        $usuarios_log = new UsuariosLog();

        $usuarios_log->setIdUsuarios($this->request->getPost("id_usuarios"));
        $usuarios_log->setFechaProceso($this->request->getPost("fecha_proceso"));
        $usuarios_log->setIp($this->request->getPost("ip"));
        $usuarios_log->setDescripcion($this->request->getPost("descripcion"));
        

        if (!$usuarios_log->save()) {
            foreach ($usuarios_log->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "usuarios_log",
                "action" => "new"
            ));
        }

        $this->flash->success("usuarios_log was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "usuarios_log",
            "action" => "index"
        ));

    }

    /**
     * Saves a usuarios_log edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "usuarios_log",
                "action" => "index"
            ));
        }

        $idusuarios_log = $this->request->getPost("idusuarios_log");

        $usuarios_log = UsuariosLog::findFirstByidusuarios_log($idusuarios_log);
        if (!$usuarios_log) {
            $this->flash->error("usuarios_log does not exist " . $idusuarios_log);

            return $this->dispatcher->forward(array(
                "controller" => "usuarios_log",
                "action" => "index"
            ));
        }

        $usuarios_log->setIdUsuarios($this->request->getPost("id_usuarios"));
        $usuarios_log->setFechaProceso($this->request->getPost("fecha_proceso"));
        $usuarios_log->setIp($this->request->getPost("ip"));
        $usuarios_log->setDescripcion($this->request->getPost("descripcion"));
        

        if (!$usuarios_log->save()) {

            foreach ($usuarios_log->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "usuarios_log",
                "action" => "edit",
                "params" => array($usuarios_log->idusuarios_log)
            ));
        }

        $this->flash->success("usuarios_log was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "usuarios_log",
            "action" => "index"
        ));

    }

    /**
     * Deletes a usuarios_log
     *
     * @param string $idusuarios_log
     */
    public function deleteAction($idusuarios_log)
    {

        $usuarios_log = UsuariosLog::findFirstByidusuarios_log($idusuarios_log);
        if (!$usuarios_log) {
            $this->flash->error("usuarios_log was not found");

            return $this->dispatcher->forward(array(
                "controller" => "usuarios_log",
                "action" => "index"
            ));
        }

        if (!$usuarios_log->delete()) {

            foreach ($usuarios_log->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "usuarios_log",
                "action" => "search"
            ));
        }

        $this->flash->success("usuarios_log was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "usuarios_log",
            "action" => "index"
        ));
    }

}
