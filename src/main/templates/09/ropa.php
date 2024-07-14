
<h1>Tienda "Don Pepito"</h1>
        <form action="operations.php" method="post">
            <label for="cliente">Cliente:</label>
            <input type="text" id="cliente" name="cliente" required><br>
            <label for="dni">DNI:</label>
            <input type="number" id="dni" name="dni" required><br>

            <label for="prenda">Prendas:</label>
            <select id="prenda" name="prenda" required>
                <option value="Pantalones de Lana|45.00">Pantalones de Lana - $ 45.00</option>
                <option value="Sueter de camisir|100.00">Sueter de camisir - $ 100.00</option>
                <option value="Blusa de seda|14.00">Blusa de seda - $ 14.00</option>
                <option value="Camisola de seda|10.00">Camisola de seda - $ 10.00</option>
                <option value="Falda Recta|40.00">Falda recta - $ 40.00</option>
                <option value="Saco de lana|120.00">Saco de lana - $ 120.00</option>
            </select><br>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" min="1" required><br>
            <label for="precio">Precio:</label>
            <select id="precio" name="precio" required>
                <option value="45.00">$ 45.00</option>
                <option value="100.00">$ 100.00</option>
                <option value="14.00">$ 14.00</option>
                <option value="10.00">$ 10.00</option>
                <option value="40.00">$ 40.00</option>
                <option value="120.00">$ 120.00</option>
            </select><br>
            
            <br>
            <input type="datetime-local" name="date" id="date"><br>

            <button type="submit">Calcular</button>
        </form>
    