<?php
declare(strict_types=1);

namespace App\Command;

use App\Model\Entity\Secret;
use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Datasource\ModelAwareTrait;
use Cake\I18n\FrozenTime;

/**
 * CleanupSecrets command.
 */
class CleanupSecretsCommand extends Command
{
    use ModelAwareTrait;

    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser = parent::buildOptionParser($parser);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|void|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $SecretsTable = $this->getTableLocator()->get('Secrets');
        $secrets = $SecretsTable->find()
            ->all();

        foreach ($secrets as $secret) {
            if ($secret->created <= new FrozenTime(Secret::MAX_AGE)) {
                $SecretsTable->delete($secret);
            }
        }
    }
}
