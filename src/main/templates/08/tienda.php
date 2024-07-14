<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Tecnología</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../08/css/tienda.css">
</head>
<body>
    <div class="dashboard">
        <h1>Tienda "Don Pepito"</h1>
        <form action="operations.php" method="post">
            <div class="form-group">
                <label for="cliente">Nombre del Cliente:</label>
                <input type="text" class="form-control" id="cliente" name="cliente" required>
            </div>

            <div class="form-group">
                <label for="producto">Producto:</label>
                <select class="form-control" id="producto" name="producto" required>
                    <option value="Lavadora LG|1250.00">Lavadora LG - S/ 1250.00</option>
                    <option value="Micrófono Shure|890.00">Micrófono Shure - S/ 890.00</option>
                    <option value="Refrigeradora Samsung|1650.00">Refrigeradora Samsung - S/ 1650.00</option>
                    <option value="Microondas|450.00">Microondas - S/ 450.00</option>
                    <option value="TV LED 70''|2250.00">TV LED 70'' - S/ 2250.00</option>
                    <option value="Licuadora Oster|184.00">Licuadora Oster - S/ 184.00</option>
                    <option value="Luz LED|35.00">Luz LED - S/ 35.00</option>
                    <option value="Tostadora|98.99">Tostadora - S/ 98.99</option>
                    <option value="Cocina LG|760.00">Cocina LG - S/ 760.00</option>
                    <option value="Cámara Web Logitech C920|500.00">Cámara Web Logitech C920 - S/ 500.00</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Calcular</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
