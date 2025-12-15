const BASE_URL = window.location.origin;
let receivingList = [];
let editId = null;
let deleteId = null;

// Fetch receiving list from API
async function fetchReceiving() {
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/receiving/list`);
        const result = await response.json();
        if (result.status === 'success') {
            receivingList = result.data || [];
            renderReceiving();
        }
    } catch (error) {
        console.error('Error fetching receiving:', error);
        renderReceiving();
    }
}

function renderReceiving() {
    const tbody = document.getElementById('receiving-table-body');
    tbody.innerHTML = "";
    
    if (receivingList.length === 0) {
        tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;">No receiving records found</td></tr>';
        return;
    }
    
    receivingList.forEach((item) => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${item.shipment_number || ''}</td>
            <td>${item.supplier_id || 'N/A'}</td>
            <td>${item.material || 'N/A'}</td>
            <td>${item.quantity || 'N/A'}</td>
            <td>${item.actual_date || item.expected_date || ''}</td>
            <td class="status-${(item.status || '').toLowerCase()}">${item.status || ''}</td>
            <td>
                <button class="action-btn" onclick="viewReceiving(${item.id})">View</button>
                <button class="action-btn" onclick="openEditModal(${item.id})">Edit</button>
                <button class="action-btn" onclick="openDeleteModal(${item.id})">Delete</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

// View Receiving
async function viewReceiving(id) {
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/receiving/${id}`);
        const result = await response.json();
        if (result.status === 'success') {
            const item = result.data;
            document.getElementById('viewReceivingDetails').innerHTML = `
                <strong>Shipment Number:</strong> ${item.shipment_number || 'N/A'}<br>
                <strong>Supplier:</strong> ${item.supplier_id || 'N/A'}<br>
                <strong>Expected Date:</strong> ${item.expected_date || 'N/A'}<br>
                <strong>Actual Date:</strong> ${item.actual_date || 'N/A'}<br>
                <strong>Status:</strong> ${item.status || 'N/A'}
            `;
            document.getElementById('viewModal').style.display = "flex";
        }
    } catch (error) {
        console.error('Error viewing receiving:', error);
    }
}

// Delete Modal
function openDeleteModal(id) {
    const item = receivingList.find(i => i.id == id);
    if (item) {
        document.getElementById('deleteReceivingDetails').innerHTML = `
            Are you sure you want to delete receiving <strong>${item.shipment_number}</strong>?
        `;
        document.getElementById('deleteModal').style.display = "flex";
        deleteId = id;
    }
}

async function deleteReceiving() {
    if (deleteId !== null) {
        try {
            const response = await fetch(`${BASE_URL}/warehouse-manager/receiving/delete/${deleteId}`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' }
            });
            const result = await response.json();
            if (result.status === 'success') {
                fetchReceiving();
                document.getElementById('deleteModal').style.display = "none";
                deleteId = null;
            } else {
                alert(result.message || 'Failed to delete');
            }
        } catch (error) {
            console.error('Error deleting:', error);
        }
    }
}


// Edit Modal
async function openEditModal(id) {
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/receiving/${id}`);
        const result = await response.json();
        if (result.status === 'success') {
            const item = result.data;
            document.getElementById('editRefNo').value = item.shipment_number || '';
            document.getElementById('editSupplier').value = item.supplier_id || '';
            document.getElementById('editExpectedDate').value = item.expected_date || '';
            document.getElementById('editActualDate').value = item.actual_date || '';
            document.getElementById('editStatus').value = item.status || '';
            document.getElementById('editModal').style.display = "flex";
            editId = id;
        }
    } catch (error) {
        console.error('Error fetching for edit:', error);
    }
}

// Modal elements
const addModal = document.getElementById('addModal');
const editModal = document.getElementById('editModal');
const viewModal = document.getElementById('viewModal');
const deleteModal = document.getElementById('deleteModal');

document.getElementById('openAddModalBtn').onclick = () => { addModal.style.display = "flex"; };
document.getElementById('closeAddModal').onclick = () => { addModal.style.display = "none"; };
document.getElementById('closeEditModal').onclick = () => { editModal.style.display = "none"; };
document.getElementById('closeViewModal').onclick = () => { viewModal.style.display = "none"; };
document.getElementById('closeDeleteModal').onclick = () => { deleteModal.style.display = "none"; };
document.getElementById('cancelDeleteBtn').onclick = () => { deleteModal.style.display = "none"; };
document.getElementById('confirmDeleteBtn').onclick = deleteReceiving;

// Add Receiving Form
document.getElementById('addReceivingForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/receiving/add`, {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.status === 'success') {
            document.getElementById('addSuccessMsg').textContent = 'Receiving added successfully!';
            document.getElementById('addSuccessMsg').style.display = 'block';
            setTimeout(() => {
                document.getElementById('addSuccessMsg').style.display = 'none';
                this.reset();
                addModal.style.display = "none";
                fetchReceiving();
            }, 1200);
        } else {
            alert(result.message || 'Failed to add');
        }
    } catch (error) {
        console.error('Error adding:', error);
    }
});

// Edit Receiving Form
document.getElementById('editReceivingForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/receiving/update/${editId}`, {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.status === 'success') {
            document.getElementById('editSuccessMsg').textContent = 'Receiving updated successfully!';
            document.getElementById('editSuccessMsg').style.display = 'block';
            setTimeout(() => {
                document.getElementById('editSuccessMsg').style.display = 'none';
                editModal.style.display = "none";
                fetchReceiving();
            }, 1200);
        } else {
            alert(result.message || 'Failed to update');
        }
    } catch (error) {
        console.error('Error updating:', error);
    }
});

// Global modal close
window.onclick = function(event) {
    if (event.target === addModal) addModal.style.display = "none";
    if (event.target === editModal) editModal.style.display = "none";
    if (event.target === viewModal) viewModal.style.display = "none";
    if (event.target === deleteModal) deleteModal.style.display = "none";
};

window.viewReceiving = viewReceiving;
window.openEditModal = openEditModal;
window.openDeleteModal = openDeleteModal;

fetchReceiving();
