<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài đăng</title>
    <style>
        /* Tổng quát */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            padding: 30px;
            margin: 0;
        }

        h2 {
            color: #333;
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .container {
            width: 85%;
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Nút thêm bài đăng */
        .btn-success {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Bảng danh sách */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        table th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Nút hành động - sửa và xóa */
        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 18px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* Cải thiện giao diện nút xóa */
        form {
            display: inline;
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            table {
                font-size: 14px;
            }

            .container {
                width: 100%;
                padding: 15px;
            }

            .btn-success {
                padding: 10px 15px;
            }

            .btn {
                padding: 6px 12px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Danh sách bài đăng</h2>
    <a href="{{ route('posts.create') }}" class="btn-success">Thêm Bài Đăng</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-edit">Sửa</a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
