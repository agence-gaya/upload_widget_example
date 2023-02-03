<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

return [
    'ctrl' => [
        'title' => 'LLL:EXT:upload_widget_example/Resources/Private/Language/locallang_db.xlf:example',
        'label' => 'lastname',
        'label_alt' => 'firstname',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'default_sortby' => 'tstamp desc',
        'searchFields' => 'firstname,lastname',
        'typeicon_classes' => [
            'default' => 'mimetypes-x-content-login',
        ],
    ],
    'types' => [
        '1' => [
            'showitem' => 'firstname,lastname,file',
        ],
    ],
    'columns' => [
        'firstname' => [
            'label' => 'LLL:EXT:upload_widget_example/Resources/Private/Language/locallang_db.xlf:firstname',
            'config' => [
                'type' => 'input',
                'width' => 200,
                'eval' => 'trim,required',
                'max' => 255,
            ],
        ],
        'lastname' => [
            'label' => 'LLL:EXT:upload_widget_example/Resources/Private/Language/locallang_db.xlf:lastname',
            'config' => [
                'type' => 'input',
                'width' => 200,
                'eval' => 'trim,required',
                'max' => 255,
            ],
        ],
        'file' => [
            'label' => 'LLL:EXT:upload_widget_example/Resources/Private/Language/locallang_db.xlf:file',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig('file', [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference',
                ],
                // Used by DataHandler / RelationHandler to create a valid FileReference
                'foreign_match_fields' => [
                    'fieldname' => 'file',
                    'tablenames' => 'tx_uploadwidgetexample_domain_model_example',
                    'table_local' => 'sys_file',
                ],
            ], 'pdf'),
        ],
    ],
];
