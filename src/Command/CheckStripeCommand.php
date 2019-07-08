<?php

namespace App\Command;

use App\Services\Stripe\BillingStripeService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CheckStripeCommand extends Command
{
    protected static $defaultName = 'app:stripe:check';
    /**
     * @var BillingStripeService
     */
    private $billingStripeService;

    public function __construct(BillingStripeService $billingStripeService)
    {
        parent::__construct();
        $this->billingStripeService = $billingStripeService;
    }

    protected function configure()
    {
        $this->setDescription('Check a service product and pricing plans');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->success('Done');
    }
}
