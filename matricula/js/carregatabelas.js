function carregaUf() {
   $.getJSON('estados.ajax.php?search=',{ajax: 'true'}, function(j) {
	    var options = '<option value="">– Escolha um Estado –</option>';	
	    for(var i = 0; i < j.length; i++) {
	 	     options += '<option value="' + j[i].db12_uf + '">' + j[i].db12_nome + '</option>';
	    }	 
	    $('#mo01_uf').html(options).show();
   });
}

function carregaEstadoCivil() {
   $.getJSON('estadocivil.ajax.php?search=',{ajax: 'true'}, function(j) {
	    var options = '<option value="">– Escolha um estado civil –</option>';	
	    for(var i = 0; i < j.length; i++) {
	 	     options += '<option value="' + j[i].mo07_codigo + '">' + j[i].mo07_descr + '</option>';
	    }	
	    $('#mo01_estciv').html(options).show();
   });
}

function carregaResponsavel() {
   $.getJSON('responsavel.ajax.php?search=',{ajax: 'true'}, function(j) {
	    var options = '<option value="">– Escolha um tipo de responsável –</option>';	
	    for(var i = 0; i < j.length; i++) {
	 	     options += '<option value="' + j[i].mo06_codigo + '">' + j[i].mo06_descr + '</option>';
	    }	
	    $('#mo01_tiporesp').html(options).show();
   });
}

function carregaRedeOrigem() {
   $.getJSON('redeorigem.ajax.php?search=',{ajax: 'true'}, function(j) {
      var options = '<option value="">– Escolha uma rede de origem –</option>'; 
      for(var i = 0; i < j.length; i++) {
         options += '<option value="' + j[i].mo05_codigo + '">' + j[i].mo05_descr + '</option>';
      } 
      $('#mo01_redeorigem').html(options).show();
   });
}

function carregaUfRedeOrigem() {
   $.getJSON('estados.ajax.php?search=',{ajax: 'true'}, function(j) {
      var options = '<option value="">– Escolha um Estado –</option>';  
      for(var i = 0; i < j.length; i++) {
         options += '<option value="' + j[i].db12_uf + '">' + j[i].db12_nome + '</option>';
      } 
      $('#mo01_ufredeorigem').html(options).show();
   });
}

function carregaUfCertidao() {
   $.getJSON('estados.ajax.php?search=',{ajax: 'true'}, function(j) {
	    var options = '<option value="">– Escolha um Estado –</option>';	
	    for(var i = 0; i < j.length; i++) {
	 	     options += '<option value="' + j[i].db12_uf + '">' + j[i].db12_nome + '</option>';
	    }	
	    $('#mo01_ufcartcert').html(options).show();
   });
}

function carregaRuasTipo() {
   $.getJSON('ruastipo.ajax.php?search=',{ajax: 'true'}, function(j) {
	    var options = '<option value="">– Escolha um Tipo de Endereço –</option>';	
	    for(var i = 0; i < j.length; i++) {
	 	     options += '<option value="' + j[i].j88_codigo + '">' + j[i].j88_descricao + '</option>';
	    }	
	    $('#mo01_tipoend').html(options).show();
   });
}

function carregaBairro() {
   $.getJSON('bairros.ajax.php?search=',{ajax: 'true'}, function(j) {
	    var options = '<option value="">– Escolha um bairro –</option>';	
	    for(var i = 0; i < j.length; i++) {
	 	     options += '<option value="' + j[i].j13_codi + '">' + j[i].j13_descr + '</option>';
	    }	
	    $('#mo01_bairro').html(options).show();
   });
}

//-------------------------------------------------------------------------------------------------------------------
// funcoes para alteracao de dados
//-------------------------------------------------------------------------------------------------------------------

function carregaEstadoCivilUpdate() {
   $.getJSON('estadocivil.ajax.php?search=',{ajax: 'true'}, function(j) {
	  var options = '<option value="">– Escolha um estado civil –</option>';	
	  for(var i = 0; i < j.length; i++) {         	  	
	 	 options += '<option value="' + j[i].mo07_codigo + '"'+ ($('#mo01_estadocivil').val()==j[i].mo07_codigo?"selected":"") +'>' + j[i].mo07_descr + '</option>';
      }	
	  $('#mo01_estciv').html(options).show();
   });
}

function carregaUfNascimento() { 
   if ($("#mo01_nacional").val() == "BRASILEIRA") {
      $("#mo01_nacion").val('BRASILEIRA');
	    $('#mo01_ufnasc').prop("disabled",false);
	    $('#mo01_munnasc').prop("disabled",false);          
      $.getJSON('estados.ajax.php?search=',{ ajax: 'true'}, function(j) {
  	     var options = '<option value="">– Escolha um Estado –</option>';	
	       for(var i = 0; i < j.length; i++) {
  	   	    options += '<option value="' + j[i].db12_uf + '"'+ ($('#mo01_ufnascimento').val()==j[i].db12_uf?"selected":"") +'>' + j[i].db12_nome + '</option>';
	       }	
 	       $('#mo01_ufnasc').html(options).show();
       	 carregaMunicipioNascimento();
      });
   } else {
      $('#mo01_ufnasc').html('<option value=""></option>').show();
      $('#mo01_ufnasc').prop("disabled",true);
      $('#mo01_munnasc').prop("disabled",true);          
   }          
}

function carregaMunicipioNascimento() {
   var cod_uf = $('#mo01_ufnascimento').val();	
   $.getJSON('cidades.ajax.php?search=',{cod_uf: cod_uf, ajax: 'true'}, function(j) {
  	  var options = '<option value="">– Escolha um Municipio –</option>\n';	
	    for(var i=0; i<j.length; i++) {
	  	   options += '<option value="' + j[i].cp05_codlocalidades + '"' + ($("#mo01_municnascimento").val()==j[i].cp05_codlocalidades?"selected":"") + '>' + j[i].cp05_localidades + '</option>\n';
	    }	
      $("#mo01_munnasc").html(options).show(); 
   });
}

function carregaTipoResponsavel() {
   $.getJSON('responsavel.ajax.php?search=',{ajax: 'true'}, function(j) {
	   var options = '<option value="">– Escolha um tipo de responsável –</option>';	
	   for(var i = 0; i < j.length; i++) {
	 	    options += '<option value="' + j[i].mo06_codigo + '"' + ($('#mo01_tiporesponsavel').val()==j[i].mo06_codigo?"selected":"") +'>' + j[i].mo06_descr + '</option>';
	   }	
	   $('#mo01_tiporesp').html(options).show();
   });
}

function carregaNecessidades() {
   if ($('#mo01_necess').val() == '2' || $('#mo01_necess').val() == '3' || $('#mo01_necess').val() == '4') {
	    
      $.getJSON('necessidades.ajax.php?search=',{ajax: 'true'}, function(j) {
		
         var options = '<option value="">– Escolha um tipo de necessidade Especial –</option>';	
		 
         for(var i = 0; i < j.length; i++) {
	        options += '<option value="' + j[i].ed48_i_codigo + '"' + ($('#mo01_necessidade').val()==j[i].ed48_i_codigo?"selected":"") + '>' + j[i].ed48_c_descr + '</option>';
			
         }	
         $('#mo01_necesstipo').html(options).show();
		 
      });
   } else {
      $('#mo01_necesstipo').html('<option value="0">Nenhuma</option>');
   }   
}

