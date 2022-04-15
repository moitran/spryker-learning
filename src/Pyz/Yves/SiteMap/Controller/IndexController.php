<?php

namespace Pyz\Yves\SiteMap\Controller;

use Generated\Client\Ide\Url;
use GuzzleHttp\Psr7\Uri;
use Pyz\Client\SiteMap\SiteMapClientInterface;
use Spryker\Yves\Kernel\Controller\AbstractController;
use SprykerTest\Shared\Url\Helper\UrlHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController
 * @package Pyz\Yves\SiteMap\Controller
 * @method SiteMapClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $uri = $request->getUri();
        $domainWithProtocol = sprintf('%s://%s', parse_url($uri, PHP_URL_SCHEME), parse_url($uri, PHP_URL_HOST));
        $siteMapCollectionTransfer = $this->getClient()->getSiteMapData();
        $response = new Response(
            $this->renderView(
                '@SiteMap/views/index/index.twig',
                [
                    'urls' => $siteMapCollectionTransfer->getSiteMaps(),
                    'domainWithProtocol' => $domainWithProtocol,
                ]
            )->getContent()
        );
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }
}
