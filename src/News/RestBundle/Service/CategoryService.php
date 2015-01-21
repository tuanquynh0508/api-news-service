<?php
namespace News\RestBundle\Service;

class CategoryService extends BaseService
{
  /**
   * Get Categories list
   *
   * @author Nguyen Nhu Tuan <tuanquynh0508@gmail.com>
   * @since 1.0
   * @return array
   */
  public function getCategories()
  {
    $categoryRepository = $this->get('api_news.repository.category');
    $data = $categoryRepository->getCategories();
    return $this->clientReponse($data, "Category not found");
  }
}
