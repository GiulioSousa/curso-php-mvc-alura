<?php include __DIR__ . '/../inicio-html.php'; ?>
<form action="/salvar-curso<?= isset($curso) ? '?id=' . $curso->getId() : ''; ?>" method="post">
    <div class="form-group">
        <label for="descricao" class="form-label">Descrição</label>
        <input 
                type="text" 
                id="descricao" 
                name="descricao" 
                class="form-control"
                value=" <?= isset($curso) ? $curso->getDescricao() : ""; ?>">
    </div>
    <button class="btn btn-primary">Salvar</button>
</form>
<?php include __DIR__ . '/../final-html.php'; ?>
