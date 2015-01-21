<?php

namespace News\RestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//For FOSRestController
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View AS FOSView;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations\QueryParam;
//For API DOC
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class CategoryController extends FOSRestController
{

    /**
     * Get list Category
     *
     * @ApiDoc(
     *   resource = true,
     *   section="Category",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the article is not found"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "NewsRestBundle:Api:getCategories.html.twig",
     *  templateVar = "form"
     * )
     *
     * @return array
     *
     * @throws NotFoundHttpException when article not exist
     */
    public function getCategoriesAction()
    {
      $categoryService = $this->get('api_news.service.category');
      return $categoryService->getCategories();
    }

}
