<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$locallang = 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl'      => [
        'title'            => "{$locallang}tx_ecomproducttools_domain_model_softwarefile",
        'label'            => 'file_reference',
        'label_userFunc'   => \S3b0\EcomProductTools\Utility\ModifyTCA::class . '->softwareFileLabel',
        'tstamp'           => 'tstamp',
        'crdate'           => 'crdate',
        'cruser_id'        => 'cruser_id',
        'dividers2tabs'    => true,
        'sortby'           => 'sorting',
        'delete'           => 'deleted',
        'enablecolumns'    => [
            'disabled'  => 'hidden',
            'starttime' => 'starttime',
            'endtime'   => 'endtime'
        ],
        'typeicon_column'  => 'external_url',
        'typeicon_classes' => [
            'default' => 'apps-pagetree-page-advanced-root',
            '' => 'apps-pagetree-page-advanced'
        ],
        'searchFields'     => 'file_reference,external_url,title,description,products',
        'iconfile'         => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_file.png'
    ],
    'interface' => ['showRecordFieldList' => 'hidden, file_reference, external_url, title, description, products'],
    'types'     => [
        '1' => ['showitem' => 'hidden, file_reference, external_url, title, file_categories, description, products, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime']
    ],
    'palettes'  => [],
    'columns'   => [

        'hidden'    => [
            'exclude' => 0,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config'  => [
                'type'  => 'check',
                'items' => [['Hide Software File', 1]]
            ]
        ],
        'starttime' => [
            'exclude'   => 0,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config'    => [
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ]
            ]
        ],
        'endtime'   => [
            'exclude'   => 0,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config'    => [
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ]
            ]
        ],

        'file_reference'    => [
            'exclude'     => 0,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'       => 'Software-Center File',
            'config'      => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'file_reference',
                [
                    'minitems'   => 0,
                    'maxitems'   => 1,
                    'appearance' => [
                        'fileUploadAllowed' => false,
                        'createNewRelationLinkTitle' => 'Select File from server',
                        'enabledControls' => [
                            'dragdrop' => false,
                            'localize' => false
                        ]
                    ]
                ]
            )
        ],
        'external_url'      => [
            'exclude'     => 0,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'       => "External-URL file path (Only if the file is not located on this server!)",
            'config'      => [
                'type'    => 'input',
                'size'    => 30,
                'max'     => 1024,
                'eval'    => 'trim',
                'wizards' => [
                    'link' => [
                        'type'         => 'popup',
                        'title'        => 'LLL:EXT:cms/locallang_ttc.xlf:header_link_formlabel',
                        'icon'         => 'link_popup.gif',
                        'module'       => [
                            'name'          => 'wizard_element_browser',
                            'urlParameters' => ['mode' => 'wizard']
                        ],
                        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        'params'       => ['blindLinkOptions' => 'file, folder, mail, spec']
                    ]
                ],
                'softref' => 'typolink'
            ],
        ],
        'title'             => [
            'exclude' => 0,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'   => 'File Title',
            'config'  => [
                'type'        => 'input',
                'size'        => 30,
                'eval'        => 'trim',
            ]
        ],
        'description' => [
            'exclude' => 0,
            'label' => 'Description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
        ],
        'products'          => [
            'exclude' => 0,
            'l10n_mode' => 'exclude',
            'label'   => 'Associated Products',
            'config'  => [
                'type'                => 'select',
                'foreign_table'       => 'tx_ecomproducttools_domain_model_product',
                'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_product.sys_language_uid IN (-1,0) ORDER BY tx_ecomproducttools_domain_model_product.title',
                'MM'                  => 'tx_ecomproducttools_file_product_mm',
                'size'                => 10,
                'autoSizeMax'         => 30,
                'minitems'            => 0,
                'maxitems'            => 9999,
                'multiple'            => 0,
                'wizards'             => [
                    '_POSITION' => 'top',
                    'suggest'   => [
                        'type'    => 'suggest',
                        'default' => ['searchWholePhrase' => 1]
                    ]
                ]
            ]
        ],
        'file_categories'   => [
            'exclude'     => 0,
            'l10n_mode'   => 'exclude',
            'label'       => 'File Category',
            'config'      => [
                'type'                => 'select',
                'foreign_table'       => 'sys_category',
                'foreign_table_where' => ' AND sys_category.tx_ext_type=\'ecom_product_tools\' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
                'minitems'            => 1,
                'MM'                  => 'sys_category_record_mm',
                'MM_match_fields'     => [
                    'tablenames' => 'tx_ecomproducttools_domain_model_softwarefile',
                    'fieldname'  => 'file_categories'
                ],
                'MM_opposite_field'   => 'items'
            ]
        ]
    ]
];