<?php
/**
 * $EM_CONF
 *
 * @category Extension
 * @package  AutoloaderSlots
 * @author   Tim Lochmüller
 */

/** @var $_EXTKEY string */
$EM_CONF[$_EXTKEY] = [
    'title'       => 'Autoloader (Slots - Check the TYPO3 Login screen)',
    'description' => '',
    'constraints' => [
        'depends' => [
            'autoloader' => '3.0.0',
        ],
    ],
];
