<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Plan Generator</title>
    <script>
        function updateFileDisplay(inputId, labelId) {
            const input = document.getElementById(inputId);
            const label = document.getElementById(labelId);

            if (input.files.length > 0) {
                const fileName = input.files[0].name;
                label.textContent = fileName + " uploaded";
            }
        }

        function enableMergeButton() {
            fetch('upload.php?action=checkMergeStatus')
                .then(response => response.json())
                .then(data => {
                    if (data.canMerge) {
                        document.getElementById('mergeButton').disabled = false;
                    }
                });
        }
    </script>
</head>
<body onload="enableMergeButton();">
    <h2>Upload Boys and Girls List for Set 1</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="boysFile1">Upload Boys List (Set 1):</label>
        <input type="file" name="boysFile1" id="boysFile1" onchange="updateFileDisplay('boysFile1', 'boysFile1Label');" required><br>
        <span id="boysFile1Label"></span><br><br>

        <label for="girlsFile1">Upload Girls List (Set 1):</label>
        <input type="file" name="girlsFile1" id="girlsFile1" onchange="updateFileDisplay('girlsFile1', 'girlsFile1Label');" required><br>
        <span id="girlsFile1Label"></span><br><br>

        <button type="submit" name="action" value="generateSet1">Generate for Set 1</button>
    </form>

    <h2>Upload Boys and Girls List for Set 2</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="boysFile2">Upload Boys List (Set 2):</label>
        <input type="file" name="boysFile2" id="boysFile2" onchange="updateFileDisplay('boysFile2', 'boysFile2Label');" required><br>
        <span id="boysFile2Label"></span><br><br>

        <label for="girlsFile2">Upload Girls List (Set 2):</label>
        <input type="file" name="girlsFile2" id="girlsFile2" onchange="updateFileDisplay('girlsFile2', 'girlsFile2Label');" required><br>
        <span id="girlsFile2Label"></span><br><br>

        <button type="submit" name="action" value="generateSet2">Generate for Set 2</button>
    </form>

    <form action="upload.php" method="post">
        <button type="submit" id="mergeButton" name="action" value="merge" disabled>Merge</button>
    </form>

    <h3>Status Messages:</h3>
    <div id="statusMessage">
        <?php
        if (isset($_GET['message'])) {
            echo "<p>{$_GET['message']}</p>";
        }
        ?>
    </div>
</body>
</html>
