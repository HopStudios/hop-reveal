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
	public static function displayName (): string
	{
		return Craft::t('hop-reveal', 'Hop Reveal');
	}

	public static function id (): string
	{
		return 'hop-reveal';
	}

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
