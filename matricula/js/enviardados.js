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
   $('#mo01_gemeo').val('');
   $('#mo01_creche').val('');
}

function validarAjax() {
   var data = $("#mo01_dtnasc").val();
   if (data.length != 10) { 
      $("#mo01_dtnasc").val('');
      $("#mo01_dtnasc").css('border-color', '#FF0000');   
      $("#mo01_dtnasc").focus();
      return false;
   } else {    
      var dia    = data.substr(0,2);
      var barra1 = data.substr(2,1);
      var mes    = data.substr(3,2);
      var barra2 = data.substr(5,1);
      var ano    = data.substr(6,4);
      var OK     = true;

      if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia>31 || mes>12) OK = false;
      if ((mes==4 || mes==6 || mes==9 || mes==11) && dia==31) OK = false;
      if (mes==2 && (dia>29 || (dia==29 && ano%4!=0))) OK = false;
      if (ano < 1900) OK = false;

      if (!OK) {
         $("#mo01_dtnasc").val('');
         $("#mo01_dtnasc").css('border-color', '#FF0000');   
         $("#mo01_dtnasc").focus();
         return false;
      } else {
         $("#mo01_dtnasc").css('border-color', '#BDBDBD');   
      }
   }

   if ($("#mo01_nome").val() == '') {
      $("#mo01_nome").val('');
      $("#mo01_nome").css('border-color', '#FF0000');   
      $("#mo01_nome").focus();
      return false;            
   } else {
      $("#mo01_nome").css('border-color', '#BDBDBD');   
   }

   if ($("#mo01_sexo").val() == '') {
      $("#mo01_sexo").val('');
      $("#mo01_sexo").css('border-color', '#FF0000');   
      $("#mo01_sexo").focus();            
      return false;
   } else {
      $("#mo01_sexo").css('border-color', '#BDBDBD');       
   }

   if ($("#mo01_cor").val() == '') {
      $("#mo01_cor").val('');
      $("#mo01_cor").css('border-color', '#FF0000');   
      $("#mo01_cor").focus();            
      return false;
   } else {
      $("#mo01_cor").css('border-color', '#BDBDBD');       
   }

   if ($("#mo01_estciv").val() == '') {
      $("#mo01_estciv").val('');
      $("#mo01_estciv").css('border-color', '#FF0000');   
      $("#mo01_estciv").focus();            
      return false;
   } else {
      $("#mo01_estciv").css('border-color', '#BDBDBD');       
   }
   if ($("#mo01_nacion").val() == '') {
      $("#mo01_nacion").val('');
      $("#mo01_nacion").css('border-color', '#FF0000');   
      $("#mo01_nacion").focus();            
      return false;
   } else {
      $("#mo01_nacion").css('border-color', '#BDBDBD');       
   }
   
   if ($("#mo01_nacion").val() == 'Brasileira') {
      if ($("#mo01_ufnasc").val() == '') {
         $("#mo01_ufnasc").val('');
         $("#mo01_ufnasc").css('border-color', '#FF0000');   
         $("#mo01_nasc").focus();            
         return false;
      } else {
         $("#mo01_ufnasc").css('border-color', '#BDBDBD');   
      }

      if ($("#mo01_munnasc").val() == '') {
         $("#mo01_munnasc").val('');
         $("#mo01_munnasc").css('border-color', '#FF0000');   
         $("#mo01_munnasc").focus();            
         return false;
      } else {
         $("#mo01_munnasc").css('border-color', '#BDBDBD');       
      }
   }

   if ($("#mo01_mae").val() == '') {
      $("#mo01_mae").val('');
      $("#mo01_mae").css('border-color', '#FF0000');   
      $("#mo01_mae").focus();            
      return false;
   } else {
      $("#mo01_mae").css('border-color', '#BDBDBD');       
   }
   if ($("#mo01_tiporesp").val() == '') {
      $("#mo01_tiporesp").val('');
      $("#mo01_tiporesp").css('border-color', '#FF0000');   
      $("#mo01_tiporesp").focus();            
      return false;
   } else {
      $("#mo01_tiporesp").css('border-color', '#BDBDBD');       
   }
   if ($("#mo01_nomeresp").val() == '') {
      $("#mo01_nomeresp").val('');
      $("#mo01_nomeresp").css('border-color', '#FF0000');   
      $("#mo01_nomeresp").focus();            
      return false;
   } else {
      $("#mo01_nomeresp").css('border-color', '#BDBDBD');       
   }
   if ($("#mo01_cpfresp").val() == '') {
      $("#mo01_cpfresp").val('');
      $("#mo01_cpfresp").css('border-color', '#FF0000');   
      $("#mo01_cpfresp").focus();            
      return false;
   } else {
      $("#mo01_cpfresp").css('border-color', '#BDBDBD');       
   }

   /*if ($("#mo01_cartaosus").val() == '') {
      $("#mo01_cartaosus").val('');
      $("#mo01_cartaosus").css('border-color', '#FF0000');   
      $("#mo01_cartaosus").focus();            
      return false;
   } else {
      $("#mo01_cartaosus").css('border-color', '#BDBDBD');   
   }*/

   if ($("#mo01_necess").val() == '') {
      $("#mo01_necess").val('');
      $("#mo01_necess").css('border-color', '#FF0000');   
      $("#mo01_necess").focus();            
      return false;
   } else {
      $("#mo01_necess").css('border-color', '#BDBDBD');       
   }
   
   if ($("#mo01_necesstipo").val() == '') {
      $("#mo01_necesstipo").val('');
      $("#mo01_necesstipo").css('border-color', '#FF0000');   
      $("#mo01_necesstipo").focus();            
      return false;
   } else {
      $("#mo01_necesstipo").css('border-color', '#BDBDBD');       
   }
   if ($("#mo01_bolsafamilia").val() == '') {
      $("#mo01_bolsafamilia").val('');
      $("#mo01_bolsafamilia").css('border-color', '#FF0000');   
      $("#mo01_bolsafamilia").focus();            
      return false;
   } else {
      $("#mo01_bolsafamilia").css('border-color', '#BDBDBD');       
   }
   if ($("#mo01_nivel").val() == '') {
      $("#mo01_nivel").val('');
      $("#mo01_nivel").css('border-color', '#FF0000');   
      $("#mo01_nivel").focus();            
      return false;
   } else {
      $("#mo01_nivel").css('border-color', '#BDBDBD');         
   }
   if ($("#mo01_etapai").val() == '') {
      $("#mo01_etapai").val('');
      $("#mo01_etapai").css('border-color', '#FF0000');   
      $("#mo01_etapai").focus();            
      return false;
   } else {
      $("#mo01_etapai").css('border-color', '#BDBDBD');       
   }
   if ($("#mo01_escolai").val() == '') {
      $("#mo01_escolai").val('');
      $("#mo01_escolai").css('border-color', '#FF0000');   
      $("#mo01_escolai").focus();            
      return false;
   } else {
      $("#mo01_escolai").css('border-color', '#BDBDBD');         
   }
   if ($("#mo01_irmaoi").val() == '') {
      $("#mo01_irmaoi").val('');
      $("#mo01_irmaoi").css('border-color', '#FF0000');   
      $("#mo01_irmaoi").focus();            
      return false;
   } else {
      $("#mo01_irmaoi").css('border-color', '#BDBDBD');       
   }
   if ($("#mo01_etapaii").val() == '') {
      $("#mo01_etapaii").val('');
      $("#mo01_etapaii").css('border-color', '#FF0000');   
      $("#mo01_etapaii").focus();            
      return false;
   } else {
      $("#mo01_etapaii").css('border-color', '#BDBDBD');       
   }
   if ($("#mo01_escolaii").val() == '') {
      $("#mo01_escolaii").val('');
      $("#mo01_escolaii").css('border-color', '#FF0000');   
      $("#mo01_escolaii").focus();            
      return false;
   } else {
      $("#mo01_escolaii").css('border-color', '#BDBDBD');       
   }
   if ($("#mo01_irmaoii").val() == '') {
      $("#mo01_irmaoii").val('');
      $("#mo01_irmaoii").css('border-color', '#FF0000');   
      $("#mo01_irmaoii").focus();            
      return false;
   } else {
      $("#mo01_irmaoii").css('border-color', '#BDBDBD');       
   }

