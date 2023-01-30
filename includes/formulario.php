<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>
    <!--titulo h2 com bootstrap mt-3 espaçamento do texto-->
    <h2 class="mt-3"><?=TITLE?></h2>
    <!--criação formulario-->
    <form method="post">
        <!--campo titulo-->
        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" name="titulo" id="" value="<?=$obVaga->titulo?>" >
        </div>
        <!--campo descrição-->
        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" name="descricao" id="" cols="20" rows="5"><?=$obVaga->descricao?></textarea>
        </div>
        <!--campo Status radio button-->
        <div class="form-group">
            <label>Status</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-control" >
                        <input type="radio" name="ativo" value="s" id="" checked>Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="n" id="" <?=$obVaga->ativo == 'n' ? 'checked': ''?>>Inativo
                    </label>
                </div>
            </div>
        </div>
        <br>
        <!--botão enviar vagas-->
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</main>