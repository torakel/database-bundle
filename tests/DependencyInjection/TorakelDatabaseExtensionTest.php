<?php
namespace Torakel\DatabaseBundle\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Torakel\DatabaseBundle\DependencyInjection\TorakelDatabaseExtension;

class TorakelDatabaseExtensionTest extends AbstractExtensionTestCase
{

    protected function getContainerExtensions()
    {
        return array(
            new TorakelDatabaseExtension()
        );
    }

    public function testLoadCardRepositoryService()
    {

        $this->load();
        $this->assertContainerBuilderHasService('torakel.card_repository');

    }

    public function testLoadMatchdayRepositoryService()
    {

        $this->load();
        $this->assertContainerBuilderHasService('torakel.matchday_repository');

    }
}