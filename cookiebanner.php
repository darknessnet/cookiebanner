<?php
/**
* 2007-2023 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2023 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class Cookiebanner extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'cookiebanner';
        $this->tab = 'content_management';
        $this->version = '1.0.0';
        $this->author = 'Aroshiya';
        $this->need_instance = 1;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Cookie Banner');
        $this->description = $this->l('A cookie banner is a notice displayed on a website that informs visitors about the use of cookies on the site and often seeks their consent for their usage. ');

        $this->confirmUninstall = $this->l('');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('COOKIEBANNER_LIVE_MODE', false);

        include(dirname(__FILE__).'/sql/install.php');

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('displayBackOfficeHeader') &&
            $this->registerHook('displayTop');
    }

    public function uninstall()
    {
        Configuration::deleteByName('COOKIEBANNER_LIVE_MODE');

        include(dirname(__FILE__).'/sql/uninstall.php');

        return parent::uninstall();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */

        // echo "<pre>";
        // var_dump(Tools::getAllValues()); exit;
        // echo "</pre>";
        if (((bool)Tools::isSubmit('submitCookiebannerModule')) == true) {
            // echo "asd"; exit;
        }

        $this->context->smarty->assign('module_dir', $this->_path);

        return $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

    }

    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('configure') == $this->name) {
            $this->context->controller->addJS($this->_path.'views/js/back.js');
            $this->context->controller->addCSS($this->_path.'views/css/back.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
    }

    public function hookDisplayTop()
    {

        $result = '<div id="cookie-banner" style="display:none; background-color:rgba(0,0,0,0.8); color:white; text-align:center; padding:20px; position:fixed; bottom:0; right:0px; left:0px; width:100%; z-index:9999">
        We use cookies to ensure you get the best experience on our website. <a href="#" style="color:white;">Learn more</a>
        <button id="cookie-banner-accept" style="background-color:white; color:black; border:none; padding:10px 20px; margin-left:10px; cursor:pointer;">Accept</button>
        </div>

        <script>
        window.onload = function() {
            document.getElementById("cookie-banner").style.display = "block";
        };
        
        document.getElementById("cookie-banner-accept").addEventListener("click", function() {
            document.getElementById("cookie-banner").style.display = "none";
            // Add code here to set a cookie to remember that the user has accepted the cookie policy
        });
        </script>';

        echo $result;

    }
}
