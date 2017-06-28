<?php
namespace S3b0\EcomProductTools\ViewHelpers\Product;

use S3b0\EcomProductTools\Domain\Model\Product;
use S3b0\EcomProductTools\Domain\Repository\ProductRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class GetArticleNoViewHelper extends AbstractViewHelper
{

    /**
     * Arguments Initialization
     * productUid => int
     */
    public function initializeArguments()
    {
        $this->registerArgument('productUid', 'integer', 'The products UID to get the article no. from', false);
    }

    /**
     * Rendering
     *
     * @return array
     */
    public function render()
    {
        if ($this->arguments['productUid']) {
            $productUid = $this->arguments['productUid'];
        } else {
            // Try to find the product uid in the current page data - if set
            $productUid = $GLOBALS['TSFE']->page['tx_product'] ?: '';
        }

        if ($productUid) {
            $productRepository = $this->getProductRepository();
            $product = $productRepository->findByUid($productUid);

            if ($product instanceof Product) {
                return $product->getArticleNo();
            }
        }

    }

    /**
     * @return ProductRepository
     */
    private function getProductRepository()
    {
        // Initialize Repository
        /** @var ObjectManager $objManager */
        $objManager = GeneralUtility::makeInstance(ObjectManager::class);
        /** @var QuerySettingsInterface $querySettings */
        $querySettings = $objManager->get(QuerySettingsInterface::class);
        $querySettings->setRespectStoragePage(false);
        /** @var ProductRepository $productRepository */
        $productRepository = $objManager->get(ProductRepository::class);
        $productRepository->setDefaultQuerySettings($querySettings);

        return $productRepository;
    }

}