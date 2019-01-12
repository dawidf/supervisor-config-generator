<?php

namespace Enis\SupervisorConfigGenerator\Tests\Enis\SupervisorConfigGenerator;

use Enis\SupervisorConfigGenerator\Enis\SupervisorConfigGenerator\BasicConfigGenerator;
use PHPUnit\Framework\TestCase;

class BasicConfigGeneratorTest extends TestCase
{
    public function testGenerate(): void
    {
        $basicConfigGenerator = new BasicConfigGenerator(
            __DIR__ . '/../../../src/Enis/SupervisorConfigGenerator/templates/basic_config_template.conf',
            [
                'login' => 'loginTest',
                'password' => 'passwordTest',
                'supervisorDataPath' => 'dataPath',
                'port' => 9001,
                'postfix' => '',
                'sockPath' => 'sockPath',
            ]
        );

        $template = $basicConfigGenerator->generate();

        self::assertStringEqualsFile(__DIR__ . '/../../fixtures/basic_config_template.conf', $template);
    }
}