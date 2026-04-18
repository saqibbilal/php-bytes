<?php
require_once __DIR__ . '/../config.php';

// Get folders using our constant
$folders = array_filter(glob(LEETCODE_PATH . '/*'), 'is_dir');

$challenges = array_map(function($path) {
    $name = basename($path);

    return [
        'name' => str_replace('-', ' ', $name),
        'solution_url' => "view.php?file=src/LeetCode/{$name}/Solution.php",
        'problem_url'  => "view.php?file=src/LeetCode/{$name}/Problem.md",
        'notes_url'    => "view.php?file=src/LeetCode/{$name}/notes.md",
        'has_notes'    => file_exists("$path/notes.md"),
        'has_problem'  => file_exists("$path/Problem.md"),
    ];
}, $folders);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Bytes | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-200 min-h-screen font-sans">

    <div class="max-w-5xl mx-auto py-12 px-6">
        <header class="mb-12 border-b border-slate-700 pb-8 flex justify-between items-start">
            <div>
                <h1 class="text-4xl font-extrabold text-white">🐘 PHP-Bytes</h1>
                <p class="text-slate-400 mt-1">Environment: <span class="text-indigo-400"><?php echo BASE_URL; ?></span></p>
            </div>
            <div class="text-right">
                <div class="text-xs text-slate-500 mb-4 font-mono">
                    Local Path: <?php echo ROOT_PATH; ?>
                </div>
                <div class="flex gap-3 justify-end">
                    <a href="view.php?file=README.md" target="_blank" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 border border-slate-600 rounded text-xs font-bold transition-all flex items-center gap-2">
                        <span>📄</span> README
                    </a>
                    <a href="view.php?file=CHEATSHEET.md" target="_blank" class="px-3 py-1.5 bg-indigo-900 hover:bg-indigo-800 border border-indigo-700 rounded text-xs font-bold transition-all flex items-center gap-2">
                        <span>🔥</span> CHEATSHEET
                    </a>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($challenges as $item): ?>
                <div class="group bg-slate-800 border border-slate-700 p-6 rounded-xl hover:border-indigo-500 transition-all shadow-lg">
                    <h2 class="text-xl font-bold text-white mb-4"><?php echo $item['name']; ?></h2>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <?php if ($item['has_problem']): ?>
                            <a href="<?php echo $item['problem_url']; ?>" target="_blank" class="px-2 py-1 bg-slate-700 text-[10px] uppercase font-bold rounded text-slate-300 hover:bg-slate-600 transition-colors">Problem</a>
                        <?php endif; ?>

                        <?php if ($item['has_notes']): ?>
                            <a href="<?php echo $item['notes_url']; ?>" target="_blank" class="px-2 py-1 bg-indigo-900 text-[10px] uppercase font-bold rounded text-indigo-200 hover:bg-indigo-800 transition-colors">Notes Optimized</a>
                        <?php else: ?>
                             <span class="px-2 py-1 bg-slate-800 text-[10px] uppercase font-bold rounded text-slate-600 border border-slate-700/50">No Notes</span>
                        <?php endif; ?>
                    </div>

                    <a href="<?php echo $item['solution_url']; ?>" target="_blank" class="flex items-center justify-between text-indigo-400 text-sm font-medium hover:text-indigo-300">
                        <span>View Solution</span>
                        <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </a>
                </div>
            <?php endforeach; ?>

            <?php if (empty($challenges)): ?>
                <div class="col-span-full py-12 text-center bg-slate-800 rounded-xl border border-dashed border-slate-600">
                    <p class="text-slate-500 italic">No challenges found in src/LeetCode yet.</p>
                </div>
            <?php endif; ?>
        </div>

        <footer class="mt-16 pt-8 border-t border-slate-800 text-slate-500 text-sm">
            &copy; 2026 Muhammad Saqib Bilal | Senior Full-Stack Developer
        </footer>
    </div>

</body>
</html>