<?php
// Generate password hashes for STC
echo "<pre style='font-size:16px; background:#1a1a2e; color:#0f0; padding:20px;'>";
echo "=====================================\n";
echo "STC PASSWORD HASH GENERATOR\n";
echo "=====================================\n\n";

echo "admin123 hash:\n";
echo password_hash('admin123', PASSWORD_DEFAULT);
echo "\n\n";

echo "user123 hash:\n";
echo password_hash('user123', PASSWORD_DEFAULT);
echo "\n\n";

echo "=====================================\n";
echo "COPY THE HASHES ABOVE INTO YOUR SQL\n";
echo "OR USE THE UPDATE QUERIES BELOW\n";
echo "=====================================\n";
echo "</pre>";