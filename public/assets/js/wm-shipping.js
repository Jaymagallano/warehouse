const BASE_URL = window.location.origin;
let shippingList = [];
let editId = null;
let deleteId = null;

async function fetchShipping() {
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/shipping/list`);
        const result = await response.json();
        if (result.status === 'success') {
            shippingList = result.data || [];
            renderShipping();
        }
    } catch (error) {
        console.error('Error fetching shipping:', error);
        renderShipping();
    }
}

function renderShipping() {
    const tbody = document.getElementById('shipping-table-body');
    tbody.innerHTML = "";
    
    if (shippingList.length === 0) {
        tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;">No shipments found</td></tr>';
        return;
    }
    
    shippingList.forEach((item) => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${item.shipment_number || ''}</td>
            <td>${item.customer_id || 'N/A'}</td>
            <td>${item.material || 'N/A'}</td>
            <td>${item.quantity || 'N/A'}</td>
            <td>${item.expected_date || ''}</td>
            <td class="status-${(item.status || '').toLowerCase()}">${item.status || ''}</td>
            <td>
                <button class="action-btn" onclick="viewShipping(${item.id})">View</button>
                <button class="action-btn" onclick="openEditModal(${item.id})">Edit</button>
                <button class="action-btn" onclick="openDeleteModal(${item.id})">Delete</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

async function viewShipping(id) {
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/shipping/${id}`);
        const result = await response.json();
        if (result.status === 'success') {
            const item = result.data;
            document.getElementById('viewShippingDetails').innerHTML = `
                <strong>Shipment Number:</strong> ${item.shipment_number || 'N/A'}<br>
                <strong>Customer:</strong> ${item.customer_id || 'N/A'}<br>
                <strong>Expected Date:</strong> ${item.expected_date || 'N/A'}<br>
                <strong>Actual Date:</strong> ${item.actual_date || 'N/A'}<br>
                <strong>Status:</strong> ${item.status || 'N/A'}
            `;
            document.getElementById('viewModal').style.display = "flex";
        }
    } catch (error) {
        console.error('Error viewing shipping:', error);
    }
}

function openDeleteModal(id) {
    const item = shippingList.find(i => i.id == id);
    if (item) {
        document.getElementById('deleteShippingDetails').innerHTML = `
            Are you sure you want to delete shipment <strong>${item.shipment_number}</strong>?
        `;
        document.getElementById('deleteModal').style.display = "flex";
        deleteId = id;
    }
}

async function deleteShipping() {
    if (deleteId !== null) {
        try {
            const response = await fetch(`${BASE_URL}/warehouse-manager/shipping/delete/${deleteId}`, {
                method: 'POST'
            });
            const result = await response.json();
            if (result.status === 'success') {
                fetchShipping();
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


async function openEditModal(id) {
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/shipping/${id}`);
        const result = await response.json();
        if (result.status === 'success') {
            const item = result.data;
            document.getElementById('editShipmentId').value = item.shipment_number || '';
            document.getElementById('editDestination').value = item.customer_id || '';
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
document.getElementById('confirmDeleteBtn').onclick = deleteShipping;

document.getElementById('addShippingForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/shipping/add`, {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.status === 'success') {
            document.getElementById('addSuccessMsg').textContent = 'Shipment added successfully!';
            document.getElementById('addSuccessMsg').style.display = 'block';
            setTimeout(() => {
                document.getElementById('addSuccessMsg').style.display = 'none';
                this.reset();
                addModal.style.display = "none";
                fetchShipping();
            }, 1200);
        } else {
            alert(result.message || 'Failed to add');
        }
    } catch (error) {
        console.error('Error adding:', error);
    }
});

document.getElementById('editShippingForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/shipping/update/${editId}`, {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.status === 'success') {
            document.getElementById('editSuccessMsg').textContent = 'Shipment updated successfully!';
            document.getElementById('editSuccessMsg').style.display = 'block';
            setTimeout(() => {
                document.getElementById('editSuccessMsg').style.display = 'none';
                editModal.style.display = "none";
                fetchShipping();
            }, 1200);
        } else {
            alert(result.message || 'Failed to update');
        }
    } catch (error) {
        console.error('Error updating:', error);
    }
});

window.onclick = function(event) {
    if (event.target === addModal) addModal.style.display = "none";
    if (event.target === editModal) editModal.style.display = "none";
    if (event.target === viewModal) viewModal.style.display = "none";
    if (event.target === deleteModal) deleteModal.style.display = "none";
};

window.viewShipping = viewShipping;
window.openEditModal = openEditModal;
window.openDeleteModal = openDeleteModal;

fetchShipping();
