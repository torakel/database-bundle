<?php
namespace Torakel\DatabaseBundle\Tests;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{

    protected $object;

    protected $object2;

    /**
     * Tests the general getters and setters
     */
    public function testGeneralGetterAndSetter()
    {

        $this->assertNull($this->object->getId());

        $slug = 'slug1';
        $this->object->setSlug($slug);
        $this->assertEquals($slug, $this->object->getSlug());

        $name = 'name1';
        $this->object->setName($name);
        $this->assertEquals($name, $this->object->getName());

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
        $this->object->setCreatedAt($date);
        $this->assertEquals($date, $this->object->getCreatedAt());
        $this->object->setUpdatedAt($date);
        $this->assertEquals($date, $this->object->getUpdatedAt());

        $city = $this->object2;
        $city->prePersist();
        $this->assertTrue(is_object($city->getCreatedAt()));
        $this->assertTrue(array_key_exists(0, $city->getAltNames()));
        $city->preUpdate();
        $this->assertTrue(is_object($city->getUpdatedAt()));
    }

}