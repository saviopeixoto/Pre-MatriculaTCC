function limpa_dados() {
   $("#mo01_dtnasc").val(''),
   $("#mo01_idade").val(''),
   $("#mo01_idadecorte").val(''),
   $("#mo01_nome").val(''),
   $("#mo01_sexo").val(''),
   $("#mo01_cor").val(''),
   $("#mo01_estciv").val(''),
   $("#mo01_nacion").val(''),
   $("#mo01_ufnasc").val(''),
   $("#mo01_munnasc").val(''),
   $("#mo01_mae").val(''),
   $("#mo01_pai").val(''),
   $("#mo01_tiporesp").val(''),
   $("#mo01_nomeresp").val(''),
   $("#mo01_cpfresp").val(''),
   $("#mo01_cartaosus").val(''),
   $("#mo01_necess").val(''),
   $("#mo01_necesstipo").val(''),
   $("#mo01_bolsafamilia").val(''),
   $("#mo01_nis").val(''),
   $("#mo01_nivel").val(''),
   $("#mo01_etapai").val(''),
   $("#mo01_escolai").val(''),         
   $("#mo01_irmaoi").val(''),
   $("#mo01_etapaii").val(''),
   $("#mo01_escolaii").val(''),        
   $("#mo01_irmaoii").val(''),
   $("#mo01_etapaiii").val(''),
   $("#mo01_escolaiii").val(''),       
   $("#mo01_irmaoiii").val(''),
   $("#mo01_redeorigem").val(''),         
   $("#mo01_ufredeorigem").val(''),       
   $("#mo01_munredeorigem").val(''),         
   $("#mo01_escredeorigem").val(''),         
   $("#mo01_ctbescredeorigem").val(''),         
   $("#mo01_certidaotipo").val(''),
   $("#mo01_certidaomod").val(''),
   $("#mo01_certidaolivro").val(''),
   $("#mo01_certidaofolha").val(''),
   $("#mo01_certidaonum").val(''),
   $("#mo01_certidaomatricula").val(''),
   $("#mo01_ufcartcert").val(''),
   $("#mo01_muncartcert").val(''),     
   $("#mo01_cpf").val(''),       
   $("#mo01_tipoend").val(''),         
   $("#mo01_ender").val(''),
   $("#mo01_nomeend").val('');
   $("#mo01_bairro").val(''),
   $("#mo01_nomebair").val('');
   $("#mo01_cep").val(''),
   $("#mo01_uf").val(''),
   $("#mo01_municip").val(''),         
   $("#mo01_telef").val(''),
   $("#mo01_telcel").val(''),
   $("#mo01_telcom").val(''),
   $("#mo01_email").val(''),
   $("#mo01_tiposangue").val(''),
   $("#mo01_fatorrh").val('')
   $('#enderecoi').hide();
   $('#mo01_enderecoi').hide();
   $('#mo01_enderecoi').val('');
   $('#enderecoii').hide();
   $('#mo01_enderecoii').hide();
   $('#mo01_enderecoii').val('');
   $('#enderecoiii').hide();
   $('#mo01_enderecoiii').hide();
   $('#mo01_enderecoiii').val('');
}

