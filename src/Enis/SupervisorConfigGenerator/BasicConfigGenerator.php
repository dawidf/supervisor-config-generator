<?php

namespace Enis\SupervisorConfigGenerator\Enis\SupervisorConfigGenerator;

class BasicConfigGenerator implements BasicConfigGeneratorInterface
{
    private $basicConfigTemplatePath;
    private $parameters;

    public function __construct(
        string $basicConfigTemplatePath,
        array $parameters
    )
    {
        $this->basicConfigTemplatePath = $basicConfigTemplatePath;
        $this->parameters = $parameters;
    }

    public function generate(): string
    {
        $basicConfig = file_get_contents($this->basicConfigTemplatePath);

        $keys = array_map(function (string $property) {
            return '{{ ' . $property . ' }}';
        }, array_keys($this->parameters));

        return str_replace(
            $keys,
            array_values($this->parameters),
            $basicConfig
        );
    }
}