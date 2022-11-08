<?php

namespace App\Tests\Service;

use App\Model\Person;
use App\Service\ShuffleArray;
use PHPUnit\Framework\TestCase;

class SuffleArrayTest extends TestCase
{

    public function testSomething(): void
    {
        $a = [new Person('a', 'a'), new Person('b', 'b'), new Person('c', 'c')];
        $b = ShuffleArray::shuffle($a);

        foreach ($a as $i => $person) {
            $this->assertNotEquals($person, $b[$i]);
        }
    }
}
