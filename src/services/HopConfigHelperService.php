<?php
/**
 * Hop Config Helper plugin for Craft CMS 3.x
 *
 * Hop Config Helper
 *
 * @link      hopstudios.com
 * @copyright Copyright (c) 2020 Hop Studios
 */

namespace hopstudios\hopconfighelper\services;

use hopstudios\hopconfighelper\HopConfigHelper;

use Craft;
use craft\base\Component;

/**
 * HopConfigHelperService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Hop Studios
 * @package   HopConfigHelper
 * @since     1.0.0
 */
class HopConfigHelperService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     HopConfigHelper::$plugin->hopConfigHelperService->exampleService()
     *
     * @return string
     */
    private function controlPanelCss()
    {
        $colour = HopConfigHelper::$plugin->getSettings()->getEnvironmentColour();

        $css = "
            #hop-header {color: black; float:left; font-size: 1.3rem; margin-top: 10px; width:100%; text-align:center; position:absolute;}
            #global-header {background-color:" . $colour . "}
        ";
        return $css;
    }

    private function controlPanelJs()
    {
        $label = HopConfigHelper::$plugin->getSettings()->getEnvironmentLabel();
        $hopHeaderElement = '<div id="hop-header">Env: ' . $label . '</div>';

        $js = "$('#global-header').prepend('" . $hopHeaderElement . "');";
        return $js;
    }


    private function frontEndJs()
    {
        $label = HopConfigHelper::$plugin->getSettings()->getEnvironmentLabel();
        $hopHeaderElement = '<div id="hop-header">Currently on ' . $label . '</div>';

        $js = "$('body').prepend('" . $hopHeaderElement . "');";
        return $js;
    }

    private function frontEndCss()
    {
        $colour = HopConfigHelper::$plugin->getSettings()->getEnvironmentColour();

        $css = "
            #hop-header {color: black; font-size: 2rem; width:100%; text-align:center; position:fixed; background-color:".$colour."80; z-index:100000000;}
        ";
        return $css;
    }

    public function addAssets()
    {
        // 0: no one
        // 1: admins
        // 2: everyone
        $frontEndVisibility = HopConfigHelper::$plugin->getSettings()->frontEndVisibility;
        $controlPanelVisibility = HopConfigHelper::$plugin->getSettings()->controlPanelVisibility;
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
