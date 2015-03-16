<?php
namespace S3b0\EcomProductTools\Controller;


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
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * ActionController
 */
class ActionController extends ExtensionController {

	/**
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentNameException
	 */
	public function initializeDownloadCenterAction() {
		if ( GeneralUtility::_POST('division') && (int)GeneralUtility::_POST('division') === 0 ) {
			$this->request->setArgument('division', NULL);
		}
		if ( GeneralUtility::_POST('category') && (int)GeneralUtility::_POST('category') === 0 ) {
			$this->request->setArgument('category', NULL);
		}
		if ( GeneralUtility::_POST('product') && (int)GeneralUtility::_POST('product') === 0 ) {
			$this->request->setArgument('product', NULL);
		}
	}

	/**
	 * action downloadCenter
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\ProductDivision $division
	 * @param \S3b0\EcomProductTools\Domain\Model\ProductCategory $category
	 * @param \S3b0\EcomProductTools\Domain\Model\Product         $product
	 * @param boolean                                             $discontinued
	 * @return void
	 */
	public function downloadCenterAction(\S3b0\EcomProductTools\Domain\Model\ProductDivision $division = NULL, \S3b0\EcomProductTools\Domain\Model\ProductCategory $category = NULL, \S3b0\EcomProductTools\Domain\Model\Product $product = NULL, $discontinued = FALSE) {
		$category = $category instanceof \S3b0\EcomProductTools\Domain\Model\ProductCategory ? ($category->getProductDivisions()->contains($division) ? $category : NULL) : NULL;
		$product = $product instanceof \S3b0\EcomProductTools\Domain\Model\Product ? ($product->getProductCategories()->contains($category) ? $product : NULL) : NULL;

		$this->view->assignMultiple(array(
			'discontinued' => $discontinued,
			'product' => $product,
			'category' => $category,
			'division' => $division,
			'files' => $product instanceof \S3b0\EcomProductTools\Domain\Model\Product ? $this->fileRepository->findByProduct($product) : NULL,
			'products' => $category instanceof \S3b0\EcomProductTools\Domain\Model\ProductCategory ? $this->productRepository->findByProductCategory($category, $discontinued) : NULL,
			'productCategories' => $division instanceof \S3b0\EcomProductTools\Domain\Model\ProductDivision ? $this->productCategoryRepository->findByProductDivision($division) : NULL,
			'productDivisions' => $this->productDivisionRepository->findAll()
		));
	}

}