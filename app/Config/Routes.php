<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');

// Authentication Routes
$routes->get('login', 'AuthController::login');
$routes->post('authenticate', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

$routes->group('auth', function($routes) {
    $routes->get('logout', 'AuthController::logout');
});

// Warehouse Manager Routes
$routes->group('warehouse-manager', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'WarehouseManagerController::dashboard');
    
    // Inventory CRUD
    $routes->get('inventory-overview', 'WarehouseManagerController::inventoryOverview');
    $routes->get('inventory/list', 'WarehouseManagerController::getInventoryList');
    $routes->post('inventory/add', 'WarehouseManagerController::addInventory');
    $routes->get('inventory/(:num)', 'WarehouseManagerController::getInventory/$1');
    $routes->post('inventory/update/(:num)', 'WarehouseManagerController::updateInventory/$1');
    $routes->post('inventory/delete/(:num)', 'WarehouseManagerController::deleteInventory/$1');
    
    // Receiving CRUD
    $routes->get('receiving', 'WarehouseManagerController::receiving');
    $routes->get('receiving/list', 'WarehouseManagerController::getReceivingList');
    $routes->post('receiving/add', 'WarehouseManagerController::addReceiving');
    $routes->get('receiving/(:num)', 'WarehouseManagerController::getReceiving/$1');
    $routes->post('receiving/update/(:num)', 'WarehouseManagerController::updateReceiving/$1');
    $routes->post('receiving/delete/(:num)', 'WarehouseManagerController::deleteReceiving/$1');
    
    // Shipping CRUD
    $routes->get('shipping', 'WarehouseManagerController::shipping');
    $routes->get('shipping/list', 'WarehouseManagerController::getShippingList');
    $routes->post('shipping/add', 'WarehouseManagerController::addShipping');
    $routes->get('shipping/(:num)', 'WarehouseManagerController::getShipping/$1');
    $routes->post('shipping/update/(:num)', 'WarehouseManagerController::updateShipping/$1');
    $routes->post('shipping/delete/(:num)', 'WarehouseManagerController::deleteShipping/$1');
    
    // Approvals CRUD
    $routes->get('approvals', 'WarehouseManagerController::approvals');
    $routes->get('approvals/list', 'WarehouseManagerController::getApprovalsList');
    $routes->post('approvals/approve/(:num)', 'WarehouseManagerController::approveRequest/$1');
    $routes->post('approvals/reject/(:num)', 'WarehouseManagerController::rejectRequest/$1');
    
    // Batch Tracking CRUD
    $routes->get('batch-tracking', 'WarehouseManagerController::batchTracking');
    $routes->get('batch/list', 'WarehouseManagerController::getBatchList');
    $routes->post('batch/add', 'WarehouseManagerController::addBatch');
    $routes->get('batch/(:num)', 'WarehouseManagerController::getBatch/$1');
    $routes->post('batch/update/(:num)', 'WarehouseManagerController::updateBatch/$1');
    $routes->post('batch/delete/(:num)', 'WarehouseManagerController::deleteBatch/$1');
    
    // Reports
    $routes->get('reports', 'WarehouseManagerController::reports');
    $routes->get('reports/generate', 'WarehouseManagerController::generateReport');
});

// Inventory Auditor Routes
$routes->group('inventory-auditor', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'InventoryAuditorController::dashboard');
    $routes->get('inventory-view', 'InventoryAuditorController::inventoryView');
    $routes->get('audit-schedule', 'InventoryAuditorController::auditSchedule');
    $routes->get('audit-reports', 'InventoryAuditorController::auditReports');
    $routes->get('discrepancies', 'InventoryAuditorController::discrepancies');
    $routes->get('reconciliation', 'InventoryAuditorController::reconciliation');
});

// Procurement Officer Routes
$routes->group('procurement-officer', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'ProcurementOfficerController::dashboard');
    $routes->get('purchase-orders', 'ProcurementOfficerController::purchaseOrders');
    $routes->get('suppliers', 'ProcurementOfficerController::suppliers');
    $routes->get('materials', 'ProcurementOfficerController::materials');
    $routes->get('requisitions', 'ProcurementOfficerController::requisitions');
    $routes->get('invoices', 'ProcurementOfficerController::invoices');
    $routes->get('delivery-tracking', 'ProcurementOfficerController::deliveryTracking');
    $routes->get('reports', 'ProcurementOfficerController::reports');
});

// Warehouse Staff Routes
$routes->group('warehouse-staff', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'WarehouseStaffController::dashboard');
    $routes->get('inventory', 'WarehouseStaffController::inventory');
    $routes->get('receiving', 'WarehouseStaffController::receiving');
    $routes->get('shipping', 'WarehouseStaffController::shipping');
    $routes->get('scan', 'WarehouseStaffController::scan');
    $routes->get('physical-count', 'WarehouseStaffController::physicalCount');
});

//Accounts Payable Clerk Routes
$routes->group('apclerk', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'AccountsPayableClerkController::dashboard');
    $routes->get('invoices', 'AccountsPayableClerkController::invoices');
    $routes->get('payments', 'AccountsPayableClerkController::payments');
    $routes->get('reports', 'AccountsPayableClerkController::reports');
});