function carregaNivelEscolar() {
   var idade = $("#mo01_idadecorte").val();
   var dtnas = $("#mo01_dtnasc").val();
   var dtcort = '31/03/2023';
   $.getJSON('nivelescolar.ajax.php?search=',{ ajax: 'true', idade:idade, dtnas: dtnas, dtcort: dtcort }, function(j) {
	   var options = '<option value="">– Escolha um Nivel –</option>';	
	   for(var i = 0; i < j.length; i++) {
	 	    options += '<option value="' + j[i].ed10_i_codigo + '"' + ($('#mo01_nivelescolar').val()==j[i].ed10_i_codigo?"selected":"") + '>' + j[i].ed10_c_descr + '</option>';
	   }	
	   $('#mo01_nivel').html(options).show();
     carregaEtapai();
     carregaEtapaii();
     carregaEtapaiii();
   });
}

function carregaEtapai() {
   var idade = $("#mo01_idadecorte").val();
   var cod_nivel = $("#mo01_nivelescolar").val();
   $.getJSON('nivelfase.ajax.php?search=',{cod_nivel: cod_nivel, idade:idade, ajax: 'true'}, function(j) {
       console.log(j);
	   var options = '<option value="">– Escolha uma etapa/fase –</option>\n';	
	     for(var i = 0; i < j.length; i++) {
		      options += '<option value="'  + j[i].mo09_codigo + '" ' + ($('#mo01_etapa1').val()==j[i].mo09_codigo?"selected":"") + '>' + j[i].mo09_descricao + '</option>\n';
	     }			 	
	     $('#mo01_etapai').html(options).show();
	     carregaEscolai();
   });
}

function carregaEscolai() {
   var cod_nivel = $('#mo01_nivelescolar').val();      
   var cod_etapa = $('#mo01_etapa1').val();      
   $.getJSON('escolaserie.ajax.php?search=',{cod_nivel: cod_nivel, cod_ciclo: cod_etapa, ajax: 'true'}, function(j) {
      var options = '<option value="">– Escolha uma Escola -</ption>';	
      for(var i = 0; i < j.length; i++) {
         options += '<option value="' + j[i].ed18_i_codigo + '"' + ($('#mo01_escola1').val()==j[i].ed18_i_codigo?"selected":"") + '>' + j[i].ed18_c_nome + '</option>';
      }      
      $('#mo01_escolai').html(options).show();
      carregaEnderecoi();      
   });
}

function carregaEnderecoi() {
   var escola = $('#mo01_escola1').val();      
   $.getJSON('escolaendereco.ajax.php?search=',{escola: escola, ajax: 'true'}, function(j) {
      $('#enderecoi').show();
      $('#mo01_enderecoi').show();
      $('#mo01_enderecoi').val(j);
   });
}

function carregaEtapaii() {
   var idade = $("#mo01_idadecorte").val();
   var cod_nivel = $("#mo01_nivelescolar").val();      
   $.getJSON('nivelfase.ajax.php?search=',{cod_nivel: cod_nivel, idade:idade, ajax: 'true'}, function(j) {
       var options = '<option value="">– Escolha uma etapa/fase –</option>';	
	       options += '<option value="0"' + sSelecao + '>- Nenhuma Escolha -</option>';
	    for(var i = 0; i < j.length; i++) {
	       options  += '<option value="' + j[i].mo09_codigo + '"' + ($('#mo01_etapa2').val()==j[i].mo09_codigo?"selected":"") + '>' + j[i].mo09_descricao + '</option>';
	    }			 	
	    $('#mo01_etapaii').html(options).show();
	    $('#mo01_escolaii').prop('disabled',false);
	    $('#mo01_irmaoii').prop('disabled',false);
	    carregaEscolaii();
   });
}

function carregaEscolaii() {
   var cod_nivel = $('#mo01_nivelescolar').val();      
   var cod_etapa = $('#mo01_etapa2').val();      
   $.getJSON('escolaserie.ajax.php?search=',{cod_nivel: cod_nivel, cod_ciclo: cod_etapa, ajax: 'true'}, function(j) {
   	  var options  = '<option value="">– Escolha uma Escola -</ption>';	
      for(var i = 0; i < j.length; i++) {
         options += '<option value="' + j[i].ed18_i_codigo + '"' + ($('#mo01_escola2').val()==j[i].ed18_i_codigo?"selected":"") + '>' + j[i].ed18_c_nome + '</option>';
      }      
      $('#mo01_escolaii').html(options).show();
      carregaEnderecoii();
   });
}

function carregaEnderecoii() {
   var escola = $('#mo01_escola2').val();  
   if (escola != '' && escola != '0') {
      $.getJSON('escolaendereco.ajax.php?search=',{ escola: escola, ajax: 'true'}, function(j) {
         $('#enderecoii').show();
         $('#mo01_enderecoii').val(j);
      });
   } else {
      $('#enderecoii').hide();
	    $('#mo01_enderecoii').val('');
   }
}

function carregaEtapaiii() {
   var idade = $("#mo01_idadecorte").val();
   var cod_nivel = $("#mo01_nivelescolar").val();
   var cod_etapa = $('#mo01_etapa3').val();
   $.getJSON('nivelfase.ajax.php?search=',{cod_nivel: cod_nivel, idade:idade, ajax: 'true'}, function(j) {
     var sSelecao = (cod_etapa == ''?'selected':'');
     var options  = '<option value="">- Escolha uma etapa/fase -</option>';
         options += '<option value="0"' + sSelecao + '>- Nenhuma Escolha -</ption>';
     for(var i = 0; i < j.length; i++) {        
        options  += '<option value="' + j[i].mo09_codigo + '"' + ($('#mo01_etapa3').val()==j[i].mo09_codigo?"selected":"") + '>' + j[i].mo09_descricao + '</option>';
     }			 	
     $('#mo01_etapaiii').html(options).show();
     if (cod_etapa == '' || cod_etapa != '0') {
     	$('#mo01_escolaiii').val('');
     	$('#mo01_irmaoiii').val('2');
     	$('#mo01_escolaiii').prop('disabled',true);
     	$('#mo01_irmaoiii').prop('disabled',true);
    	carregaEscolaiii();
     } else {
	$('#mo01_escolaiii').prop('disabled',false);
     	$('#mo01_irmaoiii').prop('disabled',false);
     	carregaEscolaiii();
     }
   });
}

