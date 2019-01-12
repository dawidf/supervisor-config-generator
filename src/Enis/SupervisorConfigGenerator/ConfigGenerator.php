<?php

namespace Enis\SupervisorConfigGenerator\Enis\SupervisorConfigGenerator;

class ConfigGenerator
{
    private $basicConfigGenerator;
    private $tasksGenerator;

    public function __construct(
        BasicConfigGeneratorInterface $basicConfigGenerator,
        TasksGeneratorInterface $tasksGenerator
    )
    {
        $this->basicConfigGenerator = $basicConfigGenerator;
        $this->tasksGenerator = $tasksGenerator;
    }

    public function generate(): string
    {
        return $this->basicConfigGenerator->generate() . PHP_EOL . PHP_EOL . $this->tasksGenerator->generate();
    }
}