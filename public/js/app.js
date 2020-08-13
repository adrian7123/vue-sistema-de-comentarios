const data = {
    // Objeto Comentarios
    comments: [],

    // Modelo de dados 
    name: '',
    comment: '',

    // Alerta 
    message: '',
    status: 'd-none',

    // status de animação
    anima: '',
    animaItem: '',

    // URL padrão
    root: 'http://localhost/vue-sistema-de-comentarios/api'
}


// Função para espera
function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}

const app = new Vue({
    el: '#app',
    data: data,
    mounted () {
        
        // QUANDO MONTAR O RENDER BUSQUE OS COMENTARIOS DO BANCO DE DADOS
        axios
        .get(this.root)
        .then(response => (this.comments = response.data))
    },
    methods: {
        
        // METODO DE ANIMAÇÃO PARA O ALERTA
        animacao(anima = 'animate__bounceIn') {
            this.anima = anima

            sleep(500).then(() => {
                this.anima = ''
            });
        },

        addComment() {
            if(this.comment.trim() === ''){
                this.animacao('animate__shakeX')
                this.message = 'Preencha o campo Comentario'
                this.status = 'alert-danger'

                return;
            }

            // Cria um formData de acordo com o formulario
            var form = document.getElementById("form")
            
            // tira os espaços vazios da esquerda
            form.elements[1].value = form.elements[1].value.trim()

            var formData = new FormData(form)
            
            // Cadastra esse comentario no banco
            axios
            .post(`${this.root}/store`, formData)
            .catch(function (error) {
                console.log(error);
            })

            // Coloca a animação no alerta
            this.animacao()

            // Exibe a mensagem
            this.message = 'Sucesso'
            this.status = 'alert-success'

            // Busca os comentarios no banco
            sleep(100).then(() => {
                axios
                .get(this.root)
                .then(response => (this.comments = response.data))
            })

            // Deixa os Campos do form vazios 
            this.name = '',
            this.comment = ''

        },

        removeComment(index, id) {
            // primeiro remove o comentario do front-end 
            this.comments.splice(index, 1)

            // Remove o alerta da tela
            this.message = ''
            this.status = 'd.none'

            // Depois remove o comentario do banco
            axios
            .get(`${this.root}/${id}`)
        }
    },
    computed: {
        allComments() {
            return this.comments.map(comment => ({
                ...comment,

                // Se o nome do autor do comentario nao for emitido então coloque "Anônimo"
                name: comment.name.trim() === '' ? "Anônimo" : comment.name,
            }))
        }
    },
    watch: {

        // A cada 10 segundos faça uma busca no banco
        comments() {
            sleep(1000000).then(() => {
                axios
                .get(this.root)
                .then(response => (this.comments = response.data))
            });
        }
    }
});