function carregaEscolaiii() {
   var cod_nivel = $('#mo01_nivelescolar').val();      
   var cod_etapa = $('#mo01_etapa3').val();      
   $.getJSON('escolaserie.ajax.php?search=',{cod_nivel: cod_nivel, cod_ciclo: cod_etapa, ajax: 'true'}, function(j) {
   	  var options = '<option value="">– Escolha uma Escola -</ption>';	
      for(var i = 0; i < j.length; i++) {
         options += '<option value="' + j[i].ed18_i_codigo + '"' + ($('#mo01_escola3').val()==j[i].ed18_i_codigo?"selected":"") + '>' + j[i].ed18_c_nome + '</option>';
      }      
      $('#mo01_escolaiii').html(options).show();
      carregaEnderecoiii();
   });
}

function carregaEnderecoiii() {
   var escola = $('#mo01_escola3').val();      
   if (escola != '' && escola != '0') {
      $.getJSON('escolaendereco.ajax.php?search=',{escola: escola, ajax: 'true'}, function(j) {
         $('#enderecoiii').show();
         $('#mo01_enderecoiii').val(j);
      });
   } else {
      $('#enderecoiii').hide();
	    $('#mo01_enderecoiii').val('');
   }   
}

function carregaRedeOrigemUpdate() {
   $.getJSON('redeorigem.ajax.php?search=',{ajax: 'true'}, function(j) {
	   var options = '<option value="">– Escolha uma rede de origem –</option>';	
	   for(var i = 0; i < j.length; i++) {
	 	    options += '<option value="' + j[i].mo05_codigo + '"'+ ($('#mo01_rededeorigem').val()==j[i].mo05_codigo?"selected":"") +'>' + j[i].mo05_descr + '</option>';
	   }	
	   $('#mo01_redeorigem').html(options).show();
     carregaUfRedeOrigemUpdate();
     carregaEscolaRedeOrigem();
   });
}

function carregaUfRedeOrigemUpdate() {
   if ($('#mo01_rededeorigem').val() != '8') {
      $.getJSON('estados.ajax.php?search=',{ajax: 'true'}, function(j) {
         var options = '<option value="">– Escolha um Estado –</option>'; 
         for(var i = 0; i < j.length; i++) {
            options += '<option value="' + j[i].db12_uf     + '"' + ($('#mo01_ufrededeorigem').val()==j[i].db12_uf?"selected":"")   + '>' + j[i].db12_nome + '</option>';
         }  
         $('#mo01_ufredeorigem').prop('disabled',false);         
         $('#mo01_ctbescredeorigem').prop('disabled',false);;
         $('#mo01_escredeorigem').prop('disabled',false);;
         $('#mo01_munredeorigem').prop('disabled',false);      
         $('#mo01_ufredeorigem').html(options).show();
         carregaMunicipioRedeOrigem();
      });
   } else {
      $('#mo01_ufredeorigem').val('');         
      $('#mo01_munredeorigem').val('');       
      $('#mo01_ctbescredeorigem').val('');         
      $('#mo01_ufredeorigem').prop('disabled',true);         
      $('#mo01_munredeorigem').prop('disabled',true);       
      $('#mo01_ctbescredeorigem').prop('disabled',true);;
      $('#mo01_escredeorigem').prop('disabled',true);;
   }
}

function carregaMunicipioRedeOrigem() {
   var cod_uf = $('#mo01_ufrededeorigem').val();	
   if (cod_uf != '') {
   	  if ($('#mo01_municrededeorigem').val() == '') {
      	 $('#mo01_municrededeorigem').val('6941');
   	  }
   }
   $.getJSON('cidades.ajax.php?search=',{cod_uf: cod_uf, ajax: 'true'}, function(j) {
  	  var options = '<option value="">– Escolha um Municipio –</option>';	
	    for(var i = 0; i < j.length; i++) {
	  	   options += '<option value="' + j[i].cp05_codlocalidades + '"' + ($('#mo01_municrededeorigem').val()==j[i].cp05_codlocalidades?"selected":"") + '>' + j[i].cp05_localidades + '</option>';
	    }	
      $('#mo01_munredeorigem').html(options).show();      
   });
}

function carregaEscolaRedeOrigem() {
   if ($('#mo01_rededeorigem').val() == '3' && $('#mo01_ufrededeorigem').val() == 'RJ' && $('#mo01_municrededeorigem').val() == '6941') {
      $.getJSON('escolaorigem.ajax.php?search=',{ajax: 'true'}, function(j) {
        var options = '<option value="">– Escolha uma Escola –</option>';	
        for(var i = 0; i < j.length; i++) {
           options += '<option value="' + j[i].ed18_i_codigo + '"' + ($('#mo01_ctbescolaredeorigem').val()==j[i].ed18_i_codigo?"selected":"") + '>' + j[i].ed18_c_nome + '</option>';
        }
        $('#mo01_ctbescredeorigem').show();
        $('#mo01_escredeorigem').hide();
        $('#mo01_ctbescredeorigem').html(options).show();
      }); 
   } else {
      if ($('#mo01_redeorigem').val() != '8') { 
         $('#mo01_escredeorigem').prop('disabled',false);
         $('#mo01_ctbescredeorigem').hide();
 	 $('#mo01_escredeorigem').show();
      }
   }
}

function carregaUfCertidaoUpdate() {
   if ($('#mo01_certidaotipo').val() != '0') {
      $.getJSON('estados.ajax.php?search=',{ajax: 'true'}, function(j) {
         var options = '<option value="">– Escolha um Estado –</option>'; 
         for(var i = 0; i < j.length; i++) {
            options += '<option value="' + j[i].db12_uf + '"' + ($('#mo01_ufcertidao').val()==j[i].db12_uf?"selected":"") + '>' + j[i].db12_nome + '</option>';
         }  
         $("#mo01_certidaomod").prop('disabled',false);
         $('#mo01_ufcartcert').prop('disabled',false);
         $('#mo01_muncartcert').prop('disabled',false);      
         $('#mo01_ufcartcert').html(options).show();
         carregaMunicipioCertidao();
      });
   } else {
      if ($('#mo01_certidaotipo').val() == '0') {
         $('#mo01_certidaomod').val('');
         $('#certidaonova').val('');
         $('#mo01_ufcartcert').val('');
         $('#mo01_muncartcert').val('');
         $('#mo01_certidaomod').prop('disabled',true);
         $('#mo01_ufcartcert').prop('disabled',true);
         $('#mo01_muncartcert').prop('disabled',true);
         $('#certidaoantiga').hide();
         $('#certidaonova').hide();
      } else {
         $('#mo01_certidaomod').prop('disabled',false);
         $('#mo01_ufcartcert').prop('disabled',false);
         $('#mo01_muncartcert').prop('disabled',false);     
         $.getJSON('estados.ajax.php?search=',{ajax: 'true'}, function(j) {
            var options = '<option value="">– Escolha um Estado –</option>'; 
            for(var i = 0; i < j.length; i++) {
               options += '<option value="' + j[i].db12_uf + '"' + ($('#mo01_ufcertidao').val()==j[i].db12_uf?"selected":"") + '>' + j[i].db12_nome + '</option>';
            }  
            $('#mo01_ufcartcert').html(options).show();
            carregaMunicipioCertidao();
         });
      }
   }
}

