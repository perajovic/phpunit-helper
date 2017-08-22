<?php

/*
 * This file is part of the Filos PhpUnitHelper library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * (c) Pera Jovic <perajovic@me.com>. All rights reserved.
 */

declare(strict_types=1);

namespace Filos\PhpUnitHelper;

use PHPUnit\Framework\TestCase as PhpUnitTestCase;

abstract class TestCase extends PhpUnitTestCase
{
    use TestCaseHelperTrait;

    protected function tearDown()
    {
        $this->nullifyProperties();

        parent::tearDown();
    }
}
