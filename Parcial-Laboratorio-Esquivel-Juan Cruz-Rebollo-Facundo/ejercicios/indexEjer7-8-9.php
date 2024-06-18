<?php
include '../header.php';
?>
<body>
    <section id="indexEjer">
        <div class="container">
            <div class="flip-card" id="card7">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 7</h1>
                        <h2>Clasificador de Triángulos</h2>
                        <form id="form7">
                            <label for="l">Ingrese los números:</label>
                            <input type="number" id="l" name="l" placeholder="Valor de A" required>
                            <input type="number" id="m" name="m" placeholder="Valor de B" required>
                            <input type="number" id="n" name="n" placeholder="Valor de C" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result7"></div>
                        <button onclick="resetForm('form7', 'card7')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <div class="flip-card" id="card8">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 8</h1>
                        <h2>Comparador de números</h2>
                        <form id="form8">
                            <label for="o">Ingrese los números:</label>
                            <input type="number" id="o" name="o" placeholder="Valor de A" required>
                            <input type="number" id="p" name="p" placeholder="Valor de B" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result8"></div>
                        <button onclick="resetForm('form8', 'card8')">Nuevo Cálculo</button>
                    </div>
                </div>
            </div>

            <div class="flip-card" id="card9">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h1>Ejercicio 9</h1>
                        <h2>Comparador de Números</h2>
                        <form id="form9">
                            <label for="q">Ingrese los Números:</label>
                            <input type="number" id="q" name="a" placeholder="Valor de A" required>
                            <input type="number" id="r" name="b" placeholder="Valor de B" required>
                            <button type="submit">Calcular</button>
                        </form>
                    </div>
                    <div class="flip-card-back">
                        <div id="result9"></div>
                        <button onclick="resetForm('form9', 'card9')">Nuevo Cálculo</button>
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

        document.getElementById('form7').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById('result7').innerHTML = `<h2>Resultado:</h2><p>${data.resultado7}</p>`;
                document.getElementById('card7').querySelector('.flip-card-inner').classList.add('flipped');
            });
        });

        document.getElementById('form8').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById('result8').innerHTML = `<h2>Resultado:</h2><p>El número Mayor es: ${data.resultado8}</p>`;
                document.getElementById('card8').querySelector('.flip-card-inner').classList.add('flipped');
            });
        });

        document.getElementById('form9').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('process2.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                document.getElementById('result9').innerHTML = `<h2>Resultado:</h2><p>El número Menor es: ${data.resultado9}</p>`;
                document.getElementById('card9').querySelector('.flip-card-inner').classList.add('flipped');
            });
        });
    </script>
</body>
</html>
