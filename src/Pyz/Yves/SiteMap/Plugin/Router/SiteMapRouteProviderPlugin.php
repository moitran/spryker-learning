<?php

namespace Pyz\Yves\SiteMap\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

/**
 * Class SiteMapRouteProviderPlugin
 * @package Pyz\Yves\SiteMap\Plugin\Router
 */
class SiteMapRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    protected const ROUTE_SITE_MAP_INDEX = 'site-map-index';

    /**
     * @param RouteCollection $routeCollection
     *
     * @return RouteCollection
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = $this->addSiteMapIndexRoute($routeCollection);

        return $routeCollection;
    }

    /**
     * @param RouteCollection $routeCollection
     *
     * @return RouteCollection
     */
    protected function addSiteMapIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/sitemap.xml', 'SiteMap', 'Index', 'indexAction');
        $routeCollection->add(static::ROUTE_SITE_MAP_INDEX, $route);

        return $routeCollection;
    }
}
