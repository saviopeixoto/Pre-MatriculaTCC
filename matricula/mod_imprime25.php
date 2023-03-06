<?php

	$this->objpdf->settopmargin(1);
	$this->objpdf->SetTextColor(0,0,0);
	$this->objpdf->SetFont('Arial','B',12);
	$this->objpdf->SetLineWidth(1);
	$this->objpdf->RoundedRect(2,3,204,292,2,'1234');
	$this->objpdf->SetLineWidth(0.5);
	$this->objpdf->roundedrect(4,5,200,288,2,'1234');
    $this->objpdf->SetLineWidth(0.2);

    global $logo;
    $sSqlInst = "select logo from db_config where =".db_getsession("DB_instit");
    $rsInst   = db_query($sSqlInst);
    db_fieldsmemory($rsInst, 0);

	$this->objpdf->Image('imagens/files/' . $logo,90,7,50);
	$this->objpdf->sety(34);
	$this->objpdf->setfont('Arial','B',14);
    $this->objpdf->Multicell(0,8,'Secretaria Municipal de Educação',0,'C',0);
	$this->objpdf->sety(40);
	$this->objpdf->setfont('Arial','B',12);
	$this->objpdf->Multicell(0,8,'COMPROVANTE DE INSCRIÇÃO DE PRÉ-MATRÍCULA Nº '.$this->protocol,0,"C",0); // tipo de alvara

	$coluna = 15;
	$fonte  = 10;
    $linha =  $this->objpdf->gety();
    $a = $linha;

    $this->objpdf->setx(44);
    $this->objpdf->roundedrect($coluna-2,$linha,187,27,2,'1234');
    $this->objpdf->Ln(1);
    $this->objpdf->sety($linha+1); 
	$this->objpdf->SetFont('Arial','',$fonte-2);
	$this->objpdf->Text($coluna,$linha+13,'CANDIDATO:'); // inscricao
	$this->objpdf->SetFont('Arial','',$fonte-2);
	$this->objpdf->Text($coluna + 60,$linha+13,$this->nome); // inscricao
	$this->objpdf->SetFont('Arial','',$fonte-2);
	$this->objpdf->Text($coluna,$linha+17,"REPONSÁVEL: "); // nome
	$this->objpdf->SetFont('Arial','',$fonte-2);
	$this->objpdf->Text($coluna + 32,$linha+17,$this->nomeresp); // nome
	$this->objpdf->SetFont('Arial','',$fonte-2);
	$this->objpdf->Text($coluna,$linha+21,"CPF: "); // endereco
	$this->objpdf->SetFont('Arial','',$fonte-2);

    $linha = $this->objpdf->gety()+17;
	$linha1 =  $this->objpdf->gety();


    $this->objpdf->setx(44);
    $this->objpdf->roundedrect($coluna-2,$linha+7,187,27,2,'1234');
    $this->objpdf->Ln(1);
    $this->objpdf->sety($linha+7); 
	$this->objpdf->setfont('Arial','B',$fonte);
	$this->objpdf->Multicell(0,8,'ESCOLAS PRETENDIDAS',0,"C",0); // tipo de alvara
    $this->objpdf->setx(15);
	$this->objpdf->setfont('Arial','',$fonte-2);
    $this->objpdf->cell(30,3,"Escola",0,0,"L",0);

    $maiscol = 0;
    $yy = $this->objpdf->gety();
    $xcol = 10;

    for($ii = 0;$ii < $this->linhas ;$ii++) {
       $this->objpdf->setxy($xcol+5+$maiscol,$yy+5);
       $this->objpdf->cell(63,3,$this->escolas[$ii]['escola'],0,1,"L",0);
       $yy += 3;
    }

    $linha = $this->objpdf->gety()+15;
	$linha1 =  $this->objpdf->gety();

    $this->objpdf->setx(44);
    $this->objpdf->roundedrect($coluna-2,$linha+4,187,17,2,'1234');
    $this->objpdf->Ln(1);
    $this->objpdf->sety($linha+3);
	$this->objpdf->setfont('Arial','B',$fonte-2);
	$this->objpdf->Multicell(0,8,'OBSERVAÇÕES',0,"C",0); // tipo de alvara
    $this->objpdf->setxy(20,$linha+9);
	$this->objpdf->setfont('Arial','',$fonte-4);
	$this->objpdf->Multicell(0,2,'1. Para fazer o acompanhamento entre o site www.seme.itaborai.rj.gov.br/matriculafacil.');
    $this->objpdf->setxy(20,$linha+12);
	$this->objpdf->Multicell(0,2,"2. Depois vá em consulte pré-matrícula, com o comprovante em mãos e digite o  CPF e Nº do Protocolo.",0,'J');

?>