<?php
// Agregamos el header
include '../header.php';
?>
<body>
    <section id="indexEjer">
        <div class="container">

            <div class="flip-card" id="card10">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 10</h1>
                        <h2>Calculador de Precio de Llamada</h2>
                        <form id="form10">
                            <label for="s">Duración de la llamada:</label>
                            <input type="number" id="s" name="c" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result10"></div>
                        <button onclick="resetForm('form10', 'card10')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <div class="flip-card" id="card11">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 11</h1>
                        <h2>Calculadora de Operaciones Básicas</h2>
                        <form id="form11">
                            <input type="number" id="a" name="a" placeholder="Valor de A" required>

                            <input type="number" id="b" name="b" placeholder="Valor de B" required>

                            <input type="number" id="c" name="c" placeholder="Valor de C" required>

                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result11"></div>
                        <button onclick="resetForm('form11', 'card11')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <div class="flip-card" id="card12">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 12</h1>
                        <h2>Calculadora de Operaciones Básicas Solo si son Positivas</h2>
                        <form id="form12">
                            <input type="number" id="d" name="d" placeholder="Valor de A" required>

                            <input type="number" id="e" name="e" placeholder="Valor de B" required>

                            <input type="number" id="f" name="f" placeholder="Valor de C" required>

                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result12"></div>
                        <button onclick="resetForm('form12', 'card12')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        function resetForm(formId, cardId) {
            document.getElementById(formId).reset();
            document.getElementById(cardId).querySelector('.flip-card-inner').classList.remove('flipped');
        }

        document.getElementById('form10').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process2.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById('result10').innerHTML = `<h2>Resultado:</h2><p>El precio de la Duración de la llamada es de: $${data.resultado10}</p>`;
                document.getElementById('card10').querySelector('.flip-card-inner').classList.add('flipped');
            });
        });

        
        document.getElementById('form11').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process2.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById('result11').innerHTML = `<h2>Resultado:</h2><p>Suma: ${data.resultado11.suma}</p><p>Resta: ${data.resultado11.resta}</p><p>Multiplicación: ${data.resultado11.producto}</p><p>Cociente: ${data.resultado11.cociente}</p>`;
                document.getElementById('card11').querySelector('.flip-card-inner').classList.add('flipped');
            });
        });

        document.getElementById('form12').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process2.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById('result12').innerHTML = `<h2>Resultado:</h2><p>Suma: ${data.resultado12.suma >= 0 ? data.resultado12.suma : 'Negativa'}</p><p>Resta: ${data.resultado12.resta >= 0 ? data.resultado12.resta : 'Negativa'}</p><p>Multiplicación: ${data.resultado12.producto >= 0 ? data.resultado12.producto : 'Negativa'}</p><p>Cociente: ${isFinite(data.resultado12.cociente) && data.resultado12.cociente >= 0 ? data.resultado12.cociente : 'No se puede dividir por 0'}</p>`;
                document.getElementById('card12').querySelector('.flip-card-inner').classList.add('flipped');
            });
        });
    </script>
</body>
</html>
