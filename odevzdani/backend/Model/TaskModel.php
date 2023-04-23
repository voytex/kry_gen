<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class TaskModel extends Database
{
    /*
     * Query pro vyber vsech zaznamu v databazi
     */ 
    public function getAllTasks()
    {
        return $this->select("SELECT * FROM `mpckrygr14`.`tasks`", []);
    }

    /*
     * Query pro vyber jednoho zaznamu
     */ 
    public function getTask($code)
    {
        return $this->select("SELECT * FROM `mpckrygr14`.`tasks` WHERE `code` = ?", ["s", $code]);
    }

    /*
     * Query pro vyber nahodneho tasku
     * "nahodnost" je implementovana primo v SQL pomoci
     * ORDER BY RAND() LIMIT 1
     */ 
    public function getRandomTask()
    {
        return $this->select("SELECT * FROM `mpckrygr14`.`tasks` ORDER BY RAND() LIMIT 1", []);
    }
}