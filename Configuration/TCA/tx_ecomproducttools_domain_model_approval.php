<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$locallang = 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:';
$iconPath = 'EXT:ecom_product_tools/Resources/Public/Images/Approval/';
$setcardIconPath = 'EXT:ecom_product_tools/Resources/Public/Images/Flag/';

return [
    'ctrl'      => [
        'title'          => "{$locallang}tx_ecomproducttools_domain_model_approval",
        'label'          => 'title',
        'label_userFunc' => \S3b0\EcomProductTools\Utility\ModifyTCA::class . '->labelUserFuncEPTDomainModelApproval',
        'tstamp'         => 'tstamp',
        'crdate'         => 'crdate',
        'cruser_id'      => 'cruser_id',
        'dividers2tabs'  => true,
        'sortby'         => 'sorting',

        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete'                   => 'deleted',
        'enablecolumns'            => [
            'disabled'  => 'hidden',
            'starttime' => 'starttime',
            'endtime'   => 'endtime'
        ],
        'typeicon_column'          => 'setcard_icon',
        'typeicon_classes'         => [
            'default' => 'ecom-approval',
            'mask'    => 'ecom-approval-###TYPE###'
        ],
        'searchFields'             => 'title,setcard_icon,icon,icon_user,',
        'iconfile'                 => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_approval.png'
    ],
    'interface' => ['showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, markup_label, setcard_icon, icon, icon_user'],
    'types'     => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title;;2, setcard_icon, icon;;3, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime']
    ],
    'palettes'  => [
        '1' => ['showitem' => ''],
        '2' => ['showitem' => 'markup_label', 'canNotCollapse' => true],
        '3' => ['showitem' => 'icon_user', 'canNotCollapse' => true]
    ],
    'columns'   => [

        'sys_language_uid' => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config'  => [
                'type'                => 'select',
                'foreign_table'       => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items'               => [
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0]
                ]
            ]
        ],
        'l10n_parent'      => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude'     => 1,
            'label'       => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config'      => [
                'type'                => 'select',
                'items'               => [['', 0]],
                'foreign_table'       => 'tx_ecomproducttools_domain_model_approval',
                'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_approval.pid=###CURRENT_PID### AND tx_ecomproducttools_domain_model_approval.sys_language_uid IN (-1,0)'
            ]
        ],
        'l10n_diffsource'  => [
            'config' => ['type' => 'passthrough']
        ],

        'hidden'    => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config'  => ['type' => 'check']
        ],
        'starttime' => [
            'exclude'   => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config'    => [
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => ['lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))]
            ]
        ],
        'endtime'   => [
            'exclude'   => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config'    => [
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => ['lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))]
            ]
        ],

        'title'        => [
            'exclude' => 0,
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_approval.title",
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ]
        ],
        'markup_label' => [
            'exclude' => 0,
            'label'   => "{$locallang}tx_ecomproducttools_domain_model_approval.markup_label",
            'config'  => [
                'type'        => 'input',
                'size'        => 30,
                'eval'        => 'trim',
                'placeholder' => '__row|title',
                'mode'        => 'useOrOverridePlaceholder'
            ]
        ],
        'icon'         => [
            'l10n_mode' => 'exclude',
            'exclude'   => 0,
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_approval.icon",
            'config'    => [
                'type'         => 'select',
                'items'        => [
                    ['', '', ''],
                    [
                        'certification_transparent',
                        'certification_transparent',
                        "{$iconPath}certification_transparent.png"
                    ],
                    ['atex', 'atex', "{$iconPath}atex.png"],
                    ['cepel', 'cepel', "{$iconPath}cepel.png"],
                    ['csa-ca', 'csa-ca', "{$iconPath}csa-ca.png"],
                    ['csa-us-ca', 'csa-us-ca', "{$iconPath}csa-us-ca.png"],
                    ['csa-us', 'csa-us', "{$iconPath}csa-us.png"],
                    ['csa', 'csa', "{$iconPath}csa.png"],
                    ['etl-ca', 'etl-ca', "{$iconPath}etl-ca.png"],
                    ['etl-us-ca', 'etl-us-ca', "{$iconPath}etl-us-ca.png"],
                    ['etl-us', 'etl-us', "{$iconPath}etl-us.png"],
                    ['etl', 'etl', "{$iconPath}etl.png"],
                    ['explolabs', 'explolabs', "{$iconPath}explolabs.png"],
                    ['fm-ca', 'fm-ca', "{$iconPath}fm-ca.png"],
                    ['fm-us-ca', 'fm-us-ca', "{$iconPath}fm-us-ca.png"],
                    ['fm-us', 'fm-us', "{$iconPath}fm-us.png"],
                    ['fm', 'fm', "{$iconPath}fm.png"],
                    ['gost', 'gost', "{$iconPath}gost.png"],
                    ['iecex', 'iecex', "{$iconPath}iecex.png"],
                    ['inmetro-iex', 'inmetro-iex', "{$iconPath}inmetro-iex.png"],
                    ['inmetro-ncc', 'inmetro-ncc', "{$iconPath}inmetro-ncc.png"],
                    ['korean-certification', 'korean-certification', "{$iconPath}korean-certification.png"],
                    ['mining', 'mining', "{$iconPath}mining.png"],
                    ['ncc', 'ncc', "{$iconPath}ncc.png"],
                    ['nec', 'nec', "{$iconPath}nec.png"],
                    ['pcec', 'pcec', "{$iconPath}pcec.png"],
                    ['simtars', 'simtars', "{$iconPath}simtars.png"],
                    ['testsafe', 'testsafe', "{$iconPath}testsafe.png"],
                    ['tiis', 'tiis', "{$iconPath}tiis.png"],
                    ['ul-ca', 'ul-ca', "{$iconPath}ul-ca.png"],
                    ['ul-us-ca', 'ul-us-ca', "{$iconPath}ul-us-ca.png"],
                    ['ul-us', 'ul-us', "{$iconPath}ul-us.png"],
                    ['ul', 'ul', "{$iconPath}ul.png"]
                ],
                'selicon_cols' => 8,
                'size'         => 1,
                'maxitems'     => 1
            ]
        ],
        'icon_user'    => [
            'l10n_mode'   => 'exclude',
            'exclude'     => 0,
            'displayCond' => 'FIELD:icon:REQ:FALSE',
            'label'       => "{$locallang}tx_ecomproducttools_domain_model_approval.icon_user",
            'config'      => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'icon_user',
                [
                    'maxitems'      => 1,
                    'appearance'    => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference',
                        'enabledControls'            => [
                            'localize' => 0
                        ]
                    ],
                    'behaviour'     => [
                        'localizeChildrenAtParentLocalization' => 0
                    ],
                    'foreign_types' => [
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => ['showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,--palette--;;filePalette']
                    ],
                    'filter'        => [
                        '0' => [
                            'parameters' => ['allowedFileExtensions' => $GLOBALS[ 'TYPO3_CONF_VARS' ][ 'GFX' ][ 'imagefile_ext' ]]
                        ]
                    ]
                ],
                $GLOBALS[ 'TYPO3_CONF_VARS' ][ 'GFX' ][ 'imagefile_ext' ]
            )
        ],
        'setcard_icon' => [
            'l10n_mode' => 'exclude',
            'exclude'   => 0,
            'label'     => "{$locallang}tx_ecomproducttools_domain_model_approval.setcard_icon",
            'config'    => [
                'type'         => 'select',
                'items'        => [
                    ['', '', ''],
                    ['Abkhazia', 'Abkhazia', "{$setcardIconPath}Abkhazia.png"],
                    ['Afghanistan', 'Afghanistan', "{$setcardIconPath}Afghanistan.png"],
                    ['Aland', 'Aland', "{$setcardIconPath}Aland.png"],
                    ['Albania', 'Albania', "{$setcardIconPath}Albania.png"],
                    ['Algeria', 'Algeria', "{$setcardIconPath}Algeria.png"],
                    ['American-Samoa', 'American-Samoa', "{$setcardIconPath}American-Samoa.png"],
                    ['Andorra', 'Andorra', "{$setcardIconPath}Andorra.png"],
                    ['Angola', 'Angola', "{$setcardIconPath}Angola.png"],
                    ['Anguilla', 'Anguilla', "{$setcardIconPath}Anguilla.png"],
                    ['Antarctica', 'Antarctica', "{$setcardIconPath}Antarctica.png"],
                    ['Antigua-and-Barbuda', 'Antigua-and-Barbuda', "{$setcardIconPath}Antigua-and-Barbuda.png"],
                    ['Argentina', 'Argentina', "{$setcardIconPath}Argentina.png"],
                    ['Armenia', 'Armenia', "{$setcardIconPath}Armenia.png"],
                    ['Aruba', 'Aruba', "{$setcardIconPath}Aruba.png"],
                    ['Australia', 'Australia', "{$setcardIconPath}Australia.png"],
                    ['Austria', 'Austria', "{$setcardIconPath}Austria.png"],
                    ['Azerbaijan', 'Azerbaijan', "{$setcardIconPath}Azerbaijan.png"],
                    ['Bahamas', 'Bahamas', "{$setcardIconPath}Bahamas.png"],
                    ['Bahrain', 'Bahrain', "{$setcardIconPath}Bahrain.png"],
                    ['Bangladesh', 'Bangladesh', "{$setcardIconPath}Bangladesh.png"],
                    ['Barbados', 'Barbados', "{$setcardIconPath}Barbados.png"],
                    ['Basque-Country', 'Basque-Country', "{$setcardIconPath}Basque-Country.png"],
                    ['Belarus', 'Belarus', "{$setcardIconPath}Belarus.png"],
                    ['Belgium', 'Belgium', "{$setcardIconPath}Belgium.png"],
                    ['Belize', 'Belize', "{$setcardIconPath}Belize.png"],
                    ['Benin', 'Benin', "{$setcardIconPath}Benin.png"],
                    ['Bermuda', 'Bermuda', "{$setcardIconPath}Bermuda.png"],
                    ['Bhutan', 'Bhutan', "{$setcardIconPath}Bhutan.png"],
                    ['Bolivia', 'Bolivia', "{$setcardIconPath}Bolivia.png"],
                    [
                        'Bosnia-and-Herzegovina',
                        'Bosnia-and-Herzegovina',
                        "{$setcardIconPath}Bosnia-and-Herzegovina.png"
                    ],
                    ['Botswana', 'Botswana', "{$setcardIconPath}Botswana.png"],
                    ['Brazil', 'Brazil', "{$setcardIconPath}Brazil.png"],
                    [
                        'British-Antarctic-Territory',
                        'British-Antarctic-Territory',
                        "{$setcardIconPath}British-Antarctic-Territory.png"
                    ],
                    [
                        'British-Virgin-Islands',
                        'British-Virgin-Islands',
                        "{$setcardIconPath}British-Virgin-Islands.png"
                    ],
                    ['Brunei', 'Brunei', "{$setcardIconPath}Brunei.png"],
                    ['Bulgaria', 'Bulgaria', "{$setcardIconPath}Bulgaria.png"],
                    ['Burkina-Faso', 'Burkina-Faso', "{$setcardIconPath}Burkina-Faso.png"],
                    ['Burundi', 'Burundi', "{$setcardIconPath}Burundi.png"],
                    ['Cambodia', 'Cambodia', "{$setcardIconPath}Cambodia.png"],
                    ['Cameroon', 'Cameroon', "{$setcardIconPath}Cameroon.png"],
                    ['Canada', 'Canada', "{$setcardIconPath}Canada.png"],
                    ['Canary-Islands', 'Canary-Islands', "{$setcardIconPath}Canary-Islands.png"],
                    ['Cape-Verde', 'Cape-Verde', "{$setcardIconPath}Cape-Verde.png"],
                    ['Cayman-Islands', 'Cayman-Islands', "{$setcardIconPath}Cayman-Islands.png"],
                    [
                        'Central-African-Republic',
                        'Central-African-Republic',
                        "{$setcardIconPath}Central-African-Republic.png"
                    ],
                    ['Chad', 'Chad', "{$setcardIconPath}Chad.png"],
                    ['Chile', 'Chile', "{$setcardIconPath}Chile.png"],
                    ['China', 'China', "{$setcardIconPath}China.png"],
                    ['Christmas-Island', 'Christmas-Island', "{$setcardIconPath}Christmas-Island.png"],
                    ['Cocos-Keeling-Islands', 'Cocos-Keeling-Islands', "{$setcardIconPath}Cocos-Keeling-Islands.png"],
                    ['Colombia', 'Colombia', "{$setcardIconPath}Colombia.png"],
                    ['Commonwealth', 'Commonwealth', "{$setcardIconPath}Commonwealth.png"],
                    ['Comoros', 'Comoros', "{$setcardIconPath}Comoros.png"],
                    ['Cook-Islands', 'Cook-Islands', "{$setcardIconPath}Cook-Islands.png"],
                    ['Costa-Rica', 'Costa-Rica', "{$setcardIconPath}Costa-Rica.png"],
                    ['Cote-dIvoire', 'Cote-dIvoire', "{$setcardIconPath}Cote-dIvoire.png"],
                    ['Croatia', 'Croatia', "{$setcardIconPath}Croatia.png"],
                    ['Cuba', 'Cuba', "{$setcardIconPath}Cuba.png"],
                    ['Curacao', 'Curacao', "{$setcardIconPath}Curacao.png"],
                    ['Cyprus', 'Cyprus', "{$setcardIconPath}Cyprus.png"],
                    ['Czech-Republic', 'Czech-Republic', "{$setcardIconPath}Czech-Republic.png"],
                    [
                        'Democratic-Republic-of-the-Congo',
                        'Democratic-Republic-of-the-Congo',
                        "{$setcardIconPath}Democratic-Republic-of-the-Congo.png"
                    ],
                    ['Denmark', 'Denmark', "{$setcardIconPath}Denmark.png"],
                    ['Djibouti', 'Djibouti', "{$setcardIconPath}Djibouti.png"],
                    ['Dominica', 'Dominica', "{$setcardIconPath}Dominica.png"],
                    ['Dominican-Republic', 'Dominican-Republic', "{$setcardIconPath}Dominican-Republic.png"],
                    ['East-Timor', 'East-Timor', "{$setcardIconPath}East-Timor.png"],
                    ['Ecuador', 'Ecuador', "{$setcardIconPath}Ecuador.png"],
                    ['Egypt', 'Egypt', "{$setcardIconPath}Egypt.png"],
                    ['El-Salvador', 'El-Salvador', "{$setcardIconPath}El-Salvador.png"],
                    ['England', 'England', "{$setcardIconPath}England.png"],
                    ['Equatorial-Guinea', 'Equatorial-Guinea', "{$setcardIconPath}Equatorial-Guinea.png"],
                    ['Eritrea', 'Eritrea', "{$setcardIconPath}Eritrea.png"],
                    ['Estonia', 'Estonia', "{$setcardIconPath}Estonia.png"],
                    ['Ethiopia', 'Ethiopia', "{$setcardIconPath}Ethiopia.png"],
                    ['European-Union', 'European-Union', "{$setcardIconPath}European-Union.png"],
                    ['Falkland-Islands', 'Falkland-Islands', "{$setcardIconPath}Falkland-Islands.png"],
                    ['Faroes', 'Faroes', "{$setcardIconPath}Faroes.png"],
                    ['Fiji', 'Fiji', "{$setcardIconPath}Fiji.png"],
                    ['Finland', 'Finland', "{$setcardIconPath}Finland.png"],
                    ['France', 'France', "{$setcardIconPath}France.png"],
                    ['French-Polynesia', 'French-Polynesia', "{$setcardIconPath}French-Polynesia.png"],
                    [
                        'French-Southern-Territories',
                        'French-Southern-Territories',
                        "{$setcardIconPath}French-Southern-Territories.png"
                    ],
                    ['Gabon', 'Gabon', "{$setcardIconPath}Gabon.png"],
                    ['Gambia', 'Gambia', "{$setcardIconPath}Gambia.png"],
                    ['Georgia', 'Georgia', "{$setcardIconPath}Georgia.png"],
                    ['Germany', 'Germany', "{$setcardIconPath}Germany.png"],
                    ['Ghana', 'Ghana', "{$setcardIconPath}Ghana.png"],
                    ['Gibraltar', 'Gibraltar', "{$setcardIconPath}Gibraltar.png"],
                    ['GoSquared', 'GoSquared', "{$setcardIconPath}GoSquared.png"],
                    ['Greece', 'Greece', "{$setcardIconPath}Greece.png"],
                    ['Greenland', 'Greenland', "{$setcardIconPath}Greenland.png"],
                    ['Grenada', 'Grenada', "{$setcardIconPath}Grenada.png"],
                    ['Guam', 'Guam', "{$setcardIconPath}Guam.png"],
                    ['Guatemala', 'Guatemala', "{$setcardIconPath}Guatemala.png"],
                    ['Guernsey', 'Guernsey', "{$setcardIconPath}Guernsey.png"],
                    ['Guinea-Bissau', 'Guinea-Bissau', "{$setcardIconPath}Guinea-Bissau.png"],
                    ['Guinea', 'Guinea', "{$setcardIconPath}Guinea.png"],
                    ['Guyana', 'Guyana', "{$setcardIconPath}Guyana.png"],
                    ['Haiti', 'Haiti', "{$setcardIconPath}Haiti.png"],
                    ['Honduras', 'Honduras', "{$setcardIconPath}Honduras.png"],
                    ['Hong-Kong', 'Hong-Kong', "{$setcardIconPath}Hong-Kong.png"],
                    ['Hungary', 'Hungary', "{$setcardIconPath}Hungary.png"],
                    ['Iceland', 'Iceland', "{$setcardIconPath}Iceland.png"],
                    ['India', 'India', "{$setcardIconPath}India.png"],
                    ['Indonesia', 'Indonesia', "{$setcardIconPath}Indonesia.png"],
                    ['Iran', 'Iran', "{$setcardIconPath}Iran.png"],
                    ['Iraq', 'Iraq', "{$setcardIconPath}Iraq.png"],
                    ['Ireland', 'Ireland', "{$setcardIconPath}Ireland.png"],
                    ['Isle-of-Man', 'Isle-of-Man', "{$setcardIconPath}Isle-of-Man.png"],
                    ['Israel', 'Israel', "{$setcardIconPath}Israel.png"],
                    ['Italy', 'Italy', "{$setcardIconPath}Italy.png"],
                    ['Jamaica', 'Jamaica', "{$setcardIconPath}Jamaica.png"],
                    ['Japan', 'Japan', "{$setcardIconPath}Japan.png"],
                    ['Jersey', 'Jersey', "{$setcardIconPath}Jersey.png"],
                    ['Jordan', 'Jordan', "{$setcardIconPath}Jordan.png"],
                    ['Kazakhstan', 'Kazakhstan', "{$setcardIconPath}Kazakhstan.png"],
                    ['Kenya', 'Kenya', "{$setcardIconPath}Kenya.png"],
                    ['Kiribati', 'Kiribati', "{$setcardIconPath}Kiribati.png"],
                    ['Kosovo', 'Kosovo', "{$setcardIconPath}Kosovo.png"],
                    ['Kuwait', 'Kuwait', "{$setcardIconPath}Kuwait.png"],
                    ['Kyrgyzstan', 'Kyrgyzstan', "{$setcardIconPath}Kyrgyzstan.png"],
                    ['Laos', 'Laos', "{$setcardIconPath}Laos.png"],
                    ['Latvia', 'Latvia', "{$setcardIconPath}Latvia.png"],
                    ['Lebanon', 'Lebanon', "{$setcardIconPath}Lebanon.png"],
                    ['Lesotho', 'Lesotho', "{$setcardIconPath}Lesotho.png"],
                    ['Liberia', 'Liberia', "{$setcardIconPath}Liberia.png"],
                    ['Libya', 'Libya', "{$setcardIconPath}Libya.png"],
                    ['Liechtenstein', 'Liechtenstein', "{$setcardIconPath}Liechtenstein.png"],
                    ['Lithuania', 'Lithuania', "{$setcardIconPath}Lithuania.png"],
                    ['Luxembourg', 'Luxembourg', "{$setcardIconPath}Luxembourg.png"],
                    ['Macau', 'Macau', "{$setcardIconPath}Macau.png"],
                    ['Macedonia', 'Macedonia', "{$setcardIconPath}Macedonia.png"],
                    ['Madagascar', 'Madagascar', "{$setcardIconPath}Madagascar.png"],
                    ['Malawi', 'Malawi', "{$setcardIconPath}Malawi.png"],
                    ['Malaysia', 'Malaysia', "{$setcardIconPath}Malaysia.png"],
                    ['Maldives', 'Maldives', "{$setcardIconPath}Maldives.png"],
                    ['Mali', 'Mali', "{$setcardIconPath}Mali.png"],
                    ['Malta', 'Malta', "{$setcardIconPath}Malta.png"],
                    ['Mars', 'Mars', "{$setcardIconPath}Mars.png"],
                    ['Marshall-Islands', 'Marshall-Islands', "{$setcardIconPath}Marshall-Islands.png"],
                    ['Martinique', 'Martinique', "{$setcardIconPath}Martinique.png"],
                    ['Mauritania', 'Mauritania', "{$setcardIconPath}Mauritania.png"],
                    ['Mauritius', 'Mauritius', "{$setcardIconPath}Mauritius.png"],
                    ['Mayotte', 'Mayotte', "{$setcardIconPath}Mayotte.png"],
                    ['Mexico', 'Mexico', "{$setcardIconPath}Mexico.png"],
                    ['Micronesia', 'Micronesia', "{$setcardIconPath}Micronesia.png"],
                    ['Moldova', 'Moldova', "{$setcardIconPath}Moldova.png"],
                    ['Monaco', 'Monaco', "{$setcardIconPath}Monaco.png"],
                    ['Mongolia', 'Mongolia', "{$setcardIconPath}Mongolia.png"],
                    ['Montenegro', 'Montenegro', "{$setcardIconPath}Montenegro.png"],
                    ['Montserrat', 'Montserrat', "{$setcardIconPath}Montserrat.png"],
                    ['Morocco', 'Morocco', "{$setcardIconPath}Morocco.png"],
                    ['Mozambique', 'Mozambique', "{$setcardIconPath}Mozambique.png"],
                    ['Myanmar', 'Myanmar', "{$setcardIconPath}Myanmar.png"],
                    ['NATO', 'NATO', "{$setcardIconPath}NATO.png"],
                    ['Nagorno-Karabakh', 'Nagorno-Karabakh', "{$setcardIconPath}Nagorno-Karabakh.png"],
                    ['Namibia', 'Namibia', "{$setcardIconPath}Namibia.png"],
                    ['Nauru', 'Nauru', "{$setcardIconPath}Nauru.png"],
                    ['Nepal', 'Nepal', "{$setcardIconPath}Nepal.png"],
                    ['Netherlands-Antilles', 'Netherlands-Antilles', "{$setcardIconPath}Netherlands-Antilles.png"],
                    ['Netherlands', 'Netherlands', "{$setcardIconPath}Netherlands.png"],
                    ['New-Caledonia', 'New-Caledonia', "{$setcardIconPath}New-Caledonia.png"],
                    ['New-Zealand', 'New-Zealand', "{$setcardIconPath}New-Zealand.png"],
                    ['Nicaragua', 'Nicaragua', "{$setcardIconPath}Nicaragua.png"],
                    ['Niger', 'Niger', "{$setcardIconPath}Niger.png"],
                    ['Nigeria', 'Nigeria', "{$setcardIconPath}Nigeria.png"],
                    ['Niue', 'Niue', "{$setcardIconPath}Niue.png"],
                    ['Norfolk-Island', 'Norfolk-Island', "{$setcardIconPath}Norfolk-Island.png"],
                    ['North-Korea', 'North-Korea', "{$setcardIconPath}North-Korea.png"],
                    ['Northern-Cyprus', 'Northern-Cyprus', "{$setcardIconPath}Northern-Cyprus.png"],
                    [
                        'Northern-Mariana-Islands',
                        'Northern-Mariana-Islands',
                        "{$setcardIconPath}Northern-Mariana-Islands.png"
                    ],
                    ['Norway', 'Norway', "{$setcardIconPath}Norway.png"],
                    ['Olympics', 'Olympics', "{$setcardIconPath}Olympics.png"],
                    ['Oman', 'Oman', "{$setcardIconPath}Oman.png"],
                    ['Pakistan', 'Pakistan', "{$setcardIconPath}Pakistan.png"],
                    ['Palau', 'Palau', "{$setcardIconPath}Palau.png"],
                    ['Palestine', 'Palestine', "{$setcardIconPath}Palestine.png"],
                    ['Panama', 'Panama', "{$setcardIconPath}Panama.png"],
                    ['Papua-New-Guinea', 'Papua-New-Guinea', "{$setcardIconPath}Papua-New-Guinea.png"],
                    ['Paraguay', 'Paraguay', "{$setcardIconPath}Paraguay.png"],
                    ['Peru', 'Peru', "{$setcardIconPath}Peru.png"],
                    ['Philippines', 'Philippines', "{$setcardIconPath}Philippines.png"],
                    ['Pitcairn-Islands', 'Pitcairn-Islands', "{$setcardIconPath}Pitcairn-Islands.png"],
                    ['Poland', 'Poland', "{$setcardIconPath}Poland.png"],
                    ['Portugal', 'Portugal', "{$setcardIconPath}Portugal.png"],
                    ['Puerto-Rico', 'Puerto-Rico', "{$setcardIconPath}Puerto-Rico.png"],
                    ['Qatar', 'Qatar', "{$setcardIconPath}Qatar.png"],
                    ['Red-Cross', 'Red-Cross', "{$setcardIconPath}Red-Cross.png"],
                    ['Republic-of-the-Congo', 'Republic-of-the-Congo', "{$setcardIconPath}Republic-of-the-Congo.png"],
                    ['Romania', 'Romania', "{$setcardIconPath}Romania.png"],
                    ['Russia', 'Russia', "{$setcardIconPath}Russia.png"],
                    ['Rwanda', 'Rwanda', "{$setcardIconPath}Rwanda.png"],
                    ['Saint-Barthelemy', 'Saint-Barthelemy', "{$setcardIconPath}Saint-Barthelemy.png"],
                    ['Saint-Helena', 'Saint-Helena', "{$setcardIconPath}Saint-Helena.png"],
                    ['Saint-Kitts-and-Nevis', 'Saint-Kitts-and-Nevis', "{$setcardIconPath}Saint-Kitts-and-Nevis.png"],
                    ['Saint-Lucia', 'Saint-Lucia', "{$setcardIconPath}Saint-Lucia.png"],
                    ['Saint-Martin', 'Saint-Martin', "{$setcardIconPath}Saint-Martin.png"],
                    [
                        'Saint-Vincent-and-the-Grenadines',
                        'Saint-Vincent-and-the-Grenadines',
                        "{$setcardIconPath}Saint-Vincent-and-the-Grenadines.png"
                    ],
                    ['Samoa', 'Samoa', "{$setcardIconPath}Samoa.png"],
                    ['San-Marino', 'San-Marino', "{$setcardIconPath}San-Marino.png"],
                    ['Sao-Tome-and-Principe', 'Sao-Tome-and-Principe', "{$setcardIconPath}Sao-Tome-and-Principe.png"],
                    ['Saudi-Arabia', 'Saudi-Arabia', "{$setcardIconPath}Saudi-Arabia.png"],
                    ['Scotland', 'Scotland', "{$setcardIconPath}Scotland.png"],
                    ['Senegal', 'Senegal', "{$setcardIconPath}Senegal.png"],
                    ['Serbia', 'Serbia', "{$setcardIconPath}Serbia.png"],
                    ['Seychelles', 'Seychelles', "{$setcardIconPath}Seychelles.png"],
                    ['Sierra-Leone', 'Sierra-Leone', "{$setcardIconPath}Sierra-Leone.png"],
                    ['Singapore', 'Singapore', "{$setcardIconPath}Singapore.png"],
                    ['Slovakia', 'Slovakia', "{$setcardIconPath}Slovakia.png"],
                    ['Slovenia', 'Slovenia', "{$setcardIconPath}Slovenia.png"],
                    ['Solomon-Islands', 'Solomon-Islands', "{$setcardIconPath}Solomon-Islands.png"],
                    ['Somalia', 'Somalia', "{$setcardIconPath}Somalia.png"],
                    ['Somaliland', 'Somaliland', "{$setcardIconPath}Somaliland.png"],
                    ['South-Africa', 'South-Africa', "{$setcardIconPath}South-Africa.png"],
                    [
                        'South-Georgia-and-the-South-Sandwich-Islands',
                        'South-Georgia-and-the-South-Sandwich-Islands',
                        "{$setcardIconPath}South-Georgia-and-the-South-Sandwich-Islands.png"
                    ],
                    ['South-Korea', 'South-Korea', "{$setcardIconPath}South-Korea.png"],
                    ['South-Ossetia', 'South-Ossetia', "{$setcardIconPath}South-Ossetia.png"],
                    ['South-Sudan', 'South-Sudan', "{$setcardIconPath}South-Sudan.png"],
                    ['Spain', 'Spain', "{$setcardIconPath}Spain.png"],
                    ['Sri-Lanka', 'Sri-Lanka', "{$setcardIconPath}Sri-Lanka.png"],
                    ['Sudan', 'Sudan', "{$setcardIconPath}Sudan.png"],
                    ['Suriname', 'Suriname', "{$setcardIconPath}Suriname.png"],
                    ['Swaziland', 'Swaziland', "{$setcardIconPath}Swaziland.png"],
                    ['Sweden', 'Sweden', "{$setcardIconPath}Sweden.png"],
                    ['Switzerland', 'Switzerland', "{$setcardIconPath}Switzerland.png"],
                    ['Syria', 'Syria', "{$setcardIconPath}Syria.png"],
                    ['Taiwan', 'Taiwan', "{$setcardIconPath}Taiwan.png"],
                    ['Tajikistan', 'Tajikistan', "{$setcardIconPath}Tajikistan.png"],
                    ['Tanzania', 'Tanzania', "{$setcardIconPath}Tanzania.png"],
                    ['Thailand', 'Thailand', "{$setcardIconPath}Thailand.png"],
                    ['Togo', 'Togo', "{$setcardIconPath}Togo.png"],
                    ['Tokelau', 'Tokelau', "{$setcardIconPath}Tokelau.png"],
                    ['Tonga', 'Tonga', "{$setcardIconPath}Tonga.png"],
                    ['Trinidad-and-Tobago', 'Trinidad-and-Tobago', "{$setcardIconPath}Trinidad-and-Tobago.png"],
                    ['Tunisia', 'Tunisia', "{$setcardIconPath}Tunisia.png"],
                    ['Turkey', 'Turkey', "{$setcardIconPath}Turkey.png"],
                    ['Turkmenistan', 'Turkmenistan', "{$setcardIconPath}Turkmenistan.png"],
                    [
                        'Turks-and-Caicos-Islands',
                        'Turks-and-Caicos-Islands',
                        "{$setcardIconPath}Turks-and-Caicos-Islands.png"
                    ],
                    ['Tuvalu', 'Tuvalu', "{$setcardIconPath}Tuvalu.png"],
                    ['US-Virgin-Islands', 'US-Virgin-Islands', "{$setcardIconPath}US-Virgin-Islands.png"],
                    ['Uganda', 'Uganda', "{$setcardIconPath}Uganda.png"],
                    ['Ukraine', 'Ukraine', "{$setcardIconPath}Ukraine.png"],
                    ['United-Arab-Emirates', 'United-Arab-Emirates', "{$setcardIconPath}United-Arab-Emirates.png"],
                    ['United-Kingdom', 'United-Kingdom', "{$setcardIconPath}United-Kingdom.png"],
                    ['United-Nations', 'United-Nations', "{$setcardIconPath}United-Nations.png"],
                    ['United-States', 'United-States', "{$setcardIconPath}United-States.png"],
                    ['Unknown', 'Unknown', "{$setcardIconPath}Unknown.png"],
                    ['Uruguay', 'Uruguay', "{$setcardIconPath}Uruguay.png"],
                    ['Uzbekistan', 'Uzbekistan', "{$setcardIconPath}Uzbekistan.png"],
                    ['Vanuatu', 'Vanuatu', "{$setcardIconPath}Vanuatu.png"],
                    ['Vatican-City', 'Vatican-City', "{$setcardIconPath}Vatican-City.png"],
                    ['Venezuela', 'Venezuela', "{$setcardIconPath}Venezuela.png"],
                    ['Vietnam', 'Vietnam', "{$setcardIconPath}Vietnam.png"],
                    ['Wales', 'Wales', "{$setcardIconPath}Wales.png"],
                    ['Wallis-And-Futuna', 'Wallis-And-Futuna', "{$setcardIconPath}Wallis-And-Futuna.png"],
                    ['Western-Sahara', 'Western-Sahara', "{$setcardIconPath}Western-Sahara.png"],
                    ['Worldwide', 'Worldwide', "{$setcardIconPath}Worldwide.png"],
                    ['Yemen', 'Yemen', "{$setcardIconPath}Yemen.png"],
                    ['Zambia', 'Zambia', "{$setcardIconPath}Zambia.png"],
                    ['Zimbabwe', 'Zimbabwe', "{$setcardIconPath}Zimbabwe.png"]
                ],
                'selicon_cols' => 16,
                'size'         => 1,
                'minitems'     => 1,
                'maxitems'     => 1
            ]
        ]
    ]
];