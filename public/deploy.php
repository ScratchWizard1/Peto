<?php

$APP_DIR = realpath(__DIR__ . '/../');
$SECRET  = getenv('DEPLOY_SECRET');

// ===== OVERENIE WEBHOOKU =====
$payload   = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';

$expected = 'sha256=' . hash_hmac('sha256', $payload, $SECRET);

// if (!$SECRET || !hash_equals($expected, $signature)) {
//     http_response_code(403);
//     exit('Invalid signature');
// }

// ===== CESTY (shared hosting FIX) =====
$GIT = '/usr/bin/git';
$PHP = '/usr/bin/php';
$COMPOSER = '/usr/local/bin/composer'; // ak neexistuje, pozri nižšie

$commands = [
    "$GIT pull origin master",
    "$COMPOSER install --no-dev --optimize-autoloader",
    "$PHP artisan optimize:clear",
];

$output = [];

foreach ($commands as $command) {
    $out = [];
    $code = 0;

    exec(
        'cd ' . escapeshellarg($APP_DIR) .
        ' && export PATH=/usr/local/bin:/usr/bin:/bin' .
        ' && ' . $command . ' 2>&1',
        $out,
        $code
    );

    $output[] = ">> $command";
    $output   = array_merge($output, $out);

    if ($code !== 0) {
        http_response_code(500);
        echo "❌ Deploy failed on:\n$command\n\n";
        echo implode("\n", $out);
        exit;
    }
}

echo implode("\n", $output);
echo "\n✅ Deploy hotový\n";