function validarAjax() {
   	var ret = '';
	if(itaHasError('mo01_dtnasc', 'date')) ret += "Data de nascimento inválida;\n";
	if(itaHasError('mo01_nome')) ret += "Nome inválido;\n";
	if(itaHasError('mo01_sexo')) ret += "Sexo inválido;\n";
	if(itaHasError('mo01_cor')) ret += "Cor inválida;\n";
	if(itaHasError('mo01_estciv')) ret += "Estado civil inválido;\n";
	if(itaHasError('mo01_nacion')) ret += "Nacionalidade inválida;\n";
	if($("#mo01_nacion").val() == 'Brasileira') {
		if(itaHasError('mo01_ufnasc')) ret += "UF de nascimento inválida;\n";
		if(itaHasError('mo01_munnasc')) ret += "Município de nascimento inválido;\n";
	}
	if(itaHasError('mo01_mae')) ret += "Nome da mãe inválido;\n";
	if(itaHasError('mo01_tiporesp')) ret += "Tipo de responsável inválido;\n";
	if(itaHasError('mo01_nomeresp')) ret += "Nome do responsável inválido;\n";
	if(itaHasError('mo01_cpfresp', 'cpf')) ret += "CPF do responsável inválido;\n";
	//if(itaHasError('mo01_cartaosus')) ret += "Cartão SUS inválido;\n";
	if(itaHasError('mo01_necess')) ret += "Necessidades especiais inválida;\n";
	//if(itaHasError('mo01_necesstipo')) ret += "Necessidades especiais inválida;\n";
	if(itaHasError('mo01_bolsafamilia')) ret += "Resposta se tem bolsa familia inválida;\n";
	if(itaHasError('mo01_nivel')) ret += "Nível inválido;\n";
	if(itaHasError('mo01_etapai')) ret += "Nível inválido;\n";
	if(itaHasError('mo01_escolai')) ret += "Nível inválido;\n";
	if(itaHasError('mo01_irmaoi')) ret += "Nível inválido;\n";
	if(itaHasError('mo01_etapaii')) ret += "Nível inválido;\n";
	if(itaHasError('mo01_escolaii')) ret += "Nível inválido;\n";
	if(itaHasError('mo01_irmaoii')) ret += "Nível inválido;\n";

	if(itaHasError('mo01_redeorigem')) ret += "Rede de origem inválida;\n";
	if($("#mo01_redeorigem").val() != '8') {
		if(itaHasError('mo01_ufredeorigem')) ret += "Rede de origem inválida;\n";
		if(itaHasError('mo01_munredeorigem')) ret += "Rede de origem inválida;\n";
	}
	
	
	
	
	if(itaHasError('mo01_tipoend')) ret += "Tipo de endereço inválido;\n";
	if(itaHasError('mo01_ender')) ret += "Endereço inválido;\n";
	if(itaHasError('mo01_bairro')) ret += "Bairro inválido;\n";
	if(itaHasError('mo01_cep', 'cep')) ret += "CEP inválido;\n";
	if(itaHasError('mo01_uf')) ret += "UF inválida;\n";
	if(itaHasError('mo01_municip')) ret += "Município inválido;\n";
	if(itaHasError('mo01_telcel', 'tel')) ret += "Celular inválido;\n";




      if ($("#mo01_redeorigem").val() != '8') {
         if ($("#mo01_redeorigem").val() == '3') {
            if ($("#mo01_ctbescredeorigem").val() == '') {
               $("#mo01_ctbescredeorigem").val('');
               $("#mo01_ctbescredeorigem").css('border-color', '#FF0000');   
               $("#mo01_ctbescredeorigem").focus();            
               return false;
            } else {
               $("#mo01_ctbescredeorigem").css('border-color', '#BDBDBD');                  
            }  
         } else {
            if ($("#mo01_escredeorigem").val() == '') {
               $("#mo01_escredeorigem").val('');
               $("#mo01_escredeorigem").css('border-color', '#FF0000');   
               $("#mo01_escredeorigem").focus();            
               return false;
            } else {
               $("#mo01_escredeorigem").css('border-color', '#BDBDBD');                 
            }
         }
      }
   } 
      
   if ($("#mo01_certidaotipo").val() == '') {
      $("#mo01_certidaotipo").val('');
      $("#mo01_certidaotipo").css('border-color', '#FF0000');   
      $("#mo01_certidaotipo").focus();            
      return false;
   } else {
      $("#mo01_escredeorigem").css('border-color', '#BDBDBD');   
   }

   if ($("#mo01_certidaotipo").val() != '0') {
      if ($("#mo01_certidaomod").val() == '') {
         $("#mo01_certidaomod").val('');
         $("#mo01_certidaomod").css('border-color', '#FF0000');   
         $("#mo01_certidaomod").focus();            
         return false;
      } else {
         $("#mo01_certidaomod").css('border-color', '#BDBDBD');   
      }

      if ($("#mo01_certidaomod").val() == '1') {
         if ($("#mo01_certidaolivro").val() == '') {
            $("#mo01_certidaolivro").val('');
            $("#mo01_certidaolivro").css('border-color', '#FF0000');   
            $("#mo01_certidaolivro").focus();            
            return false;
         } else {
            $("#mo01_certidaolivro").css('border-color', '#BDBDBD');           
         }
         if ($("#mo01_certidaofolha").val() == '') {
            $("#mo01_certidaofolha").val('');
            $("#mo01_certidaofolha").css('border-color', '#FF0000');   
            $("#mo01_certidaofolha").focus();            
            return false;
         } else {
            $("#mo01_certidaofolha").css('border-color', '#BDBDBD');           
         }
         if ($("#mo01_certidaonum").val() == '') {
            $("#mo01_certidaonum").val('');
            $("#mo01_certidaonum").css('border-color', '#FF0000');   
            $("#mo01_certidaonum").focus();            
            return false;
         } else {
            $("#mo01_certidaonum").css('border-color', '#BDBDBD');           
         }
      } else {
         if ($("#mo01_certidaomod").val() == '2') {
            if ($("#mo01_certidaomatricula").val() == '') {
               $("#mo01_certidaomatricula").val('');
               $("#mo01_certidaomatricula").css('border-color', '#FF0000');   
               $("#mo01_certidaomatricula").focus();            
               return false;
            } else {
               $("#mo01_certidaomatricula").css('border-color', '#BDBDBD');               
            }
         } 
      }
   }

   if ($("#mo01_tipoend").val() == '') {
      $("#mo01_tipoend").val('');
      $("#mo01_tipoend").css('border-color', '#FF0000');   
      $("#mo01_tipoend").focus();            
      return false;
   } else {
      $("#mo01_tipoend").css('border-color', '#BDBDBD');       
   }

   if ($("#mo01_ender").val() == '') {
      if ($("#mo01_nomeend").val() == '') {
         $("#mo01_nomeend").val('');
         $("#mo01_nomeend").css('border-color', '#FF0000');   
         $("#mo01_nomeend").focus();            
         return false;
      } else {
         $("#mo01_nomeend").css('border-color', '#BDBDBD');   
      }  
   } else {
      $("#mo01_ender").css('border-color', '#BDBDBD');   
   }
   
   if ($("#mo01_bairro").val() == '') {
      if ($("#mo01_nomebair").val() == '') {
         $("#mo01_nomebair").val('');
         $("#mo01_nomebair").css('border-color', '#FF0000');   
         $("#mo01_nomebair").focus();            
         return false;
      } else {
         $("#mo01_nomebair").css('border-color', '#BDBDBD');
      }
   } else {
      $("#mo01_bairro").css('border-color', '#BDBDBD');   
   }

   if ($("#mo01_cep").val() == '') {
      $("#mo01_cep").val('');
      $("#mo01_cep").css('border-color', '#FF0000');   
      $("#mo01_cep").focus();            
      return false;
   } else {
      $("#mo01_cep").css('border-color', '#BDBDBD');   
   }
   
   if ($("#mo01_uf").val() == '') {
      $("#mo01_uf").val('');
      $("#mo01_uf").css('border-color', '#FF0000');   
      $("#mo01_uf").focus();            
      return false;
   } else {
      $("#mo01_uf").css('border-color', '#BDBDBD');   
   }
   
   if ($("#mo01_municip").val() == '') {
      $("#mo01_municip").val('');
      $("#mo01_municip").css('border-color', '#FF0000');   
      $("#mo01_municip").focus();            
      return false;
   } else {
      $("#mo01_municip").css('border-color', '#BDBDBD');   
   }

   if ($("#mo01_telcel").val() == '') {
      $("#mo01_telcel").val('');
      $("#mo01_telcel").css('border-color', '#FF0000');   
      $("#mo01_telcel").focus();            
      return false;
   } else {
      var celular = $("#mo01_telcel").val();
      if (celular.length<13) {
         $("#mo01_telcel").val('');
         $("#mo01_telcel").css('border-color', '#FF0000');   
         $("#mo01_telcel").focus();                     
         return false;
      } else {   
         $("#mo01_telcel").css('border-color', '#BDBDBD');         
      }   
   }

   return true;
}

