<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use com\zoho\api\authenticator\OAuthToken;
use com\zoho\api\authenticator\TokenType;
use com\zoho\api\authenticator\store\DBStore;
use com\zoho\api\authenticator\store\FileStore;
use com\zoho\crm\api\Initializer;
use com\zoho\crm\api\UserSignature;
use com\zoho\crm\api\SDKConfigBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\api\logger\Logger;
use com\zoho\api\logger\Levels;

class ZohoClientServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('ZohoClient', function ($app) {
            // Configure the ZohoClient here with the required parameters

            $clientId = 'your_client_id';
            $clientSecret = 'your_client_secret';
            $refreshToken = 'your_refresh_token';
            $redirectURL = 'your_redirect_url';

            // User signature
            $user = new UserSignature('your_user_email');

            // Environment
            $environment = USDataCenter::PRODUCTION();

            // Token
            $token = new OAuthToken($clientId, $clientSecret, $refreshToken, TokenType::REFRESH, $redirectURL);

            // Token store
            // You can use either FileStore or DBStore as per your requirement
            $tokenStore = new FileStore('/path/to/token_store.txt');
            // OR
            // $tokenStore = new DBStore("hostName", "dataBaseName", "userName", "password", "portNumber");

            // SDK Config
            $sdkConfig = (new SDKConfigBuilder())->build();

            // Resource path
            $resourcePath = '/path/to/resource_folder';

            // Logger
            $logger = Logger::getInstance(Levels::INFO, '/path/to/log_file.log');

            // Initialize Zoho CRM SDK
            Initializer::initialize($user, $environment, $token, $tokenStore, $sdkConfig, $resourcePath, $logger);

            // Return the ZohoClient instance
            return \ZCRMRestClient::getInstance();
        });
    }
}
