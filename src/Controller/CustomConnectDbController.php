<?php

declare(strict_types=1);

namespace Drupal\custom_connect_db\Controller;

use Drupal;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

/**
 * Returns responses for custom connect db routes.
 */
final class CustomConnectDbController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke(): array {
    $dbCity = Database::getConnection('default', 'second');
    $query = $dbCity->select('provinces', 'p')
      ->fields('p', ['id','name']);
    $result = $query->execute()->fetchAll();
    dump($result);

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
