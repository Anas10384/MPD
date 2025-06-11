<?php
$input = "https://ts-j8bh.onrender.com/box.ts?id=4";
$outputDir = __DIR__ . "/mpd";
$outputFile = "$outputDir/starsports1tamil.mpd";

if (!file_exists($outputDir)) {
    mkdir($outputDir, 0777, true);
}

$cmd = "ffmpeg -y -i \"$input\" -t 900 -c:v libx264 -preset fast -b:v 1000k -c:a aac -b:a 128k "
     . "-f dash -seg_duration 4 -use_template 1 -use_timeline 1 "
     . "-init_seg_name starsports1tamil-init.m4s -media_seg_name starsports1tamil-\$Number\$.m4s "
     . "\"$outputFile\"";

exec($cmd, $output, $status);

if ($status === 0) {
    echo "✅ MPD created at /mpd/starsports1tamil.mpd\n";
} else {
    echo "❌ FFmpeg failed\n";
}
?>
