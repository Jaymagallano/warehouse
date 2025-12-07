# WeBuild WITMS - System Documentation

## Executive Summary

**Project Name:** Warehouse Inventory and Tracking Monitoring System (WITMS)  
**Client:** WeBuild Construction Company  
**Purpose:** Centralized inventory management and financial integration across multiple construction warehouses  
**Technology Stack:** PHP 8.2, CodeIgniter 4, MySQL, HTML5, CSS3, JavaScript

---

## 1. Business Problem

### Current Challenges
WeBuild operates three construction warehouses with plans to expand to four. The company faces:

- ❌ **Stock discrepancies** - Missing, duplicate, or incorrect material records
- ❌ **Communication delays** - Poor coordination between warehouses and central office
- ❌ **Inefficient transactions** - Manual accounts payable/receivable processing
- ❌ **No forecasting** - Unable to predict material shortages or surpluses
- ❌ **Scalability issues** - Difficulty managing multiple warehouse expansion

### Solution: WITMS
A comprehensive warehouse inventory system with real-time monitoring, financial integration, and predictive analytics.

---

## 2. System Features (Implementation Status)

### ✅ **COMPLETED - Prelim (40-50%)**

#### Database Architecture
- **ERD Design** - Fully documented entity relationships
- **11 Main Tables** - Users, Inventory, Materials, Shipments, Approvals, Audits, Discrepancies, Requisitions, Deliveries, Invoices, Reports
- **Normalized Structure** - 3NF compliance for data integrity
- **Migration Scripts** - Automated database deployment

#### Basic Inventory Module
- **CRUD Operations** - Add, update, delete construction materials
- **Real-time Updates** - Stock changes reflect immediately
- **Multi-warehouse Support** - Track inventory across 3+ locations
- **Material Categories** - Organized by construction type (Cement, Steel, Aggregates, etc.)

#### User Authentication & Access Control
- **8 User Roles** - Role-based access control (RBAC)
- **Secure Login** - Password hashing and CSRF protection
- **Session Management** - Secure user sessions

#### User Interface (Basic)
- **Clean Dashboard Design** - Per-role customized interfaces
- **Responsive Layout** - Mobile and desktop compatible
- **Navigation System** - Intuitive menu structure

#### Sample Data
- **15 Inventory Items** - Construction materials with batch tracking
- **10 Material Types** - Raw materials with pricing
- **8 User Accounts** - All roles pre-configured

### 🚧 **IN PROGRESS - Midterm (60-75%)**

#### Multi-Warehouse Management
- ✅ Warehouse location tracking (ZONE-A through ZONE-J)
- ✅ Stock view by location
- 🔄 Inter-warehouse transfer module (in development)
- 🔄 Warehouse capacity monitoring

#### Barcode/QR Scanning
- 🔄 QR code generation for materials
- 🔄 Mobile scanning interface
- 🔄 Fast check-in/check-out logging

#### Financial Integration
- ✅ Database structure for Invoices table
- ✅ Database structure for Deliveries table
- 🔄 Accounts Payable module UI
- 🔄 Accounts Receivable module UI
- 🔄 Payment tracking and approval workflow

#### Reporting Dashboard
- ✅ Basic inventory reports
- 🔄 Stock movement analytics
- 🔄 Financial transaction summaries
- 🔄 Executive KPI dashboard

---

## 3. System Architecture

### Technology Stack

**Backend:**
- PHP 8.2.12
- CodeIgniter 4.6.3 (MVC Framework)
- MySQL 8.0

**Frontend:**
- HTML5, CSS3 (Modern responsive design)
- JavaScript (ES6+)
- Font Awesome 6.4.0 (Icons)
- Google Fonts (Inter typography)

**Server:**
- Apache 2.4 (via XAMPP) / PHP built-in server
- Development: localhost:8080
- Production: TBD

### MVC Structure
```
app/
├── Controllers/          # Business logic
│   ├── AuthController.php
│   ├── WarehouseManagerController.php
│   ├── WarehouseStaffController.php
│   ├── InventoryAuditorController.php
│   ├── ProcurementOfficerController.php
│   └── AccountsPayableClerkController.php
├── Models/              # Database operations
│   ├── UserModel.php
│   ├── InventoryModel.php
│   ├── MaterialModel.php
│   ├── ShipmentModel.php
│   └── InvoiceModel.php
├── Views/               # User interface
│   ├── auth/
│   ├── warehouse-manager/
│   ├── warehouse-staff/
│   └── inventory-auditor/
└── Database/
    ├── Migrations/      # Database schema
    └── Seeds/           # Sample data
```

