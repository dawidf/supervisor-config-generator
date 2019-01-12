<?php

namespace Enis\SupervisorConfigGenerator\Enis\SupervisorConfigGenerator;

use PHPUnit\Framework\TestCase;

class ConfigGeneratorTest extends TestCase
{
    public function testGenerate(): void
    {
        $basicConfig = file_get_contents(__DIR__ . '/../../fixtures/basic_config_template.conf');
        $tasksConfig = file_get_contents(__DIR__ . '/../../fixtures/tasks_config_template.conf');

        $basicConfigGenerator = $this->prophesize(BasicConfigGeneratorInterface::class);
        $basicConfigGenerator->generate()
            ->willReturn($basicConfig);

        $tasksGenerator = $this->prophesize(TasksGeneratorInterface::class);
        $tasksGenerator->generate()
            ->willReturn($tasksConfig);

        $configGenerator = new ConfigGenerator(
            $basicConfigGenerator->reveal(),
            $tasksGenerator->reveal()
        );

        $expectedConfig = $basicConfig . PHP_EOL . PHP_EOL . $tasksConfig;

        self::assertSame($expectedConfig, $configGenerator->generate());
    }
}
