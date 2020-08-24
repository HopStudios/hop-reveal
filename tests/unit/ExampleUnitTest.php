<?php
/**
 * Hop Config Helper plugin for Craft CMS 3.x
 *
 * Hop Config Helper
 *
 * @link      hopstudios.com
 * @copyright Copyright (c) 2020 Hop Studios
 */

namespace hopstudios\hopconfighelpertests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use hopstudios\hopconfighelper\HopConfigHelper;

/**
 * ExampleUnitTest
 *
 *
 * @author    Hop Studios
 * @package   HopConfigHelper
 * @since     1.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            HopConfigHelper::class,
            HopConfigHelper::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
