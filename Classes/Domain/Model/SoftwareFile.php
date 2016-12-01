<?php
namespace S3b0\EcomProductTools\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Nicolas Scheidler <nicolas.scheidler@ecom-ex.com>
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

class SoftwareFile extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var integer
     */
    protected $crdate = null;

    /**
     * @var boolean
     */
    protected $hidden = false;

    /**
     * The fileReference
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $fileReference = null;

    /**
     * The externalUrl
     *
     * @var string
     */
    protected $externalUrl = '';

    /**
     * File title to be displayed
     *
     * @var string
     */
    protected $title = '';

    /**
     * File description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Affected products
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Product>
     */
    protected $products = null;

    /**
     * TYPO3 CMS fileCategories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $fileCategories = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->products = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->fileCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the fileReference
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $file
     */
    public function getFileReference()
    {
        return $this->fileReference;
    }

    /**
     * Sets the fileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $fileReference
     *
     * @return void
     */
    public function setFileReference(\TYPO3\CMS\Extbase\Domain\Model\FileReference $fileReference)
    {
        $this->fileReference = $fileReference;
    }

    /**
     * Returns the externalUrl
     *
     * @return string
     */
    public function getExternalUrl()
    {
        return $this->externalUrl;
    }

    /**
     * Sets the externalUrl
     *
     * @param string $externalUrl
     */
    public function setExternalUrl($externalUrl)
    {
        $this->externalUrl = $externalUrl;
    }

    /**
     * Returns crdate
     *
     * @return integer $crdate
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * Returns hidden
     *
     * @return boolean $hidden
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     *
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Adds a Product
     *
     * @param \S3b0\EcomProductTools\Domain\Model\Product $product
     *
     * @return void
     */
    public function addProduct(\S3b0\EcomProductTools\Domain\Model\Product $product)
    {
        $this->products->attach($product);
    }

    /**
     * Removes a Product
     *
     * @param \S3b0\EcomProductTools\Domain\Model\Product $productToRemove The Product to be removed
     *
     * @return void
     */
    public function removeProduct(\S3b0\EcomProductTools\Domain\Model\Product $productToRemove)
    {
        $this->products->detach($productToRemove);
    }

    /**
     * Returns the products
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Product> $products
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Sets the products
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Product> $products
     *
     * @return void
     */
    public function setProducts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $products = null)
    {
        $this->products = $products;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $fileCategory
     *
     * @return void
     */
    public function addFileCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $fileCategory)
    {
        $this->fileCategories->attach($fileCategory);
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $fileCategoryToRemove The Category to be removed
     *
     * @return void
     */
    public function removeFileCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $fileCategoryToRemove)
    {
        $this->fileCategories->detach($fileCategoryToRemove);
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    public function getFileCategories()
    {
        return $this->fileCategories;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $fileCategories
     */
    public function setFileCategories($fileCategories = null)
    {
        $this->fileCategories = $fileCategories;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\Category
     */
    public function getFileCategory()
    {
        return $this->fileCategories->current();
    }
}