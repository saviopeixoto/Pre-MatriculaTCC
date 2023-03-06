function validaDbData( obj, oElementoAviso ) {

  oElementoAviso.html('');

  var strValor = obj.val();

  if (strValor == '' || strValor == null){
    return false;
  }

  // 01/01/2007
  var Dia = strValor.substr(0,2);
  var Mes = strValor.substr(3,2);
  var Ano = strValor.substr(6,4);

  if ( strValor.substr(2,1) != '/' ) {

    oElementoAviso.html('Dia Inválido!');
    obj.val('');

    return false;
  }

  var data = new Date(Ano,(Mes-1),Dia);

  if (checkleapyear(Ano)) {
    var fev	= 29;
  }else{
    var fev	= 28;
  }

  var dia     = new Array(31,fev,31,30,31,30,31,31,30,31,30,31);
  var diaexpr = new RegExp("[0-3][0-9]");

  if(Dia.match(diaexpr) == null || Dia > dia[Mes-1] || Dia == "00") {

    oElementoAviso.html('Dia Inválido!');
    obj.val('');

    return false;
  }

  var mesexpr = new RegExp("[01][0-9]");
  if(Mes.match(mesexpr) == null ||  Mes > 12 || Mes == "00") {

    oElementoAviso.html('Mês Inválido!');
    obj.val('');

    return false;
  }

  var anoexpr = new RegExp("[12][0-9][0-9][0-9]");
  if(Ano.match(anoexpr) == null) {

    oElementoAviso.html('Ano Inválido!');
    obj.val('');

    return false;
  }

  return true;
}

function checkleapyear( datea ) {

  datea = parseInt(datea);

  if( datea%4 == 0 ) {

    if( datea % 100 != 0 ) {
      return true;
    } else {

      if( datea % 400 == 0 ) {
        return true;
      } else {
        return false;
      }
    }
  }

  return false;
}

// js_diferenca_datas: função java script para comparação entre datas
// formato: YYYY-mm-dd
// verifica qual das datas é a maior
// opcao: 1 - retorna a data que maior
//        2 - retorna a data que menor
//        3 - retorna true ou false
//            true : diz que a data da esquerda é maior (data1)
//            false: diz que a data da direita é maior (data2)
//        a - retorna a quantidade de anos entre as datas
//        m - retorna a quantidade de meses entre as datas
//        d - retorna a quantidade de dias entre as datas
//      amd - retorna a quantidade de ano, meses e dias entre as datas separados por ' ' (um espaço em branco)
// OBS.: Se as datas forem iguais, retornará 'i'.
// teste = js_diferenca_datas('2006-03-05','2005-01-01',1);     ** teste = '2006-03-05';
// teste = js_diferenca_datas('2006-03-05','2005-01-01',2);     ** teste = '2005-01-01';
// teste = js_diferenca_datas('2006-03-05','2005-01-01',3);     ** teste = true; (primeira data parametro é maior)
// teste = js_diferenca_datas('2006-01-01','2006-01-01',2);     ** teste = 'i';  (iguais )
// PARA ESTAS COMPARAÇÕES, NÃO IMPORTA A ORDEM EM QUE AS DATAS SÃO PASSADAS
// teste = js_diferenca_datas('2006-03-05','2005-01-01','a');   ** teste = 1;
// teste = js_diferenca_datas('2006-03-05','2005-01-01','m');   ** teste = 14;
// teste = js_diferenca_datas('2006-03-05','2005-01-01','d');   ** teste = 429;
// teste = js_diferenca_datas('2006-03-05','2005-01-01','amd'); ** teste = '1 2 9'; ** 1 ano, 2 meses e 9 dias

function js_diferenca_datas(data1,data2,opcao){

  dataT1 = new Date(data1.substring(0,4),(data1.substring(5,7) - 1),data1.substring(8,10));
  dataT2 = new Date(data2.substring(0,4),(data2.substring(5,7) - 1),data2.substring(8,10));
  maior = dataT1;
  menor = dataT2;
  if(dataT1 > dataT2){
    if(opcao == 1){
      return data1;
    }else if(opcao == 2){
      return data2;
    }else if(opcao == 3){
      return true;
    }
  }else if(dataT2 > dataT1){
    maior = dataT2;
    menor = dataT1;
    if(opcao == 1){
      return data2;
    }else if(opcao == 2){
      return data1;
    }else if(opcao == 3){
      return false;
    }
  }else if(opcao == 1 || opcao == 2 || opcao == 3){
    return 'i';
  }
  dias = (((maior - menor) / 86400000) + 1);
  dias = js_round(dias,0);
  mess = (dias / 30);
  anos = (mess / 12);
  if(opcao == "d"){
    return parseInt(dias);
  }else if(opcao == "m"){
    return parseInt(mess);
  }else if(opcao == "a"){
    return parseInt(anos);
  }else if(opcao == "amd"){
    return anos+' '+mess+' '+dias;
    //return parseInt(anos)+' '+mmess+' '+mdias;
  }
}