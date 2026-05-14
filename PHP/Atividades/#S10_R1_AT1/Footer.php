<footer class="meu-footer">
    <p>&copy; <?php echo date("Y"); ?> - Rodapé do Sistema</p>
</footer>

<script>
    const btn = document.querySelector('button');
    if (btn) {
        btn.onclick = () => {
            document.body.classList.toggle('modo-escuro');
            btn.innerText = document.body.classList.contains('modo-escuro') ? "Modo Claro" : "Modo Escuro";
        };
    }
</script>