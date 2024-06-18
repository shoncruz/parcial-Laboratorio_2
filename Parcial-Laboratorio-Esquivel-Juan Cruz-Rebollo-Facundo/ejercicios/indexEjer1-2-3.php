<?php
include '../header.php';
?>
<body>
    <section id="indexEjer">
        <div class="container">
            <div class="flip-card" id="card1">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 1</h1>
                        <h2>Calculadora de A + B - C + 100</h2>
                        <form id="form1">
                            <label for="a">Ingrese los números:</label>
                            <input type="number" id="a" name="a" placeholder="Valor de A" required>
                            <input type="number" id="b" name="b" placeholder="Valor de B" required>
                            <input type="number" id="c" name="c" placeholder="Valor de C" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result1"></div>
                        <button onclick="resetForm('form1', 'card1')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <div class="flip-card" id="card2">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 2</h1>
                        <h2>Calculadora de (A - B) * (A + B)</h2>
                        <form id="form2">
                            <input type="number" id="e" name="e" placeholder="Valor de A" required>
                            <input type="number" id="f" name="f" placeholder="Valor de B" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result2"></div>
                        <button onclick="resetForm('form2', 'card2')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <div class="flip-card" id="card3">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 3</h1>
                        <h2>Opuesto del número ingresado</h2>
                        <form id="form3">
                            <label for="g">Ingrese el Número:</label>
                            <input type="number" id="g" name="g" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result3"></div>
                        <button onclick="resetForm('form3', 'card3')">Nuevo Cálculo</button>
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

        document.getElementById('form1').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById('result1').innerHTML = `<h2>Resultado:</h2><p>El resultado de la operación es: ${data.resultado1}</p>`;
                document.getElementById('card1').querySelector('.flip-card-inner').classList.add('flipped');
            });
        });

        document.getElementById('form2').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById('result2').innerHTML = `<h2>Resultado:</h2><p>El resultado de la operación es: ${data.resultado2}</p>`;
                document.getElementById('card2').querySelector('.flip-card-inner').classList.add('flipped');
            });
        });

        document.getElementById('form3').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById('result3').innerHTML = `<h2>Resultado:</h2><p>El resultado de la operación es: ${data.resultado3}</p>`;
                document.getElementById('card3').querySelector('.flip-card-inner').classList.add('flipped');
            });
        });
    </script>
</body>
<?php
include 'footer.php';
?>
</html>