function carregaMunicipioCertidao() {
   var cod_uf = $('#mo01_estado').val();
   if (cod_uf != '') {
   	  if ($('#mo01_municcertidao').val() == '') {
    	   $('#mo01_municcertidao').val('6941');
   	  }
   }
   $.getJSON('cidades.ajax.php?search=',{cod_uf: cod_uf, ajax: 'true'}, function(j) {
  	  var options = '<option value="">– Escolha um Municipio –</option>\n';	
	    for(var i = 0; i < j.length; i++) {
	  	   options += '<option value="' + j[i].cp05_codlocalidades + '" ' + ($('#mo01_municcertidao').val()==j[i].cp05_codlocalidades?"selected":"") + '>' + j[i].cp05_localidades + '</option>\n';
	    }
      $('#mo01_muncartcert').html(options).show();      
   });
}

function carregaRuasTipoUpdate() {
   $.getJSON('ruastipo.ajax.php?search=',{ajax: 'true'}, function(j) {
	    var options = '<option value="">– Escolha um Tipo de Endereço –</option>';	
	    for(var i = 0; i < j.length; i++) {
	 	     options += '<option value="' + j[i].j88_codigo + '" ' + ($('#mo01_tipolograd').val()==j[i].j88_codigo?"selected":"") + '>' + j[i].j88_descricao + '</option>';                
	    }	
	    $('#mo01_tipoend').html(options).show();
  	  carregaLogradouroUpdate();
   });
}

function carregaLogradouroUpdate() {
   var cod_rua = $('#mo01_lograd').val();	
   $.getJSON('ruaslogradouro.ajax.php?search=',{ ajax: 'true'}, function(j) {
	    var options = '<option value="">– Escolha um Endereço –</option>\n';	
	    for(var i = 0; i < j.length; i++) {
  	 	   options += '<option value="' + j[i].j14_codigo + '"' + ($('#mo01_lograd').val()==j[i].j14_codigo?"selected":"") + '>' + j[i].j14_nome + '</option>\n';
	    }	
	    $('#mo01_ender').html(options).show();
  	  carregaBairroUpdate();
   });
}

function carregaBairroUpdate() {
   $.getJSON('bairros.ajax.php?search=',{ajax: 'true'}, function(j) {
	   var options = '<option value="">– Escolha um bairro –</option>';	
	   for(var i = 0; i < j.length; i++) {
	 	    options += '<option value="' + j[i].j13_codi + '" ' + ($('#mo01_codbairro').val()==j[i].j13_codi?"selected":"") + '>' + j[i].j13_descr + '</option>';
	   }	
	   $('#mo01_bairro').html(options).show();
   });
}

function carregaUfUpdate() {
   $.getJSON('estados.ajax.php?search=',{ajax: 'true'}, function(j) {
	    var options = '<option value="">– Escolha um Estado –</option>';	
	    for(var i = 0; i < j.length; i++) {
	 	     options += '<option value="' + j[i].db12_uf + '" ' + ($('#mo01_estado').val()==j[i].db12_uf?"selected":"") + '>' + j[i].db12_nome + '</option>';
	    }	
	    $('#mo01_uf').html(options).show();
	    carregaMunicipio();
   });
}

function carregaMunicipio() {
   var cod_uf = $('#mo01_estado').val();	
   $.getJSON('cidades.ajax.php?search=',{cod_uf: cod_uf, ajax: 'true'}, function(j) {
  	  var options = '<option value="">– Escolha um Municipio –</option>';	
	    for(var i = 0; i < j.length; i++) {
	    	 options += '<option value="' + j[i].cp05_codlocalidades + '"' + ($('#mo01_municipio').val()==j[i].cp05_codlocalidades?"selected":"") + '>' + j[i].cp05_localidades + '</option>';
	    }
      $('#mo01_municip').html(options).show();      
   });
}

//final das funcoes
//--------------------------------------------------------------------------------------------------------------------------------------------------------

