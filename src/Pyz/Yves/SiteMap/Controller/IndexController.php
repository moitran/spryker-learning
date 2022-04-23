<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\SiteMap\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * Class IndexController
 *
 * @package Pyz\Yves\SiteMap\Controller
 * @method \Pyz\Client\SiteMap\SiteMapClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $totalPage = $this->getClient()->getTotalPage();
        $response = $this->renderView(
            '@SiteMap/views/index/index.twig',
            [
                'totalPage' => $totalPage,
            ]
        );
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    /**
     * @param int $pageNumber
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailAction(int $pageNumber)
    {
        $siteMapCollectionTransfer = $this->getClient()->getPageData($pageNumber);
        $response = $this->renderView(
            '@SiteMap/views/index/detail.twig',
            [
                'urls' => $siteMapCollectionTransfer->getSiteMaps(),
            ]
        );
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }
}
