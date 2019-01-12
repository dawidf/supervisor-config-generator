<?php

namespace Enis\SupervisorConfigGenerator\Enis\SupervisorConfigGenerator;

interface TasksGeneratorInterface
{
    public function generate(): string;
}