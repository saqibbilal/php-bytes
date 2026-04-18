<?php
require_once __DIR__ . '/../config.php';

$file = $_GET['file'] ?? null;

if (!$file || !file_exists(ROOT_PATH . '/' . $file)) {
    die("File not found.");
}

$content = file_get_contents(ROOT_PATH . '/' . $file);
$fileName = basename($file);
$folderName = basename(dirname($file));
$folderPath = dirname(ROOT_PATH . '/' . $file);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fileName; ?> | Arena Viewer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-200 p-4 md:p-8">
    <div class="max-w-5xl mx-auto">
        <a href="index.php" class="text-indigo-400 hover:text-indigo-300 text-sm mb-6 inline-flex items-center gap-2 transition-colors">
            <span>&larr;</span> Back to Dashboard
        </a>

        <header class="mb-8">
            <h1 class="text-3xl font-bold text-white mb-2"><?php echo str_replace('-', ' ', $folderName); ?></h1>
            <span class="px-2 py-0.5 bg-slate-800 border border-slate-700 rounded text-xs font-mono text-slate-400"><?php echo $fileName; ?></span>
        </header>

        <div class="bg-slate-800 border border-slate-700 rounded-xl overflow-hidden shadow-2xl">
            <?php if (str_ends_with($file, '.md')): ?>
                <div class="p-10 prose prose-invert max-w-none">
                    <div class="whitespace-pre-wrap font-sans text-slate-300 leading-relaxed"><?php echo htmlspecialchars($content); ?></div>
                </div>

            <?php elseif (str_ends_with($file, '.php')): ?>
                <div class="p-4 bg-slate-950 border-b border-slate-700 flex justify-between items-center">
                    <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Live Execution</span>
                    <span class="text-[10px] bg-slate-800 text-slate-400 px-2 py-0.5 rounded border border-slate-700">PHP 8.x</span>
                </div>

                <pre class="p-6 font-mono text-indigo-300 text-sm bg-slate-950 overflow-x-auto"><?php
                    try {
                        $className = "Saqib\\PhpBytes\\LeetCode\\$folderName\\Solution";
                        $playgroundFile = $folderPath . '/Playground.php';

                        if (class_exists($className) && file_exists($playgroundFile)) {
                            $solver = new $className();
                            $runPlayground = require $playgroundFile;
                            $data = $runPlayground($solver);

                            echo "<span class='text-slate-500'>// Input</span>\n<strong>{$data['input']}</strong>\n\n";
                            echo "<span class='text-slate-500'>// Output</span>\n";

                            $res = $data['result'];
                            $output = is_bool($res) ? ($res ? 'true' : 'false') : json_encode($res);
                            echo "<span class='text-white font-bold text-lg'>$output</span>";
                        } else {
                            echo "<span class='text-slate-500'>// Class loaded. Create 'Playground.php' in this folder for live output.</span>";
                        }
                    } catch (\Throwable $e) {
                        echo "<span class='text-red-400'>Runtime Error: " . $e->getMessage() . "</span>";
                    }
                ?></pre>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>