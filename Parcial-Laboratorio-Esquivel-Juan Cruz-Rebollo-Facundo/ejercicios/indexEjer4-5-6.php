<?php
include '../header.php';
?>
<body>
    <section id="indexEjer">
        <div class="container">
            <div class="flip-card" id="card4">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 4</h1>
                        <h2>Calculadora de A * B</h2>
                        <form id="form4">
                            <label for="h">Ingrese los números:</label>
                            <input type="number" id="h" name="h" placeholder="Valor de A" required>
                            <input type="number" id="i" name="i" placeholder="Valor de B" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result4"></div>
                        <button onclick="resetForm('form4', 'card4')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <div class="flip-card" id="card5">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 5</h1>
                        <h2>Mayor o Menor a 100</h2>
                        <form id="form5">
                            <label for="j">Ingrese el número:</label>
                            <input type="number" id="j" name="j" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result5"></div>
                        <button onclick="resetForm('form5', 'card5')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <div class="flip-card" id="card6">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 6</h1>
                        <h2>Positivo o Negativo</h2>
                        <form id="form6">
                            <label for="k">Ingrese el número:</label>
                            <input type="number" id="k" name="k" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result6"></div>
                        <button onclick="resetForm('form6', 'card6')">Nuevo Cálculo</button>
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

        document.getElementById('form4').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById('result4').innerHTML = `<h2>Resultado:</h2><p>El resultado de la operación es: ${data.resultado4}</p>`;
                document.getElementById('card4').querySelector('.flip-card-inner').classList.add('flipped');
            });
        });

        
        document.getElementById('form5').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById('result5').innerHTML = `<h2>Resultado:</h2><p>${data.resultado5}</p>`;
                document.getElementById('card5').querySelector('.flip-card-inner').classList.add('flipped');
            });
        });

        document.getElementById('form6').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById('result6').innerHTML = `<h2>Resultado:</h2><p>${data.resultado6}</p>`;
                document.getElementById('card6').querySelector('.flip-card-inner').classList.add('flipped');
            });
        });

        
    </script>
</body>
</html>
