# wordpress plugin

This plugin will show a custom page in the specified URL, the page will include a list of users from the endpoint https://jsonplaceholder.typicode.com/users, clicking each row will open a popup with the details of each user.

Composer was added, to run the tests please run the command 

    composer run-script test

To check the files with Inpsyde please run

    vendor/bin/phpcs --standard="Inpsyde" <path>
Or in Windows platform

    $ vendor/bin/phpcs --standard="Inpsyde" <path>
    
    
There're two types of cache being used here, wordpress cache to store the details to not call again for the same details and transient for lists.
The endpoint where the page will show up is customizable, changing it in the tab ' My Plugin ' in the admin dashboard.
