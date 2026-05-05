<?php

declare(strict_types=1);

$projectRoot = __DIR__;
$filesToCopy = [
	'vendor/drago-ex/project-docker/docker/' => 'docker/',
	'vendor/drago-ex/project-docker/*.yaml' => '/',
	'vendor/drago-ex/project-docker/www/' => '/www/',
	'vendor/drago-ex/project-docker/package.json' => '/',
];


function copyDirectory(string $sourceDir, string $destinationDir): bool
{
	if (!is_dir($sourceDir)) return false;
	if (!is_dir($destinationDir)) {
		mkdir($destinationDir, 0o777, true);
	}

	$items = scandir($sourceDir);
	foreach ($items as $item) {
		if ($item === '.' || $item === '..') continue;

		$sourcePath = $sourceDir . '/' . $item;
		$destPath = $destinationDir . '/' . $item;

		if (is_dir($sourcePath)) {
			copyDirectory($sourcePath, $destPath);
		} else {
			if (!file_exists($destPath)) {
				copy($sourcePath, $destPath);
				echo "✅ Copied: $sourcePath → $destPath\n";
			} else {
				echo "⚠️ Skipped (already exists): $destPath\n";
			}
		}
	}
	return true;
}


foreach ($filesToCopy as $source => $destination) {
	$pattern = $projectRoot . '/' . $source;
	if (str_ends_with($source, '/')) {
		$destinationPath = rtrim($projectRoot . '/' . $destination, '/');
		if (!copyDirectory($pattern, $destinationPath)) {
			echo "❌ Failed to copy directory: $source\n";
		}
		continue;
	}

	$sourcePaths = str_contains($source, '*') ? glob($pattern) : [$pattern];
	if (!$sourcePaths) {
		echo "❌ No files matched: $source\n";
		continue;
	}

	foreach ($sourcePaths as $sourcePath) {
		$destinationPath = str_ends_with($destination, '/')
			? rtrim($projectRoot . '/' . $destination, '/') . '/' . basename($sourcePath)
			: $projectRoot . '/' . $destination;

		$destinationDir = dirname($destinationPath);
		if (!is_dir($destinationDir)) {
			mkdir($destinationDir, 0o777, true);
		}

		if (file_exists($destinationPath)) {
			echo "⚠️ Skipped (already exists): $destinationPath\n";
			continue;
		}

		if (copy($sourcePath, $destinationPath)) {
			echo "✅ Copied: $sourcePath → $destinationPath\n";
		} else {
			echo "❌ Failed to copy: $sourcePath\n";
		}
	}
}

echo "Done.\n";
