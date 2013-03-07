<?php

return array(
    // Acceptable Drivers:
    // file, db, memcached, apc
    'driver' => 'file',

    // DB driver
    'table' => 'sessions',

    // Lifetime [mins]
    'lifetime' => 60,

    // Destroy on close?
    'expire_on_close' => false,


);