---

## 4. Database Schema

### Core Tables

**users** (Authentication)
- id, username, password, email, role, status, timestamps

**inventory** (Stock Management)
- id, item_code, item_name, category, quantity, unit, location, batch_number, expiry_date, timestamps

**materials** (Material Master)
- id, material_code, name, description, category, unit, unit_price, timestamps

**shipments** (Material Movement)
- id, shipment_type, material_id, quantity, origin, destination, status, timestamps

**approvals** (Workflow)
- id, request_type, request_id, approver_id, status, comments, timestamps

**audits** (Physical Count)
- id, warehouse_location, audit_date, auditor_id, status, timestamps

**discrepancies** (Variance Tracking)
- id, inventory_id, expected_qty, actual_qty, difference, resolution, timestamps

**requisitions** (Material Requests)
- id, requester_id, material_id, quantity, purpose, status, timestamps

**deliveries** (Supplier Tracking)
- id, supplier, delivery_date, materials, status, timestamps

**invoices** (Financial)
- id, invoice_number, vendor, amount, due_date, status, timestamps

---

## 5. User Roles & Permissions

### Warehouse Manager
**Access:**
- Dashboard with warehouse overview
- Inventory management (view, approve changes)
- Shipment approvals
- Batch tracking
- Generate reports

**Key Functions:**
- Approve stock movements
- Monitor warehouse operations
- Review audit findings
- Set reorder points

### Warehouse Staff
**Access:**
- Stock check-in/check-out
- Physical count entry
- Barcode scanning (when implemented)
- Basic inventory view

**Key Functions:**
- Update stock levels
- Record material movements
- Conduct physical counts
- Report discrepancies

### Inventory Auditor
**Access:**
- Complete inventory view (read-only)
- Audit scheduling
- Discrepancy reporting
- Reconciliation tools

**Key Functions:**
- Schedule and conduct audits
- Compare physical vs. system stock
- Investigate variances
- Generate audit reports

### Procurement Officer
**Access:**
- Material catalog
- Requisition management
- Purchase orders
- Supplier tracking
- Delivery monitoring

**Key Functions:**
- Create purchase orders
- Track supplier deliveries
- Manage material requisitions
- Update material pricing

### Accounts Payable Clerk
**Access:**
- Vendor invoices
- Payment processing
- Invoice approval workflow
- Payment reports

**Key Functions:**
- Record vendor invoices
- Process payments
- Match invoices with deliveries
- Track payment schedules

### Accounts Receivable Clerk
**Access:**
- Client billing
- Payment receipts
- Outstanding balances
- Collection reports

**Key Functions:**
- Issue client invoices
- Record payments received
- Follow up on overdue accounts
- Generate aging reports

### IT Administrator
**Access:**
- User management
- System configuration
- Security settings
- Database maintenance

**Key Functions:**
- Create/manage user accounts
- Assign roles and permissions
- System backup and recovery
- Security monitoring

### Top Management
**Access:**
- Executive dashboard
- Financial summaries
- Inventory analytics
- Performance KPIs

**Key Functions:**
- View consolidated reports
- Monitor key metrics
- Strategic decision-making
- Budget planning

---

## 6. Construction Materials Inventory

### Current Stock Categories

**1. Cement & Concrete**
- Portland Cement Type I (5,000 bags)

**2. Steel & Metal**
- Steel Rebar 10mm (15,000 pcs)
- Steel Rebar 12mm (12,000 pcs)

**3. Wood & Plywood**
- Marine Plywood 4x8 (800 sheets)
- Coco Lumber 2x4x12 (2,500 pcs)

**4. Blocks & Bricks**
- CHB 4" (20,000 pcs)
- CHB 6" (15,000 pcs)

**5. Aggregates**
- Washed Sand (500 cu.m)
- Gravel 3/4" (600 cu.m)

**6. Roofing Materials**
- GI Roofing Sheets (1,500 sheets)

**7. Paint & Coating**
- Latex Paint (500 gallons)

**8. Hardware & Tools**
- Tie Wire, Nails

**9. Plumbing Materials**
- PVC Pipes (800 pcs)

**10. Electrical Materials**
- Electrical Wire (5,000 meters)

