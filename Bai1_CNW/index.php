<?php 
$flower = [
    ["name" => "Hoa đỗ quyên", "description" => "Hoa đỗ quyên mang ý nghĩa về sự hạnh phúc, may mắn và thành công.", "images" => ["doquyen.jpg"]],
    ["name" => "Hoa hải đường", "description" => "Hoa hải đường tượng trưng cho sự phú quý, thịnh vượng và hòa hợp.", "images" => ["haiduong.jpg"]],
    ["name" => "Hoa mai", "description" => "Hoa mai là biểu tượng của mùa xuân, niềm vui và sự đoàn viên.", "images" => ["mai.jpg"]],
    ["name" => "Hoa tường vy", "description" => "Hoa tường vy thể hiện sự dịu dàng, mộng mơ và tình cảm sâu sắc.", "images" => ["tuongvy.jpg"]]
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các loài hoa</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            color: #444;
            margin-bottom: 40px;
            font-weight: bold;
        }

        .flower-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            padding: 0 20px;
        }

        .flower-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .flower-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .flower-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .flower-card h3 {
            font-size: 1.5rem;
            margin: 15px 10px;
            color: #1a202c;
        }

        .flower-card p {
            font-size: 0.9rem;
            color: #555;
            margin: 0 10px 20px;
            line-height: 1.5;
        }

        .flower-card:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background: linear-gradient(90deg, #ff7eb3, #ff758c, #ffa958);
            border-radius: 20px 20px 0 0;
        }

        footer {
            margin-top: 50px;
            font-size: 14px;
            color: #888;
            text-align: center;
        }

        footer a {
            color: #3182ce;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Danh sách các loài hoa</h1>
        <div class="flower-list">
            <?php foreach ($flower as $value): ?>
                <div class="flower-card">
                    <img src="images/<?php echo $value['images'][0]; ?>" alt="<?php echo $value['name']; ?>">
                    <h3><?php echo $value['name']; ?></h3>
                    <p><?php echo $value['description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <footer>
            <!-- <p>Thiết kế bởi <a href="#">Nhóm của bạn</a></p> -->
        </footer>
    </div>
</body>
</html>
