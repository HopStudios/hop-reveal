<?php
/**
 * Hop Reveal plugin for Craft CMS 3.x
 *
 * Hop Reveal
 *
 * @link      hopstudios.com
 * @copyright Copyright (c) 2020 Hop Studios
 */

namespace hopstudios\hopreveal\utilities;

use hopstudios\hopreveal\HopReveal;

use Craft;
use craft\base\Utility;

/**
 * Hop Reveal Utility
 *
 * Utility is the base class for classes representing Control Panel utilities.
 *
 * https://craftcms.com/docs/plugins/utilities
 *
 * @author    Hop Studios
 * @package   HopReveal
 * @since     1.0.0
 */
class HopRevealUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * Returns the display name of this utility.
     *
     * @return string The display name of this utility.
     */
    public static function displayName(): string
    {
        return Craft::t('hop-reveal', 'Hop Reveal');
    }

    /**
     * Returns the utility’s unique identifier.
     *
     * The ID should be in `kebab-case`, as it will be visible in the URL (`admin/utilities/the-handle`).
     *
     * @return string
     */
    public static function id(): string
    {
        return 'hopreveal-hop-reveal-utility';
    }

    /**
     * Returns the path to the utility's SVG icon.
     *
     * @return string|null The path to the utility SVG icon
     */
    public static function iconPath()
    {
        return Craft::getAlias("@hopstudios/hop-reveal/resources/img/HopReveal.svg");
    }

    /**
     * Returns the number that should be shown in the utility’s nav item badge.
     *
     * If `0` is returned, no badge will be shown
     *
     * @return int
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * Returns the utility's content HTML.
     *
     * @return string
     */
    public static function contentHtml(): string
    {
        $configVars = (array) Craft::$app->getConfig()->general;
        $customVars;

        foreach ($configVars as $key => $value) {
            if (strpos($key, 'customSettings')) {
                $customVars = $value;
            }
        }
        $envVars = getenv();
        ksort($envVars);

        return Craft::$app->getView()->renderTemplate(
            'hop-reveal/_components/utilities/HopRevealUtility_content',
            [
                'envVars'       => $envVars,
                'configVars'    => $customVars
            ]
        );
    }
}