/*
   if ($("#mo01_escolaiii").val() != '') {
      if ($("#mo01_escolaiii").val() == '') {
         $("#mo01_escolaiii").val('');
         $("#mo01_escolaiii").css('border-color', '#FF0000');   
         $("#mo01_escolaiii").focus();            
         return false;
      } else {
         $("#mo01_escolaiii").css('border-color', '#BDBDBD');        
      }     
   }

   if ($("#mo01_etapaiii").val() == '') {
      if ($("#mo01_escolaiii").val() != '') {
         if ($("#mo01_irmaoiii").val() == '') {
            $("#mo01_irmaoiii").val('');
            $("#mo01_irmaoiii").css('border-color', '#FF0000');   
            $("#mo01_irmaoiii").focus();            
            return false;
         } else {
            $("#mo01_irmaoiii").css('border-color', '#BDBDBD');       
         } 
      }    
   }
*/

   if ($("#mo01_redeorigem").val() == '') {
      $("#mo01_redeorigem").val('');
      $("#mo01_redeorigem").css('border-color', '#FF0000');   
      $("#mo01_redeorigem").focus();            
      return false;
   } else {
      $("#mo01_redeorigem").css('border-color', '#BDBDBD');       
   }
   if ($("#mo01_redeorigem").val() != '8') {
      if ($("#mo01_ufredeorigem").val() == '') {
         $("#mo01_ufredeorigem").val('');
         $("#mo01_ufredeorigem").css('border-color', '#FF0000');   
         $("#mo01_ufredeorigem").focus();            
         return false;
      } else {
         $("#mo01_ufredeorigem").css('border-color', '#BDBDBD');           
      }
      if ($("#mo01_munredeorigem").val() == '') {
         $("#mo01_munredeorigem").val('');
         $("#mo01_munredeorigem").css('border-color', '#FF0000');   
         $("#mo01_munredeorigem").focus();            
         return false;
      } else {
         $("#mo01_munredeorigem").css('border-color', '#BDBDBD');           
      }

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
          mo01_fatorrh           : $("#mo01_fatorrh").val(),
		  mo01_gemeo             : $("#mo01_gemeo").val(),
		  mo01_creche            : $("#mo01_creche").val()
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
