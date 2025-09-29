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
    $routes->get('inventory-overview', 'WarehouseManagerController::inventoryOverview');
    $routes->get('receiving', 'WarehouseManagerController::receiving');
    $routes->get('shipping', 'WarehouseManagerController::shipping');
    $routes->get('approvals', 'WarehouseManagerController::approvals');
    $routes->get('batch-tracking', 'WarehouseManagerController::batchTracking');
    $routes->get('reports', 'WarehouseManagerController::reports');
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
