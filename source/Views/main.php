<!-- Extendendo o template Pai -->
<?php $v->layout('template/_main.php') ?> 

<div class="container">
    <h2>Comentarios</h2>
    <hr />

    <!-- Alerta -->
    <div class="alert animate__animated animate__fast" v-bind:class="[status, anima]" role="alert">
        {{message}}
    </div>

    <!-- Formulario -->
    <form id="form" class="form-todo form_group">
        <p>
            <!-- input nome -->
            <input v-model="name" type="text" placeholder="nome" name="name" class="form-control" />
        </p>
        <p>
            <!-- input comment -->
            <textarea v-model="comment" name="comment" placeholder="Comentario" v-bind:rows="comment.split('\n').length" class="form-control"></textarea>
        </p>
        <!-- Botão para submeter o formulario -->
        <button @click.prevent="addComment" type="submit" class="btn btn-primary">Comentar</button>
    </form>
    <br />

    <!-- lista de comentarios -->
    <div class="list-group">
        <!-- comentarios -->                        
        <div class="list-group-item bg-dark" v-for="(comment, index) in allComments">
            <span class="comment_author text-white">Autor: <strong>{{comment.name}}</strong></span>
            <pre class="text-white">{{ comment.comment }}</pre> 
            <div>
                <!-- Link para remover o comentario selecionado -->
                <a @click.prevent="removeComment(index, comment.id)" href="#" title="Excluir">Excluir</a>
            </div>
        </div>
    </div>
    <hr />
</div>

<!-- Script do Vue  -->
<?= $v->push('script') ?>
    <script src="<?= url(JS . "app.js") ?>"></script>
<?= $v->end() ?>