$(function() {
   $('#btn-salvar').click(function() {
      var aDadosAjax = {
          mo01_codigo            : $('#mo01_codigo').val(),
          mo01_dtnasc            : $("#mo01_dtnasc").val(),
          mo01_idade             : $("#mo01_idade").val(),
          mo01_idadecorte        : $("#mo01_idadecorte").val(),
          mo01_nome              : $("#mo01_nome").val(),
          mo01_sexo              : $("#mo01_sexo").val(),
          mo01_cor               : $("#mo01_cor").val(),
          mo01_estciv            : $("#mo01_estciv").val(),
          mo01_nacion            : $("#mo01_nacion").val(),
          mo01_ufnasc            : $("#mo01_ufnasc").val(),
          mo01_munnasc           : $("#mo01_munnasc").val(),
          mo01_mae               : $("#mo01_mae").val(),
          mo01_pai               : $("#mo01_pai").val(),
          mo01_tiporesp          : $("#mo01_tiporesp").val(),
          mo01_nomeresp          : $("#mo01_nomeresp").val(),
          mo01_cpfresp           : $("#mo01_cpfresp").val(),
          mo01_cartaosus         : $("#mo01_cartaosus").val(),
          mo01_necess            : $("#mo01_necess").val(),
          mo01_necesstipo        : $("#mo01_necesstipo").val(),
          mo01_bolsafamilia      : $("#mo01_bolsafamilia").val(),
          mo01_nis               : $("#mo01_nis").val(),
          mo01_nivel             : $("#mo01_nivel").val(),
          mo01_etapai            : $("#mo01_etapai").val(),
          mo01_escolai           : $("#mo01_escolai").val(),               
          mo01_irmaoi            : $("#mo01_irmaoi").val(),
          mo01_etapaii           : $("#mo01_etapaii").val(),
          mo01_escolaii          : $("#mo01_escolaii").val(),     
          mo01_irmaoii           : $("#mo01_irmaoii").val(),
          mo01_etapaiii          : $("#mo01_etapaiii").val(),
          mo01_escolaiii         : $("#mo01_escolaiii").val(),      
          mo01_irmaoiii          : $("#mo01_irmaoiii").val(),
          mo01_redeorigem        : $("#mo01_redeorigem").val(),     
          mo01_ufredeorigem      : $("#mo01_ufredeorigem").val(),     
          mo01_munredeorigem     : $("#mo01_munredeorigem").val(),      
          mo01_escredeorigem     : $("#mo01_escredeorigem").val(),      
          mo01_ctbescredeorigem  : $("#mo01_ctbescredeorigem").val(),     
          mo01_certidaotipo      : $("#mo01_certidaotipo").val(),
          mo01_certidaomod       : $("#mo01_certidaomod").val(),
          mo01_certidaolivro     : $("#mo01_certidaolivro").val(),
          mo01_certidaofolha     : $("#mo01_certidaofolha").val(),
          mo01_certidaonum       : $("#mo01_certidaonum").val(),
          mo01_certidaomatricula : $("#mo01_certidaomatricula").val(),
          mo01_ufcartcert        : $("#mo01_ufcartcert").val(),
          mo01_muncartcert       : $("#mo01_muncartcert").val(),    
          mo01_cpf               : $("#mo01_cpf").val(),      
          mo01_tipoend           : $("#mo01_tipoend").val(),      
          mo01_ender             : $("#mo01_ender").val(),
          mo01_nomeend           : $("#mo01_nomeend").val(),
          mo01_numero            : $("#mo01_numero").val(),
          mo01_bairro            : $("#mo01_bairro").val(),
          mo01_nomebair          : $("#mo01_nomebair").val(),
          mo01_cep               : $("#mo01_cep").val(),
          mo01_uf                : $("#mo01_uf").val(),
          mo01_municip           : $("#mo01_municip").val(),      
          mo01_telef             : $("#mo01_telef").val(),
          mo01_telcel            : $("#mo01_telcel").val(),
          mo01_telcom            : $("#mo01_telcom").val(),
          mo01_email             : $("#mo01_email").val(),
          mo01_tiposangue        : $("#mo01_tiposangue").val(),
          mo01_fatorrh           : $("#mo01_fatorrh").val()
      };

      if (validarAjax()) {
         $('#btn-salvar').val('Enviando...');
         $('#btn-salvar').prop("disabled",true);          
         var dayName = new Array ("domingo", "segunda", "terça", "quarta", "quinta", "sexta", "sábado");
         var monName = new Array ("janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro", "novembro","dezembro");

         console.log('Codigo Salva: '+$('#mo01_codigo').val());

         var url = '';  
         if ($('#mo01_codigo').val() != '') {
            url = "processamatriculaupdate.ajax.php";   
         } else {
            url = "processamatricula.ajax.php";    
         }    
  
         var now = new Date;
         $.ajax({
             type: "POST",
             url: url,
             data: aDadosAjax,
             success: function(oObjeto) {
               var oRetornoAjax = JSON.parse(oObjeto);
               if (oRetornoAjax.iStatus == 1) {
                  if ($("#mo01_codigo").val() == '') {
                     $('#matricula-msg1').html('Nº Protocolo: '+oRetornoAjax.mo01_protocol);
                     $('#matricula-msg2').html('Aluno(a): '+oRetornoAjax.mo01_nome);
                     $('#matricula-msg3').html('Responsável: '+oRetornoAjax.mo01_nomeresp);
                     $('#matricula-msg4').html('Cpf Responsável: '+oRetornoAjax.mo01_cpfresp);
                     $('#matricula-msg5').html('');
                     $('#matricula-msg6').html(oRetornoAjax.sMessage);
                     $('#matricula-msg7').html(dayName[now.getDay()]+', '+now.getDate()+" de "+monName[now.getMonth()]+" de "+now.getFullYear());
                     $("#matricula-modal").modal();
                     $("#btn-imprimir").click(function() {
                        url = "comprovante.php?mo01_codigo="+oRetornoAjax.mo01_codigo;
                        window.open(url,'_blank');
                     }); 
                     limpa_dados();
                     $("#btn-salvar").prop("disabled",false);
                     $('#btn-salvar').val('Cadastrar');                           
                  } else {
                     $('#matriculaupdate-msg1').html('Nº Protocolo: '+oRetornoAjax.mo01_protocol);
                     $('#matriculaupdate-msg2').html('Aluno(a): '+oRetornoAjax.mo01_nome);
                     $('#matriculaupdate-msg3').html('Responsável: '+oRetornoAjax.mo01_nomeresp);
                     $('#matriculaupdate-msg4').html('Cpf Responsável: '+oRetornoAjax.mo01_cpfresp);
                     $('#matriculaupdate-msg5').html('');
                     $('#matriculaupdate-msg6').html(oRetornoAjax.sMessage);
                     $('#matriculaupdate-msg7').html(dayName[now.getDay()]+', '+now.getDate()+" de "+monName[now.getMonth()]+" de "+now.getFullYear());
                     $("#matriculaupdate-modal").modal();
                     $("#btn-imprimirupdate").click(function() {
                        url = "comprovante.php?mo01_codigo="+oRetornoAjax.mo01_codigo;
                        window.open(url,'_blank');
                     }); 
                     limpa_dados();
                     $("#btn-salvar").prop("disabled",false);
                     $('#btn-salvar').val('Salvar');                           
                  }
               } else {
                  if ($('#mo01_codigo').val() == '') {
                     $('#matricula-msg1').html('Erro: ' + oRetornoAjax.sMessage);
                     $('#matricula-msg2').html('');
                     $('#matricula-msg3').html('');
                     $('#matricula-msg4').html('');
                     $('#matricula-msg6').html('');
                     $('#matricula-msg7').html(dayName[now.getDay()]+', '+now.getDate()+" de "+monName[now.getMonth()]+" de "+now.getFullYear());
                     $("#matricula-modal").modal();
                     $("#btn-salvar").prop("disabled",false);
                     $("#btn-salvar").val("Cadastrar");
                  } else {
                     $('#matriculaupdate-msg1').html('Erro: ' + oRetornoAjax.sMessage);
                     $('#matriculaupdate-msg2').html('');
                     $('#matriculaupdate-msg3').html('');
                     $('#matriculaupdate-msg4').html('');
                     $('#matriculaupdate-msg6').html('');
                     $('#matriculaupdate-msg7').html(dayName[now.getDay()]+', '+now.getDate()+" de "+monName[now.getMonth()]+" de "+now.getFullYear());
                     $("#matriculaupdate-modal").modal();
                     $("#btn-salvar").prop("disabled",false);
                     $("#btn-salvar").val("Salvar");
                  }                  
               }
             }
         });
      } 
   
      return false;
   });

   $('#btn-limpar').click(function() {
      limpa_dados();
   });
});

