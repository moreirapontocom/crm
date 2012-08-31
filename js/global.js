$(function() {
	loading(1);
	$('button#enviaContato').corner("3px");
	$('input.inputContato').corner("3px");
	$('textarea.inputContato').corner("3px");
	$('select.inputContato').corner("3px");
	$('a.chamadaFAQ').corner("3px");
	$('#nosLigamosParaVoce').corner("3px");
	$('button.solicitarLigacao').corner("3px");
	$('.contadorPerguntasFaq').corner("20px");
	$('#recursosBorda').corner("10px");
	$('#recursosConteudo').corner("10px");
	$('button.botaoFinalPaginas').corner("3px");

	$('#floatEntreEmContato').corner("5px tl tr");
	$('#floatEntreEmContatoConteudo').corner("5px tl tr");

	// novo layout
	$('#menuBar').corner("5px");
	$('ul#recursos').corner("5px");

	$("label").inFieldLabels();
	monitorOnline();
});

function monitorOnline() {
	loading(1);
	$('#conteudoMonitoramento').load('scripts/getMonitoramento.php', function() {
	  loading(0);
	});
	setTimeout("monitorOnline()", 10000);
	loading(0);
}

function detalhesRecursos(action,idRecurso) {
	if ( action == 1 )
		$('#recursosBorda').fadeIn();
	else
		$('#recursosBorda').fadeOut();
}

function selecionaLi(action,id) {
	if ( action == 1 )
		$('#' + id).css('background-color','#FFDCA8');
	else
		$('#' + id).css('background-color','#E5E5E5');
}

function enviaCopiaEmail() {
	loading(1);

	$.ajax({
		url: 'scripts/enviaCopiaEmail.php',
		context: document.body,
		success: function(data){
			loading(0);
			if ( data == '1' )
				alert("Pronto!\nUma cópia deste contrato foi enviada para seu e-mail.");
		}
	});
}

function enviaContato2() {
	var nome = $('#contatoNome');
	var email = $('#contatoEmail');
	var assunto = $('#contatoAssunto');
	var mensagem = $('#contatoMensagem');
	var captcha = $('#norobot');

	$.ajax({
		url: 'scripts/enviaContato.php',
		data: {
			nome: nome.val(),
			email: email.val(),
			assunto: assunto.val(),
			mensagem: mensagem.val(),
			//norobot: captcha.val(),
		},
		success: function(data) {
			if ( data == '1' ) {
				alert("Mensagem enviada!\nObrigado pelo contato.");
				nome.attr('value','');
				nome.blur();
				email.attr('value','');
				email.blur();
				//document.getElementById('contatoAssunto').options[0].selected = "selected";
				mensagem.attr('value','');
				mensagem.blur();
				//captcha.attr('value','');
			} else
				alert("Ocorreu algum erro com um dos campos.");
		},
		error: function(data) {
			alert('Ocorreu algum erro. Por favor tente novamente em alguns instantes.');
		}
	});


	/*
	if ( nome.val() == '' ) {
		alert('Por favor, informe seu nome');
		nome.focus();

	} else if ( email.val() == '' ) {
		alert('Por favor, informe seu e-mail');
		email.focus();

	} else if ( !validateEmail( email.val() ) ) {
		alert('E-mail inválido');
		email.focus();

	} else if ( assunto.val() == '0' ) {
		alert('Escolha um assunto');
		assunto.focus();

	} else if ( mensagem.val() == '' ) {
		alert('Por favor, escreva algo');
		mensagem.focus();
		
	} else if ( captcha.val() == '' ) {
		alert('Por favor, preencha o código de verificação');
		captcha.focus();

	} else {
		$.ajax({
			url: 'scripts/enviaContato.php',
			data: {
				nome: nome.val(),
				email: email.val(),
				assunto: assunto.val(),
				mensagem: mensagem.val(),
				norobot: captcha.val(),
			},
			success: function(data) {
				if ( data == '1' ) {
					alert("Mensagem enviada!\nObrigado pelo contato.");
					nome.attr('value','');
					nome.blur();
					email.attr('value','');
					email.blur();
					document.getElementById('contatoAssunto').options[0].selected = "selected";
					mensagem.attr('value','');
					mensagem.blur();
					captcha.attr('value','');
				} else
					alert("Ocorreu algum erro com um dos campos.");
			},
			error: function(data) {
				alert('Ocorreu algum erro. Por favor tente novamente em alguns instantes.');
			}
		});
	}
	*/
}

