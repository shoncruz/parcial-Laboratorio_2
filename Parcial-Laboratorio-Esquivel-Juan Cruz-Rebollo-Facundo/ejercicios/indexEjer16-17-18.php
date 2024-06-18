<?php
// Include the header file
include '../header.php';
?>

<body>
    <section id="indexEjer">
        <div class="container">
            <!-- Flip Card for Ejercicio 15 -->

            <!-- Flip Card for Ejercicio 16 -->
            <div class="flip-card" id="card16">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 16</h1>
                        <h2>Generador de Números del 1 hasta el valor ingresado</h2>
                        <form id="form16">
                            <label for="a">Valor de A:</label>
                            <input type="number" id="a" name="a" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result16" class="result-container"></div>
                        <button onclick="resetForm('form16', 'card16')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <!-- Flip Card for Ejercicio 17 -->
            <div class="flip-card" id="card17">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 17</h1>
                        <h2>Mostrar todos los números enteros entre A y B</h2>
                        <form id="form17">
                            <label for="a">Valor de A:</label>
                            <input type="number" id="a" name="a" required>
                            <label for="b">Valor de B:</label>
                            <input type="number" id="b" name="b" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result17" class="result-container"></div>
                        <button type="button" onclick="resetForm('form17', 'card17')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <!-- Flip Card for Ejercicio 18 -->
            <div class="flip-card" id="card18">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 18</h1>
                        <h2>Sumatoria hasta el número ingresado</h2>
                        <form id="form18">
                            <label for="c">Ingrese el Número:</label>
                            <input type="number" id="c" name="c" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result18" class="result-container"></div>
                        <button type="button" onclick="resetForm('form18', 'card18')">Nuevo Cálculo</button>
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


        // Event listener for form submission for Ejercicio 16
        document.getElementById('form16').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process2.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const resultContainer = document.getElementById('result16');
                if (typeof data.resultado16 === 'string') {
                    resultContainer.innerHTML = `<p>${data.resultado16}</p>`;
                } else if (data.resultado16 && typeof data.resultado16 === 'object') {
                    resultContainer.innerHTML = `<h2>Resultado:</h2><p>Numeros: ${data.resultado16.join(' ')}</p>`;
                }
                document.getElementById('card16').querySelector('.flip-card-inner').classList.add('flipped');
            })
            .catch(error => {
                console.error('Error al procesar la solicitud:', error);
                // Manejar errores en la solicitud fetch si es necesario
            });
        });

        
        document.getElementById('form17').addEventListener('submit', function (e) {
            e.preventDefault();
            const a = parseInt(document.getElementById('a').value);
            const b = parseInt(document.getElementById('b').value);

            if (b > a) {
                const resultContainer = document.getElementById('result17');
                resultContainer.innerHTML = '<p>El primer número debe ser mayor o igual que el segundo. Ingrese nuevamente.</p>';
                document.getElementById('card17').querySelector('.flip-card-inner').classList.add('flipped');
                return;
            }

            const formData = new FormData(e.target);
            fetch('process2.php?ejercicio=17', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    const resultContainer = document.getElementById('result17');
                    if (data.resultado17 && Array.isArray(data.resultado17)) {
                        let tableContent = '<table class="table">';
                        tableContent += '<thead><tr><th>Numeros</th></tr></thead><tbody>';
                        data.resultado17.forEach(numero => {
                            tableContent += `<tr><td>${numero}</td></tr>`;
                        });
                        tableContent += '</tbody></table>';
                        resultContainer.innerHTML = tableContent;
                    }
                    document.getElementById('card17').querySelector('.flip-card-inner').classList.add('flipped');
                })
                .catch(error => {
                    console.error('Error al procesar la solicitud:', error);
                });
        });

        document.getElementById('form18').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process2.php?ejercicio=18', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    const resultContainer = document.getElementById('result18');
                    resultContainer.innerHTML = `<h2>Resultado:</h2><p>El resultado de la operación es: ${data.resultado18}</p>`;
                    document.getElementById('card18').querySelector('.flip-card-inner').classList.add('flipped');
                })
                .catch(error => {
                    console.error('Error al procesar la solicitud:', error);
                });
        });
    </script>
</body>
<?php
include 'footer.php';
?>
</html>