function itaHasError (campo, tipo) {
	var value = $('#'+ campo).val();
	if(typeof value != 'string' || value == '') return true;
	if(tipo == 'date' && !itaValidDate(value)) return true;
	if(tipo == 'cpf' && !itaValidaCPF(value)) return true;
	if(tipo == 'cep' && value.replace(/[^0-9]/gi, '').length != 8) return true;
	if(tipo == 'tel' && value.replace(/[^0-9]/gi, '').length != 10 && value.replace(/[^0-9]/gi, '').length != 11) return true;
	return false;
}

function itaValidDate(date) {
    var matches = /^(\d{2})[-\/](\d{2})[-\/](\d{4})$/.exec(date);
    if(matches == null) return false;
    var d = matches[1];
    var m = matches[2] - 1;
    var y = matches[3];
    var composedDate = new Date(y, m, d);
    return composedDate.getDate() == d && composedDate.getMonth() == m && composedDate.getFullYear() == y;
}

function itaValidaCPF(cpf) {
	cpf = cpf.replace(/[^\d]+/g,'');
	if(cpf == '') return false;
	if(cpf.length != 11 ||
	   cpf == "00000000000" ||
	   cpf == "11111111111" ||
	   cpf == "22222222222" ||
	   cpf == "33333333333" ||
	   cpf == "44444444444" || 
	   cpf == "55555555555" ||
	   cpf == "66666666666" ||
	   cpf == "77777777777" ||
	   cpf == "88888888888" ||
	   cpf == "99999999999") return false;
	add = 0;
	for(i=0; i < 9; i ++) add += parseInt(cpf.charAt(i)) * (10 - i);
	rev = 11 - (add % 11);
	if(rev == 10 || rev == 11) rev = 0;
	if(rev != parseInt(cpf.charAt(9))) return false;
	add = 0;
	for(i = 0; i < 10; i ++) add += parseInt(cpf.charAt(i)) * (11 - i);
	rev = 11 - (add % 11);
	if(rev == 10 || rev == 11) rev = 0;
	if(rev != parseInt(cpf.charAt(10))) return false;
	return true;
}
