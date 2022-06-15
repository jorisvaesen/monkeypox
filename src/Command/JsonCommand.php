<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\BaseCommand;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use League\Csv\Reader;

class JsonCommand extends BaseCommand
{
    protected function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        return $parser;
    }

    public function execute(Arguments $args, ConsoleIo $io): ?int
    {
        $csvPath = dirname(__DIR__, 2) . '/data/latest.csv';
        $jsonPath = dirname(__DIR__, 2) . '/data/latest.json';

        $reader = Reader::createFromPath($csvPath)
            ->setDelimiter(',')
            ->setEnclosure('"')
            ->setHeaderOffset(0);

        $data = [];
        foreach ($reader->getRecords() as $record) {
            $data[] = $record;
        }

        $json = json_encode($data);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $io->error('Failed to encode to json');
            $this->abort();
        }

        if (!file_put_contents($jsonPath, $json)) {
            $io->error(sprintf('Could not write content to %s', $jsonPath));
            $this->abort();
        }

        return static::CODE_SUCCESS;
    }
}