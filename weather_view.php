<!DOCTYPE html>
<html>

<head>
    <title>Weather App</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Weather App 🌤️</h2>

        <!-- Weather Form -->
        <form method="get" action="<?php echo base_url('index.php/weather'); ?>" class="row g-3 justify-content-center mb-4">
            <div class="col-auto">
                <input type="text" name="city" class="form-control" placeholder="Enter city name" value="<?php echo htmlspecialchars($city); ?>" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Get Weather</button>
            </div>
        </form>

        <!-- Result -->
        <div class="card shadow-sm p-4">
            <?php if (isset($error) && $error): ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php elseif (isset($weather['main'])): ?>
                <h3 class="mb-3">Weather in <?php echo htmlspecialchars($city); ?></h3>
                <p><strong>Temperature:</strong> <?php echo $weather['main']['temp']; ?> °C</p>
                <p><strong>Humidity:</strong> <?php echo $weather['main']['humidity']; ?> %</p>
                <p><strong>Condition:</strong> <?php echo $weather['weather'][0]['description']; ?></p>
            <?php else: ?>
                <p>No weather data found.</p>
            <?php endif; ?>
        </div>

    </div>

</body>

</html>