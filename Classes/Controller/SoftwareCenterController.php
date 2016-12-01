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
use S3b0\EcomProductTools\Domain\Model\Product;
use S3b0\EcomProductTools\Domain\Model\SoftwareFile;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Mvc\Exception\StopActionException;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Form\Domain\Repository\ContentRepository;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * SoftwareCenter Controller
 */
class SoftwareCenterController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * productRepository
     *
     * @var \S3b0\EcomProductTools\Domain\Repository\ProductRepository
     * @inject
     */
    protected $productRepository = null;

    /**
     * SoftwareFileRepository
     *
     * @var \S3b0\EcomProductTools\Domain\Repository\SoftwareFileRepository
     * @inject
     */
    protected $softwareFileRepository = null;

    /**
     * feSession
     *
     * @var \Ecom\EcomToolbox\Domain\Session\FrontendSessionHandler
     * @inject
     */
    protected $feSession = null;

    /**
     * Initialize Action Method
     *
     * @return void
     * @api
     */
    public function initializeAction()
    {
        $this->feSession->setStorageKey($this->extensionName);
        if (\Ecom\EcomToolbox\Security\Backend::isAuthenticated()) {
            $GLOBALS['TSFE']->showHiddenRecords = true;
        }
    }

    /**
     * @param ViewInterface $view The view to be initialized
     * @return void
     */
    public function initializeView(ViewInterface $view)
    {
        $this->view->assignMultiple([
            'addLayoutClasses' => strtolower($this->request->getPluginName() . '-' . $this->request->getControllerActionName()),
            'language'         => $GLOBALS[ 'TSFE' ]->sys_language_uid,
            'pageUid'          => $GLOBALS[ 'TSFE' ]->id
        ]);
        parent::initializeView($view);
    }

    /**
     * List Action
     * @return void
     */
    public function listAction() {
        $products = $this->productRepository->findByUidList($this->settings['products'], true);
        $noUrlPathSetForProducts = [];

        // Prepare
        foreach ($products as $product) {
            /**
             * Sets the amount of software files for each product, visible in card view
             * @var Product $product */
            $product->setSoftwareFileAmount((int)$this->softwareFileRepository->findByProduct($product)->count());

            // Check products for a not-set speaking url
            if (empty($product->getPathSegment())) {
                $noUrlPathSetForProducts[] = [
                    'uid' => $product->getUid(),
                    'title' => $product->getTitle()
                ];
            }
        }

        $this->view->assignMultiple([
            'products' => $products,
            'noUrlPathSetForProducts' => $noUrlPathSetForProducts
        ]);
    }

    /**
     * ShowAction
     * @param Product $product
     * @return void
     */
    public function showAction(Product $product = null) {
        if ($product instanceof Product) {
            $this->feSession->store('lastViewedProduct', $product->getUid());

            $product->setSoftwareFileAmount((int)$this->softwareFileRepository->findByProduct($product)->count());
            $files = $this->softwareFileRepository->findByProduct($product);

            $this->view->assignMultiple([
                'product' => $product,
                'files' => $files
            ]);
        } else {
            $this->addFlashMessage('Product with ID: '. (int)$this->request->getArgument('product') . ' is not available.', 'No Product found', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING, true);
            $this->redirectToUri($this->uriBuilder->reset()->setUseCacheHash(false)->build());
        }
    }

    /**
     * SoftwareCenter downloadAction
     * @param SoftwareFile $softwareFile
     * @return void
     * @throws StopActionException
     */
    public function downloadAction(SoftwareFile $softwareFile) {
        $product = null;
        if (MathUtility::canBeInterpretedAsInteger(GeneralUtility::_GET('product')) && $this->productRepository->findByUid(GeneralUtility::_GET('product')) instanceof Product) {
            $product = $this->productRepository->findByUid(GeneralUtility::_GET('product'));
        }

        if ($softwareFile instanceof SoftwareFile) {
            if ($softwareFile->getExternalUrl()) {
                /** @var ContentObjectRenderer $contentObject */
                $contentObject = GeneralUtility::makeInstance(ContentObjectRenderer::class);
                $this->redirectToUri($contentObject->typoLink_URL(['parameter' => $softwareFile->getExternalUrl()]));
                throw new \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException();
            } elseif ($softwareFile->getFileReference() instanceof FileReference && file_exists($softwareFile->getFileReference()->getOriginalResource()->getPublicUrl(true))) {
                $file = $softwareFile->getFileReference()->getOriginalResource()->getPublicUrl(true);

                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($file));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                readfile($file);
                exit;
            } else {
                if ($product) {
                    $this->addFlashMessage('The requested file is not available anymore.','', AbstractMessage::WARNING, true);
                    $this->redirectToUri($this->uriBuilder->setUseCacheHash(false)->uriFor('show', ['product' => $product]));
                } else {
                    $this->redirectToUri($this->uriBuilder->uriFor('list'));
                }
            }
        }
    }
}