### Warehouse Zones
- **ZONE-A:** Cement & Concrete storage
- **ZONE-B:** Steel & Metal storage
- **ZONE-C:** Wood & Plywood storage
- **ZONE-D:** Blocks & Bricks storage
- **ZONE-E:** Aggregates storage
- **ZONE-F:** Roofing materials
- **ZONE-G:** Paint & Coating
- **ZONE-H:** Hardware & Tools
- **ZONE-I:** Plumbing materials
- **ZONE-J:** Electrical materials

---

## 7. System Access & Login

### URL Access
- **Production URL:** http://localhost:8080
- **Login Page:** http://localhost:8080/login
- **Test Connection:** http://localhost:8080/test-connection

### Default Credentials

| Username | Password | Role |
|----------|----------|------|
| manager | password | Warehouse Manager |
| staff | password | Warehouse Staff |
| auditor | password | Inventory Auditor |
| procurement | password | Procurement Officer |
| apclerk | password | Accounts Payable Clerk |
| arclerk | password | Accounts Receivable Clerk |
| itadmin | password | IT Administrator |
| topadmin | password | Top Management |

---

## 8. Development Progress

### Prelim Requirements (✅ COMPLETED - 50%)

✅ **System Design & Architecture**
- Complete ERD
- System flowcharts
- MVC structure documented

✅ **Database Setup & Inventory Module**
- Functional database with 11 tables
- Full CRUD operations for inventory
- Migration scripts tested

✅ **Real-Time Stock Updates**
- Accurate updates on add/remove
- Timestamp tracking
- Batch number tracking

✅ **User Interface (Basic)**
- Clean, modern login page
- Role-based dashboards
- Responsive design

✅ **Documentation & Presentation**
- Complete README
- System documentation
- Database schema documented

### Midterm Requirements (🚧 IN PROGRESS - 35%)

🚧 **Multi-Warehouse Management**
- ✅ Location-based inventory tracking
- 🔄 Inter-warehouse transfers (in development)

🚧 **Barcode/QR Code Functionality**
- 🔄 QR code generation module
- 🔄 Scanning interface

🚧 **Accounts Payable/Receivable Integration**
- ✅ Database structure ready
- 🔄 UI modules in development

🚧 **Reporting Dashboard**
- ✅ Basic inventory reports
- 🔄 Advanced analytics

🚧 **Security & User Roles**
- ✅ Role-based access control
- ✅ Password encryption
- 🔄 Audit logging

---

## 9. Future Enhancements (Finals Phase)

### Planned Features
- 📱 Mobile app for field operations
- 📊 Advanced predictive analytics
- 🔔 SMS/Email notifications for low stock
- 📈 Real-time dashboards with charts
- 🔐 Two-factor authentication
- 📦 Vendor portal integration
- 🚛 GPS tracking for deliveries
- 📋 Electronic signature for approvals
- 💾 Automated backup system
- 🌐 Multi-language support

---

## 10. Technical Support

### System Commands

**Start Server:**
```bash
php spark serve --port=8080
```

**Database Migration:**
```bash
php spark migrate
```

**Seed Database:**
```bash
php spark db:seed DatabaseSeeder
```

**Clear Cache:**
```bash
php spark cache:clear
```

**Check Routes:**
```bash
php spark routes
```

### Troubleshooting

**Issue:** Database connection failed
**Solution:** Check .env file database credentials

**Issue:** CSS not loading
**Solution:** Clear cache and verify baseURL in .env

**Issue:** Login not working
**Solution:** Ensure migrations and seeds have been run

---

## 11. Contact & Support

**Development Team:** [Your Team Name]  
**Project Manager:** [Name]  
**Technical Lead:** [Name]  
**Presentation Date:** August 14, 2025  

**System Version:** 1.0.0  
**Last Updated:** December 7, 2025  
**Status:** Development Phase (Prelim Completed, Midterm In Progress)

---

## 12. Conclusion

WITMS successfully addresses WeBuild's core challenges by providing:
- ✅ Centralized inventory management across multiple warehouses
- ✅ Real-time stock monitoring with construction material focus
- ✅ Role-based access for 8 user types
- ✅ Scalable architecture for warehouse expansion
- 🚧 Financial integration (in progress)
- 🚧 Predictive analytics (planned)

The system is on track to meet all prelim requirements and is progressing toward midterm completion with a focus on advanced features including barcode scanning, financial modules, and comprehensive reporting.
