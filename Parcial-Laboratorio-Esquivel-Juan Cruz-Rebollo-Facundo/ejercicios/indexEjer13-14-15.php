<?php
include '../header.php';
?>
<body>
    <section id="indexEjer">
        <div class="container">
            <div class="flip-card" id="card13">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 13</h1>
                        <h2>Calculadora de Notas de Alumnos</h2>
                        <form id="form13">
                            <label for="a">Nota 1:</label>
                            <input type="number" id="a" name="a" placeholder="Ingrese la nota 1" required>
                            <label for="b">Nota 2:</label>
                            <input type="number" id="b" name="b" placeholder="Ingrese la nota 2" required>
                            <label for="c">Nota 3:</label>
                            <input type="number" id="c" name="c" placeholder="Ingrese la nota 3" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result13"></div>
                        <button onclick="resetForm('form13', 'card13')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

        <div class="flip-card" id="card14">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <h1>Ejercicio 14</h1>
                    <h2>Números del 1 al 100</h2>
                    <button onclick="getNumbers()">Mostrar Números</button>
                </div>
                <div class="flip-card-back">
                    <div id="result14"></div>
                    <button onclick="resetNumbers('card14')">Ocultar Números</button>
                </div>
            </div>
        </div>

        <div class="flip-card" id="card15">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 15</h1>
                        <h2>Números del 1 al 100 y sus opuestos</h2>
                        <button onclick="getNumbersAndOpposites()">Mostrar Números y Opuestos</button>
                    </div>
                    <div class="flip-card-back">
                        <div id="result15" class="result-container"></div>
                        <button onclick="resetNumbersAndOpposites('card15')">Ocultar Números</button>
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

    function getNumbers() {
        fetch('process2.php', {
            method: 'POST',
            body: new FormData() // No necesitas pasar un formulario específico aquí, ya que no estás enviando datos para este caso
        })
        .then(response => response.json())
        .then(data => {
            const resultContainer = document.getElementById('result14');
            resultContainer.innerHTML = '<h2>Números del 1 al 100:</h2><p>' + data.resultado14.join(' ') + '</p>';
            document.getElementById('card14').querySelector('.flip-card-inner').classList.add('flipped');
        })
        .catch(error => {
            console.error('Error al procesar la solicitud:', error);
            // Manejar errores en la solicitud fetch si es necesario
        });
    }

    function resetNumbers(cardId) {
        document.getElementById('result14').innerHTML = '';
        document.getElementById(cardId).querySelector('.flip-card-inner').classList.remove('flipped');
    }


    document.getElementById('form13').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(e.target);
        fetch('process2.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const resultContainer = document.getElementById('result13');
            if (typeof data.resultado13 === 'string') {
                resultContainer.innerHTML = `<p>${data.resultado13}</p>`;
            } else if (data.resultado13 && typeof data.resultado13 === 'object') {
                resultContainer.innerHTML = `<h2>Resultado:</h2>
                    <p>Promedio: ${data.resultado13.promedio}</p>
                    <p>Mayor Nota: ${data.resultado13.notaMayor}</p>
                    <p>Menor Nota: ${data.resultado13.notaMenor}</p>`;
            }
            document.getElementById('card13').querySelector('.flip-card-inner').classList.add('flipped');
        })
        .catch(error => {
            console.error('Error al procesar la solicitud:', error);
            // Manejar errores en la solicitud fetch si es necesario
        });
    });

    
    function getNumbersAndOpposites() {
            fetch('process2.php?ejercicio=15')
                .then(response => response.json())
                .then(data => {
                    const resultContainer = document.getElementById('result15');
                    if (data.resultado15 && typeof data.resultado15 === 'object') {
                        let tableContent = '<table class="table">';
                        tableContent += '<thead><tr><th>Número</th><th>Opuesto</th></tr></thead><tbody>';
                        for (const [numero, opuesto] of Object.entries(data.resultado15)) {
                            tableContent += `<tr><td>${numero}</td><td>${opuesto}</td></tr>`;
                        }
                        tableContent += '</tbody></table>';
                        resultContainer.innerHTML = tableContent;
                    }
                    document.getElementById('card15').querySelector('.flip-card-inner').classList.add('flipped');
                })
                .catch(error => {
                    console.error('Error al procesar la solicitud:', error);
                    // Manejar errores en la solicitud fetch si es necesario
                });
        }

        // Function to reset the result and flip back the card for Ejercicio 15
        function resetNumbersAndOpposites(cardId) {
            document.getElementById('result15').innerHTML = '';
            document.getElementById(cardId).querySelector('.flip-card-inner').classList.remove('flipped');
        }

</script>
</body>
</html>