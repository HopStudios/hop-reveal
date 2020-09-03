<?php
/**
 * Hop Reveal plugin for Craft CMS 3.x
 *
 * Hop Reveal
 *
 * @link      hopstudios.com
 * @copyright Copyright (c) 2020 Hop Studios
 */

namespace hopstudios\hoprevealtests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use hopstudios\hopreveal\HopReveal;

/**
 * ExampleUnitTest
 *
 *
 * @author    Hop Studios
 * @package   HopReveal
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
            HopReveal::class,
            HopReveal::$plugin
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
