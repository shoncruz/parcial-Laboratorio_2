<?php
// Include the header file
include '../header.php';
?>

<body>
    <section id="indexEjer">
        <div class="container">
            <!-- Flip Card for Ejercicio 19 -->
            <div class="flip-card" id="card19">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 19</h1>
                        <h2>Calcular el promedio general de una lista de 20 números</h2>
                        <form id="form19">
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result19" class="result-container"></div>
                        <button onclick="resetForm('form19', 'card19')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <!-- Flip Card for Ejercicio 20 -->
            <div class="flip-card" id="card20">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 20</h1>
                        <h2>Calcular la sumatoria de una lista de 20 números</h2>
                        <form id="form20">
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result20" class="result-container"></div>
                        <button onclick="resetForm('form20', 'card20')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <!-- Flip Card for Ejercicio 21 -->
            <div class="flip-card" id="card21">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 21</h1>
                        <h2>Calcular el promedio general de una lista N números aleatorios</h2>
                        <form id="form21">
                            <label for="cantidadNumeros">Ingrese la cantidad de números:</label>
                            <input type="number" id="cantidadNumeros" name="cantidadNumeros" min="1" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result21" class="result-container"></div>
                        <button onclick="resetForm('form21', 'card21')">Nuevo Cálculo</button>
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

        // Función para generar el contenido de la tabla
        function generateTableHTML(numbers) {
            let tableContent = '<table class="table">';
            tableContent += '<thead><tr><th>Número</th></tr></thead><tbody>';
            numbers.forEach(numero => {
                tableContent += `<tr><td>${numero}</td></tr>`;
            });
            tableContent += '</tbody></table>';
            return tableContent;
        }

        // Event listener para el formulario de Ejercicio 19
        document.getElementById('form19').addEventListener('submit', function(e) {
            e.preventDefault();
            fetch('process2.php?ejercicio=19')
                .then(response => response.json())
                .then(data => {
                    const resultContainer = document.getElementById('result19');
                    if (data.resultado19 && data.resultado19.numeros && Array.isArray(data.resultado19.numeros)) {
                        const promedio = data.resultado19.promedio.toFixed(2);
                        const tableHTML = generateTableHTML(data.resultado19.numeros);
                        resultContainer.innerHTML = `<p>El promedio es: ${promedio}</p>${tableHTML}`;
                    } else {
                        resultContainer.innerHTML = `<p>Error en el cálculo del promedio</p>`;
                    }
                    document.getElementById('card19').querySelector('.flip-card-inner').classList.add('flipped');
                })
                .catch(error => {
                    console.error('Error al procesar la solicitud:', error);
                });
        });

        // Event listener para el formulario de Ejercicio 20
        document.getElementById('form20').addEventListener('submit', function(e) {
            e.preventDefault();
            fetch('process2.php?ejercicio=20')
                .then(response => response.json())
                .then(data => {
                    const resultContainer = document.getElementById('result20');
                    if (data.resultado20 && data.resultado20.numeros && Array.isArray(data.resultado20.numeros)) {
                        const sumatoria = data.resultado20.sumatoria;
                        const tableHTML = generateTableHTML(data.resultado20.numeros);
                        resultContainer.innerHTML = `<p>La sumatoria es: ${sumatoria}</p>${tableHTML}`;
                    } else {
                        resultContainer.innerHTML = `<p>Error en el cálculo de la sumatoria</p>`;
                    }
                    document.getElementById('card20').querySelector('.flip-card-inner').classList.add('flipped');
                })
                .catch(error => {
                    console.error('Error al procesar la solicitud:', error);
                });
        });

        
        // Event listener para el formulario de Ejercicio 21
        document.getElementById('form21').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process2.php?ejercicio=21', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    const resultContainer = document.getElementById('result21');
                    if (typeof data.resultado21 === 'object') {
                        let numeros = data.resultado21.numeros;
                        let promedio = data.resultado21.promedio.toFixed(2);

                        let numerosHTML = `<p>El promedio es: ${promedio}</p>`;
                        numerosHTML += `<h3>Números generados:</h3><table class="table"><thead><tr><th>Número</th></tr></thead><tbody>`;
                        numeros.forEach(numero => {
                            numerosHTML += `<tr><td>${numero}</td></tr>`;
                        });
                        numerosHTML += `</tbody></table>`;

                        resultContainer.innerHTML = numerosHTML;
                    } else {
                        resultContainer.innerHTML = `<p>${data.resultado21}</p>`;
                    }
                    document.getElementById('card21').querySelector('.flip-card-inner').classList.add('flipped');
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
