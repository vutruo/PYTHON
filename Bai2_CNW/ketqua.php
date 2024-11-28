<?php
// Đọc câu hỏi và đáp án từ file Quiz.txt
$file_path = 'Quiz.txt';
$questions = [];
$correct_answers = 0;

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

// Kiểm tra kết quả
foreach ($questions as $index => $question) {
    if (isset($_POST["q$index"]) && $_POST["q$index"] === $question['answer']) {
        $correct_answers++;
    }
}

$total_questions = count($questions);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả bài thi</title>
</head>
<body>
    <div class="container">
        <h1>Kết quả bài thi</h1>
        <p>Bạn đã trả lời đúng <strong><?php echo $correct_answers; ?></strong> trên tổng số <strong><?php echo $total_questions; ?></strong> câu hỏi.</p>
        <a href="index.php">Làm lại bài thi</a>
    </div>
</body>
</html>