function solicitaLigacao() {
	var nome = $('#ligacaoNome');
	var email = $('#ligacaoEmail');
	var telefone = $('#ligacaoTelefone');

	if ( nome.val() == '' )
		alert('Por favor, informe seu nome');

	else if ( email.val() == '' )
		alert('Por favor, informe seu e-mail');

	else if ( !validateEmail( email.val() ) )
		alert('E-mail inválido');

	else if ( telefone.val() == '' )
		alert('Por favor, informe seu telefone');

	else {
		$.ajax({
			url: 'scripts/solicitaLigacao.php',
			data: {
				nome: nome.val(),
				email: email.val(),
				telefone: telefone.val(),
			},
			success: function(data) {
				if ( data == '1' ) {
					alert("Aguarde. Em alguns instantes entraremos em contato com você!");
					nome.attr('value','');
					nome.blur();
					email.attr('value','');
					email.blur();
					telefone.attr('value','');
					telefone.blur();
				} else
					alert("Ocorreu algum erro");
			},
			error: function(data) {
				alert('Ocorreu algum erro. Por favor tente novamente em alguns instantes.');
			}
		});
	}
}

function validaFormCadastro() {
	var cnpj = $('#cadastroCompletoCNPJ');
	var nomeFantasia = $('#cadastroCompletoNomeFantasia');
	var razaoSocial = $('#cadastroCompletoRazaoSocial');
	var cep = $('#cadastroCompletoCEP');
	var bairro = $('#cadastroCompletoBairro');
	var endereco = $('#cadastroCompletoEndereco');
	var cidade = $('#cadastroCompletoCidade');
	var uf = $('#cadastroCompletoUF');
	var nome = $('#cadastroCompletoNome');
	var telefone = $('#cadastroCompletoTelefone');
	var email = $('#cadastroCompletoEmail');
	var senha = $('#cadastroCompletoSenha');
	
	if ( cnpj.val() == '' || cnpj.lenght < 14 )	{ alert('CNPJ inválido');cnpj.focus();return false; }
	if ( nomeFantasia.val() == '' )				{ alert('Nome fantasia inválido');nomeFantasia.focus();return false; }
	if ( razaoSocial.val() == '' )				{ alert('Razão social inválida');razaoSocial.focus();return false; }
	if ( cep.val() == '' )						{ alert('CEP inválido');cep.focus();return false; }
	if ( bairro.val() == '' )					{ alert('Bairro inválido');bairro.focus();return false; }
	if ( endereco.val() == '' )					{ alert('Endereço inválido');endereco.focus();return false; }
	if ( cidade.val() == '' )					{ alert('Cidade inválida');cidade.focus();return false; }
	if ( uf.val() == '' )						{ alert('Estado inválido');uf.focus();return false; }
	if ( nome.val() == '' )						{ alert('Nome inválido');nome.focus();return false; }
	if ( telefone.val() == '' )					{ alert('Telefone inválido');telefone.focus();return false; }
	if ( email.val() == '' )					{ alert('E-mail inválido');email.focus();return false; }
	if ( senha.val() == '' )					{ alert('Senha inválida');senha.focus();return false; }

}


function getEndereco() {
	var cep = $('#cadastroCompletoCEP');
	var bairro = $('#cadastroCompletoBairro');
	var endereco = $('#cadastroCompletoEndereco');
	var cidade = $('#cadastroCompletoCidade');
	var uf = $('#cadastroCompletoUF');
	
	if( $.trim( cep.val() ) != "" ) {
		$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep=" + cep.val(), function(){
				if(resultadoCEP["resultado"] && resultadoCEP["bairro"] != "") {
					$('#camposEndereco').slideDown();
					endereco.val(unescape(resultadoCEP["tipo_logradouro"]) + ": " + unescape(resultadoCEP["logradouro"]));
					bairro.val(unescape(resultadoCEP["bairro"]));
					cidade.val(unescape(resultadoCEP["cidade"]));
					uf.val(unescape(resultadoCEP["uf"]));
					num.focus();
				} else {
					alert("Endereco nao encontrado");
					return false;
				}
		});                             
	}
    else
    {
        alert('Antes, preencha o campo CEP!')
    }
}
