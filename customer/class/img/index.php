<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
        }
        .gallery img {
            width: 200px;
            height: auto;
            margin: 10px;
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Image Gallery</h1>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload Image" name="submit" accept=".jpg, .png , .jpeg">
    </form>

    <h2>Uploaded Images</h2>
    <div class="gallery" id="gallery"></div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch('fetch_images.php')
                .then(response => response.json())
                .then(data => {
                    const gallery = document.getElementById('gallery');
                    data.forEach(imagePath => {
                        const img = document.createElement('img');
                        img.src = imagePath;
                        gallery.appendChild(img);
                    });
                });
        });
    </script>
</body>
</html>