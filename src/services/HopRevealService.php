<?php
/**
 * Hop Reveal plugin for Craft CMS 3.x
 *
 * Hop Reveal
 *
 * @link      hopstudios.com
 * @copyright Copyright (c) 2020 Hop Studios
 */

namespace hopstudios\hopreveal\services;

use hopstudios\hopreveal\HopReveal;

use Craft;
use craft\base\Component;

/**
 * HopRevealService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Hop Studios
 * @package   HopReveal
 * @since     1.0.0
 */
class HopRevealService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     HopReveal::$plugin->hopConfigHelperService->exampleService()
     *
     * @return string
     */
    private function controlPanelCss()
    {
        $colour = HopReveal::$plugin->getSettings()->getEnvironmentColour();

        $css = "
            #hop-header {color: black; float:left; font-size: 1rem; padding: 10px 0; width:100%; text-align:center; background-color: #" . $colour . "};
        ";
        return $css;
    }

    private function controlPanelJs()
    {
        $label = HopReveal::$plugin->getSettings()->getEnvironmentLabel();
        $hopHeaderElement = '<div id="hop-header">' . $label . '</div>';

        $js = "$('#nav').before('" . $hopHeaderElement . "');";
        return $js;
    }


    private function frontEndJs()
    {
        $label = HopReveal::$plugin->getSettings()->getEnvironmentLabel();

        $hopHeaderElement = '<div id="hop-header">' . $label . '</div>';

        $js = "$('body').prepend('" . $hopHeaderElement . "');";
        return $js;
    }

    private function frontEndCss()
    {
        // visibility 0: relative
        // visibility 1: floating

        $position = HopReveal::$plugin->getSettings()->frontEndPosition;
        $colour = HopReveal::$plugin->getSettings()->getEnvironmentColour();

        $css = "#hop-header {color: black; font-size: 2rem; width:100%; text-align:center; height: 40px; z-index:100000000;";
        
        if ($position == 0 ) {
            $css = $css . " position:relative; background-color: #" . $colour . ";}";
        } else {
            $css = $css . " position:fixed; background-color: #" . $colour . "80;}";
        }

        return $css;
    }

    public function addAssets()
    {
        // 0: no one
        // 1: admins
        // 2: everyone
        $frontEndVisibility = HopReveal::$plugin->getSettings()->frontEndVisibility;
        $controlPanelVisibility = HopReveal::$plugin->getSettings()->controlPanelVisibility;
        $view = Craft::$app->getView();
        if (
            Craft::$app->getRequest()->isCpRequest && $controlPanelVisibility == 2 || 
            Craft::$app->getRequest()->isCpRequest && Craft::$app->getUser()->isAdmin && $controlPanelVisibility == 1
            ) {
            $view->registerCss($this->controlPanelCss());
            $view->registerJs($this->controlPanelJs());
        } elseif (
            !Craft::$app->getRequest()->isCpRequest && $frontEndVisibility == 2 || 
            !Craft::$app->getRequest()->isCpRequest && Craft::$app->getUser()->isAdmin && $frontEndVisibility == 1
        ) {
            $view->registerCss($this->frontEndCss());
            $view->registerJs($this->frontEndJs());
        }
    }
}
