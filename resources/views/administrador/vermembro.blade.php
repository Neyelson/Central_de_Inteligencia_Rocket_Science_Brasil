@extends('layouts/dashboardmaster')

@section('contentdashboard')

<!-- BLOCO BOTÕES NO TOPO -->

<a type="submit" href="{{ url('membros') }}" class=" btn-sm btn-primary bg-aeroblack mr-1" style=" text-decoration: none;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar para todos os membros</a>

<a type="submit" href="{{ url('membros/editar?id='.$vermembro->id) }}" class=" btn-sm btn-primary bg-aeroblack mr-1" style=" text-decoration: none;"><i class="fa fa-pencil"></i> Editar membro</a>

<a href="{{ url('membros/bloquear?id='.$vermembro->id) }}" onclick="return confirm('Deseja bloqeuar o membro &quot;{{$vermembro->name}}&quot;?');" style="text-decoration: none;" type="submit" class=" btn-sm btn-danger bg-aeroblack"><i class="fa fa-ban" aria-hidden="true"></i> Bloquear membro</a>

<!-- BLOCO INFORMAÇÕES DO MEMBRO -->

<hr>

<?php

if($vermembro->credencial===0){
	$vermembro->credencial='(0) Novato';
}else if($vermembro->credencial===1){
	$vermembro->credencial='(1) Conhecido';
}else if($vermembro->credencial===2){
	$vermembro->credencial='(2) Confiável';
}else if($vermembro->credencial===3){
	$vermembro->credencial='(3) Muito confiável';
} else if($vermembro->credencial===8){
	$vermembro->credencial='(8) Alienígena';
} else if($vermembro->credencial===9){
	$vermembro->credencial='(9) Moderador';
} else if($vermembro->credencial===10){
	$vermembro->credencial='(10) Administrador';
} else if($vermembro->credencial===80){
	$vermembro->credencial='(80) Bloqueado/Outros';
} else if($vermembro->credencial===81){
	$vermembro->credencial='(81) Bloqueado/Inatividade';
} else {
	$vermembro->credencial='Erro';
}

?>

<h5>ID #{{$vermembro->id}}.</h5>
<b>Nome:</b> {{$vermembro->name}}.<br>
<b>E-mail:</b> {{$vermembro->email}}<br>
<b>Cadastrado em:</b> <?php if (!empty($vermembro->created_at)){ echo date('d/m/y à\s H:i', strtotime($vermembro->created_at)); } ?><br>
<b>Credencial:</b> {{$vermembro->credencial}}.<br>

<hr>

<b>Sobre:</b><br>{{$vermembro->sobre}}<br>

@endsection