<form action="teste2.php" method="get">
    <input name="id">
    <button type="submit"> enviar
    </button>
</form>
<a href="teste2.php?id=<?php echo sha1('oi');?>"> teste
</a>