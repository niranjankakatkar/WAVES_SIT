<?php 
 
// Product Details  
// Minimum amount is $0.50 US  
$productName = "Codex Demo Product";  
$productID = "12345";  
$productPrice = 55; 
$currency = "gbp"; 
  
/* 
 * Stripe API configuration 
 * Remember to switch to your live publishable and secret key in production! 
 * See your keys here: https://dashboard.stripe.com/account/apikeys 
 */ 
define('STRIPE_SECRET_KEY', 'sk_test_51QkQxYP6mKPrmPu8YvBPN71gcpY7PJ7i7xWk4lo5RaW5xYk1ZQd4BinFmIXgXtdjwqLYk9JImGmqjV9QY3D0TVPV00PSkhzHd9'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51QkQxYP6mKPrmPu8LDODxvSdwRKfJIvzRe4rljnqUGw5DunV2rDMQPo1R8cXoEpVEG0SCFWFyc4C1XXOoqy2b4GD00oaRowOm2'); 
define('STRIPE_SUCCESS_URL', 'https://example.com/payment-success.php'); //Payment success URL 
define('STRIPE_CANCEL_URL', 'https://example.com/payment-cancel.php'); //Payment cancel URL 
    
// Database configuration    
define('DB_HOST', 'localhost');   
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', '');   
define('DB_NAME', 'waves'); 
 
?>