<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paint Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input[type="number"], select {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Paint Calculator</h2>
    <form method="post">
        <label for="shape">Select Shape:</label>
        <select id="shape" name="shape" required>
            <option value="rectangle">Rectangle</option>
            <option value="circle">Circle</option>
            <option value="triangle">Triangle</option>
            <option value="cube">Cube</option>
            <option value="pyramid">Pyramid</option>
            <option value="cylinder">Cylinder</option>
        </select><br>
        <label for="length">Length:</label>
        <input type="number" id="length" name="length"><br>
        <label for="width">Width:</label>
        <input type="number" id="width" name="width"><br>
        <label for="radius">Radius:</label>
        <input type="number" id="radius" name="radius"><br>
        <label for="height">Height:</label>
        <input type="number" id="height" name="height"><br>
        <label for="side">Side:</label>
        <input type="number" id="side" name="side"><br>
        <label for="coverage">Paint Coverage (in square meters per liter):</label>
        <input type="number" id="coverage" name="coverage" required><br>
        <button type="submit" name="calculate">Calculate</button>
    </form>

    <?php
    if (isset($_POST['calculate'])) {
        $shape = $_POST['shape'];
        $coverage = $_POST['coverage'];

        if ($coverage <= 0) {
            echo "<div class='result'>Please enter a positive number for coverage.</div>";
        } else {
            switch ($shape) {
                case 'rectangle':
                    $length = $_POST['length'];
                    $width = $_POST['width'];
                    $area = $length * $width;
                    $paint_needed = $area / $coverage;
                    echo "<div class='result'>";
                    echo "<h3>Result:</h3>";
                    echo "Shape: Rectangle <br>";
                    echo "Length: $length meters<br>";
                    echo "Width: $width meters<br>";
                    echo "Area: $area square meters<br>";
                    echo "Paint Needed: $paint_needed liters<br>";
                    echo "</div>";
                    break;
                case 'circle':
                    $radius = $_POST['radius'];
                    $area = M_PI * pow($radius, 2);
                    $paint_needed = $area / $coverage;
                    echo "<div class='result'>";
                    echo "<h3>Result:</h3>";
                    echo "Shape: Circle <br>";
                    echo "Radius: $radius meters<br>";
                    echo "Area: $area square meters<br>";
                    echo "Paint Needed: $paint_needed liters<br>";
                    echo "</div>";
                    break;
                case 'triangle':
                    $base = $_POST['length'];
                    $height = $_POST['height'];
                    $area = 0.5 * $base * $height;
                    $paint_needed = $area / $coverage;
                    echo "<div class='result'>";
                    echo "<h3>Result:</h3>";
                    echo "Shape: Triangle <br>";
                    echo "Base: $base meters<br>";
                    echo "Height: $height meters<br>";
                    echo "Area: $area square meters<br>";
                    echo "Paint Needed: $paint_needed liters<br>";
                    echo "</div>";
                    break;
                case 'cube':
                    $side = $_POST['side'];
                    $area = 6 * pow($side, 2);
                    $paint_needed = $area / $coverage;
                    echo "<div class='result'>";
                    echo "<h3>Result:</h3>";
                    echo "Shape: Cube <br>";
                    echo "Side Length: $side meters<br>";
                    echo "Surface Area: $area square meters<br>";
                    echo "Paint Needed: $paint_needed liters<br>";
                    echo "</div>";
                    break;
                case 'pyramid':
                    $base = $_POST['length'];
                    $height = $_POST['height'];
                    $base_area = pow($base, 2);
                    $slant_height = sqrt(pow($base / 2, 2) + pow($height, 2));
                    $area = $base_area + 4 * ($base * $slant_height / 2);
                    $paint_needed = $area / $coverage;
                    echo "<div class='result'>";
                    echo "<h3>Result:</h3>";
                    echo "Shape: Pyramid <br>";
                    echo "Base: $base meters<br>";
                    echo "Height: $height meters<br>";
                    echo "Slant Height: $slant_height meters<br>";
                    echo "Area: $area square meters<br>";
                    echo "Paint Needed: $paint_needed liters<br>";
                    echo "</div>";
                    break;
                case 'cylinder':
                    $radius = $_POST['radius'];
                    $height = $_POST['height'];
                    $base_area = M_PI * pow($radius, 2);
                    $side_area = 2 * M_PI * $radius * $height;
                    $area = $base_area + $side_area;
                    $paint_needed = $area / $coverage;
                    echo "<div class='result'>";
                    echo "<h3>Result:</h3>";
                    echo "Shape: Cylinder <br>";
                    echo "Radius: $radius meters<br>";
                    echo "Height: $height meters<br>";
                    echo "Base Area: $base_area square meters<br>";
                    echo "Side Area: $side_area square meters<br>";
                    echo "Total Area: $area square meters<br>";
                    echo "Paint Needed: $paint_needed liters<br>";
                    echo "</div>";
                    break;
                default:
                    echo "<div class='result'>Invalid shape selected.</div>";
                    break;
            }
        }
    }
    ?>
</body>
</html>
