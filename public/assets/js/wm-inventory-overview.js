const BASE_URL = window.location.origin;
let inventory = [];
let editId = null;
let deleteId = null;

async function fetchInventory() {
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/inventory/list`);
        const result = await response.json();
        if (result.status === 'success') {
            inventory = result.data || [];
            renderInventory();
        }
    } catch (error) {
        console.error('Error fetching inventory:', error);
        renderInventory();
    }
}

function renderInventory() {
    const tbody = document.getElementById('inventory-table-body');
    tbody.innerHTML = "";
    
    if (inventory.length === 0) {
        tbody.innerHTML = '<tr><td colspan="6" style="text-align:center;">No inventory items found</td></tr>';
        return;
    }
    
    inventory.forEach((item) => {
        const status = item.status || (item.quantity < 10 ? 'Low' : (item.quantity < 50 ? 'Medium' : 'OK'));
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${item.item_name || ''}</td>
            <td>${item.category || ''}</td>
            <td>${item.quantity || 0}</td>
            <td>${item.unit || ''}</td>
            <td class="status-${status.toLowerCase()}">${status}</td>
            <td>
                <button class="action-btn" onclick="viewItem(${item.id})">View</button>
                <button class="action-btn" onclick="openEditModal(${item.id})">Edit</button>
                <button class="action-btn" onclick="openDeleteModal(${item.id})">Delete</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

async function viewItem(id) {
    const item = inventory.find(i => i.id == id);
    if (item) {
        const status = item.status || (item.quantity < 10 ? 'Low' : (item.quantity < 50 ? 'Medium' : 'OK'));
        document.getElementById('viewItemDetails').innerHTML = `
            <strong>Material Name:</strong> ${item.item_name || ''}<br>
            <strong>Category:</strong> ${item.category || ''}<br>
            <strong>Quantity:</strong> ${item.quantity || 0}<br>
            <strong>Unit:</strong> ${item.unit || ''}<br>
            <strong>Status:</strong> ${status}
        `;
        document.getElementById('viewModal').style.display = "flex";
    }
}

function openDeleteModal(id) {
    const item = inventory.find(i => i.id == id);
    if (item) {
        document.getElementById('deleteItemDetails').innerHTML = `
            Are you sure you want to delete <strong>${item.item_name}</strong> (${item.category})?
        `;
        document.getElementById('deleteModal').style.display = "flex";
        deleteId = id;
    }
}

async function deleteItem() {
    if (deleteId !== null) {
        try {
            const response = await fetch(`${BASE_URL}/warehouse-manager/inventory/delete/${deleteId}`, {
                method: 'POST'
            });
            const result = await response.json();
            if (result.status === 'success') {
                fetchInventory();
                document.getElementById('deleteModal').style.display = "none";
                deleteId = null;
            } else {
                alert(result.message || 'Failed to delete item');
            }
        } catch (error) {
            console.error('Error deleting item:', error);
        }
    }
}


async function openEditModal(id) {
    const item = inventory.find(i => i.id == id);
    if (item) {
        document.getElementById('editMaterialName').value = item.item_name || '';
        document.getElementById('editCategory').value = item.category || '';
        document.getElementById('editQuantity').value = item.quantity || 0;
        document.getElementById('editUnit').value = item.unit || '';
        document.getElementById('editStatus').value = item.status || 'OK';
        document.getElementById('editModal').style.display = "flex";
        editId = id;
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
document.getElementById('confirmDeleteBtn').onclick = deleteItem;

document.getElementById('addInventoryForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/inventory/add`, {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.status === 'success') {
            document.getElementById('addSuccessMsg').textContent = 'Item added successfully!';
            document.getElementById('addSuccessMsg').style.display = 'block';
            setTimeout(() => {
                document.getElementById('addSuccessMsg').style.display = 'none';
                this.reset();
                addModal.style.display = "none";
                fetchInventory();
            }, 1200);
        } else {
            alert(result.message || 'Failed to add item');
        }
    } catch (error) {
        console.error('Error adding item:', error);
    }
});

document.getElementById('editInventoryForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    try {
        const response = await fetch(`${BASE_URL}/warehouse-manager/inventory/update/${editId}`, {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.status === 'success') {
            document.getElementById('editSuccessMsg').textContent = 'Item updated successfully!';
            document.getElementById('editSuccessMsg').style.display = 'block';
            setTimeout(() => {
                document.getElementById('editSuccessMsg').style.display = 'none';
                editModal.style.display = "none";
                fetchInventory();
            }, 1200);
        } else {
            alert(result.message || 'Failed to update item');
        }
    } catch (error) {
        console.error('Error updating item:', error);
    }
});

window.onclick = function(event) {
    if (event.target === addModal) addModal.style.display = "none";
    if (event.target === editModal) editModal.style.display = "none";
    if (event.target === viewModal) viewModal.style.display = "none";
    if (event.target === deleteModal) deleteModal.style.display = "none";
};

window.viewItem = viewItem;
window.openEditModal = openEditModal;
window.openDeleteModal = openDeleteModal;

fetchInventory();
