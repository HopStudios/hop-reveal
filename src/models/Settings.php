<?php
/**
 * Hop Config Helper plugin for Craft CMS 3.x
 *
 * Hop Config Helper
 *
 * @link      hopstudios.com
 * @copyright Copyright (c) 2020 Hop Studios
 */

namespace hopstudios\hopconfighelper\models;

use hopstudios\hopconfighelper\HopConfigHelper;

use Craft;
use craft\base\Model;

/**
 * HopConfigHelper Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Hop Studios
 * @package   HopConfigHelper
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

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
    public $controlPanelVisibility  = 0;
    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
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
