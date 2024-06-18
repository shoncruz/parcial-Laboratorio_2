<?php
// Include the header file
include '../header.php';
?>

<body>
    <section id="indexEjer">
        <div class="container">
            
        </div>
    </section>

    <script>
        function resetForm(formId, cardId) {
            document.getElementById(formId).reset();
            document.getElementById(cardId).querySelector('.flip-card-inner').classList.remove('flipped');
            document.getElementById(cardId).querySelector('.result-container').innerHTML = '';
        }

    </script>
</body>
<?php
include 'footer.php';
?>

</html>