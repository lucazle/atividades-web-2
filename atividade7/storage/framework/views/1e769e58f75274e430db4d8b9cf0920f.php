

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4">Detalhes do Livro</h1>

    <!-- Primeiro Card -->
    <div class="card mb-4">
        <div class="card-header">
            <strong>Título:</strong> <?php echo e($book->title); ?>

        </div>
        <div class="card-body">
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

    <!-- Segundo Card (Registrar Empréstimo) -->
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

    <!-- Botão Voltar -->
    <div class="text-end">
        <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary mt-3">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luke/atividade3/resources/views/books/show.blade.php ENDPATH**/ ?>