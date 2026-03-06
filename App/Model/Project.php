<?php

namespace App\Model;

class Project
{
    private ?int $id_project;
    private ?string $name;

    public function __construct() {}

    //=============== ID ===============//
    public function getId(): ?int
    {
        return $this->id_project;
    }
    public function setId(?int $id_project): void
    {
        $this->id_project = $id_project;
    }
    //=============== NAME ===============//
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}
