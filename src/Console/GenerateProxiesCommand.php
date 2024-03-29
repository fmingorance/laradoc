<?php  namespace Mingorance\LaraDoc\Console;

use Illuminate\Console\Command;
use Doctrine\ORM\EntityManagerInterface;

class GenerateProxiesCommand extends Command
{
    /**
     * Nome do comando do console.
     *
     * @var string
     */
    protected $name = 'doctrine:generate:proxies';

    /**
     * Descrição do comando do console.
     *
     * @var string
     */
    protected $description = 'Generate proxies for entities.';

    /**
     * Entity Manager
     *
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
    }

    public function fire()
    {
        $this->info('Starting proxy generation....');
        $metadata = $this->entityManager->getMetadataFactory()->getAllMetadata();
        if (empty($metadata)) {
            $this->error('No metadata found to generate any entities.');
            exit;
        }
        $directory = $this->laravel['config']['doctrine::doctrine.proxy.directory'];
        if ( ! $directory) {
            $this->error('The proxy directory has not been set.');
            exit;
        }
        $this->info('Processing entities:');
        foreach ($metadata as $item) {
            $this->line($item->name);
        }
        $this->entityManager->getProxyFactory()->generateProxyClasses($metadata, $directory);
        $this->info('Proxies have been created.');
    }
} 
