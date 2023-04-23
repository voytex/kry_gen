<?php
class TaskController extends BaseControler
{
    /*
     * funkce zazada databazi o vsechny zaznamy, ktere pak zabali do JSON objektu a odesle klientovi
     */
    public function getAllTasks()
    {
        $strErrorDesc = "";
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        if (strtoupper($requestMethod) != "GET")
        {
            $strErrorDesc = "Not supported request method";
            $strErrorHeader = "HTTP/1.1 422 Unprocessable Entity";
        }

        try
        {
            $taskModel = new TaskModel();
            $arrTasks = $taskModel->getAllTasks();
            $responseData = json_encode($arrTasks);
        }
        catch (Error $e)
        {
            $strErrorDesc = $e->getMessage().' Something went wrong';
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            throw new Error("Something went wrong.");
        }

        if (!$strErrorDesc)
        {
            $this->sendOutput(
                $responseData,
                array("Content-Type: application/json", "HTTP/1.1 200 OK")
            );
        }
        else
        {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array("Content-Type: application/json", $strErrorHeader)
            );
        }
    }

    /*
     * funkce zazada databazi o jednu ulohu, kterou pak doplni o vygenerovane operandy,
     * zabali do JSON objektu a zasle klientovi
     */ 
    public function getTask()
    {
        $strErrorDesc = "";
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();   

        if (strtoupper($requestMethod) != "GET")
        {
            $strErrorDesc = "Not supported request method";
            $strErrorHeader = "HTTP/1.1 422 Unprocessable Entity";
        }

        try
        {
            $taskModel = new TaskModel();
            $populator = new Populator();
            $code = "DH";
            if (isset($arrQueryStringParams['code']) && $arrQueryStringParams['code'])
            {
                $code = $arrQueryStringParams['code'];
            }

            $task = $taskModel->getTask($code);
            $task = $populator->populateTask($task[0]);
            $responseData = json_encode($task);
        }
        catch (Exception $e)
        {
            $strErrorDesc = $e->getMessage() . "Something in getTask() method went wrong.";
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            throw new Error("Something went wrong in getTask() method.");
        }

        if (!$strErrorDesc)
        {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }
        else 
        {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json'.$strErrorHeader)
            );
        }

    }

    /*
     * Funkce zazada o nahodnou ulohu z databaze – doplni vygenerovane operandy, zabali do
     * JSON objektu a zasle klientovi. 
     */ 
    public function getRandomTask()
    {
        $strErrorDesc = "";
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();   

        if (strtoupper($requestMethod) != "GET")
        {
            $strErrorDesc = "Not supported request method";
            $strErrorHeader = "HTTP/1.1 422 Unprocessable Entity";
        }

        try
        {
            $taskModel = new TaskModel();
            $populator = new Populator();

            $task = $taskModel->getRandomTask();
            $task = $populator->populateTask($task[0]);
            $responseData = json_encode($task);
        }
        catch (Exception $e)
        {
            $strErrorDesc = $e->getMessage() . "Something in getTask() method went wrong.";
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            throw new Error("Something went wrong in getTask() method.");
        }

        if (!$strErrorDesc)
        {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }
        else 
        {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json'.$strErrorHeader)
            );
        }
    }
}