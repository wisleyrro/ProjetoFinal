<main>
    <!--titulo h2 com bootstrap mt-3 espaçamento do texto-->
    <h2 class="mt-3">Excluir vaga</h2>
    <!--criação formulario-->
    <form method="post">
        <div class="form-group"> 
            <p>Vocé deseja realmente excluir avaga <strong><?=$obVaga->titulo?></strong>?<p>
        </div>    

        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>
</main>