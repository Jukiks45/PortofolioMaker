$content = Get-Content "resources/views/index.blade.php" -Raw
$content = $content -replace "\\'", "'"
Set-Content -Path "resources/views/index.blade.php" -Value $content -NoNewline
Write-Host "Fixed!"
