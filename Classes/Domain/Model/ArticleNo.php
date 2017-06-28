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

class ArticleNo extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var string
     */
    protected $articleNo = '';

    /**
     * @var string
     */
    protected $title = '';

    /**
     * Product
     * - Just get the uid instead of the complete Model :)
     *
     * @var integer
     */
    protected $product = null;


    /**
     * Returns the product
     *
     * @return integer
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Sets the product
     *
     * @param integer $product
     *
     * @return void
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * Returns the article no
     *
     * @return string
     */
    public function getArticleNo()
    {
        return $this->articleNo;
    }

    /**
     * Sets the article no
     *
     * @param string $articleNo
     */
    public function setArticleNo($articleNo)
    {
        $this->articleNo = $articleNo;
    }

    /**
     * Returns the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}