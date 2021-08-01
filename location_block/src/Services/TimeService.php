<?php

namespace Drupal\location_block\Services;

use Drupal\Core\Datetime\DrupalDateTime;

/**
 * Provides time based on zone selection.
 */
class TimeService {

  /**
   * Function returns the datetime based on timezone.
   */
  public function getDateTime($zone_name = NULL) {
    $server_time_value = \Drupal::time()->getCurrentTime();
    $zone_time = DrupalDatetime::createFromTimestamp((int)$server_time_value, $zone_name);
    return $zone_time->format('jS M Y - g:i A');
  }

}