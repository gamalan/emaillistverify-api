# EmailListVerify PHP Library

This library will allow you to integrate the **EmailListVerify** API in your project.

### Prerequisites

You need an active account at [EmailListVerify](https://emaillistverify.com) to use this library. From there, grab your API Key under **API** by creating new api app.

## Usage
```php
use Gamalan\EmailListVerify\EmailListVerify;
use Gamalan\EmailListVerify\SingleResult;

// You can configure timeout by using parameter, default is 15
$client = new EmailListVerify('API_KEY', 30);

try{
    $result = $client->verifyEmail('mail@example.com');
    switch ($result->getStatus()){
        case SingleResult::VALIDATION_OK:
            // Do something
            break;
        case SingleResult::VALIDATION_ANTISPAM_SYSTEM:
            // Do somethin else
            break;
        default:
            break;
    }
}catch (\Gamalan\EmailListVerify\APIError $error){
    // Handle Error
}
```
