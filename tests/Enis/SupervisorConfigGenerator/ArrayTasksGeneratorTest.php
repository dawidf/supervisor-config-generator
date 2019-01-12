<?php

namespace Enis\SupervisorConfigGenerator\Enis\SupervisorConfigGenerator;

use PHPUnit\Framework\TestCase;

class ArrayTasksGeneratorTest extends TestCase
{
    public function testGenerate(): void
    {
        $arrayTasksGenerator = new ArrayTasksGenerator(
            [
                [
                    'name' => 'sleep10',
                    'parameters' => [
                        'command' => 'sleep 10',
                        'numprocs' => '3',
                        'autorestart' => 'true',
                        'process_name' => '%(program_name)s_%(process_num)02d',
                    ],
                ],
                [
                    'name' => 'sleep20',
                    'parameters' => [
                        'command' => 'sleep 20',
                        'numprocs' => '3',
                        'autorestart' => 'true',
                        'process_name' => '%(program_name)s_%(process_num)02d',
                    ],
                ],
            ]
        );

        $template = $arrayTasksGenerator->generate();

        self::assertStringEqualsFile(__DIR__ . '/../../fixtures/tasks_config_template.conf', $template);
    }
}
