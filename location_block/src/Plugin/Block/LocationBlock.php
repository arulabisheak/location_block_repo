<?php

namespace Drupal\location_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Location Block' Block.
 *
 * @Block(
 *   id = "location_print_block",
 *   admin_label = @Translation("Location"),
 *   category = @Translation("Location"),
 * )
 */
class LocationBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = \Drupal::config('location_block.location_settings');
    $country = $config->get('country');
    $city = $config->get('city');
    $timezone = $config->get('timezone');

    $service = \Drupal::service('location_block.time_services');
    $time_value_print = $service->getDateTime($timezone);

    return [
      '#theme' => 'location_block',
      '#country' => $country,
      '#city' => $city,
      '#datetime' => $time_value_print,
    ];

  }

  /**
   * @return int
   */
  public function getCacheMaxAge() {
    return 0;
  }

}
