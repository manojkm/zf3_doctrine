<?php
/**
 * Configuration settings used by all of the examples.
 *
 * Specify your eBay application keys in the appropriate places.
 *
 * Be careful not to commit this file into an SCM repository.
 * You risk exposing your eBay application keys to more people than intended.
 */
return [

    /**
     * Mode - The mode that the scrip will be running in.
     * This can be (dev,prod) as of now. The mode will load
     * a configuration file by the same name. For example if
     * the mode is set to 'dev' then the config file 'dev.php'
     * in the current directory will be used.
     */
    'mode' => '',

        'credentials' => [
            'devId' => '1fec4e3f-4bcb-43a7-9124-9ff0a43f3d2f',
            'appId' => 'Manojkm-sanks-PRD-1b7edec1b-1fe128d0',
            'certId' => 'PRD-b7edec1beff4-583f-4d53-bd0c-8eb4',
        ],
        'authToken' => 'AgAAAA**AQAAAA**aAAAAA**B4daWQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wDkICnAZmCpg6dj6x9nY+seQ**uc0DAA**AAMAAA**fiIb2fKj739OcXXz3AogLU0fNXhhQN/yJAX169eovWEa7f6JnQC9Ws8uICpBQCx3O27pldDWUS8J0adw3OR4N13pBvE7KorZ0FK/jeEiJnBtUlR/YIEMkyQt6a1cjx4JMCmOL8c/nlbrn3bMhB70VJF34aB79cUerBdZ4KFeLpN4R6Y3FFKmrU5YkCVY59p2iOQEDGXRh90qLSKgELT5BBEoHaZOpvoPyDmaO6wSxxJ0LNmVH3F90NBH3IUCzDduOb4mQr4ZvtGlTExIMFGAjHchaerSwCaXpTHOOBhnkyLw0fgMMxz+Jux9NlLSvfVfpNqIZfEnyAG/RwfkPt5up3xAXEoW3jxUzyuosHrUXW0d4MoAHrD80PLCMgcszbqrFtrfll8GHV38ror74cfDCJ+xoOyMHiPsZvJD0d+c1A7A8tUm9fm9DZqzhsYihEUtrnTIb7jhY15679qX4Qigyri7zWCpbBzKNN9tHe0DDhvQGAoNXbbJJdTXqBO4G6RwCvMlsC4xNP3S8azDwj6a5PxkmCkZwarcQltBsPDTdxP29NS8xbirem5+gq1zz1YOjaQ0CLIzCxyIXIJgtwF6QhL6qRy013+hyJ1nB1aCFORA7ZNMSI/6RlLQj4EcNu6QZ9hyOzo4wlD6oTllxJbohJt6a9246vmJK+ma/GK1tVbeIv+uF6mvTQtwkO8E86CDJFgS9BWEaxVnDvFfMGqhWXfhbvZyIhzn4CBPAYGWL3It5iNXehutJ6CZI/tsPTGb',
        'oauthUserToken' => 'YOUR_PRODUCTION_OAUTH_USER_TOKEN',
        'ruName' => 'YOUR_PRODUCTION_RUNAME'

];