<?php

$lines = file('C:/Users/Admin/.gemini/antigravity-ide/brain/7b032f8c-a06b-48ba-9594-382d81a04247/.system_generated/logs/transcript_full.jsonl');
foreach ($lines as $line) {
    if (strpos($line, 'Premium UI/UX Template') !== false && strpos($line, '"type":"USER_INPUT"') !== false) {
        $data = json_decode($line, true);
        file_put_contents('C:/xampp/htdocs/multi-layer-portfolio/user_template.html', $data['content']);
        echo 'Found and written.';
        break;
    }
}
