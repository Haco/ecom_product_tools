<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$locallang = 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl'      => [
        'title'                    => "{$locallang}tx_ecomproducttools_domain_model_articleno",
        'label'                    => 'article_no',
        'label_alt'                => 'title',
        'label_alt_force'          => true,
        'tstamp'                   => 'tstamp',
        'hideTable'                => true,
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'dividers2tabs'            => true,
        'sortby'                   => 'sorting',
        'enablecolumns'            => [
            'disabled'  => 'hidden',
        ],
        'searchFields'             => 'title,article_no,',
        'iconfile'                 => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_productcategory.png'
    ],
    'interface' => ['showRecordFieldList' => 'hidden, title, article_no'],
    'types'     => [
        '1' => ['showitem' => 'hidden;;1, article_no, title']
    ],
    'palettes'  => [],
    'columns'   => [

        'hidden'    => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config'  => [
                'type' => 'check'
            ]
        ],

        'title'             => [
            'exclude' => 0,
            'label'   => "Title / Description (optional)",
            'config'  => [
                'type' => 'text',
                'eval' => 'trim'
            ]
        ],
        'article_no'             => [
            'exclude' => 0,
            'label'   => "Article Number",
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ]
        ],
        'product'             => [
            'config'  => [
                'type' => 'passthrough',
            ]
        ],
    ],
];