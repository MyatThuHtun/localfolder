<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .result {
            margin-bottom: 20px;
            font-size: 18px;
            color: #000;
            text-align: center;
            background-color:  #ebf5fb;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            margin: 0;
            padding: 20px;
            background-color: lightgray;
            color: #000;
            text-align: center;
            border-radius: 8px 8px 0 0;
            max-width: 400px;
            width: 100%;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-group label {
            flex: 0 0 40%;
            margin-right: 10px;
        }
        .form-group input[type="date"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dob = $_POST['dob'];
        if (!empty($dob)) {
            $birthDate = new DateTime($dob);
            $currentDate = new DateTime();
            if ($birthDate >= $currentDate) {
                echo "<div class='result'>Error: Date of birth cannot be today or in the future.</div>";
            } else {
                $age = $currentDate->diff($birthDate);
                echo "<div class='result'>You are " . $age->y . " years, " . $age->m . " months, and " . $age->d . " days old.</div>";
            }
        } else {
            echo "<div class='result'>Please enter a valid date of birth.</div>";
        }
    }
    ?>
       
    <h2>Age Calculator</h2>
    <div class="container">
        <form method="POST" action="">
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <input type="submit" value="Calculate">
        </form>
    </div>

    <script>
        
        const dobInput = document.getElementById('dob');
        const today = new Date();
        const maxDate = new Date(today);
        maxDate.setDate(today.getDate() - 1);                 
        const formattedDate = maxDate.toISOString().split('T')[0];
        dobInput.setAttribute('max', formattedDate);
    </script>

</body>
</html>
