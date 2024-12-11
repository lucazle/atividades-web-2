<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4">Detalhes do Livro</h1>

    <!-- Card com Detalhes do Livro -->
    <div class="card mb-4">
        <div class="card-header">
            <strong>Título:</strong> <?php echo e($book->title); ?>

        </div>
        <div class="card-body d-flex align-items-start">
            <!-- Exibição da Imagem de Capa -->
            <div class="me-4">
                <img src="<?php echo e($book->cover_image ? asset('storage/' . $book->cover_image) : asset('images/default-cover.jpg')); ?>" 
                     alt="<?php echo e($book->title); ?>" 
                     class="img-fluid rounded" 
                     style="max-width: 200px; height: auto;">
            </div>

            <!-- Informações do Livro -->
            <div>
                <p><strong>Autor:</strong>
                    <a href="<?php echo e(route('authors.show', $book->author->id)); ?>">
                        <?php echo e($book->author->name); ?>

                    </a>
                </p>
                <p><strong>Editora:</strong>
                    <a href="<?php echo e(route('publishers.show', $book->publisher->id)); ?>">
                        <?php echo e($book->publisher->name); ?>

                    </a>
                </p>
                <p><strong>Categoria:</strong>
                    <a href="<?php echo e(route('categories.show', $book->category->id)); ?>">
                        <?php echo e($book->category->name); ?>

                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Card para Registrar Empréstimo -->
    <div class="card mb-4">
        <div class="card-header">
            Registrar Empréstimo
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('books.borrow', $book)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="user_id" class="form-label">Usuário</label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        <option value="" selected>Selecione um usuário</option>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Registrar Empréstimo</button>
            </form>
        </div>
    </div>

    <!-- Botões Voltar e Deletar -->
    <div class="d-flex justify-content-between mt-3">
        <!-- Botão Voltar -->
        <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>

        <!-- Botão Deletar -->
        <form action="<?php echo e(route('books.destroy', $book->id)); ?>" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este livro?')">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-trash"></i> Deletar Livro
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luke/atividade3/atividades-web-2/atividade6/resources/views/books/show.blade.php ENDPATH**/ ?>