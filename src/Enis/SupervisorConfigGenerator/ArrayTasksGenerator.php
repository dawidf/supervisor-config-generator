<?php

namespace Enis\SupervisorConfigGenerator\Enis\SupervisorConfigGenerator;

class ArrayTasksGenerator implements TasksGeneratorInterface
{
    private $tasks;

    /**
     * Example array structure
     *
     *[
     *    [
     *        'name' => 'unique-some-task-name',
     *        'parameters' => [
     *            'command' => '/bin/php /var/www/bin/console some-command -vvv -l 128',
     *            'process_name' => '%(program_name)s_%(process_num)02d',
     *            'numprocs' => 5,
     *        ]
     *    ],
     *];
     *
     */
    public function __construct(
        array $tasks
    )
    {
        $this->tasks = $tasks;
    }

    /**
     * @returns
     *
     * [program:unique-some-task-name]
     * command=/bin/php /var/www/bin/console some-command -vvv -l 128
     * process_name=%(program_name)s_%(process_num)02d
     * numprocs=5
     *
     */
    public function generate(): string
    {
        $configs = '';
        foreach ($this->tasks as $config) {

            $configs .= '[program:' . $config['name'] . ']' . PHP_EOL;

            foreach ($config['parameters'] as $property => $parameter) {
                $configs .= $property . '=' . $parameter . PHP_EOL;
            }

            $configs .= PHP_EOL;
        }

        return $configs;
    }
}