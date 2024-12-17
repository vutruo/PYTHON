<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Bài Đăng</title>
    <style>
        /* Tổng quát */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            font-size: 28px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
        }

        /* Form Container */
        .container {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
        }

        /* Form Elements */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        form label {
            font-size: 16px;
            font-weight: 500;
            color: #333;
        }

        form input[type="text"], 
        form textarea {
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            transition: all 0.3s ease;
        }

        form input[type="text"]:focus, 
        form textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        /* Submit Button */
        form button {
            padding: 12px 20px;
            background: #007bff;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        form button:hover {
            background: #0056b3;
            box-shadow: 0 6px 15px rgba(0, 86, 179, 0.2);
            transform: translateY(-2px);
        }

        /* Form Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 30px;
                width: 90%;
            }

            form button {
                font-size: 14px;
                padding: 10px 15px;
            }
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Sửa Bài Đăng</h2>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" value="{{ $post->title }}" required>

        <label for="content">Nội dung:</label>
        <textarea name="content" required>{{ $post->content }}</textarea>

        <button type="submit">Cập Nhật</button>
    </form>
</div>

</body>
</html>
