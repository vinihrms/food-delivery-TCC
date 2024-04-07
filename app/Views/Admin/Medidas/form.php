<div class="form-row">
    <div class="form-group col-md-12">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
            value="<?php echo old('nome', esc($medida->nome)); ?>">
    </div>


    <div class="form-group col-md-12">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" name="descricao" rows="2" id="descricao"><?php echo old('descricao', esc($medida->descricao)); ?></textarea>
    </div>
</div>



<div class="form-check form-check-flat form-check-primary mb-4">
    <label for="ativo" class="form-check-label">
        <input type="hidden" value="0" name="ativo">

        <input type="checkbox" class="form-check-input" id="ativo" name="ativo" value="1" <?php if(old('ativo', $medida->ativo)): ?> checked="" <?php endif?>>
        Ativo 
    </label>
</div>



<button type="submit" class="btn btn-primary mr-2">
    <i class="mdi mdi-check btn-icon-prepend"></i>
    Salvar
</button>
