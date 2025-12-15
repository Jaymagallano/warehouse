const BASE_URL = window.location.origin;

async function generateReport() {
    const type = document.getElementById('reportType').value;
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    
    if (!type) {
        alert('Please select a report type');
        return;
    }
    
    try {
        let url = `${BASE_URL}/warehouse-manager/reports/generate?type=${type}`;
        if (startDate) url += `&start_date=${startDate}`;
        if (endDate) url += `&end_date=${endDate}`;
        
        const response = await fetch(url);
        const result = await response.json();
        
        if (result.status === 'success') {
            renderReport(result.type, result.data);
        } else {
            alert('Failed to generate report');
        }
    } catch (error) {
        console.error('Error generating report:', error);
    }
}

function renderReport(type, data) {
    const container = document.getElementById('reportContent');
    
    if (!data || data.length === 0) {
        container.innerHTML = '<p>No data available for this report.</p>';
        return;
    }
    
    let html = `<h3>${type.charAt(0).toUpperCase() + type.slice(1)} Report</h3>`;
    html += '<table class="report-table"><thead><tr>';
    
    // Get headers from first item
    const headers = Object.keys(data[0]);
    headers.forEach(header => {
        html += `<th>${header.replace(/_/g, ' ').toUpperCase()}</th>`;
    });
    html += '</tr></thead><tbody>';
    
    // Add data rows
    data.forEach(item => {
        html += '<tr>';
        headers.forEach(header => {
            html += `<td>${item[header] || 'N/A'}</td>`;
        });
        html += '</tr>';
    });
    
    html += '</tbody></table>';
    container.innerHTML = html;
}

function exportReport(format) {
    const type = document.getElementById('reportType').value;
    if (!type) {
        alert('Please generate a report first');
        return;
    }
    
    // For now, just print
    if (format === 'pdf') {
        window.print();
    } else if (format === 'excel') {
        alert('Excel export coming soon!');
    }
}

document.getElementById('generateReportBtn').onclick = generateReport;
document.getElementById('exportPdfBtn').onclick = () => exportReport('pdf');
document.getElementById('exportExcelBtn').onclick = () => exportReport('excel');
