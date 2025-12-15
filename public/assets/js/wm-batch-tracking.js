const BASE_URL = window.location.origin;
let batchList = [];
let editId = null;
let deleteId = null;

async function fetchBatches() {
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/batch/list`);
        const result = await response.json();
        if (result.status === 'success') {
            batchList = result.data || [];
            renderBatches();
        }
    } catch (error) {
        console.error('Error fetching batches:', error);
        renderBatches();
    }
}

function renderBatches() {
    const tbody = document.getElementById('batch-table-body');
    tbody.innerHTML = "";
    
    if (batchList.length === 0) {
        tbody.innerHTML = '<tr><td colspan="6" style="text-align:center;">No batches found</td></tr>';
        return;
    }
    
    batchList.forEach((item) => {
        const tr = document.createElement('tr');
        const isExpired = item.expiry_date && new Date(item.expiry_date) < new Date();
        tr.innerHTML = `
            <td>${item.batch_number || ''}</td>
            <td>${item.item_name || ''}</td>
            <td>${item.quantity || 0}</td>
            <td>${item.location || 'N/A'}</td>
            <td class="${isExpired ? 'status-expired' : ''}">${item.expiry_date || 'N/A'}</td>
            <td>
                <button class="action-btn" onclick="viewBatch(${item.id})">View</button>
                <button class="action-btn" onclick="openEditModal(${item.id})">Edit</button>
                <button class="action-btn" onclick="openDeleteModal(${item.id})">Delete</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

async function viewBatch(id) {
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/batch/${id}`);
        const result = await response.json();
        if (result.status === 'success') {
            const item = result.data;
            document.getElementById('viewBatchDetails').innerHTML = `
                <strong>Batch Number:</strong> ${item.batch_number || 'N/A'}<br>
                <strong>Item Name:</strong> ${item.item_name || 'N/A'}<br>
                <strong>Quantity:</strong> ${item.quantity || 0}<br>
                <strong>Location:</strong> ${item.location || 'N/A'}<br>
                <strong>Expiry Date:</strong> ${item.expiry_date || 'N/A'}
            `;
            document.getElementById('viewModal').style.display = "flex";
        }
    } catch (error) {
        console.error('Error viewing batch:', error);
    }
}

function openDeleteModal(id) {
    const item = batchList.find(i => i.id == id);
    if (item) {
        document.getElementById('deleteBatchDetails').innerHTML = `
            Are you sure you want to delete batch <strong>${item.batch_number}</strong>?
        `;
        document.getElementById('deleteModal').style.display = "flex";
        deleteId = id;
    }
}

async function deleteBatch() {
    if (deleteId !== null) {
        try {
            const response = await fetch(`${BASE_URL}/warehouse-manager/batch/delete/${deleteId}`, {
                method: 'POST'
            });
            const result = await response.json();
            if (result.status === 'success') {
                fetchBatches();
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
        const response = await fetch(`${BASE_URL}/warehouse-manager/batch/${id}`);
        const result = await response.json();
        if (result.status === 'success') {
            const item = result.data;
            document.getElementById('editBatchNumber').value = item.batch_number || '';
            document.getElementById('editItemName').value = item.item_name || '';
            document.getElementById('editQuantity').value = item.quantity || 0;
            document.getElementById('editLocation').value = item.location || '';
            document.getElementById('editExpiryDate').value = item.expiry_date || '';
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
document.getElementById('confirmDeleteBtn').onclick = deleteBatch;

document.getElementById('addBatchForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/batch/add`, {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.status === 'success') {
            document.getElementById('addSuccessMsg').textContent = 'Batch added successfully!';
            document.getElementById('addSuccessMsg').style.display = 'block';
            setTimeout(() => {
                document.getElementById('addSuccessMsg').style.display = 'none';
                this.reset();
                addModal.style.display = "none";
                fetchBatches();
            }, 1200);
        } else {
            alert(result.message || 'Failed to add');
        }
    } catch (error) {
        console.error('Error adding:', error);
    }
});

document.getElementById('editBatchForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/batch/update/${editId}`, {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.status === 'success') {
            document.getElementById('editSuccessMsg').textContent = 'Batch updated successfully!';
            document.getElementById('editSuccessMsg').style.display = 'block';
            setTimeout(() => {
                document.getElementById('editSuccessMsg').style.display = 'none';
                editModal.style.display = "none";
                fetchBatches();
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

window.viewBatch = viewBatch;
window.openEditModal = openEditModal;
window.openDeleteModal = openDeleteModal;

fetchBatches();
