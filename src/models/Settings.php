<?php
/**
 * Hop Reveal plugin for Craft CMS 3.x
 *
 * Hop Reveal
 *
 * @link      hopstudios.com
 * @copyright Copyright (c) 2020 Hop Studios
 */

namespace hopstudios\hopreveal\models;

use hopstudios\hopreveal\HopReveal;

use Craft;
use craft\base\Model;

/**
 * HopReveal Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Hop Studios
 * @package   HopReveal
 * @since     1.0.0
 */
class Settings extends Model
{
    /**
     * Some field model attribute
     *
     * @var string
     */
    public $productionLabel     = 'Production';
    public $productionColour    = '0ecc00';
    public $stagingLabel        = 'Staging';
    public $stagingColour       = 'ff0000';
    public $devLabel            = 'Development';
    public $devColour           = 'eeff00';

    public $frontEndVisibility      = 0;
    public $frontEndPosition        = 0;
    public $controlPanelVisibility  = 0;


    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['productionLabel', 'string'],
            ['productionLabel', 'default', 'value' => 'Production'],
            ['stagingLabel', 'string'],
            ['stagingLabel', 'default', 'value' => 'Staging'],
            ['devLabel', 'string'],
            ['devLabel', 'default', 'value' => 'Dev'],
        ];
    }

    public function getEnvironmentLabel()
    {
        switch (getenv('ENVIRONMENT')) {
            case 'dev':
                return $this->devLabel;
                break;
            
            case 'staging':
                return $this->stagingLabel;
                break;
            
            case 'production':
                return $this->productionLabel;
                break;
        }
    }


    public function getEnvironmentColour()
    {
        switch (getenv('ENVIRONMENT')) {
            case 'dev':
                return $this->devColour;
                break;
            
            case 'staging':
                return $this->stagingColour;
                break;
            
            case 'production':
                return $this->productionColour;
                break;
        }
    }
}
