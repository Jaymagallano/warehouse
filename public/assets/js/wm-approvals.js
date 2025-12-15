const BASE_URL = window.location.origin;
let approvalsList = [];

async function fetchApprovals() {
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/approvals/list`);
        const result = await response.json();
        if (result.status === 'success') {
            approvalsList = result.data || [];
            renderApprovals();
        }
    } catch (error) {
        console.error('Error fetching approvals:', error);
        renderApprovals();
    }
}

function renderApprovals() {
    const tbody = document.getElementById('approvals-table-body');
    tbody.innerHTML = "";
    
    if (approvalsList.length === 0) {
        tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;">No approval requests found</td></tr>';
        return;
    }
    
    approvalsList.forEach((item) => {
        const tr = document.createElement('tr');
        const statusClass = item.status === 'pending' ? 'status-pending' : 
                           item.status === 'approved' ? 'status-approved' : 'status-rejected';
        tr.innerHTML = `
            <td>${item.id || ''}</td>
            <td>${item.type || ''}</td>
            <td>${item.description || 'N/A'}</td>
            <td>${item.reference_id || 'N/A'}</td>
            <td>${item.request_date || ''}</td>
            <td class="${statusClass}">${item.status || ''}</td>
            <td>
                <button class="action-btn" onclick="viewApproval(${item.id})">View</button>
                ${item.status === 'pending' ? `
                    <button class="action-btn approve-btn" onclick="approveRequest(${item.id})">Approve</button>
                    <button class="action-btn reject-btn" onclick="rejectRequest(${item.id})">Reject</button>
                ` : ''}
            </td>
        `;
        tbody.appendChild(tr);
    });
}

async function viewApproval(id) {
    const item = approvalsList.find(i => i.id == id);
    if (item) {
        document.getElementById('viewApprovalDetails').innerHTML = `
            <strong>Request ID:</strong> ${item.id}<br>
            <strong>Type:</strong> ${item.type || 'N/A'}<br>
            <strong>Reference ID:</strong> ${item.reference_id || 'N/A'}<br>
            <strong>Requested By:</strong> ${item.requested_by || 'N/A'}<br>
            <strong>Request Date:</strong> ${item.request_date || 'N/A'}<br>
            <strong>Status:</strong> ${item.status || 'N/A'}<br>
            <strong>Approved By:</strong> ${item.approved_by || 'N/A'}
        `;
        document.getElementById('viewModal').style.display = "flex";
    }
}

async function approveRequest(id) {
    if (confirm('Are you sure you want to approve this request?')) {
        try {
            const response = await fetch(`${BASE_URL}/warehouse-manager/approvals/approve/${id}`, {
                method: 'POST'
            });
            const result = await response.json();
            if (result.status === 'success') {
                alert('Request approved successfully!');
                fetchApprovals();
            } else {
                alert(result.message || 'Failed to approve');
            }
        } catch (error) {
            console.error('Error approving:', error);
        }
    }
}

async function rejectRequest(id) {
    if (confirm('Are you sure you want to reject this request?')) {
        try {
            const response = await fetch(`${BASE_URL}/warehouse-manager/approvals/reject/${id}`, {
                method: 'POST'
            });
            const result = await response.json();
            if (result.status === 'success') {
                alert('Request rejected successfully!');
                fetchApprovals();
            } else {
                alert(result.message || 'Failed to reject');
            }
        } catch (error) {
            console.error('Error rejecting:', error);
        }
    }
}

const viewModal = document.getElementById('viewModal');
document.getElementById('closeViewModal').onclick = () => { viewModal.style.display = "none"; };

window.onclick = function(event) {
    if (event.target === viewModal) viewModal.style.display = "none";
};

window.viewApproval = viewApproval;
window.approveRequest = approveRequest;
window.rejectRequest = rejectRequest;

fetchApprovals();
