<?php

require_once __DIR__ . "/../../lib/_index.php";

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image to base64 data string</title>

    <link rel="shortcut icon" href="/favicon.svg" type="image/svg">
    <meta name="theme-color" content="#fff" />

    <style>
        <?= default_styles() ?>
    </style>
</head>

<body style="max-width: 900px; margin: 0 auto 0 auto; padding: 16px;">
    <h2>Paste an image here (Ctrl+V)</h2>
    <div id="pasteArea" contenteditable="true" style="border:1px solid #ccc; padding:20px; width: 100%; height:100px;">
        Click here and paste an image
    </div>

    <p style="width: 100%;">
        <code id="datastring" style="display: block; text-overflow: ellipsis; white-space: nowrap; width: 100%; overflow: hidden;"></code>
        <br>
        <code id="imgstring" style="display: block; text-overflow: ellipsis; white-space: nowrap; width: 100%; overflow: hidden;"></code>
        <br>
        <button id="copydata">Copy data string</button>
        <button id="copyimg">Copy img string</button>
    </p>

    <p id="metrics"></p>

    <img id="preview" src="" alt="Image Preview" style="display:block; margin-top:20px; max-width:300px;">

    <script>
        const pasteArea = document.getElementById('pasteArea');
        const preview = document.getElementById('preview');
        const datastring = document.getElementById('datastring');
        const imgstring = document.getElementById('imgstring');
        const copydata = document.getElementById('copydata');
        const copyimg = document.getElementById('copyimg');
        const metrics = document.getElementById('metrics');

        function base64Size(dataUrl) {
            const base64String = dataUrl.split(',')[1];
            return Math.round((base64String.length * 3) / 4);
        }

        function prettySize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
            return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
        }

        function imageToWebp(dataUrl) {
            return new Promise((resolve, reject) => {
                const isSVG = dataUrl.startsWith("data:image/svg+xml");

                const img = new Image();

                // This is important if your data URL is from a different origin
                img.crossOrigin = "anonymous";

                img.onload = () => {
                    let width = img.width;
                    let height = img.height;

                    // Downscale large images
                    if (width > 2100 || height > 2100) {
                        const ratio = Math.min(2100 / width, 2100 / height);
                        width = Math.round(width * ratio);
                        height = Math.round(height * ratio);
                    }

                    // Upscale small SVGs
                    if (isSVG && (width < 1200 || height < 1200)) {
                        const ratio = Math.max(1200 / width, 1200 / height);
                        width = Math.round(width * ratio);
                        height = Math.round(height * ratio);
                    }

                    const canvas = document.createElement('canvas');
                    canvas.width = width;
                    canvas.height = height;
                    const ctx = canvas.getContext('2d');

                    // Optional: fill background white to handle transparency for JPEG
                    ctx.fillStyle = '#ffffff';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);

                    ctx.drawImage(img, 0, 0, width, height);

                    canvas.toBlob(blob => {
                        const reader = new FileReader();
                        reader.onloadend = () => resolve(reader.result);
                        reader.onerror = reject;
                        reader.readAsDataURL(blob);
                    }, 'image/webp', 0.8);
                };

                img.onerror = (err) => reject(err);
                img.src = dataUrl;
            });
        }

        pasteArea.addEventListener('paste', e => {
            e.preventDefault();

            // Access clipboard items
            const items = e.clipboardData.items;

            for (let i = 0; i < items.length; i++) {
                const item = items[i];
                // Check if the pasted item is an image
                if (item.type.indexOf("image") !== -1) {
                    const file = item.getAsFile();

                    const reader = new FileReader();
                    reader.onload = async e => {
                        const converted = await imageToWebp(e.target.result);

                        const preSize = base64Size(e.target.result);
                        const postSize = base64Size(converted);
                        const sizeInfo = `Original: ${prettySize(preSize)}, Converted: ${prettySize(postSize)}`;
                        metrics.innerText = sizeInfo;

                        preview.src = converted;
                        datastring.innerText = converted;
                        imgstring.innerText = `<img src="${converted}">`;
                    };

                    reader.readAsDataURL(file);
                }
            }
        });

        const initialText = pasteArea.innerText;
        setInterval(() => pasteArea.innerText = initialText, 50);

        copydata.addEventListener('click', () => {
            if (!datastring.innerText.length) return;
            navigator.clipboard.writeText(datastring.innerText);
        });

        copyimg.addEventListener('click', () => {
            if (!imgstring.innerText.length) return;
            navigator.clipboard.writeText(imgstring.innerText);
        });
    </script>
</body>

</html>