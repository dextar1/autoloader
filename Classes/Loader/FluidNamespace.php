<?php

/**
 * FluidNamespace
 */

namespace HDNET\Autoloader\Loader;

use HDNET\Autoloader\Loader;
use HDNET\Autoloader\LoaderInterface;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * FluidNamespace
 */
class FluidNamespace implements LoaderInterface
{

    /**
     * Get all the complex data and information for the loader.
     * This return value will be cached and stored in the core_cache of TYPO3.
     * There is no file monitoring for this cache.
     *
     * @param Loader $loader
     * @param int $type
     *
     * @return array
     */
    public function prepareLoader(Loader $loader, $type)
    {
        $loaderInformation = [];
        $viewHelperFolder = ExtensionManagementUtility::extPath($loader->getExtensionKey()) . 'Classes/ViewHelpers/';
        if (is_dir($viewHelperFolder)) {
            $extKey = $loader->getExtensionKey();
            $key = GeneralUtility::underscoredToLowerCamelCase($extKey);
            $loaderInformation[$key] = $loader->getVendorName() . '\\' . GeneralUtility::underscoredToUpperCamelCase($extKey) . '\\ViewHelpers';
        }
        return $loaderInformation;
    }

    /**
     * Run the loading process for the ext_tables.php file
     *
     * @param Loader $loader
     * @param array $loaderInformation
     *
     * @return void
     */
    public function loadExtensionTables(Loader $loader, array $loaderInformation)
    {
        // do nothing
    }

    /**
     * Run the loading process for the ext_localconf.php file
     *
     * @param Loader $loader
     * @param array $loaderInformation
     *
     * @return void
     */
    public function loadExtensionConfiguration(Loader $loader, array $loaderInformation)
    {
        foreach ($loaderInformation as $key => $namespace) {
            $GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces'][$key] = [$namespace];
        }
    }
}
