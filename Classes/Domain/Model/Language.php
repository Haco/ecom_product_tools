<?php
namespace S3b0\EcomProductTools\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>, ecom instruments GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * A language
 */
class Language extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Language title to be displayed
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title = '';

	/**
	 * @var integer
	 */
	protected $sysLanguage = 0;

	/**
	 * The flag representing language
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $flag = '';

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return integer
	 */
	public function getSysLanguage() {
		return $this->sysLanguage;
	}

	/**
	 * @param integer $sysLanguage
	 */
	public function setSysLanguage($sysLanguage) {
		$this->sysLanguage = $sysLanguage;
	}

	/**
	 * Returns the flag
	 *
	 * @return string $flag
	 */
	public function getFlag() {
		return $this->flag;
	}

	/**
	 * Sets the flag
	 *
	 * @param string $flag
	 * @return void
	 */
	public function setFlag($flag) {
		$this->flag = $flag;
	}

	public function getFlagSource() {
		return (version_compare(TYPO3_branch, '7.1', '>=') ? 'EXT:core/Resources/Public/Icons/Flags/' : 'EXT:t3skin/images/flags/') . $this->flag . '.png';
	}

}