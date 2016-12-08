var app = {
    
    /**
     * Div principal para mostrarmos o conteúdo
     * @type type
     */
    elemConteudo: $('#conteudo'),
            
            
    /**
     *  Lista, tabela de matérias
     * @type type
     */
    lista: {
        btnInserir: {},
        carregar: function() {
            $.post("materia/view-lista.php", "", function(retorno) {
                app.elemConteudo.empty().append(retorno);
                app.lista.linksForm();
                app.lista.linksDel();
                app.lista.setBtnInserir();
            });
        },
        linksForm: function() {
            var tabela = app.elemConteudo.find('table'),
                links  = tabela.find('a');

            links.each(function() {
                var tr = $(this).parent().parent(),
                    id = tr.attr('id').split("-")[1];

                $(this).click(function(event) {
                    event.preventDefault();
                    app.form.carregar(id);
                });
            });
        },
        linksDel: function() {
            var tabela = app.elemConteudo.find('table'),
                links  = tabela.find('button');

            links.each(function() {
                var tr = $(this).parent().parent(),
                    id = tr.attr('id').split("-")[1];

                $(this).click(function() {
                    if( confirm("Confirmar deletar?")){
                        var strJsonMateria = '{"id":"'+id+'"}';

                        $.post("materia/action.php", "ac=delete&materia="+strJsonMateria, function(resp){
                            app.lista.carregar();
                        });                        
                    }
                });
            });
        },
        setBtnInserir: function() {
            this.btnInserir = $('#lista-btn-inserir');
            this.btnInserir.click(function() {
                app.form.carregar();
            });
        }
    }, // end lista
    
    
    
    /**
     * Formulário
     * 
     * @type type
     */
    form: {
        btnSalvar: {},
        btnCancelar: {},
        carregar: function(id) {
            var param = (id) ? "id=" + id : "";

            $.post("materia/view-form.php", param, function(retorno) {
                app.elemConteudo.empty().append(retorno);
                app.form.setBtnSalvar();
                app.form.setBtnCancelar();
            });
        },
        getMateria: function(){
            var materia = {};

            materia.id             = $("#frm-id").val();
            materia.url            = $("#frm-url").val();
            materia.titulo         = $("#frm-titulo").val();
            materia.resumo         = $("#frm-resumo").val();
            materia.keywords       = $("#frm-keywords").val();
            materia.nivel          = $("#frm-nivel").val();
            materia.secao          = $("#frm-secao").val();
            materia.autor          = $("#frm-autor").val();
            materia.dt_criacao     = $("#frm-dt-criacao").val();
            materia.dt_atualizacao = $("#frm-dt-atualizacao").val();
            materia.ordem          = $("#frm-ordem").val();

            return materia;
        },
        setBtnSalvar: function() {
            this.btnSalvar = $('#frm-btn-salvar');
            this.btnSalvar.click(function() {
                var materia = app.form.getMateria(),
                    strJsonMateria = JSON.stringify( materia );

                if(materia.id){
                    $.post("materia/action.php", "ac=update&materia="+strJsonMateria, function(resp){
                        app.lista.carregar();
                    });
                }else{
                    $.post("materia/action.php", "ac=insert&materia="+strJsonMateria, function(resp){
                        app.lista.carregar();
                    });
                }
            });
        },
        setBtnCancelar: function() {
            this.btnCancelar = $('#frm-btn-cancelar');
            this.btnCancelar.click(function() {
                app.lista.carregar();
            });
        }
    }// end form

};//end app
