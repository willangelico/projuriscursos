<?php return array (
  'crontab' => 
  array (
    0 => 
    array (
      'className' => 'plugins.generic.usageStats.UsageStatsLoader',
      'frequency' => 
      array (
        'hour' => '24',
      ),
      'args' => 
      array (
        0 => 'autoStage',
      ),
    ),
    1 => 
    array (
      'className' => 'classes.tasks.ReviewReminder',
      'frequency' => 
      array (
        'hour' => '0',
      ),
      'args' => 
      array (
      ),
    ),
    2 => 
    array (
      'className' => 'classes.tasks.SubscriptionExpiryReminder',
      'frequency' => 
      array (
        'hour' => '0',
      ),
      'args' => 
      array (
      ),
    ),
    3 => 
    array (
      'className' => 'classes.tasks.OpenAccessNotification',
      'frequency' => 
      array (
        'hour' => '0',
      ),
      'args' => 
      array (
      ),
    ),
  ),
  'enabled' => true,
); ?>