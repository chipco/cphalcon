<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Test\Unit\Assets\Asset\Js;

use Codeception\Example;
use Phalcon\Assets\Asset\Js;
use UnitTester;

class SetTargetUriCest
{
    /**
     * Tests Phalcon\Assets\Asset\Js :: setTargetUri() - js local
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2018-11-13
     *
     * @dataProvider provider
     */
    public function assetsAssetJsSetTargetUriLocal(UnitTester $I, Example $example)
    {
        $I->wantToTest('Assets\Asset\Js - setTargetUri()');

        $asset = new Js(
            $example['path'],
            $example['local']
        );

        $targetUri = '/new/path';

        $asset->setTargetUri($targetUri);

        $I->assertEquals(
            $targetUri,
            $asset->getTargetUri()
        );
    }

    protected function provider(): array
    {
        return [
            [
                'path'  => 'js/jquery.js',
                'local' => true,
            ],
            [
                'path'  => 'https://phalcon.ld/js/jquery.js',
                'local' => false,
            ],
        ];
    }
}
