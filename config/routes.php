<?php

return array(
    '_root_' => 'pricingtable/backend/pricingtable/index',
    '_404_' => 'pricingtable/backend/404',
    
    'backend(/:any)' => array('pricingtable/backend$1', 'name' => 'pricingtable_backend'),
    'backend' => array('pricingtable/backend/pricingtable', 'name' => 'pricingtable_backend_index'),
//    'frontend(/:any)' => array('concours/frontend/concours$1', 'name' => 'concours_frontend'),
//    'frontend' => array('concours/frontend/concours/index', 'name' => 'concours_frontend_dashboard'),
//    
//    '(:any)' => array('pricingtable/backend/$1', 'name' => 'concours_route'),

);