function carregaMobase() {
   var mo01_codigo = $('#mo01_codigo').val();

   console.log('Codigo: '+mo01_codigo);

   if ($('#mo01_codigo').val() != '') {
      $.ajax({
         url: "findmobase.ajax.php",
         method : 'POST',
         data: { mo01_codigo: mo01_codigo },
         success: function(oObjeto) { 
            oRetornoAjax = JSON.parse(oObjeto);  
            if (oRetornoAjax.iStatus == 1) {
               $('#mo01_codigo').val(oRetornoAjax.oCandidato.mo01_codigo);
               $('#mo01_nome').val(oRetornoAjax.oCandidato.mo01_nome);
               $('#mo01_dtnasc').val(oRetornoAjax.oCandidato.mo01_dtnasc);
               $("#mo01_idade").val(oRetornoAjax.oCandidato.mo01_idade);
               $("#mo01_idadecorte").val(oRetornoAjax.oCandidato.mo01_idadecorte);
               $("#mo01_sexo").val(oRetornoAjax.oCandidato.mo01_sexo);
               $("#mo01_cor").val(oRetornoAjax.oCandidato.mo01_cor);
               $("#mo01_estadocivil").val(oRetornoAjax.oCandidato.mo01_estciv);
               $("#mo01_nacion").val(oRetornoAjax.oCandidato.mo01_nacion);
               $("#mo01_nacional").val(oRetornoAjax.oCandidato.mo01_nacion);
               $("#mo01_ufnascimento").val(oRetornoAjax.oCandidato.mo01_ufnasc);
               $("#mo01_municnascimento").val(oRetornoAjax.oCandidato.mo01_munnasc);
               $("#mo01_mae").val(oRetornoAjax.oCandidato.mo01_mae);
               $("#mo01_pai").val(oRetornoAjax.oCandidato.mo01_pai);
               $("#mo01_tiporesponsavel").val(oRetornoAjax.oCandidato.mo01_tiporesp);
               $("#mo01_nomeresp").val(oRetornoAjax.oCandidato.mo01_nomeresp);
               $("#mo01_cpfresp").val(oRetornoAjax.oCandidato.mo01_cpfresp);
               $("#mo01_cartaosus").val(oRetornoAjax.oCandidato.mo01_cartaosus);              
               $("#mo01_necess").val(oRetornoAjax.oCandidato.mo01_necess);
               $("#mo01_necessidade").val(oRetornoAjax.oCandidato.mo01_necesstipo);
               $("#mo01_bolsafamilia").val(oRetornoAjax.oCandidato.mo01_bolsafamilia);
               $("#mo01_nis").val(oRetornoAjax.oCandidato.mo01_nis);
               $("#mo01_nivelescolar").val(oRetornoAjax.oCandidato.mo01_nivel);
               $("#mo01_rededeorigem").val(oRetornoAjax.oCandidato.mo01_redeorigem);
               $("#mo01_ufrededeorigem").val(oRetornoAjax.oCandidato.mo01_ufredeorigem);
               $("#mo01_municrededeorigem").val(oRetornoAjax.oCandidato.mo01_munredeorigem);
               $("#mo01_escolaredeorigem").val(oRetornoAjax.oCandidato.mo01_escredeorigem);
               $("#mo01_ctbescolaredeorigem").val(oRetornoAjax.oCandidato.mo01_ctbescredeorigem);
               $("#mo01_certidaotipo").val(oRetornoAjax.oCandidato.mo01_certidaotipo);
               $("#mo01_certidaomod").val(oRetornoAjax.oCandidato.mo01_certidaomod);
               $("#mo01_certidaolivro").val(oRetornoAjax.oCandidato.mo01_certidaolivro);
               $("#mo01_certidaofolha").val(oRetornoAjax.oCandidato.mo01_certidaofolha);
               $("#mo01_certidaonum").val(oRetornoAjax.oCandidato.mo01_certidaonum);
               $("#mo01_certidaomatricula").val(oRetornoAjax.oCandidato.mo01_certidaomatricula);
               $("#mo01_ufcertidao").val(oRetornoAjax.oCandidato.mo01_ufcartcert);
               $("#mo01_municcertidao").val(oRetornoAjax.oCandidato.mo01_muncartcert);
               $("#mo01_cpf").val(oRetornoAjax.oCandidato.mo01_cpf);
               $("#mo01_tipolograd").val(oRetornoAjax.oCandidato.mo01_tipoend);
               $("#mo01_lograd").val(oRetornoAjax.oCandidato.mo01_ender);
               $("#mo01_numero").val(oRetornoAjax.oCandidato.mo01_numero);
               $("#mo01_codbairro").val(oRetornoAjax.oCandidato.mo01_bairro);
               $("#mo01_cep").val(oRetornoAjax.oCandidato.mo01_cep);
               $("#mo01_estado").val(oRetornoAjax.oCandidato.mo01_uf);
               $("#mo01_municipio").val(oRetornoAjax.oCandidato.mo01_municip);
               $("#mo01_telef").val(oRetornoAjax.oCandidato.mo01_telef);
               $("#mo01_telcel").val(oRetornoAjax.oCandidato.mo01_telcel);
               $("#mo01_telcom").val(oRetornoAjax.oCandidato.mo01_telcom);
               $("#mo01_email").val(oRetornoAjax.oCandidato.mo01_email);
               $("#mo01_tiposangue").val(oRetornoAjax.oCandidato.mo01_tiposangue);
               $("#mo01_fatorrh").val(oRetornoAjax.oCandidato.mo01_fatorrh);
               
               for(let iCont=0;iCont<oRetornoAjax.aBaseEscola.length;iCont++) {
                  if (iCont==0) {
	                 $('#mo01_etapa1').val(oRetornoAjax.aBaseEscola[iCont].mo02_etapa);
	                 $('#mo01_escola1').val(oRetornoAjax.aBaseEscola[iCont].mo02_escola);
	                 $('#mo01_irmaoi').val(oRetornoAjax.aBaseEscola[iCont].mo02_parent);
                  }

                  if (iCont==1) {
		             $('#mo01_etapa2').val(oRetornoAjax.aBaseEscola[iCont].mo02_etapa);
		             $('#mo01_escola2').val(oRetornoAjax.aBaseEscola[iCont].mo02_escola);
		             $('#mo01_irmaoii').val(oRetornoAjax.aBaseEscola[iCont].mo02_parent);
                  }

                  if (iCont==2) {
	                 $('#mo01_etapa3').val(oRetornoAjax.aBaseEscola[iCont].mo02_etapa);
	                 $('#mo01_escola3').val(oRetornoAjax.aBaseEscola[iCont].mo02_escola);
	                 $('#mo01_irmaoiii').val(oRetornoAjax.aBaseEscola[iCont].mo02_parent);
	              }         
               }

               carregaEstadoCivilUpdate();
               carregaUfNascimento();
               carregaMunicipioNascimento();
               carregaTipoResponsavel();
               carregaNecessidades();
               carregaNivelEscolar();
			         carregaRedeOrigemUpdate();
               carregaUfCertidaoUpdate();
               carregaRuasTipoUpdate();
               carregaLogradouroUpdate();
               carregaUfUpdate();
               carregaMunicipio();

            }
            return false;
         }
      });
   } else {
      carregaUf();
      carregaRedeOrigem();
      carregaEstadoCivil();
      carregaResponsavel();
      carregaUfCertidao();
      carregaRuasTipo();
      carregaBairro();
   }
}

//--------------------------------------------------------------------------------------------------------------------

function validarCPF(cpf) {	
	cpf = cpf.replace(/[^\d]+/g,'');	
	if(cpf == '') return false;	
	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999")
		return false;		
	// Valida 1o digito	
	add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
		if (rev != parseInt(cpf.charAt(9)))		
			return false;		
	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10)))
		return false;		
	return true;   
}

function js_tamnome(sNome) {
   var tam   = sNome.split(" ");
   var passa = true;

   if (tam.length<2) {
      var strMessageUsuario = "Obrigatorio Nome Completo!";
      alert(strMessageUsuario);
      $('mo01_nome').value = "";
      $('mo01_nome').focus;
      return false;
   } else {
      for(i=0;i<tam.length;i++) {
         if (pessoa=='f') {
            if (tam[0].length<2 || tam[1].length<2) {
               alert("Obrigatorio Nome Completo!");
               $('mo01_nome').value = "";
               $('mo01_nome').focus;
               passa = false;
               break;
            }
         }
      }
      if (passa==false) {
         return false;
	  }
   }   
}

