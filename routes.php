<?php
# Pages
$router->get('/', 'controllers/index.php');
$router->get('/dashboard', 'controllers/dashboard.php');

# Auth
// Pages
$router->get('/login', 'controllers/auth/login.php')->only('guest');
$router->get('/register', 'controllers/auth/register.php')->only('guest');
// Actions
$router->post('/login', 'controllers/auth/session_start.php');
$router->post('/register', 'controllers/auth/store.php');
$router->delete('/logout', 'controllers/auth/destroy.php');

# Users
// Pages
$router->get('/users', 'controllers/users/index.php');
$router->get('/user', 'controllers/users/show.php');
$router->get('/user/create', 'controllers/users/create.php');
$router->get('/user/edit', 'controllers/users/edit.php');
// Actions
$router->post('/user/create', 'controllers/users/store.php');
$router->patch('/user/edit', 'controllers/users/update.php');
$router->delete('/user', 'controllers/users/destroy.php');
$router->post('/password-reset', 'controllers/users/password-reset.php');


# Job Cards
// Pages
$router->get('/jobs', 'controllers/jobs/index.php');
$router->get('/job', 'controllers/jobs/show.php');
$router->get('/job/create', 'controllers/jobs/create.php');
$router->get('/job/edit', 'controllers/jobs/edit.php');
// Actions
$router->post('/jobs', 'controllers/jobs/store.php');
$router->patch('/job/edit', 'controllers/jobs/update.php');
$router->delete('/job', 'controllers/jobs/destroy.php');

# Brands
// Pages
$router->get('/brands', 'controllers/brands/index.php');
$router->get('/brand', 'controllers/brands/show.php');
$router->get('/brand/create', 'controllers/brands/create.php');
$router->get('/brand/edit', 'controllers/brands/edit.php');
// Actions
$router->post('/brands', 'controllers/brands/store.php');
$router->patch('/brand/edit', 'controllers/brands/update.php');
$router->delete('/brand', 'controllers/brands/destroy.php');


# Models
// Pages
$router->get('/models', 'controllers/models/index.php');
$router->get('/model', 'controllers/models/show.php');
$router->get('/model/create', 'controllers/models/create.php');
$router->get('/model/edit', 'controllers/models/edit.php');
// Actions
$router->post('/models', 'controllers/models/store.php');
$router->patch('/model/edit', 'controllers/models/update.php');
$router->delete('/model', 'controllers/models/destroy.php');

# Clients
// Pages
$router->get('/clients', 'controllers/clients/index.php');
$router->get('/client', 'controllers/clients/show.php');
$router->get('/client/create', 'controllers/clients/create.php');
$router->get('/client/edit', 'controllers/clients/edit.php');
// Actions
$router->post('/clients', 'controllers/clients/store.php');
$router->patch('/client/edit', 'controllers/clients/update.php');
$router->delete('/client', 'controllers/clients/destroy.php');

# Company
// Pages
$router->get('/companies', 'controllers/companies/index.php');
$router->get('/company', 'controllers/companies/show.php');
$router->get('/company/create', 'controllers/companies/create.php');
$router->get('/company/edit', 'controllers/companies/edit.php');
// Actions
$router->post('/companies', 'controllers/companies/store.php');
$router->patch('/company/edit', 'controllers/companies/update.php');
$router->delete('/company', 'controllers/companies/destroy.php');

# Invoice
// Pages
$router->get('/invoices', 'controllers/invoices/index.php');
$router->get('/invoice', 'controllers/invoices/show.php');
$router->get('/invoice/create', 'controllers/invoices/create.php');
$router->get('/invoice/edit', 'controllers/invoices/edit.php');
// Actions
$router->post('/invoices', 'controllers/invoices/store.php');
$router->patch('/invoice/edit', 'controllers/invoices/update.php');
$router->delete('/invoice', 'controllers/invoices/destroy.php');

# Activities
// Pages
$router->get('/activities', 'controllers/activities/index.php');
$router->get('/activity', 'controllers/activities/show.php');
// Actions
$router->delete('/activity', 'controllers/activities/destroy.php');
