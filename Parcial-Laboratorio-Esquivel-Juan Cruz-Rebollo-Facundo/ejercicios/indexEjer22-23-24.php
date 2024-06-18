<?php
// Agregamos el header
include '../header.php';
?>

<body>
    <section id="indexEjer">
        <div class="container">

            <!-- Flip Card for Ejercicio 22 -->
            <div class="flip-card" id="card22">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 22</h1>
                        <h2>Cantidad de números ingresados (corta al ingresar 0 o negativo)</h2>
                        <form id="form22">
                            <label for="numeros2">Ingrese números separados por comas:</label>
                            <input type="text" id="numeros2" name="numeros2" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result22" class="result-container"></div>
                        <button onclick="resetForm('form22', 'card22')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <!-- Flip Card for Ejercicio 23 -->
            <div class="flip-card" id="card23">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 23</h1>
                        <h2>Promediar los números ingresados</h2>
                        <form id="form23">
                            <label for="numero">Ingrese un número:</label>
                            <input type="number" id="numero" name="numero" required>
                            <button type="button" onclick="agregarNumero()">Agregar</button>
                            <button type="button" onclick="calcularPromedio()">Calcular Promedio</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result23" class="result-container"></div>
                        <button onclick="resetForm('form23', 'card23')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <!-- Flip Card for Ejercicio 24 -->
            <div class="flip-card" id="card24">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 24</h1>
                        <h2>Generar los primeros 100 números e indicar si son pares o impares</h2>
                        <button onclick="getNumbersParity()">Mostrar Números y Paridad</button>
                    </div>
                    <div class="flip-card-back">
                        <div id="result24" class="result-container"></div>
                        <button onclick="resetNumbersParity('card24')">Ocultar Números</button>
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


        // Event listener para el formulario de Ejercicio 22
        document.getElementById('form22').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process2.php?ejercicio=22', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    const resultContainer = document.getElementById('result22');
                    if (typeof data.resultado22 === 'number') {
                        resultContainer.innerHTML = `<p>Cantidad de números ingresados: ${data.resultado22}</p>`;
                    } else {
                        resultContainer.innerHTML = `<p>${data.resultado22}</p>`;
                    }
                    document.getElementById('card22').querySelector('.flip-card-inner').classList.add('flipped');
                })
                .catch(error => {
                    console.error('Error al procesar la solicitud:', error);
                });
        });

        let numeros = [];

function agregarNumero() {
    const numero = parseInt(document.getElementById('numero').value);
    if (!isNaN(numero)) {
        numeros.push(numero);
        alert(`Número ${numero} agregado.`);
    }
    console.log('Número agregado:', numero);
    console.log('Números actuales:', numeros);
    document.getElementById('numero').value = '';
}

function calcularPromedio() {
    fetch('processEjer23.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ numeros: numeros })
    })
        .then(response => response.json())
        .then(data => {
            console.log('Datos procesados:', data);
            const resultContainer = document.getElementById('result23');
            if (typeof data.resultado23 === 'string') {
                resultContainer.innerHTML = `<p>${data.resultado23}</p>`;
            } else {
                resultContainer.innerHTML = `<p>Números ingresados: ${numeros.join(', ')}</p><p>El promedio de los números ingresados es: ${data.resultado23.toFixed(2)}</p>`;
            }
            document.getElementById('card23').querySelector('.flip-card-inner').classList.add('flipped');
        })
        .catch(error => {
            console.error('Error al procesar la solicitud:', error);
            // Handle fetch errors if needed
        });
}
// Function to reset the form and flip back the card for Ejercicio 23
function resetForm(formId, cardId) {
    document.getElementById(formId).reset();
    document.getElementById(cardId).querySelector('.flip-card-inner').classList.remove('flipped');
    numeros = []; // Clear the array of numbers
}

// Function to fetch and display Ejercicio 24 results
function getNumbersParity() {
    fetch('process2.php?ejercicio=24')
        .then(response => response.json())
        .then(data => {
            const resultContainer = document.getElementById('result24');
            if (data.resultado24 && Array.isArray(data.resultado24)) {
                let tableContent = '<table class="table">';
                tableContent += '<thead><tr><th>Número</th><th>Paridad</th></tr></thead><tbody>';
                data.resultado24.forEach(item => {
                    let paridad = (item.parity === 'Par') ? 'Par' : 'Impar';
                    tableContent += `<tr><td>${item.numero}</td><td>${paridad}</td></tr>`;
                });
                tableContent += '</tbody></table>';
                resultContainer.innerHTML = tableContent;
            }
            document.getElementById('card24').querySelector('.flip-card-inner').classList.add('flipped');
        })
        .catch(error => {
            console.error('Error al procesar la solicitud:', error);
            // Handle fetch errors if needed
        });
}

// Function to reset the result and flip back the card for Ejercicio 24
function resetNumbersParity(cardId) {
    document.getElementById('result24').innerHTML = '';
    document.getElementById(cardId).querySelector('.flip-card-inner').classList.remove('flipped');
}
    </script>
</body>
<?php
include 'footer.php';
?>

</html>