<?php

declare(strict_types=1);

use GAYA\UploadWidgetExample\Controller\ExampleController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

(function () {
    ExtensionUtility::configurePlugin(
        'UploadWidgetExample',
        'Example',
        [
            ExampleController::class => 'edit,create,confirmation',
        ],
        [
            ExampleController::class => 'edit,create',
        ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );
})();
