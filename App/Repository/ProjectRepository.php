<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Model\Project;

class ProjectRepository
{
    private \PDO $connect;

    public function __construct()
    {
        $this->connect = (new Mysql())->connectBDD();
    }

    //Méthodes
    /**
     * Méthode qui ajoute un projet (Project) en BDD
     * @param Project $project projet à ajouter en BDD
     * @return void
     * @throws \Exception erreur SQL
     */
    public function saveProject(Project $project):void
    {
        try {
            $sql = "INSERT INTO project(`name`) VALUES(?)";
            $req = $this->connect->prepare($sql);
            $req->bindValue(1, $project->getName(), \PDO::PARAM_STR);
            $req->execute();

        } catch (\PDOException $pdo) {
            throw new \PDOException("Erreur d'enregistrement en BDD");
        }
    }

    /**
     * Méthode qui verifie si un Project (Project) existe en BDD
     * @return bool true si existe/ false si n'existe pas
     * @throws \Exception erreur SQL
     */
    public function isProjectExistsWithName(string $name) :bool
    {
        try {
            //Ecrire la requête
            $sql = "SELECT id_project FROM project WHERE `name` = ?";
            //Préparer la requête
            $req = $this->connect->prepare($sql);
            //Assigner le paramètre
            $req->bindParam(1, $name, \PDO::PARAM_STR);
            //Exécuter la requête
            $req->execute();
            //Fetch le resultat
            $project = $req->fetch(\PDO::FETCH_ASSOC);
            //Test si le projet n'existe pas
            if (empty($project)) {
                return false;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    } 
}