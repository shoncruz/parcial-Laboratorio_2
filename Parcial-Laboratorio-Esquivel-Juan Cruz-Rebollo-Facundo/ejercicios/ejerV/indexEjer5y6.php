<?php
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
        }

    </script>
</body>
</html>
