<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and Drop File Upload</title>
    <style>
        #drop-area {
            width: 100%;
            height: 200px;
            border: 2px dashed #ccc;
            border-radius: 20px;
            text-align: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            position: relative;
        }
        #drop-area.highlight {
            border-color: purple;
        }
        #drop-area p {
            margin: 0;
            font-size: 20px;
        }
        #fileElem {
            display: none;
        }
        #gallery {
            margin-top: 20px;
        }
        .gallery-item {
            margin: 5px;
            display: inline-block;
        }
        .gallery-item img {
            max-width: 100px;
            max-height: 100px;
            display: block;
        }
    </style>
</head>
<body>
    <div id="drop-area">
        <p>Drag & Drop your files here or <button id="fileSelectBtn">Select Files</button></p>
        <input type="file" id="fileElem" multiple accept="image/*">
    </div>
    <div id="gallery"></div>

    <script>
        let dropArea = document.getElementById('drop-area');
        let fileElem = document.getElementById('fileElem');
        let fileSelectBtn = document.getElementById('fileSelectBtn');
        let gallery = document.getElementById('gallery');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => highlight(true), false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => highlight(false), false);
        });

        function highlight(highlight) {
            if (highlight) {
                dropArea.classList.add('highlight');
            } else {
                dropArea.classList.remove('highlight');
            }
        }

        dropArea.addEventListener('drop', handleDrop, false);
        fileSelectBtn.addEventListener('click', () => fileElem.click());
        fileElem.addEventListener('change', () => handleFiles(fileElem.files));

        function handleDrop(e) {
            let dt = e.dataTransfer;
            let files = dt.files;

            handleFiles(files);
        }

        function handleFiles(files) {
            files = [...files];
            files.forEach(uploadFile);
            files.forEach(previewFile);
        }

        function uploadFile(file) {
            let url = 'upload.php';
            let formData = new FormData();

            formData.append('file', file);

            fetch(url, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => console.log(data))
            .catch(() => console.error('File upload failed'));
        }

        function previewFile(file) {
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function() {
                let img = document.createElement('img');
                img.src = reader.result;
                let div = document.createElement('div');
                div.classList.add('gallery-item');
                div.appendChild(img);
                gallery.appendChild(div);
            }
        }
    </script>
</body>
</html>
