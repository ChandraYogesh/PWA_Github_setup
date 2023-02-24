<?php
require 'vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$stripe = new \Stripe\StripeClient(
  'sk_test_51MGzTUSDEVtB59Eu9Ae70QJJRBmWi2q6UTNj8rm61wLJ7dtONAoSONZ92VpgK7o0pnFmLqRclHTQdWJhzaInh6dp00PsPMbLMx'
);



$stripe->subscriptions->update(
  'sub_1MHRvzSDEVtB59EuKdUdR23w',
  ['pause_collection' => ['behavior' => 'mark_uncollectible']]
);
