<?php

namespace App\Controller;

use App\Model\Project;
use App\Utils\Tools;
use App\Repository\ProjectRepository;
use Mithridatem\Validation\Validator;
use Mithridatem\Validation\Exception\ValidationException;

class ProjectController extends AbstractController
{
    private ProjectRepository $projectRepository;
    private Validator $validator;

    public function __construct()
    {
        $this->projectRepository = new ProjectRepository();
        $this->validator = new Validator();
    }

    public function addProject(): mixed
    {
        $data = [];

        if (isset($_POST['submit'])) {
            if (!empty($_POST['name'])) {
                $_POST['name'] = Tools::sanitize($_POST['name']);

                $project = new Project();
                $project->setName($_POST['name']);

                if (!$this->projectRepository->isProjectExistsWithName($project->getName())) {
                    $this->projectRepository->saveProject($project);
                    $data['valid'] = "Le projet a été ajouté en BDD";
                } else {
                    $data['error'] = "Le projet existe déjà en BDD";
                }
            }
        }

        return $this->render("add_project", "Add project", $data);
    }
}
