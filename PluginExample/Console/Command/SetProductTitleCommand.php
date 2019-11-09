<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\PluginExample\Console\Command;

use Magento\Framework\App\ObjectManager;
use Codelegacy\PluginExample\Model\Product;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetProductTitleCommand extends Command
{
    protected function configure()
    {
        $this->setName('codelegacy:set_product_title')->setDescription('Set product title');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Product $product */
        $product = ObjectManager::getInstance()->get(Product::class);
        $newTitle = 'title ' . rand();
        $product->setTitle($newTitle);
        $output->writeln('Original title: ' . $newTitle . "\n" . 'Result: ' . $product->getTitle());
    }
}