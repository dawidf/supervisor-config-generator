<?php

namespace Enis\SupervisorConfigGenerator\Enis\SupervisorConfigGenerator;

interface BasicConfigGeneratorInterface
{
    public function generate(): string;
}