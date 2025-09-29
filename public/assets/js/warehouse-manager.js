// Example: Show a welcome message or load dynamic content
document.addEventListener('DOMContentLoaded', function() {
    // You can add dynamic dashboard features here
    // For example, load inventory stats, notifications, etc.
    // document.getElementById('dynamic-content').innerHTML = "<p>Inventory: 1200 items</p>";

    // Quick Stats
    document.getElementById('stat-inventory').textContent = '1,250';
    document.getElementById('stat-lowstock').textContent = '3';
    document.getElementById('stat-shipments').textContent = '5';
    document.getElementById('stat-receivings').textContent = '2';
    document.getElementById('stat-users').textContent = '8';

    // Recent Activity
    const activities = [
        "Shipped 50 units of Steel Rebar to Project Alpha",
        "Received 200 bags of Cement from Supplier X",
        "Inventory updated: 10 sheets of Plywood added",
        "Created shipment for Order #1234",
        "Received 100 cans of Paint"
    ];
    const activityList = document.getElementById('activity-list');
    activities.forEach(act => {
        const li = document.createElement('li');
        li.textContent = act;
        activityList.appendChild(li);
    });

    // Notifications/Alerts
    const notifications = [
        "Low stock: Paint (5 cans left)",
        "Shipment #1234 is overdue",
        "Item 'Plywood' expires in 3 days",
        "System: Scheduled maintenance on Friday"
    ];
    const notificationList = document.getElementById('notification-list');
    notifications.forEach(note => {
        const li = document.createElement('li');
        li.textContent = note;
        notificationList.appendChild(li);
    });

    // Approval Requests (dashboard, notification style)
    const approvals = [
        { id: "APP-001", type: "Stock Transfer", desc: "Transfer 50 sheets Plywood to Site B", status: "Pending" },
        { id: "APP-002", type: "Stock Adjustment", desc: "Adjust Cement stock by +10 bags", status: "Pending" }
    ];
    const approvalList = document.getElementById('approval-list');
    approvalList.innerHTML = "";
    approvals.forEach((a) => {
        const li = document.createElement('li');
        li.innerHTML = `
            <span>
                <strong>${a.type}:</strong> ${a.desc}
                <span style="color:#e6a700;font-weight:600;margin-left:0.5rem;">${a.status}</span>
            </span>
        `;
        approvalList.appendChild(li);
    });
});
