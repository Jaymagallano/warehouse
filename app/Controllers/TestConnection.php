<?php

namespace App\Controllers;

class TestConnection extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        try {
            // Test database connection
            if ($db->connID) {
                $data['status'] = 'success';
                $data['message'] = 'Database connection successful!';
                $data['database'] = $db->database;
                $data['hostname'] = $db->hostname;
                $data['username'] = $db->username;
                $data['dbdriver'] = $db->DBDriver;
                
                // Get list of tables
                $data['tables'] = $db->listTables();
                
                // Get user count
                $builder = $db->table('users');
                $data['user_count'] = $builder->countAll();
                
                // Get inventory count
                $builder = $db->table('inventory');
                $data['inventory_count'] = $builder->countAll();
                
            } else {
                $data['status'] = 'error';
                $data['message'] = 'Database connection failed!';
            }
        } catch (\Exception $e) {
            $data['status'] = 'error';
            $data['message'] = $e->getMessage();
        }
        
        return view('test_connection', $data);
    }
}
