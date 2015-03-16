<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$flagsFolder = version_compare(TYPO3_branch, '7.1', '>=') ? 'EXT:core/Resources/Public/Icons/Flags/' : 'EXT:t3skin/images/flags/';

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_language',
		'label' => 'title',
		'label_alt' => 'flag',
		'label_alt_force' => TRUE,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY title',
		'dividers2tabs' => TRUE,
		'typeicon_column' => 'flag',
		'typeicon_classes' => array(
			'default' => 'mimetypes-x-sys_language',
			'mask' => 'flags-###TYPE###'
		),
		'searchFields' => 'title,sys_language,flag,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Icons/tx_ecomproducttools_domain_model_language.png'
	),
	'interface' => array(
		'showRecordFieldList' => 'title, sys_language, flag',
	),
	'types' => array(
		'1' => array('showitem' => 'title, sys_language, flag, '),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'title' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'input',
				'size' => '35',
				'max' => '80',
				'eval' => 'trim,required'
			)
		),
		'sys_language' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_language',
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
		'flag' => array(
			'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_language.flag',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', '', ''),
					array('multiple', 'multiple', $flagsFolder . 'multiple.png'),
					array('ad', 'ad', $flagsFolder . 'ad.png'),
					array('ae', 'ae', $flagsFolder . 'ae.png'),
					array('af', 'af', $flagsFolder . 'af.png'),
					array('ag', 'ag', $flagsFolder . 'ag.png'),
					array('ai', 'ai', $flagsFolder . 'ai.png'),
					array('al', 'al', $flagsFolder . 'al.png'),
					array('am', 'am', $flagsFolder . 'am.png'),
					array('an', 'an', $flagsFolder . 'an.png'),
					array('ao', 'ao', $flagsFolder . 'ao.png'),
					array('ar', 'ar', $flagsFolder . 'ar.png'),
					array('as', 'as', $flagsFolder . 'as.png'),
					array('at', 'at', $flagsFolder . 'at.png'),
					array('au', 'au', $flagsFolder . 'au.png'),
					array('aw', 'aw', $flagsFolder . 'aw.png'),
					array('ax', 'ax', $flagsFolder . 'ax.png'),
					array('az', 'az', $flagsFolder . 'az.png'),
					array('ba', 'ba', $flagsFolder . 'ba.png'),
					array('bb', 'bb', $flagsFolder . 'bb.png'),
					array('bd', 'bd', $flagsFolder . 'bd.png'),
					array('be', 'be', $flagsFolder . 'be.png'),
					array('bf', 'bf', $flagsFolder . 'bf.png'),
					array('bg', 'bg', $flagsFolder . 'bg.png'),
					array('bh', 'bh', $flagsFolder . 'bh.png'),
					array('bi', 'bi', $flagsFolder . 'bi.png'),
					array('bj', 'bj', $flagsFolder . 'bj.png'),
					array('bm', 'bm', $flagsFolder . 'bm.png'),
					array('bn', 'bn', $flagsFolder . 'bn.png'),
					array('bo', 'bo', $flagsFolder . 'bo.png'),
					array('br', 'br', $flagsFolder . 'br.png'),
					array('bs', 'bs', $flagsFolder . 'bs.png'),
					array('bt', 'bt', $flagsFolder . 'bt.png'),
					array('bv', 'bv', $flagsFolder . 'bv.png'),
					array('bw', 'bw', $flagsFolder . 'bw.png'),
					array('by', 'by', $flagsFolder . 'by.png'),
					array('bz', 'bz', $flagsFolder . 'bz.png'),
					array('ca', 'ca', $flagsFolder . 'ca.png'),
					array('catalonia', 'catalonia', $flagsFolder . 'catalonia.png'),
					array('cc', 'cc', $flagsFolder . 'cc.png'),
					array('cd', 'cd', $flagsFolder . 'cd.png'),
					array('cf', 'cf', $flagsFolder . 'cf.png'),
					array('cg', 'cg', $flagsFolder . 'cg.png'),
					array('ch', 'ch', $flagsFolder . 'ch.png'),
					array('ci', 'ci', $flagsFolder . 'ci.png'),
					array('ck', 'ck', $flagsFolder . 'ck.png'),
					array('cl', 'cl', $flagsFolder . 'cl.png'),
					array('cm', 'cm', $flagsFolder . 'cm.png'),
					array('cn', 'cn', $flagsFolder . 'cn.png'),
					array('co', 'co', $flagsFolder . 'co.png'),
					array('cr', 'cr', $flagsFolder . 'cr.png'),
					array('cs', 'cs', $flagsFolder . 'cs.png'),
					array('cu', 'cu', $flagsFolder . 'cu.png'),
					array('cv', 'cv', $flagsFolder . 'cv.png'),
					array('cx', 'cx', $flagsFolder . 'cx.png'),
					array('cy', 'cy', $flagsFolder . 'cy.png'),
					array('cz', 'cz', $flagsFolder . 'cz.png'),
					array('de', 'de', $flagsFolder . 'de.png'),
					array('dj', 'dj', $flagsFolder . 'dj.png'),
					array('dk', 'dk', $flagsFolder . 'dk.png'),
					array('dm', 'dm', $flagsFolder . 'dm.png'),
					array('do', 'do', $flagsFolder . 'do.png'),
					array('dz', 'dz', $flagsFolder . 'dz.png'),
					array('ec', 'ec', $flagsFolder . 'ec.png'),
					array('ee', 'ee', $flagsFolder . 'ee.png'),
					array('eg', 'eg', $flagsFolder . 'eg.png'),
					array('eh', 'eh', $flagsFolder . 'eh.png'),
					array('england', 'england', $flagsFolder . 'england.png'),
					array('er', 'er', $flagsFolder . 'er.png'),
					array('es', 'es', $flagsFolder . 'es.png'),
					array('et', 'et', $flagsFolder . 'et.png'),
					array('europeanunion', 'europeanunion', $flagsFolder . 'europeanunion.png'),
					array('fam', 'fam', $flagsFolder . 'fam.png'),
					array('fi', 'fi', $flagsFolder . 'fi.png'),
					array('fj', 'fj', $flagsFolder . 'fj.png'),
					array('fk', 'fk', $flagsFolder . 'fk.png'),
					array('fm', 'fm', $flagsFolder . 'fm.png'),
					array('fo', 'fo', $flagsFolder . 'fo.png'),
					array('fr', 'fr', $flagsFolder . 'fr.png'),
					array('ga', 'ga', $flagsFolder . 'ga.png'),
					array('gb', 'gb', $flagsFolder . 'gb.png'),
					array('gd', 'gd', $flagsFolder . 'gd.png'),
					array('ge', 'ge', $flagsFolder . 'ge.png'),
					array('gf', 'gf', $flagsFolder . 'gf.png'),
					array('gh', 'gh', $flagsFolder . 'gh.png'),
					array('gi', 'gi', $flagsFolder . 'gi.png'),
					array('gl', 'gl', $flagsFolder . 'gl.png'),
					array('gm', 'gm', $flagsFolder . 'gm.png'),
					array('gn', 'gn', $flagsFolder . 'gn.png'),
					array('gp', 'gp', $flagsFolder . 'gp.png'),
					array('gq', 'gq', $flagsFolder . 'gq.png'),
					array('gr', 'gr', $flagsFolder . 'gr.png'),
					array('gs', 'gs', $flagsFolder . 'gs.png'),
					array('gt', 'gt', $flagsFolder . 'gt.png'),
					array('gu', 'gu', $flagsFolder . 'gu.png'),
					array('gw', 'gw', $flagsFolder . 'gw.png'),
					array('gy', 'gy', $flagsFolder . 'gy.png'),
					array('hk', 'hk', $flagsFolder . 'hk.png'),
					array('hm', 'hm', $flagsFolder . 'hm.png'),
					array('hn', 'hn', $flagsFolder . 'hn.png'),
					array('hr', 'hr', $flagsFolder . 'hr.png'),
					array('ht', 'ht', $flagsFolder . 'ht.png'),
					array('hu', 'hu', $flagsFolder . 'hu.png'),
					array('id', 'id', $flagsFolder . 'id.png'),
					array('ie', 'ie', $flagsFolder . 'ie.png'),
					array('il', 'il', $flagsFolder . 'il.png'),
					array('in', 'in', $flagsFolder . 'in.png'),
					array('io', 'io', $flagsFolder . 'io.png'),
					array('iq', 'iq', $flagsFolder . 'iq.png'),
					array('ir', 'ir', $flagsFolder . 'ir.png'),
					array('is', 'is', $flagsFolder . 'is.png'),
					array('it', 'it', $flagsFolder . 'it.png'),
					array('jm', 'jm', $flagsFolder . 'jm.png'),
					array('jo', 'jo', $flagsFolder . 'jo.png'),
					array('jp', 'jp', $flagsFolder . 'jp.png'),
					array('ke', 'ke', $flagsFolder . 'ke.png'),
					array('kg', 'kg', $flagsFolder . 'kg.png'),
					array('kh', 'kh', $flagsFolder . 'kh.png'),
					array('ki', 'ki', $flagsFolder . 'ki.png'),
					array('km', 'km', $flagsFolder . 'km.png'),
					array('kn', 'kn', $flagsFolder . 'kn.png'),
					array('kp', 'kp', $flagsFolder . 'kp.png'),
					array('kr', 'kr', $flagsFolder . 'kr.png'),
					array('kw', 'kw', $flagsFolder . 'kw.png'),
					array('ky', 'ky', $flagsFolder . 'ky.png'),
					array('kz', 'kz', $flagsFolder . 'kz.png'),
					array('la', 'la', $flagsFolder . 'la.png'),
					array('lb', 'lb', $flagsFolder . 'lb.png'),
					array('lc', 'lc', $flagsFolder . 'lc.png'),
					array('li', 'li', $flagsFolder . 'li.png'),
					array('lk', 'lk', $flagsFolder . 'lk.png'),
					array('lr', 'lr', $flagsFolder . 'lr.png'),
					array('ls', 'ls', $flagsFolder . 'ls.png'),
					array('lt', 'lt', $flagsFolder . 'lt.png'),
					array('lu', 'lu', $flagsFolder . 'lu.png'),
					array('lv', 'lv', $flagsFolder . 'lv.png'),
					array('ly', 'ly', $flagsFolder . 'ly.png'),
					array('ma', 'ma', $flagsFolder . 'ma.png'),
					array('mc', 'mc', $flagsFolder . 'mc.png'),
					array('md', 'md', $flagsFolder . 'md.png'),
					array('me', 'me', $flagsFolder . 'me.png'),
					array('mg', 'mg', $flagsFolder . 'mg.png'),
					array('mh', 'mh', $flagsFolder . 'mh.png'),
					array('mk', 'mk', $flagsFolder . 'mk.png'),
					array('ml', 'ml', $flagsFolder . 'ml.png'),
					array('mm', 'mm', $flagsFolder . 'mm.png'),
					array('mn', 'mn', $flagsFolder . 'mn.png'),
					array('mo', 'mo', $flagsFolder . 'mo.png'),
					array('mp', 'mp', $flagsFolder . 'mp.png'),
					array('mq', 'mq', $flagsFolder . 'mq.png'),
					array('mr', 'mr', $flagsFolder . 'mr.png'),
					array('ms', 'ms', $flagsFolder . 'ms.png'),
					array('mt', 'mt', $flagsFolder . 'mt.png'),
					array('mu', 'mu', $flagsFolder . 'mu.png'),
					array('mv', 'mv', $flagsFolder . 'mv.png'),
					array('mw', 'mw', $flagsFolder . 'mw.png'),
					array('mx', 'mx', $flagsFolder . 'mx.png'),
					array('my', 'my', $flagsFolder . 'my.png'),
					array('mz', 'mz', $flagsFolder . 'mz.png'),
					array('na', 'na', $flagsFolder . 'na.png'),
					array('nc', 'nc', $flagsFolder . 'nc.png'),
					array('ne', 'ne', $flagsFolder . 'ne.png'),
					array('nf', 'nf', $flagsFolder . 'nf.png'),
					array('ng', 'ng', $flagsFolder . 'ng.png'),
					array('ni', 'ni', $flagsFolder . 'ni.png'),
					array('nl', 'nl', $flagsFolder . 'nl.png'),
					array('no', 'no', $flagsFolder . 'no.png'),
					array('np', 'np', $flagsFolder . 'np.png'),
					array('nr', 'nr', $flagsFolder . 'nr.png'),
					array('nu', 'nu', $flagsFolder . 'nu.png'),
					array('nz', 'nz', $flagsFolder . 'nz.png'),
					array('om', 'om', $flagsFolder . 'om.png'),
					array('pa', 'pa', $flagsFolder . 'pa.png'),
					array('pe', 'pe', $flagsFolder . 'pe.png'),
					array('pf', 'pf', $flagsFolder . 'pf.png'),
					array('pg', 'pg', $flagsFolder . 'pg.png'),
					array('ph', 'ph', $flagsFolder . 'ph.png'),
					array('pk', 'pk', $flagsFolder . 'pk.png'),
					array('pl', 'pl', $flagsFolder . 'pl.png'),
					array('pm', 'pm', $flagsFolder . 'pm.png'),
					array('pn', 'pn', $flagsFolder . 'pn.png'),
					array('pr', 'pr', $flagsFolder . 'pr.png'),
					array('ps', 'ps', $flagsFolder . 'ps.png'),
					array('pt', 'pt', $flagsFolder . 'pt.png'),
					array('pw', 'pw', $flagsFolder . 'pw.png'),
					array('py', 'py', $flagsFolder . 'py.png'),
					array('qa', 'qa', $flagsFolder . 'qa.png'),
					array('qc', 'qc', $flagsFolder . 'qc.png'),
					array('re', 're', $flagsFolder . 're.png'),
					array('ro', 'ro', $flagsFolder . 'ro.png'),
					array('rs', 'rs', $flagsFolder . 'rs.png'),
					array('ru', 'ru', $flagsFolder . 'ru.png'),
					array('rw', 'rw', $flagsFolder . 'rw.png'),
					array('sa', 'sa', $flagsFolder . 'sa.png'),
					array('sb', 'sb', $flagsFolder . 'sb.png'),
					array('sc', 'sc', $flagsFolder . 'sc.png'),
					array('scotland', 'scotland', $flagsFolder . 'scotland.png'),
					array('sd', 'sd', $flagsFolder . 'sd.png'),
					array('se', 'se', $flagsFolder . 'se.png'),
					array('sg', 'sg', $flagsFolder . 'sg.png'),
					array('sh', 'sh', $flagsFolder . 'sh.png'),
					array('si', 'si', $flagsFolder . 'si.png'),
					array('sj', 'sj', $flagsFolder . 'sj.png'),
					array('sk', 'sk', $flagsFolder . 'sk.png'),
					array('sl', 'sl', $flagsFolder . 'sl.png'),
					array('sm', 'sm', $flagsFolder . 'sm.png'),
					array('sn', 'sn', $flagsFolder . 'sn.png'),
					array('so', 'so', $flagsFolder . 'so.png'),
					array('sr', 'sr', $flagsFolder . 'sr.png'),
					array('st', 'st', $flagsFolder . 'st.png'),
					array('sv', 'sv', $flagsFolder . 'sv.png'),
					array('sy', 'sy', $flagsFolder . 'sy.png'),
					array('sz', 'sz', $flagsFolder . 'sz.png'),
					array('tc', 'tc', $flagsFolder . 'tc.png'),
					array('td', 'td', $flagsFolder . 'td.png'),
					array('tf', 'tf', $flagsFolder . 'tf.png'),
					array('tg', 'tg', $flagsFolder . 'tg.png'),
					array('th', 'th', $flagsFolder . 'th.png'),
					array('tj', 'tj', $flagsFolder . 'tj.png'),
					array('tk', 'tk', $flagsFolder . 'tk.png'),
					array('tl', 'tl', $flagsFolder . 'tl.png'),
					array('tm', 'tm', $flagsFolder . 'tm.png'),
					array('tn', 'tn', $flagsFolder . 'tn.png'),
					array('to', 'to', $flagsFolder . 'to.png'),
					array('tr', 'tr', $flagsFolder . 'tr.png'),
					array('tt', 'tt', $flagsFolder . 'tt.png'),
					array('tv', 'tv', $flagsFolder . 'tv.png'),
					array('tw', 'tw', $flagsFolder . 'tw.png'),
					array('tz', 'tz', $flagsFolder . 'tz.png'),
					array('ua', 'ua', $flagsFolder . 'ua.png'),
					array('ug', 'ug', $flagsFolder . 'ug.png'),
					array('um', 'um', $flagsFolder . 'um.png'),
					array('us', 'us', $flagsFolder . 'us.png'),
					array('uy', 'uy', $flagsFolder . 'uy.png'),
					array('uz', 'uz', $flagsFolder . 'uz.png'),
					array('va', 'va', $flagsFolder . 'va.png'),
					array('vc', 'vc', $flagsFolder . 'vc.png'),
					array('ve', 've', $flagsFolder . 've.png'),
					array('vg', 'vg', $flagsFolder . 'vg.png'),
					array('vi', 'vi', $flagsFolder . 'vi.png'),
					array('vn', 'vn', $flagsFolder . 'vn.png'),
					array('vu', 'vu', $flagsFolder . 'vu.png'),
					array('wales', 'wales', $flagsFolder . 'wales.png'),
					array('wf', 'wf', $flagsFolder . 'wf.png'),
					array('ws', 'ws', $flagsFolder . 'ws.png'),
					array('ye', 'ye', $flagsFolder . 'ye.png'),
					array('yt', 'yt', $flagsFolder . 'yt.png'),
					array('za', 'za', $flagsFolder . 'za.png'),
					array('zm', 'zm', $flagsFolder . 'zm.png'),
					array('zw', 'zw', $flagsFolder . 'zw.png')
				),
				'selicon_cols' => 16,
				'size' => 1,
				'minitems' => 1,
				'maxitems' => 1
			)
		),

	),
);
