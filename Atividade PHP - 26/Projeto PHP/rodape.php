</div>

<footer class="rodape">
    © Projeto PHP
</footer>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const botao = document.getElementById("themeToggle");

    if (botao) {

        botao.addEventListener("click", function () {

            document.body.classList.toggle("dark-mode");

        });

    }

});

</script>

</body>
</html>