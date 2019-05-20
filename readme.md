#php-klanten-vertellen-api
A PHP implementation of the klantenvertellen.nl Api.

This is a PHP package which you can import in any of your PHP projects. 
The goal of this package is to make it easy to communicate with the KlantenVertellen api with just a few function calls.

##Installation

```text
    composer install kingscode/php-klanten-vertellen-api
```

##Usage

(!) Before you get started, make sure you already have a `token` and `location id` from the 
KlantenVertellen website.


You can get the api-token from: 

`My Account -> Invite -> Extra Options`

The ID to your review page can be found in the link on the same page as the token:

`(ex: https://www.klantenvertellen.nl/invite-link/XXXXXXX/yourcompany.nl?lang=en)`
 

### Getting started

To get started you need to create a `KlantenVertellenWrapper` object, like so:
```php
    //Repository ctor: (token, locationId, locale)
    $repository = new Repository('XXXX-XXXX-XXXX-XXXX', 1234567, 'nl');
    $wrapper = new KlantenVertellenWrapper(new GetReviews($repository), new ReviewInvite($repository));
```

####Getting reviews
```php
    //This will return 50 latest reviews that got posted on your page
    $reviews = $wrapper->reviews()->getReviews(50);
    
    //This will return the 25 worst reviews that got posted on your page
    $worstReviews = $wrapper->reviews()->getWorstReviews();
```

####Sending review invites
```php
    //You can only send an invite to the same address every 30 days
    $wrapper->inviter()->sendInvite('info@mail.com', 'First name', 'Last name');
```

