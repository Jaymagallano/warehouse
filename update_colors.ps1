# PowerShell script to update CSS colors from blue to orange theme

$files = @(
    "public\assets\css\wm-approvals.css",
    "public\assets\css\wm-batch-tracking.css",
    "public\assets\css\wm-reports.css"
)

foreach ($file in $files) {
    $content = Get-Content $file -Raw
    
    # Replace font
    $content = $content -replace "Poppins", "Inter"
    
    # Replace blue colors with orange
    $content = $content -replace "#1a1aff", "#ff8c00"
    $content = $content -replace "rgba\(26,26,255,", "rgba(255,140,0,"
    $content = $content -replace "rgba\(26, 26, 255,", "rgba(255,140,0,"
    
    # Replace blue background colors
    $content = $content -replace "#e6eaff", "#fff3e6"
    $content = $content -replace "#e0e7ff", "#fff3e6"
    
    # Replace gradient colors
    $content = $content -replace "linear-gradient\(90deg, #1a1aff 60%, #4f8cff 100%\)", "linear-gradient(90deg, #ff8c00 60%, #ffa500 100%)"
    $content = $content -replace "linear-gradient\(90deg, #0000e6 60%, #1a73e8 100%\)", "linear-gradient(90deg, #e67e00 60%, #ff8c00 100%)"
    
    # Save the file
    Set-Content -Path $file -Value $content -NoNewline
    
    Write-Host "Updated: $file" -ForegroundColor Green
}

Write-Host "`nAll files updated successfully!" -ForegroundColor Cyan
