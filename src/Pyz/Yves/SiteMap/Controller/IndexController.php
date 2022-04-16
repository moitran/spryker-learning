<?php

namespace Pyz\Yves\SiteMap\Controller;

use Pyz\Client\SiteMap\SiteMapClientInterface;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController
 * @package Pyz\Yves\SiteMap\Controller
 * @method SiteMapClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $totalPage = $this->getClient()->getTotalPage();
        $response = new Response(
            $this->renderView(
                '@SiteMap/views/index/index.twig',
                [
                    'totalPage' => $totalPage,
                ]
            )->getContent()
        );
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    /**
     * @param int $pageNumber
     *
     * @return Response
     */
    public function detailAction(int $pageNumber)
    {
        $siteMapCollectionTransfer = $this->getClient()->getPageData($pageNumber);
        $response = new Response(
            $this->renderView(
                '@SiteMap/views/index/detail.twig',
                [
                    'urls' => $siteMapCollectionTransfer->getSiteMaps(),
                ]
            )->getContent()
        );
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }
}