$(document).ready(function() {
    carregaMobase();
  	DD_belatedPNG.fix('.png');

  	$("#mo01_dtnasc").mask("00/00/0000");
  	$("#mo01_cep").mask("00000-000");
  	$("#mo01_cpf").mask("000.000.000-00");
  	$("#mo01_cpfresp").mask("000.000.000-00");
  	$("#mo01_nis").mask("000.00000.00-0");
  	$("#mo01_telef").mask("(00) 00000-0000");
  	$("#mo01_telcel").mask("(00) 00000-0000");
  	$("#mo01_telcom").mask("(00) 00000-0000");
  	$("#mo01_certidaomatricula").mask("000000.00.00.0000.0.00000.000.0000000-00");

    $("#mo01_dtnasc").change(function() {
       var datanas  = $("#mo01_dtnasc").val().replace(/[^0-9]/g, '');
       var dianasc  = datanas.substring(0,2);
       var mesnasc  = datanas.substring(2,4);
       var anonasc  = datanas.substring(4,8);
       var datanasc = new Date(mesnasc+'/'+dianasc+'/'+anonasc);
       var datacorte = new Date("03/31/2023");  // Data de corte saviodevweb@gmail.com 
       var dataatu  = new Date(); 
       var datatual = new Date((dataatu.getMonth()+1)+'/'+dataatu.getDate()+'/'+dataatu.getFullYear());	
       var datanasc2 = new Date(mesnasc+'/'+dianasc+'/'+datatual.getFullYear());
       var datanasc3 = new Date(mesnasc+'/'+dianasc+'/'+datacorte.getFullYear());
       var idade = datatual.getFullYear() - datanasc.getFullYear();
       var idadecorte = datacorte.getFullYear() - datanasc.getFullYear(); 

       if (datatual<datanasc2) idade--;
       if (datacorte<datanasc3) idadecorte--;

       /*if(idadecorte > 3) {
		   alert("Idade limite de 3 anos.\n\nDúvidas, envie email para suportematriculas@itaborai.rj.gov.br");
		   limpa_dados();
		   $(this).focus();
		   return false;
	   }*/

       $("#mo01_idade").val(idade);
       $("#mo01_idadecorte").val(idadecorte);
    });

	$('#mo01_nacion').change(function() {
      if ($("#mo01_nacion").val() == "Brasileira") {
	       $('#mo01_ufnasc').prop("disabled",false);
		     $('#mo01_munnasc').prop("disabled",false);          
         $.getJSON('estados.ajax.php?search=',{ajax: 'true'}, function(j) {
	          var options = '<option value="">– Escolha um Estado –</option>';	
	          for(var i = 0; i < j.length; i++) {
	 	           options += '<option value="' + j[i].db12_uf + '">' + j[i].db12_nome + '</option>';
	          }	
   	        $('#mo01_ufnasc').html(options).show();
          });
       } else {
  	      $('#mo01_ufnasc').html('<option value=""></option>').show();
	        $('#mo01_ufnasc').prop("disabled",true);
		      $('#mo01_munnasc').prop("disabled",true);          
       }       
    }); 

	$('#mo01_ufnasc').change(function() {
	    if ($('#mo01_ufnasc').val()) {
		     $.getJSON('cidades.ajax.php?search=',{cod_uf: $(this).val(), ajax: 'true'}, function(j) {
		        var options = '<option value="">– Escolha um Municipio –</option>';	
			      for(var i = 0; i < j.length; i++) {
			 	       options += '<option value="' + j[i].cp05_codlocalidades + '">' + j[i].cp05_localidades + '</option>';
			      }	
		        $('#mo01_munnasc').html(options).show();
		     });
	    } else {
		     $('#mo01_munnasc').html('<option value="">– Escolha um Estado –</option>');
	    }
	});

	$('#mo01_necess').change(function() {
	   if ($('#mo01_necess').val() == '2' || $('#mo01_necess').val() == '3' || $('#mo01_necess').val() == '4') {
        $.getJSON('necessidades.ajax.php?search=',{ajax: 'true'}, function(j) {
	         var options = '<option value="">– Escolha um tipo de necessidade Especiail –</option>';	
	         for(var i = 0; i < j.length; i++) {
	 	          options += '<option value="' + j[i].ed48_i_codigo + '">' + j[i].ed48_c_descr + '</option>';
	         }	
	         $('#mo01_necesstipo').html(options).show();
			 alert ("Para validar a informação das necessidades especiais, envie cópia do protocolo de inscrição e documentos (laudos com cid, declaração, encaminhamento a especialista) que comprovem a deficiência ou transtorno informado, para o email edespecial@edu.itaborai.rj.gov.br ,ou se preferir, entregue as cópias dentro de um envelope com identificação do candidato aos cuidados da Coordenação da Educação Especial  na Secretaria Municipal de Educação. Localizada na Praça Marechal Floriano Peixoto. O responsável pela inscrição terá até 48h para enviar os comprovantes.");
        });
	   } else {
		    $('#mo01_necesstipo').html('<option value="0">Nenhuma</option>');
	   }
	});

	$('#mo01_dtnasc').change(function() {
	   if ($('#mo01_dtnasc').val()) {
	   	  var idade = $("#mo01_idadecorte").val();
	   	  var dtnas = $("#mo01_dtnasc").val();
	   	  var dtcort = '31/03/2023';
		    $.getJSON('nivelescolar.ajax.php?search=',{ ajax: 'true', idade:idade, dtnas: dtnas, dtcort: dtcort }, function(j) {
		 	     var options = '<option value="">– Escolha um Nivel –</option>';	
			     for(var i = 0; i < j.length; i++) {
			 	      options += '<option value="' + j[i].ed10_i_codigo + '">' + j[i].ed10_c_descr + '</option>';
			     }	
			     $('#mo01_nivel').html(options).show();
		    });
	   } else {
		    $('#mo01_nivel').html('<option value="">– Escolha um Nivel –</option>');
	   }
	});

	$('#mo01_nivel').change(function() {
	    if ($('#mo01_nivel').val() != '') {
	   	   var idade = $("#mo01_idadecorte").val();
		     $.getJSON('nivelfase.ajax.php?search=',{cod_nivel: $(this).val(), idade:idade, ajax: 'true'}, function(j) {
		 	      var options   = '<option value="">– Escolha uma etapa –</option>';	
            var optionsa  = '<option value="">– Escolha uma etapa –</option>';	
		 	      optionsa += '<option value="0">– Nenhuma Escolha -</ption>';	
    			  for(var i = 0; i < j.length; i++) {
    			     options  += '<option value="' + j[i].mo09_codigo + '">' + j[i].mo09_descricao + '</option>';
    			 	   optionsa += '<option value="' + j[i].mo09_codigo + '">' + j[i].mo09_descricao + '</option>';
    			  }			 	
    			  $('#mo01_etapai').html(options).show();
    			  $('#mo01_etapaii').html(optionsa).show(); //saviodevweb@gmail.com 
    			  $('#mo01_etapaiii').html(optionsa).show();
		      });
	     } else {
		      $('#mo01_etapai').html('<option value="">– Escolha um Nivel –</option>');
	     }
	  });


    $('#mo01_etapai').change(function() {
       var cod_nivel = $('#mo01_nivel').val();      
       var cod_ciclo = $('#mo01_etapai').val();      
       if (cod_nivel != '') {
          $.getJSON('escolaserie.ajax.php?search=',{cod_nivel: cod_nivel, cod_ciclo: cod_ciclo, ajax: 'true'}, function(j) {
 		 	       var options = '<option value="">– Escolha uma Escola -</ption>';	
             for(var i = 0; i < j.length; i++) {
                options += '<option value="' + j[i].ed18_i_codigo + '">' + j[i].ed18_c_nome + '</option>';
             } 
			 
			 //confirm("verificar o texto ");
             $('#mo01_escolai').html(options).show();
          });
       } else {
		      $('#mo01_escolai').html('<option value="">– Escolha uma etapa/fase -</ption>');
       }
    });

    $('#mo01_escolai').change(function() {
       var escola = $('#mo01_escolai').val();      
       if (escola != '') {
          $.getJSON('escolaendereco.ajax.php?search=',{escola: escola, ajax: 'true'}, function(j) {
             $('#enderecoi').show();
             $('#mo01_enderecoi').show();
             $('#mo01_enderecoi').val(j);
          });
       } else {
          $('#enderecoi').hide();
          $('#mo01_enderecoi').hide();
		  $('#mo01_enderecoi').val('');
       }
    });
	
//================================================================== juliegoulart@id.uff.br 

	$('#mo01_escolai').change(function() {
       var escola = $('#mo01_escolai').val(); 
	   var etapa = $('#mo01_etapai').val();
	   if (escola != '') {
	      $.getJSON('semetapa.ajax.php?search=',{escola: escola, etapa: etapa, ajax: 'true'}, function(j) {
			if (j != 0){
				$('#aviso_sem_etapa').show();
				$('#sem_etapa').show();
			}else {
				$('#aviso_sem_etapa').hide();
				$('#sem_etapa').hide(); 
			}
		  });
	   }
	});

	$('#mo01_escolai').change(function() { 
	   var escola = $('#mo01_escolai').val();
       var etapa = $('#mo01_etapai').val();
	    if (escola != "" && etapa != ""){
			if (etapa == '2' || etapa == '3' ||etapa == '4') {
			   $('#creche').show();
		       $('#mo01_creche').show();
			}else if (etapa == '25' || etapa == '26' ||etapa == '27') {
		       $('#mo01_creche').show();
		       $('#creche').show();		   
            }else{
			   $('#mo01_creche').hide();
		       $('#creche').hide();
			}
	    } else{
		    $('#mo01_creche').hide();
		    $('#creche').hide();
       }
    });
   
/*========================================== saviodevweb@gmail.com,


<<<< comentei para funcionar a nenhuma escolha da segunda opção>>>>>>

	$('#mo01_etapaii').change(function() {
	   var cod_nivel = $('#mo01_nivel').val();	
	   var cod_ciclo = $('#mo01_etapaii').val();	
	   var escola    = $('#mo01_escolai').val();
	   if (cod_nivel != '' || cod_ciclo != '') {
	      $.getJSON('escolaserie.ajax.php?search=',{cod_nivel: cod_nivel, cod_ciclo: cod_ciclo, escola: escola, ajax: 'true'}, function(j) {
		       var options  = '<option value="">– Escolha uma Escola -</option>';
                   options += '<option value="0">– Nenhuma Escolha -</option>'; 
		       for(var i = 0; i < j.length; i++) {
		   	      options += '<option value="' + j[i].ed18_i_codigo + '">' + j[i].ed18_c_nome + '</option>';
		  	   }
			 	
			     $('#mo01_escolaii').html(options).show();
		    });
	   } else {
		    $('#mo01_etapaii').html('<option value="">– Escolha uma etapa/fase -</ption>');
	   }
	});
	*/
	/*
  $('#mo01_escolaii').change(function() {
     var escola = $('#mo01_escolaii').val();      
     if (escola != '') {
        $.getJSON('escolaendereco.ajax.php?search=',{escola: escola, ajax: 'true'}, function(j) {
           $('#enderecoii').show();
           $('#mo01_enderecoii').show();             
           $('#mo01_enderecoii').val(j);
        });
     } else {
        $('#enderecoii').hide();
        $('#mo01_enderecoii').hide();
		    $('#mo01_enderecoii').val('');
     }
  });*/
//===================================================
	$('#mo01_etapaii').change(function() {
	   var cod_nivel = $('#mo01_nivel').val();	
	   var cod_ciclo = $('#mo01_etapaii').val();	
	   var escola    = $('#mo01_escolai').val();
	   if (cod_ciclo == '' || cod_ciclo == 0) {
              $('#mo01_escolaii').val('0');
	      $('#mo01_irmaoii').val('2');
              $('#mo01_escolaii').prop('disabled',true);
              $('#mo01_irmaoii').prop('disabled',true);
              $('#enderecoii').hide();          	
	   } else {
              $('#mo01_escolaii').prop('disabled',false);
              $('#mo01_irmaoii').prop('disabled',false);
              $.getJSON('escolaserie.ajax.php?search=',{cod_nivel: cod_nivel, cod_ciclo: cod_ciclo, escola: escola, ajax: 'true'}, function(j) {
   	        var options  = '<option value="">– Escolha uma Escola -</ption>';	
       	        for(var i = 0; i < j.length; i++) {
                   options += '<option value="' + j[i].ed18_i_codigo + '">' + j[i].ed18_c_nome + '</option>';
       	        }	 	
    	        $('#mo01_escolaii').html(options).show();
             });
	   }
	});

//==========================================
  $('#mo01_escolaii').change(function() {
       var escola = $('#mo01_escolaii').val();      
       if (escola != '') {
          $.getJSON('escolaendereco.ajax.php?search=',{escola: escola, ajax: 'true'}, function(j) {
             $('#enderecoii').show();          	
             $('#mo01_enderecoii').show();
             $('#mo01_enderecoii').val(j);
          });
       } else {
          $('#enderecoii').hide();
          $('#mo01_enderecoii').hide();
	  $('#mo01_enderecoii').val('');
       }
    });
//=========================
    $('#mo01_cpfresp').change(function() {
        var cpf = $("#mo01_cpfresp").val();	
        if (validarCPF(cpf)) {          
	         var aDadosAjax = {
	             mo01_nome    : $('#mo01_nome').val(),
	             mo01_cpfresp : $("#mo01_cpfresp").val()
	         };
	         $.ajax({
	            type: "POST",
	            url: "consultarepeticao.ajax.php",
	            data: aDadosAjax,
	            success: function(oObjAjax) {
	               var oRetornoAjax = oObjAjax;
	               if (oRetornoAjax.iStatus == 1) {
	                  $("#btn-salvar").prop("disabled",false);
	               } else if (oRetornoAjax.iStatus == 2) { 
	                  alert(oRetornoAjax.sMessage);
	                  $("#btn-salvar").prop("disabled",true);
	  		            $("#mo01_nome").val('');
				            $("#mo01_nome").css('border-color', '#FF0000');   
	                  $('#mo01_nome').focus(); 
	               }
	            }  
	         });
        } else {
           alert('CPF Invalido!!!.');	
        }
    });

	$('#mo01_redeorigem').change(function() {	   	
	   if ($('#mo01_redeorigem').val() == '8') {
	      $('#mo01_escredeorigem').hide();
 	      $('#mo01_ctbescredeorigem').val('');
	      $('#mo01_ctbescredeorigem').hide();
	      $('#mo01_escredeorigem').val('');
	      $('#mo01_escredeorigem').show();
              $('#mo01_ufredeorigem').val('');
              $('#mo01_munredeorigem').val('');
	      $('#mo01_ufredeorigem').prop("disabled",true);
	      $('#mo01_munredeorigem').prop('disabled',true);          
	      $('#mo01_escredeorigem').prop('disabled',true);
	   } else {
	      $('#mo01_ufredeorigem').prop("disabled",false);
              $('#mo01_munredeorigem').prop('disabled',false);          
              $('#mo01_ufredeorigem').val('');
              $('#mo01_munredeorigem').val('');          
              carregaUfRedeOrigem();
	   }
	});

	$('#mo01_ufredeorigem').change(function() {
	   if ($('#mo01_ufredeorigem').val() != '') {
	      $.getJSON('cidades.ajax.php?search=',{cod_uf: $(this).val(), ajax: 'true'}, function(j) {
	        var options = '<option value="">– Escolha um Municipio –</option>';	
	        for(var i = 0; i < j.length; i++) {
	           options += '<option value="' + j[i].cp05_codlocalidades + '">' + j[i].cp05_localidades + '</option>';
	        }	
	        $('#mo01_munredeorigem').html(options).show();
	      });
	   } else {
	      $('#mo01_munredeorigem').html('<option value="">– Escolha um Estado –</option>');
	   }
	});

	$('#mo01_munredeorigem').change(function() {
	 if ($('#mo01_redeorigem').val() == '3' && $('#mo01_ufredeorigem').val() == 'RJ' && $('#mo01_munredeorigem').val() == '6941') {
            $.getJSON('escolaorigem.ajax.php?search=',{ajax: 'true'}, function(j) {
               var options = '<option value="">– Escolha uma Escola –</option>';	
               for(var i = 0; i < j.length; i++) {
	          options += '<option value="' + j[i].ed18_i_codigo + '">' + j[i].ed18_c_nome + '</option>';
               }
               $('#mo01_ctbescredeorigem').prop('disabled',false);      
               $('#mo01_ctbescredeorigem').show();
               $('#mo01_escredeorigem').hide();
	       $('#mo01_ctbescredeorigem').html(options).show();
           }); 
        } else {
   	   if ($('#mo01_redeorigem').val() != '8') { 
  	      $('#mo01_escredeorigem').prop('disabled',false);
              $('#mo01_ctbescredeorigem').hide();
 	      $('#mo01_escredeorigem').show();
 	   }
        }
      });
	
	$('#mo01_certidaotipo').change(function() {
	    if ($('#mo01_certidaotipo').val() == '0') {
                $('#mo01_certidaomod').val('');
          	$('#certidaonova').val('');
          	$('#mo01_ufcartcert').val('');
          	$('#mo01_muncartcert').val('');
          	$('#mo01_certidaomod').prop('disabled',true);
          	$('#certidaoantiga').hide();
   	    	$('#certidaonova').hide();
   	    	$('#mo01_ufcartcert').prop('disabled',true);
   	    	$('#mo01_muncartcert').prop('disabled',true);
	    } else {
 	       $('#mo01_certidaomod').prop('disabled',false);
   	       $('#mo01_ufcartcert').prop('disabled',false);
               $('#mo01_muncartcert').prop('disabled',false);
               $.getJSON('estados.ajax.php?search=',{ajax: 'true'}, function(j) {
                  var options = '<option value="">– Escolha um Estado –</option>'; 
                  for(var i = 0; i < j.length; i++) {
                     options += '<option value="' + j[i].db12_uf + '">' + j[i].db12_nome + '</option>';
                  }
            	  $('#mo01_ufcartcert').html(options).show();
               });
	    }
       });

	$('#mo01_certidaomod').change(function() {
	    if ($(this).val() == 1) {
 		   $('#certidaoantiga').show();
 		   $('#certidaonova').hide();
	    } else {
		   $('#certidaoantiga').hide();
   	       $('#certidaonova').show();		  
	    }
        });

	$('#mo01_ufcartcert').change(function() {
	   if ($('#mo01_ufcartcert').val() != '') {
		  $.getJSON('cidades.ajax.php?search=',{cod_uf: $(this).val(), ajax: 'true'}, function(j) {
		 	 var options = '<option value="">– Escolha um Municipio –</option>';	
			 for(var i = 0; i < j.length; i++) {
			 	options += '<option value="' + j[i].cp05_codlocalidades + '">' + j[i].cp05_localidades + '</option>';
			 }	
			 $('#mo01_muncartcert').html(options).show();
		  });
	   } else {
		  $('#mo01_muncartcert').html('<option value="">– Escolha um Estado –</option>');
	   }
	});

	$('#mo01_uf').change(function() {
	   if ($('#mo01_uf').val() != '') {
		  $.getJSON('cidades.ajax.php?search=',{cod_uf: $(this).val(), ajax: 'true'}, function(j) {
		 	 var options = '<option value="">Selecione</option>';	
			 for(var i = 0; i < j.length; i++) {
			 	options += '<option value="' + j[i].cp05_localidades + '">' + j[i].cp05_localidades + '</option>';
			 }	
			 $('#mo01_municip').html(options).show();
		  });
	   } else {
		  $('#mo01_municip').html('<option value="">– Escolha um rua/avenida/etc –</option>');
	   }
	});

  $("#mo01_cep").blur(function() {
      var cep = $(this).val().replace(/\D/g, '');
      if ($("#mo01_cep").val() != "") {
         $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
            if (!("erro" in dados)) {
               var aDadosCep = {
                   cod_cep     : cep,
                   cod_rua     : dados.logradouro,
                   cod_compl   : dados.complemento,
                   cod_bairro  : dados.bairro,
                   cod_cidade  : dados.localidade,
                     cod_uf      : dados.uf
                 };              
                 $.ajax({
                    url: "ruasendereco.ajax.php",
                    data: aDadosCep,
                    success: function(oObjeto) { 
                       var oRetornoAjax = JSON.parse(oObjeto);
                       if (oRetornoAjax.iStatus == 1) {
			  			  var optipo = '<option value="' + oRetornoAjax.j88_codigo + '">' + oRetornoAjax.j88_descr + '</option>';
			 			  var optend = '<option value="' + oRetornoAjax.j14_codigo + '">' + oRetornoAjax.j14_nome + '</option>';
			 			  var optbai = '<option value="' + oRetornoAjax.j13_codi + '">' + oRetornoAjax.j13_descr + '</option>';
			 			  var optmun = '<option value="' + oRetornoAjax.cp05_muncod + '">' + oRetornoAjax.cp05_munnome + '</option>';
			 			  var optest = '<option value="' + oRetornoAjax.db12_uf + '">' + oRetornoAjax.db12_nome + '</option>';

                          $("#mo01_tipoend").html(optipo);
                          $("#mo01_nomeend").hide();
                          $("#mo01_ender").show();  
                          $("#mo01_ender").html(optend);
                          $("#mo01_nomebair").hide();
                          $("#mo01_bairro").show();
                          $("#mo01_bairro").html(optbai); 
                          $("#mo01_municip").html(optmun);
                          $("#mo01_uf").html(optest);
                       } else {
                          $("#mo01_ender").hide();
                          $("#mo01_bairro").hide();
                          $("#mo01_tipoend").focus();
                          carregaRuasTipo();
                          $("#mo01_nomeend").show();
                          $("#mo01_nomebair").show();
                          carregaUf();
                       } 
                    }             	
                 });
              } else {
                 $("#mo01_tipoend").html("");
                 $("#mo01_ender").html("");
                 $("#mo01_bairro").html("");
                 $("#mo01_municip").html("");
                 $("#mo01_uf").html("");
                 $("#mo01_ender").hide();
                 $("#mo01_bairro").hide();
                 carregaRuasTipo();
                 $("#mo01_nomeend").show();
                 $("#mo01_nomebair").show();
                 carregaUf();
              }              
           });	
        } else {
           alert("CEP Invalido.");
        }
    });
});
