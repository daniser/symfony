<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Serializer\Tests\Attribute;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;

/**
 * @author Fabien Bourigault <bourigaultfabien@gmail.com>
 */
class SerializedNameTest extends TestCase
{
    public function testNotAStringSerializedNameParameter()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Parameter given to "Symfony\Component\Serializer\Attribute\SerializedName" must be a non-empty string.');

        new SerializedName('');
    }

    public function testInvalidGroupOption()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(\sprintf('Parameter "groups" given to "%s" must be a string or an array of strings, "stdClass" given', SerializedName::class));

        new SerializedName('foo', ['fine', new \stdClass()]);
    }

    public function testSerializedNameParameters()
    {
        $foo = new SerializedName('foo');
        $this->assertEquals('foo', $foo->getSerializedName());
    }
}
