<?php
namespace Torakel\DatabaseBundle\Tests;

use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase
{

    protected $entityNamespace = '\Torakel\DatabaseBundle\Entity\\';
    protected $object;

    protected $object2;

    /**
     * @param $attributeName
     * @param $attributeValue
     */
    public function checkAttribute(\string $attributeName, $attributeValue)
    {
        $this->object->{'set' . $attributeName}($attributeValue);
        $this->assertEquals($attributeValue, $this->object->{'get' . $attributeName}());
    }

    public function checkOneToMany(\string $relationName)
    {
        $mock = $this->getMockBuilder($this->entityNamespace . $relationName)->getMock();
        $this->object->{'set' . $relationName}($mock);
        $this->assertEquals($mock, $this->object->{'get' . $relationName}());

    }

    public function checkManyToOne(\string $relationName, \string $relationPlurarlName = '')
    {

        $mock1 = $this->getMockBuilder($this->entityNamespace . $relationName)->getMock();
        $mock2 = $this->getMockBuilder($this->entityNamespace . $relationName)->getMock();
        $mock3 = $this->getMockBuilder($this->entityNamespace . $relationName)->getMock();
        $mocks = new ArrayCollection();
        $mocks[] = $mock1;
        $mocks[] = $mock2;
        $this->object->{'add' . $relationName}($mock1);
        $this->object->{'add' . $relationName}($mock2);
        $this->object->{'add' . $relationName}($mock3);
        $this->object->{'remove' . $relationName}($mock3);
        if ($relationPlurarlName == '') {
            $relationPlurarlName = $relationName . 's';
        }
        $this->assertEquals($mocks, $this->object->{'get' . $relationPlurarlName}());

    }

    /**
     * Tests the general getters and setters
     */
    public function testGeneralGetterAndSetter()
    {

        $this->assertNull($this->object->getId());


        $this->checkAttribute('Slug', 'slug1');

        $altNames = array(
            'altname1',
            'altname2'
        );
        $this->object->setAltNames($altNames);
        $this->assertEquals($altNames, $this->object->getAltNames());
        $additionalAltName = 'altname3';
        $altNames[] = $additionalAltName;
        $this->object->addAltName($additionalAltName);
        $this->assertEquals($altNames, $this->object->getAltNames());

        $date = new \DateTime();
        $this->checkAttribute('CreatedAt', $date);
        $this->checkAttribute('UpdatedAt', $date);

        $object = $this->object2;
        $object->prePersist();
        $this->assertTrue(is_object($object->getCreatedAt()));
        $this->assertTrue(array_key_exists(0, $object->getAltNames()));
        $object->preUpdate();
        $this->assertTrue(is_object($object->getUpdatedAt()));
    }

}