<?php
// Đọc dữ liệu từ file Quiz.txt
$file_path = 'Quiz.txt';
$questions = [];

if (file_exists($file_path)) {
    $content = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $current_question = [];

    foreach ($content as $line) {
        if (stripos($line, 'ANSWER:') !== false) {
            $current_question['answer'] = trim(str_replace('ANSWER:', '', $line));
            $questions[] = $current_question;
            $current_question = [];
        } else if (empty($current_question)) {
            $current_question['question'] = $line;
        } else {
            $current_question['options'][] = $line;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Bài thi trắc nghiệm</h1>
        <form action="result.php" method="POST">
            <?php foreach ($questions as $index => $question): ?>
                <div class="question">
                    <h3><?php echo ($index + 1) . '. ' . $question['question']; ?></h3>
                    <?php foreach ($question['options'] as $option): ?>
                        <div class="option">
                            <label>
                                <input type="radio" name="q<?php echo $index; ?>" value="<?php echo $option; ?>">
                                <?php echo $option; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <button type="submit">Nộp bài</button>
        </form>
    </div>
</body>
</html>


