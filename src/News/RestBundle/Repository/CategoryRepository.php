<?php

namespace News\RestBundle\Repository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends BaseRepository
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
    return $this->findAll();
  }
}