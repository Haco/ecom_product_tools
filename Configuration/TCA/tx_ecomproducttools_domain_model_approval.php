<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$iconPath = 'EXT:ecom_product_tools/Resources/Public/Images/Approvals/';
$setcardIconPath = 'EXT:ecom_product_tools/Resources/Public/Images/Flags/';

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_approval',
		'label' => 'title',
		'label_alt' => 'markup_label,icon',
		'label_alt_force' => TRUE,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'typeicon_column' => 'setcard_icon',
		'typeicon_classes' => array(
			'default' => 'extensions-ept-approval',
			'mask' => 'extensions-ept-approval-###TYPE###'
		),
		'searchFields' => 'title,setcard_icon,icon,icon_user,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_approval.png'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, markup_label, setcard_icon, icon, icon_user',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title;;2, setcard_icon, icon;;3, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
		'2' => array('showitem' => 'markup_label', 'canNotCollapse' => TRUE),
		'3' => array('showitem' => 'icon_user', 'canNotCollapse' => TRUE)
	),
	'columns' => array(

		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_ecomproducttools_domain_model_approval',
				'foreign_table_where' => 'AND tx_ecomproducttools_domain_model_approval.pid=###CURRENT_PID### AND tx_ecomproducttools_domain_model_approval.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_approval.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'markup_label' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_approval.markup_label',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'placeholder' => '__row|title',
				'mode' => 'useOrOverridePlaceholder'
			),
		),
		'icon' => array(
			'l10n_mode' => 'exclude',
			'exclude' => 0,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_approval.icon',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', '', ''),
					array('certification_transparent', 'certification_transparent', $iconPath . 'certification_transparent.png'),
					array('atex', 'atex', $iconPath . 'atex.png'),
					array('cepel', 'cepel', $iconPath . 'cepel.png'),
					array('csa-ca', 'csa-ca', $iconPath . 'csa-ca.png'),
					array('csa-us-ca', 'csa-us-ca', $iconPath . 'csa-us-ca.png'),
					array('csa-us', 'csa-us', $iconPath . 'csa-us.png'),
					array('csa', 'csa', $iconPath . 'csa.png'),
					array('etl-ca', 'etl-ca', $iconPath . 'etl-ca.png'),
					array('etl-us-ca', 'etl-us-ca', $iconPath . 'etl-us-ca.png'),
					array('etl-us', 'etl-us', $iconPath . 'etl-us.png'),
					array('etl', 'etl', $iconPath . 'etl.png'),
					array('explolabs', 'explolabs', $iconPath . 'explolabs.png'),
					array('fm-ca', 'fm-ca', $iconPath . 'fm-ca.png'),
					array('fm-us-ca', 'fm-us-ca', $iconPath . 'fm-us-ca.png'),
					array('fm-us', 'fm-us', $iconPath . 'fm-us.png'),
					array('fm', 'fm', $iconPath . 'fm.png'),
					array('gost', 'gost', $iconPath . 'gost.png'),
					array('iecex', 'iecex', $iconPath . 'iecex.png'),
					array('inmetro-iex', 'inmetro-iex', $iconPath . 'inmetro-iex.png'),
					array('inmetro-ncc', 'inmetro-ncc', $iconPath . 'inmetro-ncc.png'),
					array('korean-certification', 'korean-certification', $iconPath . 'korean-certification.png'),
					array('mining', 'mining', $iconPath . 'mining.png'),
					array('ncc', 'ncc', $iconPath . 'ncc.png'),
					array('nec', 'nec', $iconPath . 'nec.png'),
					array('pcec', 'pcec', $iconPath . 'pcec.png'),
					array('simtars', 'simtars', $iconPath . 'simtars.png'),
					array('testsafe', 'testsafe', $iconPath . 'testsafe.png'),
					array('tiis', 'tiis', $iconPath . 'tiis.png'),
					array('ul-ca', 'ul-ca', $iconPath . 'ul-ca.png'),
					array('ul-us-ca', 'ul-us-ca', $iconPath . 'ul-us-ca.png'),
					array('ul-us', 'ul-us', $iconPath . 'ul-us.png'),
					array('ul', 'ul', $iconPath . 'ul.png'),
				),
				'selicon_cols' => 8,
				'size' => 1,
				'maxitems' => 1
			),
		),
		'icon_user' => array(
			'l10n_mode' => 'exclude',
			'exclude' => 0,
			'displayCond' => 'FIELD:icon:REQ:FALSE',
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_approval.icon_user',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'icon_user',
				array(
					'maxitems' => 1,
					'appearance' => array(
						'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference',
						'enabledControls' => array(
							'localize' => 0
						)
					),
					'behaviour' => array(
						'localizeChildrenAtParentLocalization' => 0
					),
					'foreign_types' => array(
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
							'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,--palette--;;filePalette'
						),
					),
					'filter' => array(
						'0' => array(
							'parameters' => array(
								'allowedFileExtensions' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
							)
						)
					)
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'setcard_icon' => array(
			'l10n_mode' => 'exclude',
			'exclude' => 0,
			'label' => 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_approval.setcard_icon',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', '', ''),
					array('Abkhazia', 'Abkhazia', $setcardIconPath . 'Abkhazia.png'),
					array('Afghanistan', 'Afghanistan', $setcardIconPath . 'Afghanistan.png'),
					array('Aland', 'Aland', $setcardIconPath . 'Aland.png'),
					array('Albania', 'Albania', $setcardIconPath . 'Albania.png'),
					array('Algeria', 'Algeria', $setcardIconPath . 'Algeria.png'),
					array('American-Samoa', 'American-Samoa', $setcardIconPath . 'American-Samoa.png'),
					array('Andorra', 'Andorra', $setcardIconPath . 'Andorra.png'),
					array('Angola', 'Angola', $setcardIconPath . 'Angola.png'),
					array('Anguilla', 'Anguilla', $setcardIconPath . 'Anguilla.png'),
					array('Antarctica', 'Antarctica', $setcardIconPath . 'Antarctica.png'),
					array('Antigua-and-Barbuda', 'Antigua-and-Barbuda', $setcardIconPath . 'Antigua-and-Barbuda.png'),
					array('Argentina', 'Argentina', $setcardIconPath . 'Argentina.png'),
					array('Armenia', 'Armenia', $setcardIconPath . 'Armenia.png'),
					array('Aruba', 'Aruba', $setcardIconPath . 'Aruba.png'),
					array('Australia', 'Australia', $setcardIconPath . 'Australia.png'),
					array('Austria', 'Austria', $setcardIconPath . 'Austria.png'),
					array('Azerbaijan', 'Azerbaijan', $setcardIconPath . 'Azerbaijan.png'),
					array('Bahamas', 'Bahamas', $setcardIconPath . 'Bahamas.png'),
					array('Bahrain', 'Bahrain', $setcardIconPath . 'Bahrain.png'),
					array('Bangladesh', 'Bangladesh', $setcardIconPath . 'Bangladesh.png'),
					array('Barbados', 'Barbados', $setcardIconPath . 'Barbados.png'),
					array('Basque-Country', 'Basque-Country', $setcardIconPath . 'Basque-Country.png'),
					array('Belarus', 'Belarus', $setcardIconPath . 'Belarus.png'),
					array('Belgium', 'Belgium', $setcardIconPath . 'Belgium.png'),
					array('Belize', 'Belize', $setcardIconPath . 'Belize.png'),
					array('Benin', 'Benin', $setcardIconPath . 'Benin.png'),
					array('Bermuda', 'Bermuda', $setcardIconPath . 'Bermuda.png'),
					array('Bhutan', 'Bhutan', $setcardIconPath . 'Bhutan.png'),
					array('Bolivia', 'Bolivia', $setcardIconPath . 'Bolivia.png'),
					array('Bosnia-and-Herzegovina', 'Bosnia-and-Herzegovina', $setcardIconPath . 'Bosnia-and-Herzegovina.png'),
					array('Botswana', 'Botswana', $setcardIconPath . 'Botswana.png'),
					array('Brazil', 'Brazil', $setcardIconPath . 'Brazil.png'),
					array('British-Antarctic-Territory', 'British-Antarctic-Territory', $setcardIconPath . 'British-Antarctic-Territory.png'),
					array('British-Virgin-Islands', 'British-Virgin-Islands', $setcardIconPath . 'British-Virgin-Islands.png'),
					array('Brunei', 'Brunei', $setcardIconPath . 'Brunei.png'),
					array('Bulgaria', 'Bulgaria', $setcardIconPath . 'Bulgaria.png'),
					array('Burkina-Faso', 'Burkina-Faso', $setcardIconPath . 'Burkina-Faso.png'),
					array('Burundi', 'Burundi', $setcardIconPath . 'Burundi.png'),
					array('Cambodia', 'Cambodia', $setcardIconPath . 'Cambodia.png'),
					array('Cameroon', 'Cameroon', $setcardIconPath . 'Cameroon.png'),
					array('Canada', 'Canada', $setcardIconPath . 'Canada.png'),
					array('Canary-Islands', 'Canary-Islands', $setcardIconPath . 'Canary-Islands.png'),
					array('Cape-Verde', 'Cape-Verde', $setcardIconPath . 'Cape-Verde.png'),
					array('Cayman-Islands', 'Cayman-Islands', $setcardIconPath . 'Cayman-Islands.png'),
					array('Central-African-Republic', 'Central-African-Republic', $setcardIconPath . 'Central-African-Republic.png'),
					array('Chad', 'Chad', $setcardIconPath . 'Chad.png'),
					array('Chile', 'Chile', $setcardIconPath . 'Chile.png'),
					array('China', 'China', $setcardIconPath . 'China.png'),
					array('Christmas-Island', 'Christmas-Island', $setcardIconPath . 'Christmas-Island.png'),
					array('Cocos-Keeling-Islands', 'Cocos-Keeling-Islands', $setcardIconPath . 'Cocos-Keeling-Islands.png'),
					array('Colombia', 'Colombia', $setcardIconPath . 'Colombia.png'),
					array('Commonwealth', 'Commonwealth', $setcardIconPath . 'Commonwealth.png'),
					array('Comoros', 'Comoros', $setcardIconPath . 'Comoros.png'),
					array('Cook-Islands', 'Cook-Islands', $setcardIconPath . 'Cook-Islands.png'),
					array('Costa-Rica', 'Costa-Rica', $setcardIconPath . 'Costa-Rica.png'),
					array('Cote-dIvoire', 'Cote-dIvoire', $setcardIconPath . 'Cote-dIvoire.png'),
					array('Croatia', 'Croatia', $setcardIconPath . 'Croatia.png'),
					array('Cuba', 'Cuba', $setcardIconPath . 'Cuba.png'),
					array('Curacao', 'Curacao', $setcardIconPath . 'Curacao.png'),
					array('Cyprus', 'Cyprus', $setcardIconPath . 'Cyprus.png'),
					array('Czech-Republic', 'Czech-Republic', $setcardIconPath . 'Czech-Republic.png'),
					array('Democratic-Republic-of-the-Congo', 'Democratic-Republic-of-the-Congo', $setcardIconPath . 'Democratic-Republic-of-the-Congo.png'),
					array('Denmark', 'Denmark', $setcardIconPath . 'Denmark.png'),
					array('Djibouti', 'Djibouti', $setcardIconPath . 'Djibouti.png'),
					array('Dominica', 'Dominica', $setcardIconPath . 'Dominica.png'),
					array('Dominican-Republic', 'Dominican-Republic', $setcardIconPath . 'Dominican-Republic.png'),
					array('East-Timor', 'East-Timor', $setcardIconPath . 'East-Timor.png'),
					array('Ecuador', 'Ecuador', $setcardIconPath . 'Ecuador.png'),
					array('Egypt', 'Egypt', $setcardIconPath . 'Egypt.png'),
					array('El-Salvador', 'El-Salvador', $setcardIconPath . 'El-Salvador.png'),
					array('England', 'England', $setcardIconPath . 'England.png'),
					array('Equatorial-Guinea', 'Equatorial-Guinea', $setcardIconPath . 'Equatorial-Guinea.png'),
					array('Eritrea', 'Eritrea', $setcardIconPath . 'Eritrea.png'),
					array('Estonia', 'Estonia', $setcardIconPath . 'Estonia.png'),
					array('Ethiopia', 'Ethiopia', $setcardIconPath . 'Ethiopia.png'),
					array('European-Union', 'European-Union', $setcardIconPath . 'European-Union.png'),
					array('Falkland-Islands', 'Falkland-Islands', $setcardIconPath . 'Falkland-Islands.png'),
					array('Faroes', 'Faroes', $setcardIconPath . 'Faroes.png'),
					array('Fiji', 'Fiji', $setcardIconPath . 'Fiji.png'),
					array('Finland', 'Finland', $setcardIconPath . 'Finland.png'),
					array('France', 'France', $setcardIconPath . 'France.png'),
					array('French-Polynesia', 'French-Polynesia', $setcardIconPath . 'French-Polynesia.png'),
					array('French-Southern-Territories', 'French-Southern-Territories', $setcardIconPath . 'French-Southern-Territories.png'),
					array('Gabon', 'Gabon', $setcardIconPath . 'Gabon.png'),
					array('Gambia', 'Gambia', $setcardIconPath . 'Gambia.png'),
					array('Georgia', 'Georgia', $setcardIconPath . 'Georgia.png'),
					array('Germany', 'Germany', $setcardIconPath . 'Germany.png'),
					array('Ghana', 'Ghana', $setcardIconPath . 'Ghana.png'),
					array('Gibraltar', 'Gibraltar', $setcardIconPath . 'Gibraltar.png'),
					array('GoSquared', 'GoSquared', $setcardIconPath . 'GoSquared.png'),
					array('Greece', 'Greece', $setcardIconPath . 'Greece.png'),
					array('Greenland', 'Greenland', $setcardIconPath . 'Greenland.png'),
					array('Grenada', 'Grenada', $setcardIconPath . 'Grenada.png'),
					array('Guam', 'Guam', $setcardIconPath . 'Guam.png'),
					array('Guatemala', 'Guatemala', $setcardIconPath . 'Guatemala.png'),
					array('Guernsey', 'Guernsey', $setcardIconPath . 'Guernsey.png'),
					array('Guinea-Bissau', 'Guinea-Bissau', $setcardIconPath . 'Guinea-Bissau.png'),
					array('Guinea', 'Guinea', $setcardIconPath . 'Guinea.png'),
					array('Guyana', 'Guyana', $setcardIconPath . 'Guyana.png'),
					array('Haiti', 'Haiti', $setcardIconPath . 'Haiti.png'),
					array('Honduras', 'Honduras', $setcardIconPath . 'Honduras.png'),
					array('Hong-Kong', 'Hong-Kong', $setcardIconPath . 'Hong-Kong.png'),
					array('Hungary', 'Hungary', $setcardIconPath . 'Hungary.png'),
					array('Iceland', 'Iceland', $setcardIconPath . 'Iceland.png'),
					array('India', 'India', $setcardIconPath . 'India.png'),
					array('Indonesia', 'Indonesia', $setcardIconPath . 'Indonesia.png'),
					array('Iran', 'Iran', $setcardIconPath . 'Iran.png'),
					array('Iraq', 'Iraq', $setcardIconPath . 'Iraq.png'),
					array('Ireland', 'Ireland', $setcardIconPath . 'Ireland.png'),
					array('Isle-of-Man', 'Isle-of-Man', $setcardIconPath . 'Isle-of-Man.png'),
					array('Israel', 'Israel', $setcardIconPath . 'Israel.png'),
					array('Italy', 'Italy', $setcardIconPath . 'Italy.png'),
					array('Jamaica', 'Jamaica', $setcardIconPath . 'Jamaica.png'),
					array('Japan', 'Japan', $setcardIconPath . 'Japan.png'),
					array('Jersey', 'Jersey', $setcardIconPath . 'Jersey.png'),
					array('Jordan', 'Jordan', $setcardIconPath . 'Jordan.png'),
					array('Kazakhstan', 'Kazakhstan', $setcardIconPath . 'Kazakhstan.png'),
					array('Kenya', 'Kenya', $setcardIconPath . 'Kenya.png'),
					array('Kiribati', 'Kiribati', $setcardIconPath . 'Kiribati.png'),
					array('Kosovo', 'Kosovo', $setcardIconPath . 'Kosovo.png'),
					array('Kuwait', 'Kuwait', $setcardIconPath . 'Kuwait.png'),
					array('Kyrgyzstan', 'Kyrgyzstan', $setcardIconPath . 'Kyrgyzstan.png'),
					array('Laos', 'Laos', $setcardIconPath . 'Laos.png'),
					array('Latvia', 'Latvia', $setcardIconPath . 'Latvia.png'),
					array('Lebanon', 'Lebanon', $setcardIconPath . 'Lebanon.png'),
					array('Lesotho', 'Lesotho', $setcardIconPath . 'Lesotho.png'),
					array('Liberia', 'Liberia', $setcardIconPath . 'Liberia.png'),
					array('Libya', 'Libya', $setcardIconPath . 'Libya.png'),
					array('Liechtenstein', 'Liechtenstein', $setcardIconPath . 'Liechtenstein.png'),
					array('Lithuania', 'Lithuania', $setcardIconPath . 'Lithuania.png'),
					array('Luxembourg', 'Luxembourg', $setcardIconPath . 'Luxembourg.png'),
					array('Macau', 'Macau', $setcardIconPath . 'Macau.png'),
					array('Macedonia', 'Macedonia', $setcardIconPath . 'Macedonia.png'),
					array('Madagascar', 'Madagascar', $setcardIconPath . 'Madagascar.png'),
					array('Malawi', 'Malawi', $setcardIconPath . 'Malawi.png'),
					array('Malaysia', 'Malaysia', $setcardIconPath . 'Malaysia.png'),
					array('Maldives', 'Maldives', $setcardIconPath . 'Maldives.png'),
					array('Mali', 'Mali', $setcardIconPath . 'Mali.png'),
					array('Malta', 'Malta', $setcardIconPath . 'Malta.png'),
					array('Mars', 'Mars', $setcardIconPath . 'Mars.png'),
					array('Marshall-Islands', 'Marshall-Islands', $setcardIconPath . 'Marshall-Islands.png'),
					array('Martinique', 'Martinique', $setcardIconPath . 'Martinique.png'),
					array('Mauritania', 'Mauritania', $setcardIconPath . 'Mauritania.png'),
					array('Mauritius', 'Mauritius', $setcardIconPath . 'Mauritius.png'),
					array('Mayotte', 'Mayotte', $setcardIconPath . 'Mayotte.png'),
					array('Mexico', 'Mexico', $setcardIconPath . 'Mexico.png'),
					array('Micronesia', 'Micronesia', $setcardIconPath . 'Micronesia.png'),
					array('Moldova', 'Moldova', $setcardIconPath . 'Moldova.png'),
					array('Monaco', 'Monaco', $setcardIconPath . 'Monaco.png'),
					array('Mongolia', 'Mongolia', $setcardIconPath . 'Mongolia.png'),
					array('Montenegro', 'Montenegro', $setcardIconPath . 'Montenegro.png'),
					array('Montserrat', 'Montserrat', $setcardIconPath . 'Montserrat.png'),
					array('Morocco', 'Morocco', $setcardIconPath . 'Morocco.png'),
					array('Mozambique', 'Mozambique', $setcardIconPath . 'Mozambique.png'),
					array('Myanmar', 'Myanmar', $setcardIconPath . 'Myanmar.png'),
					array('NATO', 'NATO', $setcardIconPath . 'NATO.png'),
					array('Nagorno-Karabakh', 'Nagorno-Karabakh', $setcardIconPath . 'Nagorno-Karabakh.png'),
					array('Namibia', 'Namibia', $setcardIconPath . 'Namibia.png'),
					array('Nauru', 'Nauru', $setcardIconPath . 'Nauru.png'),
					array('Nepal', 'Nepal', $setcardIconPath . 'Nepal.png'),
					array('Netherlands-Antilles', 'Netherlands-Antilles', $setcardIconPath . 'Netherlands-Antilles.png'),
					array('Netherlands', 'Netherlands', $setcardIconPath . 'Netherlands.png'),
					array('New-Caledonia', 'New-Caledonia', $setcardIconPath . 'New-Caledonia.png'),
					array('New-Zealand', 'New-Zealand', $setcardIconPath . 'New-Zealand.png'),
					array('Nicaragua', 'Nicaragua', $setcardIconPath . 'Nicaragua.png'),
					array('Niger', 'Niger', $setcardIconPath . 'Niger.png'),
					array('Nigeria', 'Nigeria', $setcardIconPath . 'Nigeria.png'),
					array('Niue', 'Niue', $setcardIconPath . 'Niue.png'),
					array('Norfolk-Island', 'Norfolk-Island', $setcardIconPath . 'Norfolk-Island.png'),
					array('North-Korea', 'North-Korea', $setcardIconPath . 'North-Korea.png'),
					array('Northern-Cyprus', 'Northern-Cyprus', $setcardIconPath . 'Northern-Cyprus.png'),
					array('Northern-Mariana-Islands', 'Northern-Mariana-Islands', $setcardIconPath . 'Northern-Mariana-Islands.png'),
					array('Norway', 'Norway', $setcardIconPath . 'Norway.png'),
					array('Olympics', 'Olympics', $setcardIconPath . 'Olympics.png'),
					array('Oman', 'Oman', $setcardIconPath . 'Oman.png'),
					array('Pakistan', 'Pakistan', $setcardIconPath . 'Pakistan.png'),
					array('Palau', 'Palau', $setcardIconPath . 'Palau.png'),
					array('Palestine', 'Palestine', $setcardIconPath . 'Palestine.png'),
					array('Panama', 'Panama', $setcardIconPath . 'Panama.png'),
					array('Papua-New-Guinea', 'Papua-New-Guinea', $setcardIconPath . 'Papua-New-Guinea.png'),
					array('Paraguay', 'Paraguay', $setcardIconPath . 'Paraguay.png'),
					array('Peru', 'Peru', $setcardIconPath . 'Peru.png'),
					array('Philippines', 'Philippines', $setcardIconPath . 'Philippines.png'),
					array('Pitcairn-Islands', 'Pitcairn-Islands', $setcardIconPath . 'Pitcairn-Islands.png'),
					array('Poland', 'Poland', $setcardIconPath . 'Poland.png'),
					array('Portugal', 'Portugal', $setcardIconPath . 'Portugal.png'),
					array('Puerto-Rico', 'Puerto-Rico', $setcardIconPath . 'Puerto-Rico.png'),
					array('Qatar', 'Qatar', $setcardIconPath . 'Qatar.png'),
					array('Red-Cross', 'Red-Cross', $setcardIconPath . 'Red-Cross.png'),
					array('Republic-of-the-Congo', 'Republic-of-the-Congo', $setcardIconPath . 'Republic-of-the-Congo.png'),
					array('Romania', 'Romania', $setcardIconPath . 'Romania.png'),
					array('Russia', 'Russia', $setcardIconPath . 'Russia.png'),
					array('Rwanda', 'Rwanda', $setcardIconPath . 'Rwanda.png'),
					array('Saint-Barthelemy', 'Saint-Barthelemy', $setcardIconPath . 'Saint-Barthelemy.png'),
					array('Saint-Helena', 'Saint-Helena', $setcardIconPath . 'Saint-Helena.png'),
					array('Saint-Kitts-and-Nevis', 'Saint-Kitts-and-Nevis', $setcardIconPath . 'Saint-Kitts-and-Nevis.png'),
					array('Saint-Lucia', 'Saint-Lucia', $setcardIconPath . 'Saint-Lucia.png'),
					array('Saint-Martin', 'Saint-Martin', $setcardIconPath . 'Saint-Martin.png'),
					array('Saint-Vincent-and-the-Grenadines', 'Saint-Vincent-and-the-Grenadines', $setcardIconPath . 'Saint-Vincent-and-the-Grenadines.png'),
					array('Samoa', 'Samoa', $setcardIconPath . 'Samoa.png'),
					array('San-Marino', 'San-Marino', $setcardIconPath . 'San-Marino.png'),
					array('Sao-Tome-and-Principe', 'Sao-Tome-and-Principe', $setcardIconPath . 'Sao-Tome-and-Principe.png'),
					array('Saudi-Arabia', 'Saudi-Arabia', $setcardIconPath . 'Saudi-Arabia.png'),
					array('Scotland', 'Scotland', $setcardIconPath . 'Scotland.png'),
					array('Senegal', 'Senegal', $setcardIconPath . 'Senegal.png'),
					array('Serbia', 'Serbia', $setcardIconPath . 'Serbia.png'),
					array('Seychelles', 'Seychelles', $setcardIconPath . 'Seychelles.png'),
					array('Sierra-Leone', 'Sierra-Leone', $setcardIconPath . 'Sierra-Leone.png'),
					array('Singapore', 'Singapore', $setcardIconPath . 'Singapore.png'),
					array('Slovakia', 'Slovakia', $setcardIconPath . 'Slovakia.png'),
					array('Slovenia', 'Slovenia', $setcardIconPath . 'Slovenia.png'),
					array('Solomon-Islands', 'Solomon-Islands', $setcardIconPath . 'Solomon-Islands.png'),
					array('Somalia', 'Somalia', $setcardIconPath . 'Somalia.png'),
					array('Somaliland', 'Somaliland', $setcardIconPath . 'Somaliland.png'),
					array('South-Africa', 'South-Africa', $setcardIconPath . 'South-Africa.png'),
					array('South-Georgia-and-the-South-Sandwich-Islands', 'South-Georgia-and-the-South-Sandwich-Islands', $setcardIconPath . 'South-Georgia-and-the-South-Sandwich-Islands.png'),
					array('South-Korea', 'South-Korea', $setcardIconPath . 'South-Korea.png'),
					array('South-Ossetia', 'South-Ossetia', $setcardIconPath . 'South-Ossetia.png'),
					array('South-Sudan', 'South-Sudan', $setcardIconPath . 'South-Sudan.png'),
					array('Spain', 'Spain', $setcardIconPath . 'Spain.png'),
					array('Sri-Lanka', 'Sri-Lanka', $setcardIconPath . 'Sri-Lanka.png'),
					array('Sudan', 'Sudan', $setcardIconPath . 'Sudan.png'),
					array('Suriname', 'Suriname', $setcardIconPath . 'Suriname.png'),
					array('Swaziland', 'Swaziland', $setcardIconPath . 'Swaziland.png'),
					array('Sweden', 'Sweden', $setcardIconPath . 'Sweden.png'),
					array('Switzerland', 'Switzerland', $setcardIconPath . 'Switzerland.png'),
					array('Syria', 'Syria', $setcardIconPath . 'Syria.png'),
					array('Taiwan', 'Taiwan', $setcardIconPath . 'Taiwan.png'),
					array('Tajikistan', 'Tajikistan', $setcardIconPath . 'Tajikistan.png'),
					array('Tanzania', 'Tanzania', $setcardIconPath . 'Tanzania.png'),
					array('Thailand', 'Thailand', $setcardIconPath . 'Thailand.png'),
					array('Togo', 'Togo', $setcardIconPath . 'Togo.png'),
					array('Tokelau', 'Tokelau', $setcardIconPath . 'Tokelau.png'),
					array('Tonga', 'Tonga', $setcardIconPath . 'Tonga.png'),
					array('Trinidad-and-Tobago', 'Trinidad-and-Tobago', $setcardIconPath . 'Trinidad-and-Tobago.png'),
					array('Tunisia', 'Tunisia', $setcardIconPath . 'Tunisia.png'),
					array('Turkey', 'Turkey', $setcardIconPath . 'Turkey.png'),
					array('Turkmenistan', 'Turkmenistan', $setcardIconPath . 'Turkmenistan.png'),
					array('Turks-and-Caicos-Islands', 'Turks-and-Caicos-Islands', $setcardIconPath . 'Turks-and-Caicos-Islands.png'),
					array('Tuvalu', 'Tuvalu', $setcardIconPath . 'Tuvalu.png'),
					array('US-Virgin-Islands', 'US-Virgin-Islands', $setcardIconPath . 'US-Virgin-Islands.png'),
					array('Uganda', 'Uganda', $setcardIconPath . 'Uganda.png'),
					array('Ukraine', 'Ukraine', $setcardIconPath . 'Ukraine.png'),
					array('United-Arab-Emirates', 'United-Arab-Emirates', $setcardIconPath . 'United-Arab-Emirates.png'),
					array('United-Kingdom', 'United-Kingdom', $setcardIconPath . 'United-Kingdom.png'),
					array('United-Nations', 'United-Nations', $setcardIconPath . 'United-Nations.png'),
					array('United-States', 'United-States', $setcardIconPath . 'United-States.png'),
					array('Unknown', 'Unknown', $setcardIconPath . 'Unknown.png'),
					array('Uruguay', 'Uruguay', $setcardIconPath . 'Uruguay.png'),
					array('Uzbekistan', 'Uzbekistan', $setcardIconPath . 'Uzbekistan.png'),
					array('Vanuatu', 'Vanuatu', $setcardIconPath . 'Vanuatu.png'),
					array('Vatican-City', 'Vatican-City', $setcardIconPath . 'Vatican-City.png'),
					array('Venezuela', 'Venezuela', $setcardIconPath . 'Venezuela.png'),
					array('Vietnam', 'Vietnam', $setcardIconPath . 'Vietnam.png'),
					array('Wales', 'Wales', $setcardIconPath . 'Wales.png'),
					array('Wallis-And-Futuna', 'Wallis-And-Futuna', $setcardIconPath . 'Wallis-And-Futuna.png'),
					array('Western-Sahara', 'Western-Sahara', $setcardIconPath . 'Western-Sahara.png'),
					array('Worldwide', 'Worldwide', $setcardIconPath . 'Worldwide.png'),
					array('Yemen', 'Yemen', $setcardIconPath . 'Yemen.png'),
					array('Zambia', 'Zambia', $setcardIconPath . 'Zambia.png'),
					array('Zimbabwe', 'Zimbabwe', $setcardIconPath . 'Zimbabwe.png')
				),
				'selicon_cols' => 16,
				'size' => 1,
				'minitems' => 1,
				'maxitems' => 1
			),
		),

	),
);
